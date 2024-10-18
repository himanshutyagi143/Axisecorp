<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TempCustomer;
use App\Models\TempCustomerDetails;
use Carbon\Carbon;
use DB;
use Mail;
use Validator;
use PDF;

class UserPaymentController extends Controller
{
     public function paymentdesc($id,$token)
     {  

     		$id = Crypt::decrypt($id);	

        db::table('tbl_link')->where('id','=',$id)
        ->update([
          'count'=> DB::raw('count+1'), 
        ]);
        $check=db::table('tbl_link')->where('id','=',$id)->select('token','parameter','customer_code','count','current_time','valid_hours')->first();
        
        $hours='+'.$check->valid_hours.' hours';
        $extrahours='+'.($check->valid_hours+6).' hours';
        $time = date("H:i:s", strtotime($check->current_time));
        $url_time = date("H:i:s", strtotime($hours, strtotime($time)));
        $url_time_extra = date("H:i:s", strtotime($extrahours, strtotime($time)));
        $url_date = date("Y-m-d", strtotime($check->current_time));
        $current_time = date("H:i:s", time());
        $current_time_add = date("H:i:s", strtotime($hours,time()));
        $current_date = date("Y-m-d", time());
        $url_date = date("Y-m-d", strtotime($check->current_time));
        //dd($url_date);
        if(date("H",strtotime($time))>=18)
        {
            if($check->count<=3 && $current_time_add<=$url_time_extra && $current_date==$url_date)
            {

              $decode=json_decode($check->parameter);
              $customer_code=$check->customer_code;
              if($check->token==$token)
              {
                $check=db::table('tbl_link')->where('id','=',$id)->update(['status' => 4]);
                    $customer_details=db::table('customer_details')->where('customer_code','=',$customer_code)->select('first_name','last_name','email','phone','user_id')->first();
                    $address=db::table('booking')
                    ->leftjoin('unit_details','unit_details.unit_id','=','booking.unit_id')
                    ->leftjoin('customer_kyc','customer_kyc.user_id','=','booking.user_id')
                    ->leftjoin('customer_address_details','customer_address_details.user_id','=','booking.user_id')
                    ->leftjoin('project','project.project_id','=','booking.project_id')
                    ->leftjoin('project_blocks','project_blocks.block_id','=','booking.block_id')
                    ->where('booking.customer_code','=',$customer_code)
                    ->select('customer_address_details.address_line','customer_address_details.pin_code','customer_address_details.city','customer_address_details.state','customer_address_details.country','customer_kyc.docment_number','project_blocks.block_name','project_blocks.block_id','unit_details.floor_id','project.project_name','booking.project_id')->first();
                    //dd($address);
                    if(!empty($address))
                    {
                       if ($address->floor_id == 0) 
                       {
                             $address->strFloor = "Ground";
                       } 
                       else 
                       {
                          $address->strFloor ='Floor ' . $address->floor_id;
                       }
                    }
                    if(substr($customer_code,-3, 1)==0) {
                        $address->villa_type = "A";
                    } elseif(substr($customer_code,-3, 1)==1){
                        $address->villa_type = "B";
                    }elseif(substr($customer_code,-3, 1)==2){
                        $address->villa_type = "C";
                    }
                    if($decode->Project_id==11)
                    {
                       $address->unit=substr($decode->Customer_code,-2);
                    }
                    elseif($decode->Project_id==10)
                    {
                       $address->unit=substr($address->block_name,-1)."-".substr($customer_code,-3);
                    }
                    $address->Amount_in_word=CommonHelper::getIndianCurrency($decode->Amount);
                    //dd($Amount_in_word);
                    
                    return view('payments.customer-detail', ['address'=>$address, 'customer_details'=>$customer_details,'decode'=>$decode,'token'=>$token,'id'=>$id]);
                
              }
              else
              {
                echo "Token Expire please contact axis ecorp team";
              }
          }
          else
          {
            echo "Token Expire please contact axis ecorp team";
          }
        }
        else
        {
            if($check->count<=3 && $current_time<=$url_time && $current_date==$url_date)
            {
              $decode=json_decode($check->parameter);
              $customer_code=$check->customer_code;
              if($check->token==$token)
              {
                $check=db::table('tbl_link')->where('id','=',$id)->update(['status' => 4]);
                    $customer_details=db::table('customer_details')->where('customer_code','=',$customer_code)->select('first_name','last_name','email','phone','user_id')->first();
                    $address=db::table('booking')
                    ->leftjoin('unit_details','unit_details.unit_id','=','booking.unit_id')
                    ->leftjoin('customer_kyc','customer_kyc.user_id','=','booking.user_id')
                    ->leftjoin('customer_address_details','customer_address_details.user_id','=','booking.user_id')
                    ->leftjoin('project','project.project_id','=','booking.project_id')
                    ->leftjoin('project_blocks','project_blocks.block_id','=','booking.block_id')
                    ->where('booking.customer_code','=',$customer_code)
                    ->select('customer_address_details.address_line','customer_address_details.pin_code','customer_address_details.city','customer_address_details.state','customer_address_details.country','customer_kyc.docment_number','project_blocks.block_name','project_blocks.block_id','unit_details.floor_id','project.project_name','booking.project_id')->first();
                    //dd($address);
                    if(!empty($address))
                    {
                       if ($address->floor_id == 0) 
                       {
                             $address->strFloor = "Ground";
                       } 
                       else 
                       {
                          $address->strFloor ='Floor ' . $address->floor_id;
                       }
                    }
                    if(substr($customer_code,-3, 1)==0) {
                        $address->villa_type = "A";
                    } elseif(substr($customer_code,-3, 1)==1){
                        $address->villa_type = "B";
                    }elseif(substr($customer_code,-3, 1)==2){
                        $address->villa_type = "C";
                    }
                    if($decode->Project_id==11)
                    {
                       $address->unit=substr($decode->Customer_code,-2);
                    }
                    elseif($decode->Project_id==10)
                    {
                       $address->unit=substr($address->block_name,-1)."-".substr($customer_code,-3);
                    }
                    $address->Amount_in_word=CommonHelper::getIndianCurrency($decode->Amount);
                    //dd($Amount_in_word);
                    
                    return view('payments.customer-detail', ['address'=>$address, 'customer_details'=>$customer_details,'decode'=>$decode,'token'=>$token,'id'=>$id]);
                
              }
              else
              {
                echo "Token Expire please contact axis ecorp team";
              }
          }  
          else
          {
            echo "Token Expire please contact axis ecorp team";
          }
        }
     	}

