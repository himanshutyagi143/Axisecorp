<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Omnipay;
use Session;
use Redirect;
use DB;
use Mail;
use App\User;
use Auth;
use App\Models\UserPlanComponent;
use App\Models\FloorUnit;
use App\Models\PaymentDetails;
use App\Models\TempCustomer;
use App\Models\TempCustomerAddressDetails;
use App\Models\TempCustomerDetails;
use App\Models\TempCustomerKyc;

use App\Models\CustomerAddressDetails;
use App\Models\CustomerDetails;
use App\Models\CustomerKyc;
use App\Models\VendorInvite;
use App\Models\AssignProject;
use App\Models\UnitDetails;
use App\Models\PlanComponent;
use CommonHelper;
use App\Helpers\Mailnotification;
use Illuminate\Support\Facades\Crypt;

class OmnipayController extends Controller
{
    public function payment($orderId = 0){
		//Getting Order Details..
		//dd($orderId);
		$orderDetails = DB::table('orders')->where('order_id', '=', $orderId)->first();
		
		
		//Creating dynamic return and cancel url...
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
			$protocol = 'https';
		}
		else{
			$protocol = 'http';
		}
		$returnUrl = $protocol.'://'.$_SERVER['HTTP_HOST'].'/payment/returnPayment';
		$cancelUrl = $protocol.'://'.$_SERVER['HTTP_HOST'].'/payment/cancelPayment/'.$orderDetails->txnid;
		//dd($cancelUrl);
		
