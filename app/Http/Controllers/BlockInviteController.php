<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use DB;
use Input;
use Hash;
use Validator;
use Mail;
use App\User;
use Exception;
use Redirect;
use Auth;
use CommonHelper;

use App\Models\Project;
use App\Models\Company;
use App\Models\ProjectBlocks;
use App\Models\VendorInvite;
use App\Models\InviteBlock;
use App\Models\BlockFloors;
use App\Models\FloorUnit;
use App\Models\UnitDetails;
use App\Models\PaymentPlan;
use App\Models\PlanComponent;
use App\Models\UserPlanComponent;
use App\Models\PaymentDetails;
use App\Models\UnitDetailsType;
use App\Models\TempCustomer;
use App\Models\TempCustomerDetails;
use App\Models\TempCustomerAddressDetails;
use App\Models\TempCustomerKyc;
use DateTime;
use Illuminate\Support\Facades\Crypt;

class BlockInviteController extends Controller
{
	public function createClient(){
	$inventry_type = DB::table('inventry_type')->get();
	return view('block_invite.create_block_invite',['inventry_type'=>$inventry_type]);
        
    }
	
	public function blocklisttype($id,$bid){
	   
    	$data=ProjectBlocks::where('project_id','=',$id)->where('inventry_type_id','=',$bid)->get();
		return $data;
        
    }

    public function store($pid,Request $request)
    {
         
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'inventry_type_id'=>'required',
            'block_id' =>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
        $first_name = Input::get('name');
		$last_name = Input::get('lname');
        $email = Input::get('email');
       
        $inventry_type_id = Input::get('inventry_type_id');
        $block_id = Input::get('block_id');
		
		//print_r($block_id); exit; 
		
        $link =time();
       
	    if(Auth::user()->role==2)
	    {
			$current_id=DB::table('assign_project')->where('assign_project.role_id','=',2)->where('assign_project.user_id','=',Auth::user()->id)->first();
		    $c_id= VendorInvite::insertGetId(
				['project_id' =>$pid,'email' =>$email, 'first_name' =>$first_name,'last_name' =>$last_name, 'sender_id' =>Auth::user()->id,"link"=>$link,'company_type_id'=>0,'invite_type'=>3,'block_type'=>$inventry_type_id]
			);
	    } 
	    else
	    {
		    $current_id=DB::table('assign_project')->where('assign_project.role_id','=',2)->where('assign_project.company_type_id','=',1)->first();
		      $c_id= VendorInvite::insertGetId(
				['project_id' =>$pid,'email' =>$email, 'first_name' =>$first_name,'last_name' =>$last_name, 'sender_id' =>$current_id->user_id,"link"=>$link,'company_type_id'=>0,'invite_type'=>3,'block_type'=>$inventry_type_id]
			); 
		   
	    }
	   
		if(!empty($block_id))
		{   
			DB::table('invite_block')->where('invitation_link_id','=',$c_id)->delete();
			foreach($block_id as $id)
			{
				DB::table('invite_block')->insertGetId(
					['invitation_link_id' =>$c_id,'block_id' =>$id,'block_type'=>$inventry_type_id]
				);
			}
		}
		
		 $user_fname= $first_name;
		 $user_lname= $last_name;
		 $path = $_SERVER["HTTP_HOST"]."/invite_block/".$link; 
		 $to= Input::get('email');
         $subject = "Invite Link For Your Unit Booking.";		 
		 $data=['path'=>$path,'user_fname'=>$user_fname,'user_lname'=>$user_lname,'useremail'=>$to];
		 $user =$to;            		
			$mail = Mail::send('emails.employeeinvite', ['data' => $data], function ($m) use ($user) {
             $m->from('no-reply@stagingrelease.com', 'Email Verification');
             $m->to($user)->subject('Email Verification');
           });
		if($mail){
			$emailData['send_to']   = $to;
			$emailData['send_by']   = "no-reply@stagingrelease.com";
			$emailData['sender_id'] = Auth::user()->id;
			$emailData['subject']   = $subject;
			$emailData['body']      = view('emails.employeeinvite', ['data' => $data])->render();
			$emailData['send_date'] = date('Y-m-d');
			$insertEmailDetails = DB::table('send_mail')->insert($emailData);
			\Session::flash('success-msg-registered', 'Thanks for invite email.');
			return redirect()->back();
		}
		else{
			\Session::flash('success-msg-registered', 'Email not sent.');
			return redirect()->back();
		} 	
				
		 
    }

   

    public function show()
    {     if(Auth::user()->role==1)
	   {
			 $vender_invite =VendorInvite::where('invitation_link.invite_type','=',3)->get();
	   }
	   else
	   {
		    $vender_invite =VendorInvite::where('invitation_link.sender_id','=',Auth::user()->id)
			 ->where('invitation_link.invite_type','=',3)->get();
		   
	   }
             return view('block_invite.block_invite', ['user' => $vender_invite]);
    }
	

	

    public function edit($id)
    {
		
		
		$inventry_type = DB::table('inventry_type')->get();
        $clients = VendorInvite::where('id', '=',$id)->first();
		
        $block = DB::table('project_blocks')
		     ->where('project_blocks.project_id','=',$clients->project_id)
			 ->where('project_blocks.inventry_type_id','=',$clients->block_type)
			 ->groupBy('project_blocks.block_id')
			 ->get();
		foreach($block as $block1)
		{
            $data=DB::table('invite_block')->where('invite_block.invitation_link_id','=',$clients->id??0)->where('invite_block.block_id','=',$block1->block_id??0)->first();
			if($data)
			{
				$block1->invitation_link_id=1;
				
			}
			else
			{
				$block1->invitation_link_id=0;
			}
		}
		
        return view('block_invite.edit_block_invite', ['block'=>$block, 'client'=>$clients,'inventry_type'=>$inventry_type]);
        

    }