   public function paymentsubmit($token,$id)
   {
      $customer_code = Crypt::decrypt($token);
      //dd($customer_code);
      $customer_details=db::table('customer_details')->where('customer_code','=',$customer_code)->select('first_name','last_name','email','phone','user_id')->first();
      $check=db::table('tbl_link')->where('id','=',$id)->select('parameter')->first();
      $decode=json_decode($check->parameter);
      $amount=$decode->Amount;
      $block=db::table('booking')->where('customer_code','=',$customer_code)->select('block_id','project_id','unit_id')->first();
      $unit_id=$block->unit_id;
      $otp = CommonHelper::quickRandom(6);
      $notification = DB::table('notification_master')->where('notification_id', '=', 30)->first();
         $notification_content = $notification->notification_content;
         $notification_content = str_replace('{otp}', $otp, $notification_content);
         $subject = $notification->subject;

         $to = $customer_details->email;
         $from = 'do-not-reply@eejak.com';
         $data = [
            'msg' => $notification_content,
            'subject' => $subject,
            'from' => $from,
            'to' => $to
         ];

         $mail = Mail::send('emails.blockbooking', ['data' => $data], function ($m) use ($data) {
            $m->from($data['from'], 'axisecorp');
            $m->to($data['to'])->subject($data['subject']);
            $m->setBody($data['msg'], 'text/html');
         });

         //Insert Email Data into send_email table...
         if ($mail) {

            $emailData['send_to'] = $to;
            $emailData['send_by'] = 'do-not-reply@eejak.com';
            $emailData['sender_id'] = 1;
            $emailData['subject'] = $data['subject'];
            $emailData['body'] = $data['msg'];
            $emailData['send_date'] = date('Y-m-d');
            $insertEmailDetails = DB::table('send_mail')->insert($emailData);
         }

         $guestId = DB::table('guest_user')->insertGetId(['first_name' => $customer_details->first_name, 'last_name' => $customer_details->last_name, 'email' => $customer_details->email, 'phone' => $customer_details->phone, 'unit_id' => $unit_id, 'amount' => $amount, 'project_id' => $block->project_id, 'is_active' => 1, 'block_id' => $block->block_id, 'otp' => $otp, 'created_at' => date('Y-m-d')]);
         $token = Crypt::encrypt($guestId);
         if($token)
         {
            return redirect('/verify_payment_otp/'. $token.'/'.$id);
         }
         else
         {
            return redirect('/');
         }
         
   }

