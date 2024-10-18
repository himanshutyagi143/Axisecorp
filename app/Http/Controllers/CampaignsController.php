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
use App\Contact;
use App\Models\EnquiryDetails;
use DateTime;

class CampaignsController extends Controller
{
	
	function yogvillaCampaing()
	{
		return view('frontend.campaing.yogvilla.index');
	}

	function saveEnquiryDetails(Request $request)
	{
		Contact::create([
            'name' => $request->user_name,
            'phone' => $request->user_phone,
            'email' => $request->user_email,
            'subject' => 'You got an enquiry mail',
            'message' => $request->user_query,
            'is_campaign'=> '1',
        ]);

        $toemailid = 'aninder.sethi@gmail.com';
        $emailname = 'Axis Ecorp';
        $subject = 'You got an enquiry mail';
        $from = 'info@eejak.com';
        $fromname = 'Yog Villa';
        $content = "<h3>From: $request->user_email</h3>";
        $content .= "<p>Name: $request->user_name</p>";
        $content .= "<p>Subject: You got an enquiry</p>";
        $content .= "<p>Phone: $request->user_phone</p>";
        $content .= "<p>Message: $request->user_query</p>";
 
        try{
            $mail = Mail::send([], [], function ($message) use ($toemailid, $emailname, $subject, $from, $fromname, $content) {
                $message->from($from, $fromname);
                $message->to($toemailid, $emailname);
                $message->bcc('abhishek.goyal@innverse.com',$emailname);
                $message->subject($subject);
                $message->setBody($content, 'text/html'); // for HTML rich messages
            });
            if($mail){
                $emailData = array();
                $emailData['send_to']   = $toemailid;
                $emailData['send_by']   = $from;
                $emailData['sender_id'] = 2;
                $emailData['subject']   = $subject;
                $emailData['body']      =  $content;
                $emailData['send_date'] = date('Y-m-d');
                DB::table('send_mail')->insert($emailData);
            }else{
                \Session::flash('error-msg', 'Something went wrong.');
                return Redirect()->back();
            }
        }catch(Exception $e){
            \Session::flash('error-msg', 'Something went wrong.');
            return Redirect()->back();
        }
      
        return response(['status'=>1,'msg'=>'Thanks! Your query has been submitted successfully.']);
		
	}

	function downloadPriceList(Request $request)
	{
		$otp = rand (10000 , 99999);
		$message = $otp;
		Contact::create([
            'name' => $request->user_name,
            'phone' => $request->user_phone,
            'email' => $request->user_email,
            'subject' => 'You got an enquiry mail',
            'message' => $request->user_query,
            'is_campaign'=> '1',
            'otp' => $otp
        ]);

        $toemailid = 'aninder.sethi@gmail.com';
        $emailname = 'Axis Ecorp';
        $subject = 'You got an enquiry mail';
        $from = 'info@eejak.com';
        $fromname = 'Yog Villa';
        $content = "<h3>From: $request->user_email</h3>";
        $content .= "<p>Name: $request->user_name</p>";
        $content .= "<p>Subject: You got an enquiry</p>";
        $content .= "<p>Phone: $request->user_phone</p>";
        $content .= "<p>Message: $request->user_query</p>";
 
        try{
            $mail = Mail::send([], [], function ($message) use ($toemailid, $emailname, $subject, $from, $fromname, $content) {
                $message->from($from, $fromname);
                $message->to($toemailid, $emailname);
                $message->bcc('abhishek.goyal@innverse.com',$emailname);
                $message->subject($subject);
                $message->setBody($content, 'text/html'); // for HTML rich messages
            });
            if($mail){
                $emailData = array();
                $emailData['send_to']   = $toemailid;
                $emailData['send_by']   = $from;
                $emailData['sender_id'] = 2;
                $emailData['subject']   = $subject;
                $emailData['body']      =  $content;
                $emailData['send_date'] = date('Y-m-d');
                DB::table('send_mail')->insert($emailData);
            }else{
                \Session::flash('error-msg', 'Something went wrong.');
                return Redirect()->back();
            }
        }catch(Exception $e){
            \Session::flash('error-msg', 'Something went wrong.');
            return Redirect()->back();
        }

        \Session::flash('success-msg', 'Thanks For Contacting us');
        $is_send = $this->sendOtp($request->user_phone, $message);
        if($is_send == 1)
        {
        	return response(['status'=>1,'msg'=>'Otp has been sent to your mobile number. ','mobile_no'=>$request->user_phone]);
        }else
        {
        	return response(['status'=>1,'msg'=>'Oops something went wrong! ','mobile_no'=> $request->user_phone]);
        }
        
	}



	function sendOtp($number, $message)
	{
		$params = array(
			'message'       => $message,
			'sendto'        => $number,
			'sender'        => rawurlencode('WEBCZE'),
			'username'		=> 'Webcize',
			'password'		=> '202012'
		);
		
		$url = 'http://anysms.in/api.php';
		$ch = curl_init($url);
		curl_setopt_array($ch, array(
			CURLOPT_POST           => true,
			CURLOPT_POSTFIELDS     => $params,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			// CURLOPT_TIMEOUT        => self::REQUEST_TIMEOUT
		));

		$rawResponse = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$error = curl_error($ch);
		curl_close($ch);
		if($rawResponse)
		{
			return 1;
		}else{
			return 0;
		}	
	}

	function verifyOtp(Request $request)
	{

		$verification_code = $request->code;
		$phone = $request->phone;
		$contactDetails = Contact::where('phone',$phone)
								->whereNotNull('otp')
								->latest('created_at')->first();

		if($contactDetails->otp == $verification_code)
		{
			Contact::where('phone',$phone)
  				   ->where('otp','=',$verification_code)
				   ->update(['is_verified'=>1]);
			return response(['status'=>1,'msg'=>'Otp is verified successfully!']); 
		}else
		{
			return response(['status'=>0,'msg'=>'Otp is not verified']);
		}
	}
	
}