    public function update($id,Request $request)
    {  
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'inventry_type_id' => 'required',
            'block_id' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
        $first_name = Input::get('name');
		$last_name = Input::get('lname');
        $email = Input::get('email');       
        $inventry_type_id = Input::get('inventry_type_id');
        $block_id = Input::get('block_id');
      // print_r($block_id); exit;

       $c_id= VendorInvite::where('id', '=',$id)->update(
				['email' =>$email, 'first_name' =>$first_name, 'last_name' =>$last_name, 'sender_id' =>Auth::user()->id,'block_type'=>$inventry_type_id]
			);
			
			
			 if(count($block_id))
			 {    DB::table('invite_block')->where('invitation_link_id','=',$id)->delete();
				 foreach($block_id as $id1)
				 {
					   DB::table('invite_block')->insertGetId(
							['invitation_link_id' =>$id,'block_id' =>$id1,'block_type'=>$inventry_type_id]
						);
				 }
			 }
			
			

            \Session::flash('success-msg', 'Successfully Updated');
            return redirect()->back();
     


    }

    public function delete($id)
    {
        return redirect()->back();
       
    }
	
	Public function invite_block($link = 0){
		
		$invitationLinkData = VendorInvite::where('link', '=', $link)->where('is_active', '=', 1)->first();
		
		if($invitationLinkData){
			$block_id=$invitationLinkData->block_id;
			$project_id=$invitationLinkData->project_id;
			$unit_id=$invitationLinkData->unit_id;
			//echo $block_id.'=='.$project_id.'=='.$unit_id; exit;
			 $typesent='block';
			if($block_id==0 && $project_id!=0){
			    $inviteBlockData =$this->getProjectAllBlock($invitationLinkData);
			}elseif($block_id!=0 && $project_id!=0 && $unit_id==0){
				$inviteBlockData =$this->getProjectBlock($invitationLinkData);
			}else{
				
				$typesent='unit';
				$inviteBlockData =$this->getProjectBlockUnit($invitationLinkData);
				
			}
			$applicant_type=1;
			
			$tempCustomerDetail=TempCustomerDetails::join('temp_customer','temp_customer.id','=','temp_customer_details.temp_customer_id')->where('invitation_link_id','=',$invitationLinkData->id)->where('applicant_type','=',$applicant_type)->first();
			
			$tempSecondCustomer=$this->getsecondApplicantDetail($tempCustomerDetail);
			
			
			//echo '<pre>'; print_r($tempSecondCustomer); exit;
			/* $customrAddress=DB::table('invite_link_user_address')->where('invited_link_id',$invitationLinkData->id)->first(); */
			
			$customrAddress1=TempCustomerAddressDetails::where('temp_customer_id','=',$tempCustomerDetail->temp_customer_id)->where('applicant_type','=',$applicant_type)->where('address_type_id','=',1)->first();
			
			$customrAddress2=TempCustomerAddressDetails::where('temp_customer_id','=',$tempCustomerDetail->temp_customer_id)->where('applicant_type','=',$applicant_type)->where('address_type_id','=',2)->first();
			
			$customrAddress3=TempCustomerAddressDetails::where('temp_customer_id','=',$tempCustomerDetail->temp_customer_id)->where('applicant_type','=',$applicant_type)->where('address_type_id','=',3)->first();
			
			//
			$sCustomrAddress1=TempCustomerAddressDetails::where('temp_customer_id','=',$tempCustomerDetail->temp_customer_id)->where('applicant_type','=',2)->where('address_type_id','=',1)->first();
			
			$sCustomrAddress2=TempCustomerAddressDetails::where('temp_customer_id','=',$tempCustomerDetail->temp_customer_id)->where('applicant_type','=',2)->where('address_type_id','=',2)->first();
			
			$sCustomrAddress3=TempCustomerAddressDetails::where('temp_customer_id','=',$tempCustomerDetail->temp_customer_id)->where('applicant_type','=',2)->where('address_type_id','=',3)->first();
			
			$paymentPlanData = PaymentPlan::where('is_active', '=', 1)->get();
			$assign_templet = DB::table('templets')->where('type', '=', 2)->where('status', '=', 1)->get();
			$key_value = count($assign_templet) - 1;	
			
			$company_id=DB::table('assign_project')->where('user_id','=',$invitationLinkData->sender_id)->first();
			$document_type = DB::table('kyc_type')->get();
			
			$tempCuctomeKyc=TempCustomerKyc::where('status','=',1)->where('temp_customer_id','=',$tempCustomerDetail->temp_customer_id)->where('applicant_type','=',1)->get();
			
			$sTempCuctomeKyc=TempCustomerKyc::where('status','=',1)->where('temp_customer_id','=',$tempCustomerDetail->temp_customer_id)->where('applicant_type','=',2)->get();
			
			$orgType=array('Agriculture and Allied Industries','Automobiles','Auto Components','Aviation','Banking','Cement','Consumer Durables','Ecommerce','Education and Training','Engineering and Capital Goods','Financial Services','FMCG','Gems and Jewellery','Healthcare','Infrastructure','Insurance','IT & ITeS','Manufacturing','Media and Entertainment','Oil and Gas','Pharmaceuticals','Ports','Power','Railways','Real Estate','Renewable Energy','Retail','Science and Technology','Services','Steel','Roads','Telecommunications','Textiles','Tourism and Hospitality');
			
			return view('payform.payfrom')->with(['inviteBlockData' => $inviteBlockData, 'invitationLinkData' => $invitationLinkData, 'paymentPlanData' => $paymentPlanData, 'assign_templet' => $assign_templet, 'key_value' => $key_value,'company_id'=>$company_id->company_id,'document_type'=>$document_type,'customrAddress1'=>$customrAddress1,'customrAddress2'=>$customrAddress2,'customrAddress3'=>$customrAddress3,'typesent'=>$typesent,'tempCustomerDetail'=>$tempCustomerDetail,'orgType'=>$orgType,'tempCuctomeKyc'=>$tempCuctomeKyc,'tempSecondCustomer'=>$tempSecondCustomer,'sCustomrAddress1'=>$sCustomrAddress1,'sCustomrAddress2'=>$sCustomrAddress2,'sCustomrAddress3'=>$sCustomrAddress3,'sTempCuctomeKyc'=>$sTempCuctomeKyc]);
		}
		else{
			\Session::flash('success-msg-registered', 'Link has been expired.');
			return redirect('/user_register');
			/* \Session::flash('success-msg-registered', 'Link has been expired.');
			return redirect('/'); */
		}
	}
	public function getsecondApplicantDetail($invitationLinkData){
		$tempSecondCustomer=TempCustomerDetails::where('temp_customer_details.temp_customer_id','=',$invitationLinkData->temp_customer_id)->where('temp_customer_details.applicant_type','=',2)->first();
		
			if(!$tempSecondCustomer){
				$tempSecondCustomer=(object) array('temp_customer_id'=>'','customer_code'=>'','first_name'=>'','last_name'=>'','email'=>'','phone'=>'','landline_number'=>'','father_husband_name'=>'','dob'=>'','father_husband_mobile'=>'','father_husband_landline'=>'','user_image'=>'','if_foreigner'=>'','country_name'=>'','maritual_status'=>'','spouse_name'=>'','if_poa'=>'','poa_holder_name'=>'','organisation_name'=>'','organisation_designation'=>'','organisation_type'=>'','organisation_phone_number'=>'','organisation_extention'=>'','applicant_type'=>'','status'=>'','invitation_link_id'=>'','created_by'=>'','created_at'=>'');
			   }
		return $tempSecondCustomer;
	}
	public function getProjectBlock($invitationLinkData){
		$inviteBlockData = InviteBlock::where('invitation_link_id', '=', $invitationLinkData->id)->where('is_active', '=', 1)->get();
		foreach($inviteBlockData as $blockData){	
			$blockData->blockName = ProjectBlocks::where('block_id', '=', $blockData->block_id)->first()->block_name;
			$blockData->BlockFloors = BlockFloors::where('block_id', '=', $blockData->block_id)->get();
			foreach($blockData->BlockFloors as $floorDa){
				$floorDa->unit=FloorUnit::where('block_id', '=', $floorDa->block_id)->where('floor_id', '=', $floorDa->floor_id)->where('status', '=', 1)->get();
				foreach($floorDa->unit as $unit_details){
					$unit_details->unit_details = UnitDetails::where("unit_id", '=', $unit_details->id)->where('status', "=", 1)->first();
					$unit_details->unit_details->total_unit_cost = (int)preg_replace('#[^0-9]+#', '', $unit_details->unit_details->total_unit_cost);
				}
			}
		}
		return $inviteBlockData;
	}
	