   public function verifyPaymentOtp($tokenencypty,$id)
    {

        try {
            $tempId = Crypt::decrypt($tokenencypty);


            $guestUser = DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->first();

            if ($guestUser) {
                $unitDetail = DB::table('floor_unit')->where('id', '=', $guestUser->unit_id)->where('project_id', '=', $guestUser->project_id)->where('status', '=', 1)->first();
                return view('payments.verify_otp_for_payments', ['guestUser' => $guestUser, 'tokenencypty' => $tokenencypty, 'unitDetail' => $unitDetail, 'id' => $id]);
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {

            return redirect('/');
        }
    }

    public function postverifyOtpForpayments(Request $request,$id)
    {

        $validate = Validator::make($request->all(), [
            'guest_token' => 'required',
            'otp' => 'required',
        ]);

        $validate->after(function ($validate) use ($request) {

            $tempId = Crypt::decrypt($request->guest_token);
            $guestUser = DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->first();

            if(!$guestUser){
                $validate->errors()->add('Invalid', 'Access Denied');
            }else if($request->otp != $guestUser->otp){
                $validate->errors()->add('otp', 'OTP mismatch.');
            }
        });

        if ($validate->fails()) {

            return redirect()->back()->withErrors($validate->errors())->withInput();
        }



        return redirect('/payForpayment/' . $request->guest_token.'/'.$id);
        // $this->payForBooking($guestUser);
    }


    public function payForpayment($guest_token,$id)
    {
        //echo 'ddd'; exit;
        try {
            if ($guest_token) {
                $tempId = Crypt::decrypt($guest_token);
                $guestUserArray = DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->first();
                $payment_plan_id = 0;
                $unit_id = $guestUserArray->unit_id;
                $project_id = $guestUserArray->project_id;
                $block_id = $guestUserArray->block_id;
                $pan_card_media_id = $guestUserArray->pan_card_media_id;
                $passport_media_id = $guestUserArray->passport_media_id;
                $unitdetailsArr = DB::table('unit_details')->where('unit_id', '=', $unit_id)->where('project_id', '=', $project_id)->first();

                $customer_code = $unitdetailsArr->unit_name;
                $unitDetails = DB::table('unit_details')->where('unit_id', '=', $unit_id)->first();
                $sender_id = 1;

                if ($customer_code != '0') {

                    //Checking if booking already exists for this user id, payment plan id and Unit id...
                    $checkBooking = DB::table('booking')->where('unit_id', '=', $unit_id)->where('customer_code', '=', $customer_code)->first();
                    $getBookingId = $checkBooking->booking_id;
                    $getUserId = $checkBooking->user_id;
                    

                    if (isset($getBookingId)) {


                        $transectionString   =  CommonHelper::quickAlphanumericRandom(15);
                        $transectioncode  =  'tran_' . $transectionString;
                        $getUserPlanComponentId = 0;
                        $order_details['user_id']                = $getUserId;
                        $order_details['customer_code']          = $customer_code;
                        $order_details['booking_id']             = $getBookingId;
                        $order_details['user_plan_component_id'] = $getUserPlanComponentId;
                        $order_details['amount']                 = $guestUserArray->amount;
                        $order_details['txnid']                  = $transectioncode;
                        $order_details['sender']                 = 'Existing Payment';
                        $order_details['description']            = 'Unit Payment via outer.';
                        $order_details['order_status']           = 0;
                        $order_details['created_at']             = date('Y-m-d');

                        $orderId = DB::table('orders')->insertGetId($order_details);
                        DB::table('payment_url')->insert(['order_id'=> $orderId , 'tbl_link_id' => $id]);
                        DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->update(['is_active'=>2]);
                        return redirect('payment/' . $orderId);
                    }
                }
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            //dd($e->getMessage());
            return redirect('/');
        }
    }


    public function printaspdf($booking_id)
    {
      //$booking_id = Crypt::decrypt($booking_id);
      
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
         }
         
         
         $orderData = DB::table('orders')->where('booking_id','=',$bookingData->booking_id)->where('user_id','=',$bookingData->user_id)->get();
         foreach ($orderData as $key => $order) {
            # code...
         }
         $created_at=$order->created_at;
         $Payment = DB::table('guest_user')->where('unit_id','=',$unitData->unit_id)->get();
         $count=count($Payment)-1;
         foreach ($Payment as $key => $value) {
         }
         $payamtpay=$value->amount;
         if($orderData){
            $payment_date = CommonHelper::display_date($created_at);
         }
      }
      
      $arr= '
         <!doctype html>
         <html>
         <head>
         <meta charset="utf-8">
         <title>Axis</title>
         </head>';

      $arr.='<body>
         <div style="width:700px; margin:0 auto;">
         <div style="float:left">
         <div style="margin-top:20px;">
         <h3 style="font-size:15px; font-weight:bold; font-style:italic; font-family:Verdana, sans-serif;  margin:0px; padding-top:10px; color:#5a5555">Customer Details</h3>
         <p style="font-size:15px; font-family:Verdana, sans-serif; margin:0px; padding-top:10px; font-style:italic; color:#5a5555">'.$userData->first_name.' '.$userData->last_name.'</p>
         <p style="font-size:15px; font-family:Verdana, sans-serif; margin:0px; padding-top:10px; font-style:italic; color:#5a5555">'.$userData->phone.'</p>
         </div>';
      if($unitData->project_id==10)
      {
         $arr.='<div style="margin-top:20px;">
         <h3 style="font-size:15px; font-weight:bold; font-style:italic; font-family:Verdana, sans-serif; margin:0px; padding-top:10px; color:#5a5555 ">Property Details</h3>
         <p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Project Name:'.$unitData->project_name.'</p>
         <p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Tower: '.substr($unitData->block_name,-1).'</p>
         <p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Unit:'.substr($unitData->block_name,-1)."-".substr($unitData->unit_name,-3).'</p>
         <p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Floor:'.$unitData->floor.'</p>
         </div>
         </div>';
      }
      if($unitData->project_id==11)
      {
         $arr.='<div style="margin-top:20px;">
         <h3 style="font-size:15px; font-weight:bold; font-style:italic; font-family:Verdana, sans-serif; margin:0px; padding-top:10px; color:#5a5555 ">Property Details</h3>
         <p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Project Name:'.$unitData->project_name.'</p>
         <p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Villa #:'.substr($unitData->unit_name,6).'</p>
         <p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Villa Type:'.$unitData->villa_type.'</p>
         </div>
         </div>';
      }
      
      $arr.='<div style="float:right; margin-top:20px;">
         <p style="font-size:15px; font-style:italic; font-family:Verdana, sans-serif; margin:0px; padding-top:10px; color:#5a5555">Date:'.date("M d, Y",strtotime($payment_date)).'</p>
         <p style="font-size:15px; font-style:italic; font-family:Verdana, sans-serif;  margin:0px; padding-top:10px; color:#5a5555">Transaction Id #:'.$order->txnid .'</p>
         </div>

         <div style="clear:both"></div>

         <div style=" margin-top:30px;">
         <h3 style="font-size: 24px; font-family:Verdana, sans-serif;">Booking Details</h3>


         <table  border="1" style="border-collapse: collapse; text-align:center;  border-color:#eceeef; font-family:Verdana, sans-serif;" width=100%;>
         <thead>
         <tr style=" border-bottom:5px solid #eceeef;">
         <th style=" padding:10px; border-right:1px solid #eceeef; text-align:left; font-size:15px;">Unit Price Details</th>
         <th style="text-align="center" font-size:15px;">Price</th>

         </tr>
         </thead>
         <tbody>
         <tr style=" border-bottom:1px solid #eceeef;">
         <td style=" font-size:20px;  border-right:1px solid #eceeef;  text-align:left; padding:10px;"><em><strong>Booking Amount</strong></em></td>
         <td style="text-align="center"> '.$payamtpay.' </td>

         </tr>

         <tr>
         <td style=" font-size:18px;  border-right:1px solid #eceeef; text-align:right; padding:10px;"><strong>Total:</strong></td>
         <td style=" font-size:18px;  border-right:1px solid #eceeef; text-align:center; padding:10px;"><strong> '.$payamtpay.' </strong></td>

         </tr>
         </tbody>
         </table>


         </div>

         <div style=" margin-top:20px;">';
         if($order->order_status==0)
         {
              $arr .='<button type="button" style="background:#5cb85c; border:0px; color:#fff; padding:10px; border-radius:2px; 
              width:100%; text-transform:uppercase; cursor:pointer;">
              Not Complete &nbsp;
              </button>';
         }
         
         if($order->order_status==1)
         {
              $arr .='<button type="button" style="background:#5cb85c; border:0px; color:#fff; padding:10px; border-radius:2px; 
              width:100%; text-transform:uppercase; cursor:pointer;">
              Successfully Paid&nbsp;
              </button>';
         }

         if($order->order_status==2)
         {
              $arr .='<button type="button" style="background:#5cb85c; border:0px; color:#fff; padding:10px; border-radius:2px; 
              width:100%; text-transform:uppercase; cursor:pointer;">
              Payment Failed &nbsp;
              </button>';
         }

         '</div>

         </div>
         </body>
         </html>
      ';

       $file_name='payment_status/'.time();
        /* $html= view('pdfdoc.previewcertificate', ['dowload_option'=>'','template_id'=>'1','certificate_title'=>'title','bg_img_mode'=>'','template_bg_image'=>'','certificate_content'=>$arr,'baseUrl'=>'','file_name'=>$file_name]);  */
        if(!empty($arr))
        {
            $pdf = PDF::loadView('pdfdoc.adminpletdetailview', ['data' => $arr, 'file_name' => $file_name]);
            return $pdf->download('Payment_status.pdf');
            return redirect()->back();
        }
        else
        {
         return redirect()->back();
        }

   }

}
