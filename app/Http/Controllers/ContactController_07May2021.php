<?php

namespace App\Http\Controllers;

use App\Contact;
use App\RequestCallBack;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request as IlluminateRequest;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Exception;


class ContactController extends BaseController
{

    public function show()
    {
        $system = DB::table('system')->first();

        return view('frontend.contact', ['system'=>$system]);



    }
	
	
	public function aboutus()
    {
        return view('frontend.aboutus');
    }
	public function gallery()
    {
		return view('frontend.gallery');
    }
	public function axisblues()
    {
        return view('frontend.axisbluesnew');
    }
    public function yogvillasold()
    {
        return view('frontend.yogvillasold');
    }

    public function axisbluesold()
    {
        return view('frontend.axisblues');
    }

    public function contact(Request $request){

        $customMessages = [
            'txtPhone.min' => 'Please enter a valid number.',
            'txtPhone.required' => 'Please enter mobile number',
        ];
        $data = $request->all();
        $validator = Validator::make($data, [
            'txtPhone' =>'required|min:10', 
        ],$customMessages);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }else{

            $otp = rand (10000 , 99999);
            $message = $otp;
            $contactDetails = Contact::create([
            'name' => $request->txtName,
            'phone' => $request->txtPhone,
            'email' => $request->txtEmail,
            'subject' => "Contact Form",
            'message' => $request->txtMsg,
            'otp' => $otp,
            'page_reference'=> $request->page_reference
            ]);
            $contactDetails->srd_id = $request->srd_id??'5f6b62a17c0dac565586db45';
            $this->sendDatatoSellDo($contactDetails);
            $is_send = $this->sendEmailOtp($request->txtEmail, $message);
            if($is_send == 1)
            {
                return response(['status'=>1,'msg'=>'OTP has been sent to your email','email'=>$request->txtEmail]);
            }else
            {
                return response(['status'=>0,'msg'=>'Please Check you Email Id and try again!','email'=> $request->txtEmail]);
            }  
        }

              
    }


    // function sendOtp($number, $message)
    // {
    //     $params = array(
    //         'message'       => $message,
    //         'sendto'        => $number,
    //         'sender'        => rawurlencode('WEBCZE'),
    //         'username'      => 'Webcize',
    //         'password'      => '202012'
    //     );
        
    //     $url = 'http://anysms.in/api.php';
    //     $ch = curl_init($url);
    //     curl_setopt_array($ch, array(
    //         CURLOPT_POST           => true,
    //         CURLOPT_POSTFIELDS     => $params,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_SSL_VERIFYPEER => false,
    //         // CURLOPT_TIMEOUT        => self::REQUEST_TIMEOUT
    //     ));

    //     $rawResponse = curl_exec($ch);
    //     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     $error = curl_error($ch);
    //     curl_close($ch);
    //     $checks = explode('=',$rawResponse);
    //     if($checks[1] != '')
    //     {
    //         return 1;
    //     }else{
    //         return 0;
    //     }   
    // }



    function sendEmailOtp($email, $message)
    {
            $toemailid = $email;
            $emailname = $email;
            $subject = 'OTP verification code : Axisecorp';
            $from = 'info@axisecorp.com';
            $fromname = 'Axis Ecorp';
            $content = "<h3>Thank you for contacting us.</h3>";
            $content .= "<p>Your verification code is : <b>".$message."</b></p></br>";
            $content .= "<p>Regards,</p>";
            $content .= "<p>Axisecorp<p>";
     
            try{
                $mail = Mail::send([], [], function ($message) use ($toemailid, $emailname, $subject, $from, $fromname, $content) {
                    $message->from($from, $fromname);
                    $message->to($toemailid, $emailname);
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
                    $is_send = 1;
                }else{
                    \Session::flash('error-msg', 'Something went wrong.');
                    return Redirect()->back();
                }
            }catch(Exception $e){
                \Session::flash('error-msg', 'Something went wrong.');
                return Redirect()->back();
            }
            
            if($is_send == 1)
            {
                return 1;
            }else{
                return 0;
            }            
    }

    function verifyOtp(Request $request)
    {

        $verification_code = $request->code;
        $srd_id = $request->srd_id??'5f6b62a17c0dac565586db45';
        $email = $request->email;
        $contactDetails = Contact::where('email',$email)
                                ->whereNotNull('otp')
                                ->latest('created_at')->first();

        if($contactDetails->otp == $verification_code)
        {
            Contact::where('email',$email)
                   ->where('otp','=',$verification_code)
                   ->update(['is_verified'=>1]);

            $verifiedcontactDetails = Contact::where('email',$email)
                ->where('is_verified','=',1)
                ->latest('created_at')->first();

            if( $contactDetails->page_reference == 'yogvillas_ad' || 
                $contactDetails->page_reference == 'yogvillas_campaign_four')
            {
                $toemailid = 'info@axisecorp.com';
                $emailname = 'Axis Ecorp';
                $subject = 'Campaign lead details';
                $is_campaign = 1;
            }else{
                $toemailid = 'info@axisecorp.com';
                $emailname = 'Axis Ecorp';
                $subject = 'Contact Us Mail';
                $is_campaign = 0;
            }   
            
            $from = 'info@axisecorp.com';
            $fromname = 'Axis Ecorp';
            $content = "<h3>From: $contactDetails->email</h3>";
            $content .= "<p>Name: $contactDetails->name</p>";
            $content .= "<p>Phone: $contactDetails->phone</p>";
            $content .= "<p>Message: $contactDetails->message</p>";
     
            try{
                $mail = Mail::send([], [], function ($message) use ($toemailid, $emailname, $subject, $from, $fromname, $content,$is_campaign) {
                    $message->from($from, $fromname);
                    $message->to($toemailid, $emailname);
                    if($is_campaign == 1)
                    {
                        $message->cc('onlineaxiscampaigns@gmail.com');
                    }
                    $message->bcc('abhishek.goyal@innverse.com','Abhishek Goyal');
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
            $verifiedcontactDetails->srd_id = $srd_id;
            $this->sendDatatoSellDo($verifiedcontactDetails);
            if($contactDetails->page_reference == 'axisblues')
            {
                return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'axisblues']);
            }
            if($contactDetails->page_reference == 'yogvillas')
            {
                return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'yogvillas']);
            }
            if($contactDetails->page_reference == 'lakecity')
            {
                return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'lakecity']);
            }
            if($contactDetails->page_reference == 'kncj')
            {
                return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'kncj']);
            }
            if($contactDetails->page_reference == 'lakecityplaza')
            {
                return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'lakecityplaza']);
            }
            else if($contactDetails->page_reference == 'contact'){
                return response(['status'=>1,'msg'=>'Thank you for contacting us.']);
            }else{
                return response(['status'=>1,'msg'=>'Thank you for contacting us.']);
            } 
             
        }else
        {
            \Session::flash('success-msg', 'Oops, Something went wrong.'); 
            return response(['status'=>0,'msg'=>'Otp is not verified. Please enter correct otp.']);
        }
    }

    public function sendDatatoSellDo($data)
    {
        // dd($data);
        $formid = array('contact'       => '5f6b62a17c0dac565586db45',
                        'enquiry'       => '5f6b62a17c0dac565586db45',
                        'axisblues'     => '601d2ca0a6bbc91170d665df',
                        'yogvillas'     => '601d2d3fa6bbc94d8bebcc56',
                        'lakecity'      => '601d2d89a6bbc94533c175c0',
                        'lakecityplaza' => '60656a11a6bbc9180afb394f',
                        'kncj'      => '601d2dc7a6bbc94a42f66841',
                        'yogvillas_ad' => '6024df43c8256104a19fa4a8',
                        'yogvillas_campaign_four' => '604a06ff4443ae142e8f028f',
                        'lakecityplazaemailer' => '60713bcfc82561544e8352e3',
                         );
        if(array_key_exists($data['page_reference'], $formid))
        {
            $form_id = $formid[$data['page_reference']];
        }else{
             $form_id = '5f6b62a17c0dac565586db45';
        }

        if($data['page_reference'] == 'yogvillas_ad'){
            $srd_id = '60310fdfa6bbc937ca6c7e90';
        }else if($data['page_reference'] == 'yogvillas_campaign_four'){
            $srd_id = $data->srd_id;
        }else if($data['page_reference'] == 'lakecityplazaemailer'){
            $srd_id = '60714c37ed23e9745e04d377';
        }else{
            $srd_id = $form_id;
        }


        if($data['is_verified']==1) {
            $is_verified = "Yes";
        }else{
            $is_verified = "No";
        }
        
        $postdata = '{
          "form_id": "'.$form_id.'",
          "sell_do" : {
            "campaign" : {
              "srd" : "'.$srd_id.'",
              "campaign_id": ""
            },
            "form": {
              "lead": {
                "name": "'.$data['name'].'",
                "email": "'.$data['email'].'",
                "phone": "'.$data['phone'].'",
                "project_id": "",
                "campaign_id": "",
                "sales":"",
                "profile": {
                  "company": "axisecorp"
                }
              },
              "custom" : {
                "c_one" : "c one",
                "custom_email_verified": "'.$is_verified.'"
              },
              "note" : {
                "content" : "'.$data['message'].'"
              }
            }
          },
          "api_key" : "9c50fe5de8e98ec2fe344d090c661417"
        }';
        
        $url = 'https://app.sell.do//api/leads/create.json';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
       
        if($result && $data['page_reference'] != 'lakecityplazaemailer')
        {
            Contact::where('email',$data['email'])
                   ->where('otp',$data['otp'])
                   ->where('id',$data['id'])
                   ->update(['selldo_response'=>$result]);
        }else{
            Contact::insert(['name'=>$data['name'],'phone'=>$data['phone'],'email'=>$data['email'],'subject'=>'Emailer lead data send to selldo','is_campaign'=>0,'page_reference'=>$data['page_reference'],'selldo_response'=>$result,'message'=>$data['message']]);
            return 1;
        }
    }

    public function requestCallBack(IlluminateRequest $request){
        RequestCallBack::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        $toemailid = 'info@axisecorp.com';
        $emailname = 'Axis Ecorp';
        $subject = 'Request Call Back Mail';
        $from = 'info@eejak.com';
        $fromname = 'Axis Ecorp';
        $content = "<h3>From: $request->email</h3>";
        $content .= "<p>Name: $request->name</p>";
        $content .= "<p>Phone: $request->phone</p>";
 
        try{
            $mail = Mail::send([], [], function ($message) use ($toemailid, $emailname, $subject, $from, $fromname, $content) {
                $message->from($from, $fromname);
                $message->to($toemailid, $emailname);
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
                return response()->json(['status'=>400,'message'=>'Something went wrong.']);
            }
        }catch(Exception $e){
            return response()->json(['status'=>400,'message'=>'Something went wrong.']);
        }

        return response()->json(['status'=>200,'message'=>'Your request for call submitted. We will reach you soon.']);
    }

    public function mailercontact(request $request){

            dd($request);
            $name = $request->txtName;
            $phone=  $request->txtPhone;
            $location = $request->txtLocation;

            $emailData = array();
    }


    public function yogVillas(){
        return view('frontend.yogvillasnew');
    }

    public function aeroValley(){
        return view('frontend.aerovalley');
    }

    public function turboIn(){
        return view('frontend.turboin');
    }

    public function kncj(){
        return view('frontend.kncj');
    }

    public function lakeCity(){
        return view('frontend.lakecity');
    }


}