	public function getProjectAllBlock($invitationLinkData){
		$project_id=$invitationLinkData->project_id;
		$inviteBlockData=ProjectBlocks::where('status', '=', 1)->where('project_id', '=', $project_id)->get();
		foreach($inviteBlockData as $blockData){
		$blockData->blockName = ProjectBlocks::where('block_id', '=', $blockData->block_id)->first()->block_name;
		$blockData->BlockFloors = BlockFloors::where('block_id', '=', $blockData->block_id)->get();
			foreach($blockData->BlockFloors as $floorDa){
				$floorDa->unit=FloorUnit::where('block_id', '=', $floorDa->block_id)->where('floor_id', '=', $floorDa->floor_id)->where('status', '=', 1)->get();
				foreach($floorDa->unit as $unit_details){
					$unit_details->unit_details = UnitDetails::where("unit_id", '=', $unit_details->id)->where('status', "=", 1)->first();
					$unit_details->unit_details->total_unit_cost = (int)preg_replace('#[^0-9]+#', '', $unit_details->unit_details->total_unit_cost);
				}
			}
		}
		return $inviteBlockData;
	}
	public function getProjectBlockUnit($invitationLinkData){
		$unit_id = $invitationLinkData->unit_id;
		$unit_details  	  = UnitDetails::where("unit_id", '=', $unit_id)->where('status', "=", 1)->first();
		$record_blocks = ProjectBlocks::where('block_id', '=', $unit_details->block_id)->first();
		$project_id =$record_blocks->project_id??0;
		$unitDetailsType = UnitDetailsType::join('project_unit_type','project_unit_type.unit_details_type_id','=','unit_details_type.id')
		->where("project_unit_type.project_id","=", $project_id)->where("unit_details_type.status", "=", 1)->select('project_unit_type.*')->get();
		//echo '<pre>'; print_r($unitDetailsType); exit;
		foreach($unitDetailsType as $key => $a){
			$name = $a->name;
			$label = $a->label;
			
			$a['value'] = UnitDetails::where("unit_id", '=', $unit_id)->where('status', "=", 1)->first()->$name;
			if($name == 'basic_sale_price'){
				$pricedata[$name] = ['label' => $label, 'value' => UnitDetails::where("unit_id", '=', $unit_id)->where('status', "=", 1)->first()->$name];
				
			}else{
				$pricedata['basic_sale_price'] = ['label' =>'Basic Sale Price', 'value' => UnitDetails::where("unit_id", '=', $unit_id)->where('status', "=", 1)->first()->$name];
			}
			if($name == 'total_unit_cost'){
				$pricedata[$name] = ['label' => $label, 'value' => UnitDetails::where("unit_id", '=', $unit_id)->where('status', "=", 1)->first()->$name];
				
			}else{
				$pricedata['total_unit_cost'] = ['label' => 'Total Unit Cost', 'value' => UnitDetails::where("unit_id", '=', $unit_id)->where('status', "=", 1)->first()->$name];
			}
		}
		
		
		
		$project          = Project::where('project_id', '=',$unit_details->project_id)->first()->project_name??'';
		$block_type_id    = ProjectBlocks::where('block_id', '=',  $unit_details->block_id)->first()->block_type_id;
		$total_unit_cost  = $unit_details->total_unit_cost;
		$basic_sale_price = isset($unit_details->basic_sale_price) ? $unit_details->basic_sale_price :'';
		$unit_name        = $unit_details->unit_name;

		
		$chargeComponent = DB::table('charge_component')->where('charge_id', '=', $unit_details->charge_id)->where('is_active', '=', 1)->get();
		if(!empty($chargeComponent)){
			$otherChargePrice = 0;
			foreach($chargeComponent as $component){
				$charge_component_price = $component->charge_component_price;
				$otherChargePrice = $otherChargePrice + $charge_component_price;
			}
		}
		else{
			$otherChargePrice = 0;
		}
		$pricedata['other_charges'] = ['label' => 'Other Charges', 'value' =>$otherChargePrice];
		$payment_plan_id=$this->getInvitePaymentPlan(0,$unit_id);
        return array(
					'message'         => 'success',
					'unitDetailsType'  => $unitDetailsType,
					'chargeComponent'  => $chargeComponent,
					'otherChargePrice' => $otherChargePrice,
					'total_unit_cost'  => $total_unit_cost,
					'basic_sale_price' => $basic_sale_price,
					'pricedata'	 	   => $pricedata,
					'project'		   => $project,
					'block_type_id' => $block_type_id,
					/*'tower'            => $tower,
					'floor'            => $floor,*/
					'unit_name'        => $unit_name,
					'unit_id'        => $unit_id,
					'block_id'        => $unit_details->block_id,
					'payment_plan_id'        => $payment_plan_id
					);
	}
	