		if(isset($orderDetails)){
			//Getting User Details...
			
			$userData = DB::table('customer_details')->where('customer_code','=', $orderDetails->customer_code)->first();
			
			
			//Getting Gateway Parameters...
			$parameters = Omnipay::getParameters();
			
			
			//Creating Array for user's basic details...
			$formData = [
				'firstName' => $userData->first_name,
				'lastName' => $userData->last_name,
				'email' => $userData->email,
				'contact' => $userData->phone,
			];
			
			
			//CreditCard method creates a safe way to accept the user's details on payment gateway...
			$card = Omnipay::creditCard($formData);

			//dd($card);
			
			//Calling Payment Gateway and sending payment parameters to the gateway...
			$response = Omnipay::completePurchase(
				[
					'account_id' => $parameters['key_id'],
					'amount' => $orderDetails->amount,
					'currency' => 'INR',
					'description' => $orderDetails->description,
					'card' => $card,
					'transactionId' => $orderDetails->txnid,
					'returnUrl' => $returnUrl,
					'cancelUrl' => $cancelUrl
					
				]
			)->send();
			
			//dd($response->getRedirectResponse());
			//Gateway response...
			if ($response->isSuccessful()) {
				dd('payment was successful: update database');
				// payment was successful: update database
			} elseif ($response->isRedirect()) {
				// redirect to offsite payment gateway
				return $response->getRedirectResponse();
			} else {
				
				print_r($orderDetails);
				dd('Somehing Went Wrong. Please Again.');
				// payment failed: display message to customer
				echo $response->getMessage();
			}
					
		}
		else{
			dd("Order Details Not found.");
		}
	}
	
	

	public function returnPayment(Request $request){
		$paymentResponse = $request->all();
		//dd($paymentResponse);
		$orderData = DB::table('orders')->where('txnid','=',$paymentResponse['x_reference'])->first();
		//$user = DB::table('users')->where('id','=',$orderData->user_id)->first();
		$bookingData = DB::table('booking')->where('booking_id','=',$orderData->booking_id)->first();
		if($orderData->sender == 'Existing Payment'){
			$this->ExistingPaymentCallBack($paymentResponse);
		}else{
			$this->callBack($paymentResponse);
		}


		$booking_id_crypt = Crypt::encrypt($orderData->booking_id);
		$order_id_crypt = Crypt::encrypt($orderData->order_id);
		if($paymentResponse['x_result'] == 'completed'){
			
			//Redirecting to user...
			if($orderData->sender == 'Admin'){
				return redirect('/administrator/booking/'.$bookingData->unit_id)->with('message', 'Unit Booked Successfully.');
			}
			elseif($orderData->sender == 'Invite Block'){
				
				return redirect('/payment_status/'.$booking_id_crypt);
				
			}
			else if($orderData->sender == 'Existing Payment'){
				return redirect('/existing_payment_status/'.$order_id_crypt);
			}
		}
		elseif($paymentResponse['x_result'] == 'failed'){
			
			//Redirecting Back to user...
			if($orderData->sender == 'Admin'){
				return redirect('/administrator/booking/'.$bookingData->unit_id)->with('error', 'Payment Has Been Failed. Please Try Again.');
			}
			elseif($orderData->sender == 'Invite Block'){
				return redirect('/payment_status/'.$booking_id_crypt);
				
				/* if (Auth::loginUsingId($orderData->user_id)) {					 
				 return redirect('/profile');
				}else{
					return redirect('/');
				} */
			}else if($orderData->sender == 'Existing Payment'){
				return redirect('/existing_payment_status/'.$order_id_crypt);
			} 
		}
		
	}
	
	public function callBack($paymentResponse){

		//Getting Payment gateway response...
		$gateway = Omnipay::getShortName();
		$jsonResponse = json_encode($paymentResponse);
		$orderData = DB::table('orders')->where('txnid','=',$paymentResponse['x_reference'])->first();
	
		$bookingData = DB::table('booking')->where('booking_id','=',$orderData->booking_id)->first();
		
		
		if($paymentResponse['x_result'] == 'completed'){

			$unit_name = DB::table('floor_unit')->where('id','=',$bookingData->unit_id)->first()->unit;

			$this->updateTempCustomer($orderData->customer_code,$unit_name);

			$user_id=$this->create_customer($unit_name);

			$user = DB::table('users')->where('id','=',$user_id)->first();
			
			//Updating Other tables...
			$updatebooking = DB::table('booking')->where('booking_id', '=', $orderData->booking_id)->update(['booking_status' => 2,'customer_code'=>$unit_name, 'updated_at' => date('Y-m-d'),'user_id'=>$user_id,'booking_date'=>date('Y-m-d'),'source_of_booking_date'=>3]);
			
			
			$updateFloorUnit = UnitDetails::where('unit_id', '=', $bookingData->unit_id)->where('project_id',$bookingData->project_id)->where('block_id',$bookingData->block_id)->update(['booking_status' => 2, 'updated_at' => date('y-m-d')]);
			
			$updateOrder = DB::table('orders')->where('order_id','=',$orderData->order_id)->where('txnid','=', $paymentResponse['x_reference'])->update(['order_status' => 1,'customer_code'=>$unit_name, 'updated_at' => date('Y-m-d'),'user_id'=>$user_id]);
			
			DB::table('payment_plan_wise_booking')->insert(['booking_id' =>$bookingData->booking_id, 'customer_id' => $user_id,'payment_plan_id'=>$bookingData->payment_plan_id,'created_at'=>date('Y-m-d')]);
            
			//Inserting data according to the payment gateway response...
			$paymentDetails['booking_id'] = $orderData->booking_id;
			$paymentDetails['user_plan_component_id'] = $orderData->user_plan_component_id;
			$paymentDetails['net_amount'] = $orderData->amount;
			$paymentDetails['user_id'] = $user_id;
			$paymentDetails['txnid'] = $orderData->txnid;
			$paymentDetails['payment_type'] = 1;
			$paymentDetails['payment_status'] = 1;
			$paymentDetails['gateway'] = $gateway;
			$paymentDetails['response'] = $jsonResponse;
			$paymentDetails['is_active'] = 1;
			$paymentDetails['created_at'] = date('Y-m-d');
			$paymentDetails['cheque_date'] = date('Y-m-d');
			$payment_details_id = PaymentDetails::insertGetId($paymentDetails);
			
			//Genrate payment schedule.
			$bookingData = DB::table('booking')->where('booking_id','=',$orderData->booking_id)->first();
		//	echo $bookingData->payment_plan_id; exit;
			if($bookingData->payment_plan_id!=0){	
				$this->createcaulatePlan($bookingData,$payment_details_id);
			}
			//Genrate mail date
			$this->createCustomerSendMailDate($user_id);
			
			// Mail Send
			$unit_details = DB::table('booking')->leftjoin('unit_details', 'unit_details.unit_id','=','booking.unit_id')
											->leftjoin('project','project.project_id','=','booking.project_id')
											->leftjoin('project_blocks','project_blocks.block_id','=','booking.block_id')
											->where('booking.booking_status','=',2)
											->where('booking.is_active','=',1)
											->where('booking.booking_id','=',$orderData->booking_id)
											->select('booking.booking_id','booking.unit_id','booking.user_id','booking.project_id','booking.block_id','unit_details.unit_name','unit_details.type','unit_details.floor_id','project.project_name','project_blocks.block_name','project_blocks.block_type_id')
											->first();	
			
			if(isset($unit_details)){
				$unit_details->floor = CommonHelper::getUnitFloorDetail($unit_details->unit_name, $unit_details->block_type_id??0, $unit_details->block_id);
			}
			
			
			$getCustomerData = DB::table('temp_customer')->where('customer_code','=',$unit_name)->first();
			
			if($getCustomerData){
				$user_fname     = $getCustomerData->first_name;
				$user_lname     = $getCustomerData->last_name;
				$user_email     = $getCustomerData->email;
				$project_name   = $unit_details->project_name;
				$block_name     = $unit_details->block_name;
				$unit_name	   	= $unit_details->unit_name;
				$floor_name  	= $unit_details->floor['floor'];
				$booking_amount	= $orderData->amount;
				
				
				//Creating dynamic return and cancel url...
				if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
					$protocol = 'https';
				}
				else{
					$protocol = 'http';
				}
				
				$uri = $protocol.'://'.$_SERVER['HTTP_HOST'];
				$booking_id = Crypt::encrypt($orderData->booking_id);
				$unit_details_link='<a href="'.$uri.'/payment_status/'.$booking_id.'" >here</a>';
				
				$userDataArray=array('first_name'=>$user_fname,'last_name'=>$user_lname,'project_name'=>$project_name,'block_name'=>$block_name,'unit_name'=>$unit_name,'floor_name'=>$floor_name,'booking_amount'=>$booking_amount,'unit_details_link'=>$unit_details_link, 'receiver_mail'=>$user_email);
				
				$is_mail_sent = Mailnotification::bookingConfirmation($userDataArray);
				
			}
	
		}
		elseif($paymentResponse['x_result'] == 'failed'){
			
			//Inserting data according to the payment gateway response...
			$paymentDetails['booking_id'] = $orderData->booking_id;
			$paymentDetails['user_plan_component_id'] = $orderData->user_plan_component_id;
			$paymentDetails['net_amount'] = $orderData->amount;
			$paymentDetails['txnid'] = $orderData->txnid;
			$paymentDetails['payment_type'] = 1;
			$paymentDetails['payment_status'] = 2;
			$paymentDetails['gateway'] = $gateway;
			$paymentDetails['response'] = $jsonResponse;
			$paymentDetails['is_active'] = 1;
			$paymentDetails['created_at'] = date('Y-m-d');
			$insertPaymentDetails = PaymentDetails::insert($paymentDetails);
			
			//Updating Other tables...
			$updatebooking = DB::table('booking')->where('booking_id', '=', $orderData->booking_id)->update(['booking_status' => 1, 'updated_at' => date('Y-m-d'),'user_id'=>$user_id]);
			$updateUserPlanComponent = UserPlanComponent::where('user_plan_component_id', '=', $orderData->user_plan_component_id)->update(['status' => 2, 'updated_at' => date('y-m-d')]);
			$updateOrder = DB::table('orders')->where('order_id','=',$orderData->order_id)->where('txnid','=', $paymentResponse['x_reference'])->update(['order_status' => 2, 'updated_at' => date('Y-m-d')]);
			
			
			// Sending Email to User...
			$to = $user->email;
			$from = isset(Auth::user()->email)?Auth::user()->email:'do-not-reply@eejak.com';
			$data = ['msg' => 'Payment Has Been Failed. Please Try Again.',
					'subject' => 'Booking Confirmation',
					'from' => $from,
					'to' => $to];
					
			$mail = Mail::send('emails.blockbooking', ['data' => $data], function ($m) use ($data) {
			 $m->from($data['from'], 'Realestate Panel');
				 $m->to($data['to'])->subject($data['subject']);
			   });
			
			
			//Insert Email Data into send_email table...
			if($mail){

				$emailData['send_to'] = $to;
				$emailData['send_by'] = isset(Auth::user()->email)?Auth::user()->email:'do-not-reply@eejak.com';
				$emailData['sender_id'] = isset(Auth::user()->id)?Auth::user()->id:1;
				$emailData['subject'] = $data['subject'];
				$emailData['body'] = $data['msg'];
				$emailData['send_date'] = date('Y-m-d');
				$insertEmailDetails = DB::table('send_mail')->insert($emailData);
				
			}
			
		}
		
	}


	public function ExistingPaymentCallBack($paymentResponse){
		//Getting Payment gateway response...
		//dd($paymentResponse);
		$gateway = Omnipay::getShortName();
		$jsonResponse = json_encode($paymentResponse);
		$orderData = DB::table('orders')->where('txnid','=',$paymentResponse['x_reference'])->first();
	
		$bookingData = DB::table('booking')->where('booking_id','=',$orderData->booking_id)->first();
		
		//dd($paymentResponse);
		if($paymentResponse['x_result'] == 'completed'){
			$unit_name = DB::table('floor_unit')->where('id','=',$bookingData->unit_id)->first()->unit;
			$user = DB::table('users')->where('id','=',$orderData->user_id)->first();
			DB::table('orders')->where('order_id','=',$orderData->order_id)->where('txnid','=', $paymentResponse['x_reference'])->update(['order_status' => 1, 'updated_at' => date('Y-m-d')]);
			
			$tbl_link_id=DB::table('payment_url')->where('order_id','=',$orderData->order_id)->first();
			DB::table('tbl_link')->where('id','=',$tbl_link_id->tbl_link_id)->update(['status' => 1, 'razorpay_reponse' => $jsonResponse]);

			$components = DB::table('user_plan_component')->where('booking_id','=',$orderData->booking_id)->where('user_id','=',$orderData->user_id)->where('is_active','=',1)->where('status','=',0)->orderBy('sequence','ASC')->get();
			$amount = $orderData->amount;
			foreach($components as $component){
				$amt = $component->due_amt-$amount;
				if($amt >= 0){
					if($amt == 0){
						DB::table('user_plan_component')->where('user_plan_component_id','=',$component->user_plan_component_id)->update(['due_amt'=>$amt,'status'=>1]);
					}else{
						DB::table('user_plan_component')->where('user_plan_component_id','=',$component->user_plan_component_id)->update(['due_amt'=>$amt]);
					}
					$paymentDetails['booking_id'] = $orderData->booking_id;
					$paymentDetails['user_plan_component_id'] = $component->user_plan_component_id;
					$paymentDetails['net_amount'] = $amount;
					$paymentDetails['user_id'] = $orderData->user_id;
					$paymentDetails['txnid'] = $orderData->txnid;
					$paymentDetails['payment_type'] = 1;
					$paymentDetails['payment_status'] = 1;
					$paymentDetails['gateway'] = $gateway;
					$paymentDetails['response'] = $jsonResponse;
					$paymentDetails['is_active'] = 1;
					$paymentDetails['created_at'] = date('Y-m-d');
					$paymentDetails['cheque_date'] = date('Y-m-d');
					$payment_details_id = PaymentDetails::insertGetId($paymentDetails);
					break;
				}else{
					DB::table('user_plan_component')->where('user_plan_component_id','=',$component->user_plan_component_id)->update(['due_amt'=>0,'status'=>1]);
					$paymentDetails['booking_id'] = $orderData->booking_id;
					$paymentDetails['user_plan_component_id'] = $component->user_plan_component_id;
					$paymentDetails['net_amount'] = $component->due_amt;
					$paymentDetails['user_id'] = $orderData->user_id;
					$paymentDetails['txnid'] = $orderData->txnid;
					$paymentDetails['payment_type'] = 1;
					$paymentDetails['payment_status'] = 1;
					$paymentDetails['gateway'] = $gateway;
					$paymentDetails['response'] = $jsonResponse;
					$paymentDetails['is_active'] = 1;
					$paymentDetails['created_at'] = date('Y-m-d');
					$paymentDetails['cheque_date'] = date('Y-m-d');
					$payment_details_id = PaymentDetails::insertGetId($paymentDetails);
					$amount = abs($amt);
				}
			}

		}
		elseif($paymentResponse['x_result'] == 'failed'){
			
			$tbl_link_id=DB::table('payment_url')->where('order_id','=',$orderData->id)->first();
			DB::table('tbl_link')->where('id','=',$tbl_link_id->tbl_link_id)->update(['status' => 2, 'razorpay_reponse' => $jsonResponse]);
			//Inserting data according to the payment gateway response...
			$paymentDetails['booking_id'] = $orderData->booking_id;
			$paymentDetails['user_plan_component_id'] = $orderData->user_plan_component_id;
			$paymentDetails['net_amount'] = $orderData->amount;
			$paymentDetails['txnid'] = $orderData->txnid;
			$paymentDetails['payment_type'] = 1;
			$paymentDetails['payment_status'] = 2;
			$paymentDetails['gateway'] = $gateway;
			$paymentDetails['response'] = $jsonResponse;
			$paymentDetails['is_active'] = 1;
			$paymentDetails['created_at'] = date('Y-m-d');
			$insertPaymentDetails = PaymentDetails::insert($paymentDetails);
			
			DB::table('orders')->where('order_id','=',$orderData->order_id)->where('txnid','=', $paymentResponse['x_reference'])->update(['order_status' => 2, 'updated_at' => date('Y-m-d')]);
			
		}
		
	}



	public function updateTempCustomer($customer_code,$unit_name){
		DB::table('temp_customer')->where('customer_code','=',$customer_code)->update(['customer_code'=>$unit_name]);
		DB::table('temp_customer_details')->where('customer_code','=',$customer_code)->update(['customer_code'=>$unit_name]);
		DB::table('temp_customer_address_details')->where('customer_code','=',$customer_code)->update(['customer_code'=>$unit_name]);
	}
	
	
	 public function createcaulatePlan($bookingData,$payment_details_id){
		
		$payment_plan_id=$bookingData->payment_plan_id;
		$customerid=$bookingData->user_id;
		$unit_id=$bookingData->unit_id;
		$booking_id=$bookingData->booking_id;
		
		$getbookingorders=DB::table('payment_details')->where('user_id','=',$customerid)->where('is_active','=',1)->where('booking_id','=',$booking_id)->where('count','=',0)->where('payment_status','=',1)->first();
		//echo '<pre>'; print_r($getbookingorders); exit
		$firstbookingAmmount=isset($getbookingorders->net_amount)?$getbookingorders->net_amount:0;
		
		$getplanComponents  = PlanComponent::where('payment_plan_id', '=', $payment_plan_id)->orderBy('sequence','asc')->get();
		
		
		
        $propertyData = DB::table('floor_unit')->join('project_unit','project_unit.project_unit_id','=','floor_unit.project_unit_type_id')
		->join('project_unit_othercharges','project_unit_othercharges.project_unit_id','=','project_unit.project_unit_id')
		->where('floor_unit.id','=',$unit_id)
		->select('project_unit.basic_sale_price as total_unit_cost','project_unit_othercharges.price','project_unit_othercharges.is_mandatory','project_unit_othercharges.charge_type','project_unit.project_unit_id')
		->first();
		
		$getOtherCharge=DB::table('project_unit_othercharges')->where('project_unit_id','=',$propertyData->project_unit_id)->get();
		
		$totalunitothercharge=0;
		foreach($getOtherCharge as $charge){
			$totalunitothercharge+=$charge->price;
			
		}
		// if($totalunitothercharge!=0){
		// 	$totalunitotherchargegst=round($totalunitothercharge/1.18,2);
		// 	$totalunitothercharge=$totalunitothercharge+$totalunitotherchargegst;
		// }
		if($totalunitothercharge!=0){
			$totalunitotherchargegst=0;
			$totalunitothercharge=$totalunitothercharge+$totalunitotherchargegst;
		}
		
		$total_unit_cost=$propertyData->total_unit_cost;
		if(isset($bookingData->discount))
		$total_unit_cost=$propertyData->total_unit_cost-$bookingData->discount;
		
		
		foreach($getplanComponents as $key => $planComponent){
			// For Amount...
			$due_amt=0;
			
			if($planComponent->component_type == 1){
				$percentage       = $planComponent->component_value ;
				$total_unit_cost  = $total_unit_cost;
				$total_unit_cost  = (int)preg_replace('#[^0-9]+#', '', $total_unit_cost);
				$calculated_value = ($total_unit_cost * $percentage)/100;
			}
			else{
				$calculated_value = $planComponent->component_value ;
			}
			
			    $otherCharges=0;
			if(count($getplanComponents)==($key+1)){
				// $otherCharges=$totalunitothercharge;
				// $calculated_value = $calculated_value +$totalunitothercharge;
				$calculated_value = $calculated_value;
				$otherCharges=round(($totalunitothercharge*1.18),2);
			}
			
            if($key==0){
				$actualFirstAmount= round($firstbookingAmmount/1.12,2);
				$due_amtn=$calculated_value-$actualFirstAmount;
				$due_amt=round((($due_amtn*12)/100)+$due_amtn,2);
			}else{
				$actualFirstAmount= 0;
				$due_amtn=$calculated_value-$actualFirstAmount;
				$due_amt=round((($due_amtn*12)/100)+$due_amtn,2);
			}

			if($otherCharges!=0){
				$due_amt=$due_amt+$otherCharges;
			}
			
			$gst_calulated_value=(($calculated_value*12)/100)+$calculated_value;
			$gst = (($calculated_value*12)/100);
			
			$sequence=isset($planComponent->sequence)?$planComponent->sequence:$key+1;
		
			$user_plan_component['booking_id']   			= $booking_id;
			$user_plan_component['user_id']   				= $customerid;
			$user_plan_component['payment_plan_id']   		= $payment_plan_id;
			$user_plan_component['plan_component_id']   	= $planComponent->plan_component_id;
			$user_plan_component['component_name']    		= $planComponent->component_name;
			$user_plan_component['sequence']  		  		= $sequence;
			$user_plan_component['calulated_value']   		= $calculated_value;
			$user_plan_component['gst_calulated_value']   	= $gst_calulated_value;
			$user_plan_component['gst']   					= $gst;
			$user_plan_component['due_amt']   		        = $due_amt;
			$user_plan_component['other_charges']   		= $otherCharges;
			$user_plan_component['status']   				= 0;
			$user_plan_component['is_active']   			= 1;
			$user_plan_component['demand_raised']   		= 0;
			$user_plan_component['created_at']   			= date('Y-m-d H:i:s');
			$due_date=$this->calculatePlanDueDate($planComponent);
			$user_plan_component['due_date'] = $due_date;
			
			$user_plan_component_id=UserPlanComponent::insertGetId($user_plan_component);
			
			if($key==0){
				DB::table('orders')->where('booking_id','=',$booking_id)->where('user_id','=',$customerid)->update(['user_plan_component_id'=>$user_plan_component_id]);
				
				DB::table('payment_details')->where('payment_details_id','=',$payment_details_id)->where('user_id','=',$customerid)->update(['user_plan_component_id'=>$user_plan_component_id]);
			}
		    
			DB::table('customer_demand_setting')->insert([
					'plan_component_id' => $planComponent->plan_component_id,
					'user_id' => $customerid,
					'booking_id' => $booking_id,
					'amount' => $due_amt,
					'due_date' => $due_date,
					'notification_due_days' => '1',
					'status' => 0,
					'created_at' => date('Y-m-d'),
					'created_by' => 1
				]);
		}
		
		//return $storeAllPayentPlan;
	}
	
	public function calculatePlanDueDate($planComponent)
	{
		$duedate='';
		$bookingDate=date('Y-m-d');
		$period_type=$planComponent->period_type;
		if(in_array($period_type,array(0,1))){
			$daysum=0;
			$total_days=$planComponent->period_days_value??0;
			$planComponent->period_month_value=$planComponent->period_month_value??0;
			$total_month_days=((int)$planComponent->period_month_value)*30;
			$daysum=(int)$total_days+(int)$total_month_days;
			$duedate= date('Y-m-d', strtotime($bookingDate. "+ $daysum days"));
		}else{
			
			$duedate=$planComponent->period_custom_date;
		}
		return $duedate;
		
	}
	
	public function cancelPayment(Request $request, $txnid=0){
		
		//Getting Payment gateway response...
		$paymentResponse = $request->all();
		$orderData = DB::table('orders')->where('txnid','=',$txnid)->first();
		$user_id = $orderData->user_id??0;
		$bookingData = DB::table('booking')->where('booking_id','=',$orderData->booking_id)->first();
		$gateway = Omnipay::getShortName();
		$jsonResponse = json_encode($paymentResponse);
		//dd($paymentResponse);
		
		
		if($paymentResponse['fail_type'] == 'user'){
			
			//Inserting data according to the payment gateway response...
			$paymentDetails['booking_id'] = $orderData->booking_id;
			$paymentDetails['user_plan_component_id'] = $orderData->user_plan_component_id;
			$paymentDetails['net_amount'] = $orderData->amount;
			$paymentDetails['txnid'] = $txnid;
			$paymentDetails['payment_type'] = 1;
			$paymentDetails['payment_status'] = 3;
			$paymentDetails['gateway'] = $gateway;
			$paymentDetails['response'] = $jsonResponse;
			$paymentDetails['is_active'] = 1;
			$paymentDetails['created_at'] = date('Y-m-d');
			$insertPaymentDetails = PaymentDetails::insert($paymentDetails);
			
			if($orderData->sender != 'Existing Payment'){
			//Updating Other tables...
				$updatebooking = DB::table('booking')->where('booking_id', '=', $orderData->booking_id)->update(['booking_status' => 3, 'updated_at' => date('Y-m-d'),'user_id'=>$user_id]);
				$updateUserPlanComponent = UserPlanComponent::where('user_plan_component_id', '=', $orderData->user_plan_component_id)->update(['status' => 3, 'updated_at' => date('y-m-d')]);
			   $updateOrder = DB::table('orders')->where('order_id','=',$orderData->order_id)->where('txnid','=', $txnid)->update(['order_status' => 3, 'updated_at' => date('Y-m-d')]);
			}else{
				$tbl_link_id=DB::table('payment_url')->where('order_id','=',$orderData->order_id)->first();
				DB::table('tbl_link')->where('id','=',$tbl_link_id->tbl_link_id)->update(['status' => 2, 'razorpay_reponse' => $jsonResponse]);
				$updateOrder = DB::table('orders')->where('order_id','=',$orderData->order_id)->where('txnid','=', $txnid)->update(['order_status' => 0, 'updated_at' => date('Y-m-d')]);
			}
			
			
		}
		
		//Redirecting Back to user...
		if($orderData->sender == 'Admin'){
			return redirect('/administrator/booking/'.$bookingData->unit_id)->with('error', 'Oops Something went wrong. Please Try Again.');
		}
		elseif($orderData->sender == 'Invite Block'){
			$booking_id_crypt = Crypt::encrypt($orderData->booking_id);
			return redirect('/payment_status/'.$booking_id_crypt);
			/* if (Auth::loginUsingId($orderData->user_id)) {					 
			 return redirect('/profile');
			}else{
				return redirect('/');
			} */
		}else if($orderData->sender == 'Existing Payment'){
			$order_id_crypt = Crypt::encrypt($orderData->order_id);
				return redirect('/existing_payment_status/'.$order_id_crypt);
		} 
		
	}
	
	/*
	use App\Models\TempCustomer;
	use App\Models\TempCustomerAddressDetails;
	use App\Models\TempCustomerDetails;
	use App\Models\TempCustomerKyc;

	use App\Models\CustomerAddressDetails;
	use App\Models\CustomerDetails;
	use App\Models\CustomerKyc;
	*/
	//create customer
	public function create_customer($customer_code)
	{ 	 
		$tempcustomerdata= TempCustomer::where('customer_code','=',$customer_code)->where('is_active','=',1)->first();

		if($tempcustomerdata){
			 $sender_id=isset($tempcustomerdata->sender_id)?$tempcustomerdata->sender_id:0;
			 $company_type_id=isset($tempcustomerdata->company_type_id)?$tempcustomerdata->company_type_id:0;
			 //$first_name=isset($tempcustomerdata->first_name)?$tempcustomerdata->first_name:0;
			// $last_name=isset($tempcustomerdata->last_name)?$tempcustomerdata->last_name:0;
			 $email=isset($tempcustomerdata->email)?$tempcustomerdata->email:0;
			 //$phone=isset($tempcustomerdata->phone)?$tempcustomerdata->phone:0;
			 $password=isset($tempcustomerdata->password)?$tempcustomerdata->password:0;
			 
			 //$id      = DB::table('users')->insertGetId(['role'=>8,'email' => $email,'password' => $password,'confirmation_code' =>'' ,'created_by'=>$sender_id,'company_id'=>0,'confirmed'=> 0,'is_active'=>2,'user_type_id'=>1]);
			 $savesuer=User::create(['role'=>8,'email' => $email,'password' => $password,'confirmation_code' =>'' ,'created_by'=>$sender_id,'company_id'=>0,'confirmed'=> 0,'is_active'=>2,'user_type_id'=>1]);

			 $id      =$savesuer->id;
			 $dataTempCustomerDetails=TempCustomerDetails::where('customer_code','=',$customer_code)->where('status','=',1)->get();
			 foreach($dataTempCustomerDetails as $detailcustomer){
				 $client_fname=$detailcustomer->first_name;
				 $client_lname=$detailcustomer->last_name;
				 $client_email=$detailcustomer->email;
				 $client_mobile=$detailcustomer->phone;
				 $client_landline=$detailcustomer->landline_number;
				 $father_husband_name=$detailcustomer->father_husband_name;
				 $dob=$detailcustomer->dob;
				 $father_husband_mobile=$detailcustomer->father_husband_mobile;
				 $father_husband_landline=$detailcustomer->father_husband_landline;
				 $image_pro_name=$detailcustomer->user_image;
				 $if_foreigner=$detailcustomer->if_foreigner;
				 $foreigner_country=$detailcustomer->country_name;
				 $marital_status=$detailcustomer->maritual_status;
				 $spouse_name=$detailcustomer->spouse_name;
				 $if_poa=$detailcustomer->if_poa;
				 $poa_name=$detailcustomer->poa_holder_name;
				 $organisation_business_name=$detailcustomer->organisation_name;
				 $designation=$detailcustomer->organisation_designation;
				 $organisation_type=$detailcustomer->organisation_type;
				 $organisation_phone=$detailcustomer->organisation_phone_number;
				 $organisation_extension=$detailcustomer->organisation_extention;
				 $applicant_type=$detailcustomer->applicant_type;
				 //$status=$detailcustomer->status;
				 $created_by=$detailcustomer->created_by;
				 $sales_representative=$detailcustomer->sales_representative;
				 $sales_representative_phone=$detailcustomer->sales_representative_phone;
				  //create customer detail
				 $dataCustomerDetailArray			=	array('user_id'=>$id,'customer_code'=>$customer_code,'first_name'=>$client_fname,'last_name'=>$client_lname,'email'=>$client_email,'phone'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation,'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone,'organisation_extention'=>$organisation_extension,'applicant_type'=>$applicant_type,'status'=>1,'created_by'=>$created_by,'sales_representative'=>$sales_representative,'sales_representative_phone'=>$sales_representative_phone);
				 
				 $user_detail_id					=	$this->createCustomerDetailFunction($dataCustomerDetailArray);
				 
				 if($applicant_type==1){
					  $invitation_link_id=$detailcustomer->invitation_link_id;
					  VendorInvite::where('id', '=', $invitation_link_id)->update(['is_active' => 0]);
				 }
				 if($created_by){
					$this->executiveAchieveTarget($created_by);
				 }
			 }
			 
			 $AddressDetailArray=TempCustomerAddressDetails::where('customer_code','=',$customer_code)->get();
			 
			 foreach($AddressDetailArray as $AddressArray){
				 
				 $dataCustomerAddressArray=array('user_id'=>$id,'address_type_id'=>$AddressArray->address_type_id,'applicant_type'=>$AddressArray->applicant_type,'address_line'=>$AddressArray->address_line,'pin_code'=>$AddressArray->pin_code,'city'=>$AddressArray->city,'state'=>$AddressArray->state,'created_at'=>$AddressArray->created_at);
				 $this->createCustomerAddressFunction($dataCustomerAddressArray);
			 }
			 
			 $TempCustomerKycDetailArray=TempCustomerKyc::where('customer_code','=',$customer_code)->where('status','=',1)->get();
			 
			 foreach($TempCustomerKycDetailArray as $KycDetailArray){
				$media_id = CustomerKyc::insertGetId(['media_id' => $KycDetailArray->media_id??0,'kyc_type_id'=>$KycDetailArray->kyc_type_id??0,'user_id'=>$id,'created_date'=>$KycDetailArray->created_date??0,'description'=>'','pan_number'=>$KycDetailArray->pan_number??0,'adhar_number'=>$KycDetailArray->adhar_number??0,'voter_id'=>$KycDetailArray->voter_id??0,'passport_expiry'=>$KycDetailArray->passport_expiry??0,'passport_number'=>$KycDetailArray->passport_number??0,'passport_issue'=>$KycDetailArray->passport_issue??0,'applicant_type'=>$KycDetailArray->applicant_type??0]);
			 
			 }
			 
			 TempCustomer::where('customer_code','=',$customer_code)->update(['is_active'=>0]);
			 return $id;
		}
		
	}
	 //create customer Address
	public function createCustomerAddressFunction($dataCustomerAddressArray){

		$newcustomeraddress=CustomerAddressDetails::create($dataCustomerAddressArray);
		return $newcustomeraddress->id;
	}
		//create customer Detail
	public function createCustomerDetailFunction($dataCustomerDetailArray){

		$newcustomerdetail=CustomerDetails::create($dataCustomerDetailArray);
		return $newcustomerdetail->customer_detail_id;
	} 
	
  public function executiveAchieveTarget($sanderid){
	  $createduserid= $this->getbasecompanyExecutive($sanderid);
	  CommonHelper::userTargetAchieved($createduserid,'Broker Monthly Sale');
  }
  public function getbasecompanyExecutive($created_by){
			$chennelpartnerQry=AssignProject::join('users','users.id','=','assign_project.user_id')->join('user_details','user_details.user_id','=','assign_project.user_id')
			->join('company','company.company_id','=','assign_project.company_id')
			->join('users as adminuser', function($on)
			{
			$on->on('adminuser.company_id','=','company.company_id')->where('adminuser.role','=',2);
			})
			->where('users.id',"=",$created_by)
			->select('company.company_name',DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),'company.created_by','company.parent_company_id','company.company_id','user_details.user_id');
			$chennelpartner=$chennelpartnerQry->first();
			if($chennelpartner){
				if($chennelpartner->parent_company_id!=1 && $chennelpartner->parent_company_id!=0){
					$this->getbasecompanyExecutive($chennelpartner->created_by);
				}else{
					if($chennelpartner->parent_company_id==1){
						return $chennelpartner->created_by;
					}
					
				}
			}
  }
  
  
  public function createCustomerSendMailDate($user_id){
		$Date=date('Y-m-d');
		
		$genrateDate1=date('Y-m-d', strtotime($Date. ' + 2 days'));
		$subject1 ='PAPYMENT RECIPT EMAIL';
		$array1=array('user_id'=>$user_id,'subject'=>$subject1,'mail_date'=>$genrateDate1,'status'=>0);
		$this->saveTemplateSendMailDate($array1);
		
		$genrateDate2=date('Y-m-d', strtotime($Date. ' + 7 days'));
		$subject2 ='DEMAND Letter EMAIL';
		$array2=array('user_id'=>$user_id,'subject'=>$subject2,'mail_date'=>$genrateDate2,'status'=>0);
		$this->saveTemplateSendMailDate($array2);
		
		$genrateDate3=date('Y-m-d', strtotime($Date. ' + 3 days'));
		$subject3 ='ERP+TPT+ SOCITY MEMBERSHIP -  EMAIL';
		$array3=array('user_id'=>$user_id,'subject'=>$subject3,'mail_date'=>$genrateDate3,'status'=>0);
		$this->saveTemplateSendMailDate($array3);
		
		
		$subject4 ='Welcome Letter';
		$array4=array('user_id'=>$user_id,'subject'=>$subject4,'mail_date'=>'','status'=>0);
		$this->saveTemplateSendMailDate($array4);
		
		
		$subject5 ='Welcome for ATS Registration';
		$array5=array('user_id'=>$user_id,'subject'=>$subject5,'mail_date'=>'','status'=>0);
		$this->saveTemplateSendMailDate($array5);
		return 1;
	}
	
   public function saveTemplateSendMailDate($arraydata){
	   DB::table('customer_send_mail_date')->insert($arraydata);
	   return 1;
   }
  
}