	public function invite_block_submit(Request $request, $link = 0){
		$formData = $request->all();
		//$getUserID =Input::get('user_id');
		$customer_code =Input::get('customer_code');
		$getUseremail =Input::get('client_email');
		$password =Input::get('client_password');
		
	    $tempdata=TempCustomer::where('customer_code','=',$customer_code)->where('email','=',$getUseremail)->first();
		 if(!$tempdata){
			 $request->request->add(['customer_code' => '']); 
		 }
		//validating required information...
		$validator = Validator::make($request->all(), [
            'unit_id' => 'required',
            'payment_plan_id' => 'required',
            'client_email' => 'required',
            'customer_code' => 'required',
            'total_unit_cost' => 'required|min:1'
        ]);

		if($validator->fails()){
			return redirect('/invite_block/'.$link)->with('errors', $validator->errors());
		}
		
		$getUnitDetails = UnitDetails::where('unit_id', '=', $formData['unit_id'])->first();
		$sender_id      = VendorInvite::where('link', '=', $link)->first();
		 
		//update users table
		$company_id=DB::table('assign_project')->where('user_id', '=',$sender_id->sender_id)->first();
		$created_by=$sender_id->sender_id;
		$companynew_id=isset($company_id->company_id)?$company_id->company_id:0;
		$created_at=date('y-m-d h:i:s');
		/* $update_detail=DB::table('users')->where('id','=',$getUserID)->update(
	          ['created_by' =>$created_by ,'company_id'=> $companynew_id,'created_at' => $created_at,]); */
		
		 
		if(isset($customer_code)){
			
			//Checking if booking already exists for this user id, payment plan id and Unit id... 
			$checkBooking = DB::table('booking')->where('unit_id','=',$formData['unit_id'])->where('customer_code','=',$customer_code)->where('payment_plan_id','=',$formData['payment_plan_id'])->first();
			
			if(isset($checkBooking)){
				$getBookingId = $checkBooking->booking_id;
			}
			else{
				$floor_unit= DB::table('floor_unit')->where('id','=',$formData['unit_id'])->first();
				$bookingDetails['project_id']            = isset($floor_unit->project_id)?$floor_unit->project_id:0;
				$bookingDetails['block_id']            = isset($floor_unit->block_id)?$floor_unit->block_id:0;
				$bookingDetails['user_id']                = 0;
				$bookingDetails['customer_code']          = $customer_code;
				$bookingDetails['unit_id']                = $formData['unit_id'];
				$bookingDetails['booking_status']         = 2;
				$bookingDetails['payment_plan_id']        = $formData['payment_plan_id'];
				$bookingDetails['created_by']             = $sender_id->sender_id;
				$bookingDetails['created_at']             = date('Y-m-d');
				$getBookingId = DB::table('booking')->insertGetId($bookingDetails);
			}


				
				if(isset($getBookingId)){
					
					//Checking if user plan components already exist for this booking id...
					$checkUserPlanComponent = UserPlanComponent::where('booking_id','=',$getBookingId)->get();
					if(count($checkUserPlanComponent) > 0){
						$getUserPlanComponentId = $checkUserPlanComponent[0]['user_plan_component_id'];
						$net_amount = $checkUserPlanComponent[0]['calulated_value'];
					}
					else{
						$getplanComponents = PlanComponent::where('payment_plan_id', '=', $formData['payment_plan_id'])->get();
						$count = count($getplanComponents);
						
						foreach($getplanComponents as $key => $planComponent){
							
							// For Amount...
							if($planComponent->component_type == 1){
								$percentage       = $planComponent->component_value ;
								$total_unit_cost  = $getUnitDetails->total_unit_cost;
								$total_unit_cost  = (int)preg_replace('#[^0-9]+#', '', $total_unit_cost);
								$calculated_value = ($total_unit_cost * $percentage)/100;
							}
							else{
								$calculated_value = $planComponent->component_value ;
							}
							
							$user_plan_component['booking_id']        = $getBookingId;
							$user_plan_component['payment_plan_id']   = $formData['payment_plan_id'];
							$user_plan_component['plan_component_id'] = $planComponent->plan_component_id;
							$user_plan_component['component_name']    = $planComponent->component_name;
							$user_plan_component['sequence']  		  = $planComponent->sequence;
							$user_plan_component['calulated_value']   = $calculated_value;
							$user_plan_component['status']            = 0;
							$user_plan_component['is_active']         = 1;
							$user_plan_component['created_at']        = date('y-m-d');
							
							if($key == 0){
								$net_amount = $calculated_value;
								
								// For Due Date...
								$period_type  = $planComponent->period_type;
								$period_value = $planComponent->period_value;
								
								if($period_type == 0){
									$user_plan_component['due_date'] = date("Y-m-d", strtotime("+".$period_value." month"));
								}
								if($period_type == 2){
									$user_plan_component['due_date'] = $period_value;
								}
								if($period_type == ""){
									$user_plan_component['due_date'] = null;
								}
							
								$getUserPlanComponentId = UserPlanComponent::insertGetId($user_plan_component);
							}
							else{
								$period_type  = $planComponent->period_type;
								$period_value = $planComponent->period_value;
								
								if($period_type == 0){
									$user_plan_component['due_date'] = date("Y-m-d", strtotime("+".$period_value." month"));
								}
								if($period_type == 1){
									
									$userPlanComponent  = UserPlanComponent::where('booking_id', '=', $getBookingId)->get();
									$countUserPlanComponent          = count($userPlanComponent);
									$index                           = $countUserPlanComponent - 1;
									$last_due_date                   = $userPlanComponent[$index ]['due_date'];
									$user_plan_component['due_date'] = date("Y-m-d", strtotime("$last_due_date +".$period_value." month"));
									
								}
								if($period_type == 2){
									$user_plan_component['due_date'] = $period_value;
								}
								if($period_type == ""){
									$user_plan_component['due_date'] = null;
								}
								
								$insertUserPlanComponent = UserPlanComponent::insert($user_plan_component);
							}
							
						}
					}
				

					if(isset($getUserPlanComponentId)){

						$order_details['user_id']                = 0	;
						$order_details['customer_code']          = $customer_code	;
						$order_details['booking_id']             = $getBookingId;
						$order_details['user_plan_component_id'] = $getUserPlanComponentId;
						$order_details['amount']                 = $net_amount;
						$order_details['txnid']                  = 'tran_'.time();
						$order_details['sender']                 = 'Invite Block';
						$order_details['description']            = 'Unit Booking via Invitatio Link.';
						$order_details['order_status']           = 0;
						$order_details['created_at']             = date('Y-m-d');
						
						$orderId = DB::table('orders')->insertGetId($order_details);
						return redirect('payment/'.$orderId);

					}
				}	 
		}
		
	}
	

	
	public function getInvitePaymentPlan($company_id=0,$unit_id=0){
		
		
	    $user_id='';
		
		$payment_plan_id=CommonHelper::selectPlanForUser($user_id,$company_id,$unit_id);
		
		return $payment_plan_id;
		
		
	}
     public function getInvitePaymentsummary(Request $request){
		
		$customer_code=$request->input('customer_code');
		$unit_id=$request->input('unit_id');
		$block_id=$request->input('block_id');
		$payment_plan_id=$request->input('payment_plan_id');
		$userdetail = DB::table('temp_customer')
            ->join('temp_customer_details', 'temp_customer.id', '=', 'temp_customer_details.temp_customer_id')
            ->select('temp_customer_details.*','temp_customer.email as users_email')->where('temp_customer_details.applicant_type','=',1)
            ->where('temp_customer_details.customer_code','=',$customer_code)->get();
		$unitdetail = DB::table('unit_details')->where('unit_id','=',$unit_id)->get();   
        $blockdetail = DB::table('project_blocks')
		               ->join('project', 'project.project_id', '=', 'project_blocks.project_id')
		               ->where('block_id','=',$block_id)->get();
        $payment_plan_detail = DB::table('payment_plan')->where('payment_plan_id','=',$payment_plan_id)->get();
        return response()->json(['message' => 'success','userdetail' => $userdetail,'unitdetail' => $unitdetail,'blockdetail' => $blockdetail,'payment_plan_detail' => $payment_plan_detail]);					   
		
		
	}
	public function getfrontendPaymentPlan($user_id=0,$unit_id=0){
		
		 if($user_id)
		 {
			$user_data= User::where('id','=',$user_id)->first();
			$company_id=$user_data->id??'';
		 }
		 else
		 {
			 $company_id='';
			 
		 }
		
		$payment_plan_id=CommonHelper::selectPlanForUser($user_id,$company_id,$unit_id);
		
		return $payment_plan_id;
		
		
	}
	public function getAdminPaymentPlanComponent($user_id=0,$unit_id=0){
		
		 if($user_id)
		 {
			$user_data= User::where('id','=',$user_id)->first();
			$company_id=$user_data->id??'';
		 }
		 else
		 {
			 $company_id=Auth::user()->company_id??'';
			 
		 }
		
		
		$payment_plan_id=CommonHelper::selectPlanForUser($user_id,$company_id,$unit_id);
		
		return $payment_plan_id;
		
		
	}
	
	
	
	public function getPaymentPlanComponent($payment_plan_id = 0){
		$getPlanComponentData = PlanComponent::where('payment_plan_id', '=', $payment_plan_id)->get();
		if($getPlanComponentData){
			return response()->json(['message' => 'success', 'getPlanComponentData' =>$getPlanComponentData]);
		}
		else{
			return response()->json(['message' => 'failure', 'getPlanComponentData' =>$getPlanComponentData]);
		}
		//echo "<pre>"; print_r($getPlanComponentData); die;
	}
	
	
	
	
	
	
	public function getInventoryData(Request $request){
		$data = $request->all();
		$unit_details  	  = UnitDetails::where("unit_id", '=', $data['unit_id'])->where('status', "=", 1)->first();
		$record_blocks = ProjectBlocks::where('block_id', '=', $unit_details->block_id)->first();
		$project_id =$record_blocks->project_id??0;
		$unitDetailsType = UnitDetailsType::join('project_unit_type','project_unit_type.unit_details_type_id','=','unit_details_type.id')
		->where("project_unit_type.project_id","=", $project_id)->where("unit_details_type.status", "=", 1)->select('project_unit_type.*')->get();
		foreach($unitDetailsType as $key => $a){
			$name = $a->name;
			$label = $a->label;
			
			$a['value'] = UnitDetails::where("unit_id", '=', $data['unit_id'])->where('status', "=", 1)->first()->$name;
			if($name == 'basic_sale_price' || $name == 'total_unit_cost'){
				$pricedata[$name] = ['label' => $label, 'value' => UnitDetails::where("unit_id", '=', $data['unit_id'])->where('status', "=", 1)->first()->$name];
			}
		}
		
		
		
		$project          = Project::where('project_id', '=',$unit_details->project_id)->first()->project_name??'';
		$block_type_id    = ProjectBlocks::where('block_id', '=',  $unit_details->block_id)->first()->block_type_id;
		$total_unit_cost  = $unit_details->total_unit_cost;
		$basic_sale_price = $unit_details->basic_sale_price;
		$unit_name        = $unit_details->unit_name;

		
		$chargeComponent = DB::table('charge_component')->where('charge_id', '=', $unit_details->charge_id)->where('is_active', '=', 1)->get();
		if(!empty($chargeComponent)){
			$otherChargePrice = 0;
			foreach($chargeComponent as $component){
				$charge_component_price = $component->charge_component_price;
				$otherChargePrice = $otherChargePrice + $charge_component_price;
			}
		}
		else{
			$otherChargePrice = 0;
		}
		$pricedata['other_charges'] = ['label' => 'Other Charges', 'value' =>$otherChargePrice];
		
		
		$getFloor = CommonHelper::getUnitFloor($unit_name, $block_type_id??0,$unit_details->block_id);
		
		return response()->json(['message'         => 'success',
								'unitDetailsType'  => $unitDetailsType,
								'chargeComponent'  => $chargeComponent,
								'otherChargePrice' => $otherChargePrice,
								'total_unit_cost'  => $total_unit_cost,
								'basic_sale_price' => $basic_sale_price,
								'pricedata'	 	   => $pricedata,
								'project'		   => $project,
								'block_type_id'    => $block_type_id,
								//'tower'          => $tower,
								'floor'            => $getFloor['floor'],
								'blockName'        => $getFloor['blockName'],
								'blockValue'       => $getFloor['blockValue'],
								'unit_no'          => $getFloor['unit_no'],
								'unit_name'        => $unit_name
								]);

	}
	
	
	
	Public function bookmyunitForm($link = 0){

		$invitationLinkData = VendorInvite::where('link', '=', $link)->where('is_active', '=', 1)->first();
		if($invitationLinkData){
			$block_id=$invitationLinkData->block_id;
			$project_id=$invitationLinkData->project_id;
			$unit_id=$invitationLinkData->unit_id;
			$booking_amount=$invitationLinkData->booking_amount;
			$discount = $invitationLinkData->discount;
			
			 $typesent='block';
			if($block_id==0 && $project_id!=0){
			    $inviteBlockData =$this->getProjectAllBlock($invitationLinkData);
			}elseif($block_id!=0 && $project_id!=0 && $unit_id==0){
				$inviteBlockData =$this->getProjectBlock($invitationLinkData);
			}else{
				
				$typesent='unit';
				$inviteBlockData =$this->getProjectBlockUnit($invitationLinkData);
				
			}
			
			$applicant_type=1;
			
			$tempCustomerDetail=TempCustomerDetails::join('temp_customer','temp_customer.id','=','temp_customer_details.temp_customer_id')->where('invitation_link_id','=',$invitationLinkData->id)->where('applicant_type','=',$applicant_type)->first();
			
			
			$customrAddress1=TempCustomerAddressDetails::where('temp_customer_id','=',$tempCustomerDetail->temp_customer_id)->where('applicant_type','=',$applicant_type)->where('address_type_id','=',1)->first();
				
			//
			
			$paymentPlanData = PaymentPlan::where('is_active', '=', 1)->get();
			
			
			$company_id=DB::table('assign_project')->where('user_id','=',$invitationLinkData->sender_id)->first();
			//dd($inviteBlockData['unit_id']);
			return view('payform.bookmyunitfrom')->with(['inviteBlockData' => $inviteBlockData, 'invitationLinkData' => $invitationLinkData, 'paymentPlanData' => $paymentPlanData,'company_id'=>$company_id->company_id,'customrAddress1'=>$customrAddress1,'typesent'=>$typesent,'tempCustomerDetail'=>$tempCustomerDetail,'booking_amount'=>$booking_amount,'discount'=>$discount]);
		}
		else{
			\Session::flash('success-msg-registered', 'Link has been expired.');
			return redirect('/');
		}
	}
	
	public function unit_block_submit(Request $request, $link = 0){
		$formData = $request->all();
		//dd($formData);
		//echo '<pre>'; print_r($formData); exit;
		$customer_code =Input::get('customer_code');
		$getUseremail =Input::get('client_email');
		$password =Input::get('client_password');
		$booking_amount =Input::get('booking_amount');
		$discount =Input::get('discount');
		$first_name =Input::get('first_name');
		$last_name =Input::get('last_name');
		$phone =Input::get('phone');
		
		$updateTempCustomer = TempCustomer::where('customer_code','=',$customer_code)->where('email','=',$getUseremail)->update(['first_name'=>$first_name, 'last_name'=>$last_name, 'phone'=>$phone]);
		
	    $updateTempCustomerData = TempCustomerDetails::where('customer_code','=',$customer_code)->where('applicant_type','=',1)->update(['first_name'=>$first_name, 'last_name'=>$last_name, 'phone'=>$phone]);
		
		
		$tempdata=TempCustomer::where('customer_code','=',$customer_code)->where('email','=',$getUseremail)->first();
		 if(!$tempdata){
			 $request->request->add(['customer_code' => '']); 
		 }
		//validating required information...
		$validator = Validator::make($request->all(), [
            'unit_id' => 'required',
						'payment_plan_id' => 'required',
						'first_name' => 'required',
						'last_name' => 'required',
						'client_email' => 'required',
						'phone' => 'required',
            'customer_code' => 'required',
            'booking_amount' => 'required|min:1'
        ]);

		if($validator->fails()){
			return redirect('/invite_block/'.$link)->with('errors', $validator->errors());
		}
		
		$getUnitDetails = UnitDetails::where('unit_id', '=', $formData['unit_id'])->first();
		$sender_id      = VendorInvite::where('link', '=', $link)->first();
		 
		//update users table
		$company_id=DB::table('assign_project')->where('user_id', '=',$sender_id->sender_id)->first();
		$created_by=$sender_id->sender_id;
		$companynew_id=isset($company_id->company_id)?$company_id->company_id:0;
		$created_at=date('y-m-d h:i:s');
		
		 
		if(isset($customer_code)){
			
			//Checking if booking already exists for this user id, payment plan id and Unit id... 
			$checkBooking = DB::table('booking')->where('unit_id','=',$formData['unit_id'])->where('customer_code','=',$customer_code)->first();
			
			if(isset($checkBooking)){
				$getBookingId = $checkBooking->booking_id;
			}
			else{
				$floor_unit= DB::table('floor_unit')->where('id','=',$formData['unit_id'])->first();
				$bookingDetails['project_id']            = isset($floor_unit->project_id)?$floor_unit->project_id:0;
				$bookingDetails['block_id']           	 = isset($floor_unit->block_id)?$floor_unit->block_id:0;
				$bookingDetails['user_id']                = 0;
				$bookingDetails['customer_code']          = $customer_code;
				$bookingDetails['unit_id']                = $formData['unit_id'];
				$bookingDetails['booking_status']         = 2;
				$bookingDetails['discount']         = $discount;
				$bookingDetails['payment_plan_id']        = $formData['payment_plan_id'];
				$bookingDetails['created_by']             = $sender_id->sender_id;
				$bookingDetails['created_at']             = date('Y-m-d');
				$getBookingId = DB::table('booking')->insertGetId($bookingDetails);
			}


				$transectioncode						=	CommonHelper::quickAlphanumericRandom(15);
				if(isset($getBookingId)){
					
					//Checking if user plan components already exist for this booking id...
					/* $checkUserPlanComponent = UserPlanComponent::where('booking_id','=',$getBookingId)->where('status','!=',1)->where('sequence','=',1)->get();
					
					if(count($checkUserPlanComponent) > 0){
						$getUserPlanComponentId = $checkUserPlanComponent[0]['user_plan_component_id'];
						$net_amount = $checkUserPlanComponent[0]['calulated_value'];
						
					}
					else{
						$getplanComponents = PlanComponent::where('payment_plan_id', '=', $formData['payment_plan_id'])->get();
						$count = count($getplanComponents);
						
						foreach($getplanComponents as $key => $planComponent){
							
							
							
							$user_plan_component['booking_id']        = $getBookingId;
							$user_plan_component['payment_plan_id']   = $formData['payment_plan_id'];
							$user_plan_component['plan_component_id'] = $planComponent->plan_component_id;
							$user_plan_component['component_name']    = $planComponent->component_name;
							$user_plan_component['sequence']  		  = $planComponent->sequence;
							$user_plan_component['status']            = 0;
							$user_plan_component['is_active']         = 1;
							$user_plan_component['created_at']        = date('y-m-d');
							//echo '<pre>'; print_r($user_plan_component); exit;
							if($key == 0){
								$calculated_value	=$this->caluclateInstallmentAmount($getBookingId,$planComponent,$booking_amount,$key,$getUnitDetails);
								$user_plan_component['calulated_value']   = $calculated_value['calculated_value'];
								$user_plan_component['due_amt']   		  = $calculated_value['due_value'];
								
								$net_amount =    $calculated_value['calculated_value'];
								
								// For Due Date...
								$period_type  = $planComponent->period_type;
								$period_value = $planComponent->period_value;
								
								if($period_type == 0){
									$user_plan_component['due_date'] = date("Y-m-d", strtotime("+".$period_value." month"));
								}
								if($period_type == 2){
									$user_plan_component['due_date'] = $period_value;
								}
								if($period_type == ""){
									$user_plan_component['due_date'] = null;
								}
							
								$getUserPlanComponentId = UserPlanComponent::insertGetId($user_plan_component);
							}
							else{
								$period_type  = $planComponent->period_type;
								$period_value = $planComponent->period_value;
								$calculated_value	=$this->caluclateInstallmentAmount($getBookingId,$planComponent,$booking_amount,$key,$getUnitDetails);
								$user_plan_component['calulated_value']   = $calculated_value['calculated_value'];
								$user_plan_component['due_amt']   		  = $calculated_value['due_value'];
								
								if($period_type == 0){
									$user_plan_component['due_date'] = date("Y-m-d", strtotime("+".$period_value." month"));
								}
								if($period_type == 1){
									
									$userPlanComponent  = UserPlanComponent::where('booking_id', '=', $getBookingId)->get();
									$countUserPlanComponent          = count($userPlanComponent);
									$index                           = $countUserPlanComponent - 1;
									$last_due_date                   = $userPlanComponent[$index ]['due_date'];
									$user_plan_component['due_date'] = date("Y-m-d", strtotime("$last_due_date +".$period_value." month"));
									
								}
								if($period_type == 2){
									$user_plan_component['due_date'] = $period_value;
								}
								if($period_type == ""){
									$user_plan_component['due_date'] = null;
								}
								
								$insertUserPlanComponent = UserPlanComponent::insert($user_plan_component);
							}
							
						}
					} */
				
                      $getUserPlanComponentId=0;
				//	if(isset($getUserPlanComponentId)){

						$order_details['user_id']                = 0	;
						$order_details['customer_code']          = $customer_code	;
						$order_details['booking_id']             = $getBookingId;
						$order_details['user_plan_component_id'] = $getUserPlanComponentId;
						$order_details['amount']                 = $booking_amount;
						$order_details['txnid']                  = 'tran_'.$transectioncode;
						$order_details['sender']                 = 'Invite Block';
						$order_details['description']            = 'Unit Booking via Invitatio Link.';
						$order_details['order_status']           = 0;
						$order_details['created_at']             = date('Y-m-d');
						
						$orderId = DB::table('orders')->insertGetId($order_details);
						return redirect('payment/'.$orderId);

					//}
				}	 
		}
		
	}
	
	public function caluclateInstallmentAmount($getBookingId,$planComponent,$booking_amount,$key,$getUnitDetails){
		if($key==0){
			$checkUserPlanComponent = UserPlanComponent::where('booking_id','=',$getBookingId)->where('plan_component_id','=',$planComponent->plan_component_id)->first();
			// For Amount...
			if($checkUserPlanComponent){
				
				if($planComponent->component_type == 1){
					
					$percentage       = $planComponent->component_value ;
					$total_unit_cost  = $getUnitDetails->total_unit_cost;
					$total_unit_cost  = (int)preg_replace('#[^0-9]+#', '', $total_unit_cost);
					$calculated_value = ($total_unit_cost * $percentage)/100;
				}
				else{
					$calculated_value = $planComponent->component_value ;
				}
				
				if($booking_amount!=0){
					$due_value=$calculated_value-$booking_amount;
					$payamt=$booking_amount;
				}
				else{
					$due_value=0;
					$payamt=$calculated_value;
				}
				 
			}else{
				 if($planComponent->component_type == 1){
					$percentage       = $planComponent->component_value ;
					$total_unit_cost  = $getUnitDetails->total_unit_cost;
					$total_unit_cost  = (int)preg_replace('#[^0-9]+#', '', $total_unit_cost);
					$calculated_value = ($total_unit_cost * $percentage)/100;
				}
				else{
					$calculated_value = $planComponent->component_value ;
				}
				
				if($booking_amount!=0){
					$due_value=$calculated_value-$booking_amount;
					$payamt=$booking_amount;
				}
				else{
					$due_value=0;
					$payamt=$calculated_value;
				}
			}
		
		}else{
			$payamt =0;
			if($planComponent->component_type == 1){
				$percentage       = $planComponent->component_value ;
				$total_unit_cost  = $getUnitDetails->total_unit_cost;
				$total_unit_cost  = (int)preg_replace('#[^0-9]+#', '', $total_unit_cost);
				$due_value = ($total_unit_cost * $percentage)/100;
			}
			else{
				//$due_value=0;
				$due_value = $planComponent->component_value ;
			}
		}
		
			return array('calculated_value'=>$payamt,'due_value'=>$due_value);
	}
	
	
	
	//For getting unit Images on Image Slider on Block Invite Page...
	public function getunitimages(Request $request){
		
		$unit_id = $request->input("unit_id");
		$getMediaId = DB::table('unit_images')->where('unit_id', '=', $unit_id)->where('is_active', '=', 1)->get();
		if(count($getMediaId) > 0){
			foreach($getMediaId as $key=>$mediaId){
				$media_id[$key] = $mediaId->media_id;
			}
			$getAllImages = DB::table('media')->whereIn('media_id', $media_id)->where('is_active', '=', 1)->get();
		}
		else{
			$getAllImages = [];
		}

		$image_type = $request->input("image_type");
		$getUnitDetails = UnitDetails::where('unit_id' ,'=', $unit_id)->first();
		$img = $getUnitDetails->$image_type;
		if($img != NULL){
			$image_path = $img;
		}
		else{
			$image_path = "/assets/img/whiteimage.jpg";
		}
		return response()->json(['message' => 'success', 'image_path' => $image_path, 'getAllImages' => $getAllImages]);
	}
	
	
	
	
	public function paymentStatus($booking_id){

		$booking_id = Crypt::decrypt($booking_id);
		//dd($booking_id);
		
		$bookingData = DB::table('booking')->where('booking_id','=',$booking_id)->first();
		
		$userData    = "";
		$unitData    = "";
		$orderData   = "";
		if($bookingData){
			
			if($bookingData->booking_status == 2){
				$userData = DB::table('users')->join('customer_details','customer_details.user_id','=','users.id')
									->leftjoin('customer_address_details as ca',function($on){
										$on->on('ca.user_id','=','users.id')->where('ca.address_type_id','=',5)->where('ca.applicant_type','=',1);
									})
									->where('users.id','=', $bookingData->user_id)->where('users.role','=', 8)
									->where('customer_details.applicant_type','=',1)
									
									->select('users.email as user_email', 'customer_details.*',
												DB::raw('CONCAT(ca.address_line, ", ", ca.city, ", ", ca.state, ", ", ca.pin_code) AS correspondence_address'))
									->first();
			}
			else{
				$userData = DB::table('temp_customer')->where('customer_code','=',$bookingData->customer_code)->first();
			}
			
		
			$unitData = DB::table('booking')->leftjoin('unit_details', 'unit_details.unit_id','=','booking.unit_id')
											->leftjoin('project','project.project_id','=','booking.project_id')
											->leftjoin('project_blocks','project_blocks.block_id','=','booking.block_id')
											->where('booking.is_active','=',1)
											->where('booking.booking_id','=',$bookingData->booking_id)
											->select('booking.booking_id','booking.unit_id','booking.user_id','booking.project_id','booking.block_id','unit_details.unit_name','unit_details.type','unit_details.floor_id','project.project_name','project_blocks.block_name','project_blocks.block_type_id')
											->first();
		
		//dd($unitData->block_name);
			
			if(isset($unitData)){

                if(substr($unitData->unit_name,-3, 1)==0) {
                    $unitData->villa_type = "A";
                } elseif(substr($unitData->unit_name,-3, 1)==1){
                    $unitData->villa_type = "B";
                }elseif(substr($unitData->unit_name,-3, 1)==2){
                    $unitData->villa_type = "C";
                }

				$floordetails = CommonHelper::getUnitFloor($unitData->unit_name, $unitData->block_type_id, $unitData->block_id);
				if($floordetails){
					$unitData->floor      = $floordetails['floor'];
					$unitData->blockValue = $floordetails['blockValue'];
					$unitData->unit_no    = $floordetails['unit_no'];
				}
				else{
					$unitData->floor      = "";
					$unitData->blockValue = "";
					$unitData->unit_no    = "";
				}
				$payment_paid=DB::table('payment_details')->where('booking_id','=',$bookingData->booking_id)->where('user_id','=',$bookingData->user_id)->first();
				if(!empty($payment_paid))
				{
					$payment=$payment_paid->net_amount;
				}
				else
				{
					$payment=$userData->booking_amount;
				}
				//dd($payment);
				
			}
			

			$orderData = DB::table('orders')->where('booking_id','=',$bookingData->booking_id)->where('user_id','=',$bookingData->user_id)->first();
			if($orderData){
				$orderData->payment_date = CommonHelper::display_date($orderData->created_at);
			}
		}
		
		
		return view('yogvillapayments.payment_status')->with(['userData'=>$userData,'paymentpay' => $payment, 'unitData'=>$unitData, 'orderData'=>$orderData, 'bookingData'=>$bookingData]);
	}
	
	
	
	
	
}
