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
use Swift_Mailer;
use Swift_SmtpTransport;


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
            //$contactDetails->srd_id = $request->srd_id??'615eda85a6bbc922a3526e01';
           // $contactDetails->srd_id = $request->srd_id??'5f6b62a17c0dac565586db45';
			//dd($contactDetails);
           // $this->sendDatatoSellDo($contactDetails);

            /*** Old Code Array for Not send OTP for this page_reference *******/
            // $notsent_otp2 = ['lakecityplazaemailer',
            //                 'gunjan_emailer',
            //                 'yogvillasPromo19May2021',
            //                 'location_advantage_reminder',
            //                 'emailer_jyoti',
            //                 'Yogvillas_Emailer_28_May_21',
            //                 'lakecityplaza_emailer_4_Jun_21',
            //                 'Yogvillas_emailer_5_june_2021',
            //                 'lake-city-plaza-emailer-7-Jun-21',
            //                 'YogVillas_Emailer_8_Jun_21',
            //                 'lake-city-plaza-emailer-9-jun-21',
            //                 'YogVillas_Emailer_12_Jun_21',
            //                 'YogVillas_Emailer_14_Jun_21'
            //                ];

            /**** New Code for check not to send otp for this request *******/
            $notsent_otp = DB::table('tbl_selldo_reference')
                                    ->where('send_otp',0)
                                    ->where('is_active',1)
                                    ->pluck('page_reference');  
                                   
            if(in_array($request->page_reference,$notsent_otp) == false ){
                $is_send = $this->sendEmailOtp($request->txtEmail, $message);
                if($is_send == 1)
                {
                    return response(['status'=>1,'msg'=>'OTP has been sent to your email','email'=>$request->txtEmail]);
                }else
                {
                    return response(['status'=>0,'msg'=>'Please Check you Email Id and try again!','email'=> $request->txtEmail]);
                }  
            }else{
                if( $contactDetails->page_reference == 'yogvillas_landingpage_six' || $contactDetails->page_reference == 'lakecity_landingpage_one')
                {
                    //$toemailid = 'work.ayushgupta16@gmail.com';
                    //$toemailid  = 'goyalabhishek072@gmail.com';
                    $emailname = 'Ayush';
                    $subject = 'Campaign lead details - '.$contactDetails->page_reference;
                    $is_campaign = 1;


                    $from = 'info@axisecorp.com';
                    $fromname = 'Axis Ecorp';
                    $content = "<h3>From: $contactDetails->email</h3>";
                    $content .= "<p>Name: $contactDetails->name</p>";
                    $content .= "<p>Phone: $contactDetails->phone</p>";
                    $content .= "<p>Message: $contactDetails->message</p>";

                    try {
						
						$mail =1;
						
					/* 		$mail = Mail::send([], [], function ($message) use ($toemailid, $emailname, $subject, $from, $fromname, $content, $is_campaign) {
                            $message->from($from, $fromname);
                            $message->to($toemailid, $emailname);
                            $message->bcc('abhishek.goyal@innverse.com', 'Abhishek Goyal');
                            $message->subject($subject);
                            $message->setBody($content, 'text/html'); // for HTML rich messages 
							
                        });
						 */
						
                        if ($mail) {
                            $emailData = array();
                            $emailData['send_to'] = $toemailid;
                            $emailData['send_by'] = $from;
                            $emailData['sender_id'] = 2;
                            $emailData['subject'] = $subject;
                            $emailData['body'] = $content;
                            $emailData['send_date'] = date('Y-m-d');
                            DB::table('send_mail')->insert($emailData);
                        } else {
                            \Session::flash('error-msg', 'Something went wrong.');
                            return Redirect()->back();
                        }
                    } catch (Exception $e) {
                        \Session::flash('error-msg', 'Something went wrong.');
                        return Redirect()->back();
                    }
                }
                return response(['status'=>1,'msg'=>'Thank you for contacting us. Our representative will call you shortly!']);
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
            $from = 'noreply@axisecorp.com';
            $fromname = 'Axis Ecorp';
            $content = "<h3>Thank you for contacting us.</h3>";
            $content .= "<p>Your verification code is : <b>".$message."</b></p></br>";
            $content .= "<p>Regards,</p>";
            $content .= "<p>Axisecorp<p>";
     
            try{
				
				
			
				// Setup your msmail mailer
				$transport = Swift_SmtpTransport::newInstance('mail.axisecorp.com', 25, '');
				$transport->setUsername('noreply@axisecorp.com');
				$transport->setPassword('N@#rPly@123');
				// Any other mailer configuration stuff needed...
				$msmail = new Swift_Mailer($transport);
				// Set the mailer as msmail
				Mail::setSwiftMailer($msmail);
					
				
				
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
                $toemailid = 'noreply@axisecorp.com';
                $emailname = 'Axis Ecorp';
                $subject = 'Campaign lead details';
                $is_campaign = 1;
            }else{
                $toemailid = 'noreply@axisecorp.com';
                $emailname = 'Axis Ecorp';
                $subject = 'Contact Us Mail';
                $is_campaign = 0;
            }   
            
            $from = 'noreply@axisecorp.com';
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
                   // $message->bcc('abhishek.goyal@innverse.com','Abhishek Goyal');
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
            /*Old code Array for donwload broucher and application form references */
            // $download_reference = ['axisblues',
            //                        'yogvillas',
            //                        'lakecity',
            //                        'lakecityplaza',
            //                        'kncj',
            //                        'contact',
            //                        'axisblues_application_form',
            //                        'yogvillas_application_form',
            //                        'lakecity_application_form',
            //                        'lakecityplaza_application_form',
            //                        'kncj_application_form',     
            //                       ];

            /*New code for getting donwload broucher and application form references */
            $download_reference = DB::table('tbl_selldo_reference')
                                  ->whereIn('form_type', ['brochure','application_form','payment_plan'])
                                  ->where('is_active',1)
                                  ->pluck('page_reference');                      
            if(in_array($contactDetails->page_reference, $download_reference))
            {
                return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>$contactDetails->page_reference]);
            }else{
                return response(['status'=>1,'msg'=>'Thank you for contacting us.']);
            }                      

            // if($contactDetails->page_reference == 'axisblues')
            // {
            //     return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'axisblues']);
            // }
            // if($contactDetails->page_reference == 'yogvillas')
            // {
            //     return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'yogvillas']);
            // }
            // if($contactDetails->page_reference == 'lakecity')
            // {
            //     return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'lakecity']);
            // }
            // if($contactDetails->page_reference == 'kncj')
            // {
            //     return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'kncj']);
            // }
            // if($contactDetails->page_reference == 'lakecityplaza')
            // {
            //     return response(['status'=>1,'msg'=>'Thank you for contacting us.','download_page'=>'lakecityplaza']);
            // }
            // else if($contactDetails->page_reference == 'contact'){
            //     return response(['status'=>1,'msg'=>'Thank you for contacting us.']);
            // }else{
            //     return response(['status'=>1,'msg'=>'Thank you for contacting us.']);
            // } 
             
        }else
        {
            \Session::flash('success-msg', 'Oops, Something went wrong.'); 
            return response(['status'=>0,'msg'=>'Otp is not verified. Please enter correct otp.']);
        }
    }

    public function sendDatatoSellDo($data)
    {
        /**** Old Code Array for form id's *******/
        // $formid = array('contact'       => '5f6b62a17c0dac565586db45',
        //                 'enquiry'       => '5f6b62a17c0dac565586db45',
        //                 'axisblues'     => '601d2ca0a6bbc91170d665df',
        //                 'yogvillas'     => '601d2d3fa6bbc94d8bebcc56',
        //                 'lakecity'      => '601d2d89a6bbc94533c175c0',
        //                 'lakecityplaza' => '60656a11a6bbc9180afb394f',
        //                 'kncj'      => '601d2dc7a6bbc94a42f66841',
        //                 'yogvillas_ad' => '6024df43c8256104a19fa4a8',
        //                 'yogvillas_campaign_four' => '604a06ff4443ae142e8f028f',
        //                 'lakecityplazaemailer' => '60713bcfc82561544e8352e3',
        //                 'gunjan_emailer' => '60939abac8256128484fe04d',
        //                 'yogvillasPromo19May2021' => '60a3a360a6bbc91917486192',
        //                 'location_advantage_reminder' => '60a79668a6bbc90783927d32',
        //                 'emailer_jyoti' => '60b1e716c8256142caa86c9c',
        //                 'Yogvillas_Emailer_28_May_21' => '60b5ed4ea6bbc90dee4580b9',
        //                 'lakecityplaza_emailer_4_Jun_21' => '60b5ed4ea6bbc90dee4580b9',
        //                 'Yogvillas_emailer_5_june_2021' => '60b5eb88a6bbc90dee457fcc',
        //                 'lake-city-plaza-emailer-7-Jun-21' => '60b5ece5a6bbc90dd8458396',
        //                 'axisblues_application_form' => '60bdb3cac825615382d5f685',
        //                 'yogvillas_application_form' => '60bdb454c8256143d7564596',
        //                 'lakecity_application_form' => '60bdb494c8256140675d6fc4',
        //                 'lakecityplaza_application_form' => '60bdb7aec825612c14f0c093',
        //                 'kncj_application_form' => '60bdb752c825615e1e2e4602',
        //                 'YogVillas_Emailer_8_Jun_21' => '60b5eb88a6bbc90dee457fcc',
        //                 'lake-city-plaza-emailer-9-jun-21' => '60b5ed4ea6bbc90dee4580b9',
        //                 'YogVillas_Emailer_12_Jun_21' => '60a7a6dea6bbc90783928df0',
        //                 'YogVillas_Emailer_14_Jun_21' => '60b5eb88a6bbc90dee457fcc',
        //                  );
        // if(array_key_exists($data['page_reference'], $formid))
        // {
        //     $form_id = $formid[$data['page_reference']];
        // }else{
        //      $form_id = '5f6b62a17c0dac565586db45';
        // }

        // if($data['page_reference'] == 'yogvillas_ad'){
        //     $srd_id = '60310fdfa6bbc937ca6c7e90';
        // }else if($data['page_reference'] == 'yogvillas_campaign_four'){
        //     $srd_id = $data->srd_id;
        // }else if($data['page_reference'] == 'lakecityplazaemailer'){
        //     $srd_id = '60714c37ed23e9745e04d377';
        // }else if($data['page_reference'] == 'gunjan_emailer'){
        //     $srd_id = '6093cfb8ed23e95f42b37369';
        // }else if($data['page_reference'] == 'yogvillasPromo19May2021'){
        //     $srd_id = '60a4c2774443ae32285d8d58';
        // }else if($data['page_reference'] == 'location_advantage_reminder'){
        //     $srd_id = '60a7a713a6bbc90783928e10';
        // }else if($data['page_reference'] == 'emailer_jyoti'){
        //     $srd_id = '60b1f323c8256142eaa86d8c';
        // }else if($data['page_reference'] == 'Yogvillas_Emailer_28_May_21'){
        //     $srd_id = '60b5f38ced23e96e620b5935';
        // }else if($data['page_reference'] == 'lakecityplaza_emailer_4_Jun_21'){
        //     $srd_id = '60b5f38ced23e96e620b5935';
        // }else if($data['page_reference'] == 'Yogvillas_emailer_5_june_2021'){
        //     $srd_id = '60b5f23aed23e96e2f0b618b';
        // }else if($data['page_reference'] == 'lake-city-plaza-emailer-7-Jun-21'){
        //     $srd_id = '60b5f330ed23e96ec40b3fd3';
        // }else if($data['page_reference'] == 'YogVillas_Emailer_8_Jun_21'){
        //     $srd_id = '60b5f23aed23e96e2f0b618b';
        // }else if($data['page_reference'] == 'lake-city-plaza-emailer-9-jun-21'){
        //     $srd_id = '60b5f38ced23e96e620b5935';
        // }else if($data['page_reference'] == 'YogVillas_Emailer_12_Jun_21'){
        //     $srd_id = '60a7a713a6bbc90783928e10';
        // }else if($data['page_reference'] == 'YogVillas_Emailer_14_Jun_21'){
        //     $srd_id = '60b5f23aed23e96e2f0b618b';
        // }else{
        //     $srd_id = $form_id;
        // }


        /************New code for selldo forms data*********/
        $form_data = DB::table('tbl_selldo_reference')->where('page_reference',$data['page_reference'])->first();
        $form_id = $form_data->form_id;
        $srd_id = $form_data->srd_id;
        
        /* if srd get from url of fb and google campaign */
        if(isset($data->srd_id)){
            $srd_id = $data->srd_id;
        }
        /****** End new code ******/
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

        
        /****** old code array for getting emailer references *********/
        // $emailer_campaing = ['lakecityplazaemailer',
        //                      'gunjan_emailer',
        //                      'location_advantage_reminder',
        //                      'emailer_jyoti',
        //                      'Yogvillas_Emailer_28_May_21',
        //                      'lakecityplaza_emailer_4_Jun_21',
        //                      'Yogvillas_emailer_5_june_2021',
        //                      'lake-city-plaza-emailer-7-Jun-21',
        //                      'YogVillas_Emailer_8_Jun_21',
        //                      'lake-city-plaza-emailer-9-jun-21',
        //                      'YogVillas_Emailer_12_Jun_21',
        //                      'YogVillas_Emailer_14_Jun_21'
        //                     ];

        /*New code for getting emailer references */
        $emailer_campaing = DB::table('tbl_selldo_reference')->where('form_type','emailer')->where('is_active',1)->pluck('page_reference');

        if($result && in_array($data['page_reference'], $emailer_campaing) == false)
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



	public function contactusavenue(Request $request){
		// foreach ($_POST as $key => $value) {
			// echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
		// }
		
		if(isset($_POST['submit'])){
			
			//$toemailid = "ashish3409@gmail.com"; // this is your Email address
			$toemailid = "info@axisecorp.com"; // this is your Email address
			$from = $_POST['email']; // this is the sender's Email address
			$emailname = "Admin";
			$fromname = $_POST['name'];
			$last_name = "";
			$phone = $_POST['tel'];
			$size = $_POST['size'];
			$subject = "Form submission";
			$subject2 = "Copy of your form submission";
			$message1 = "Name: " .$fromname . " " . "\n\n" ."Email: " . $from . " ". "\n\n"  ."Phone: " . $phone . " " . "\n\n" ."Plot Size: " . $size . " " . "\n\n" ;
			$message2 = "Here is a copy of your message " . $fromname . "\n\n";

			$headers = "From:" . $from;
			$headers2 = "From:" . $toemailid;
			
			 try{
				 
				 
				 $backup = Mail::getSwiftMailer();
				// $transport = Swift_SmtpTransport::newInstance('mail.axisecorp.com', 25, '');
				// $transport->setusername('info@axisecorp.com');
				// $transport->setPassword('1nf0@x1$c0rp');
				$transport = Swift_SmtpTransport::newInstance('smtp.ionos.com', 25, 'tls');
				$transport->setUsername('no-reply@emailer.axisecorp.com');
				$transport->setPassword('N0jd84yfhKDUID(E$839439');
				
				$gmail = new Swift_Mailer($transport);
				Mail::setSwiftMailer($gmail);
				 
				$mail = Mail::send([], [], function ($message) use ($toemailid, $emailname, $subject, $from, $fromname, $message1) {
					$message->from($from, $fromname);
					$message->to($toemailid, $emailname);
					$message->subject($subject);
					$message->setBody($message1, 'text/html'); // for HTML rich messages
				});
			   
			   return redirect('sucesss');
			}catch(Exception $e){
				return response()->json(['status'=>400,'message'=>'Something went wrong.']);
			}

		}
		
    }
	
	
	
	public function mailTest($mail)
    {   // https://opm.axisecorp.com/cron/mail-test/ashish3409@gmail.com
        $toname = "Test";
        $subject = "Test Mail Subject";
        $from = "no-reply@emailer.axisecorp.com";
        $fromname = "Test Mailer";
        $content = "<h1>Woohoo!! It's Working.</h1>";
        try {

            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            // Setup your gmail mailer
            // $transport = Swift_SmtpTransport::newInstance('smtp.office365.com', 587, 'tls');
            // $transport->setUsername('info@axisecorp.com');
            // $transport->setPassword('HSDEma1l547833#200122');
			
			$transport = Swift_SmtpTransport::newInstance('smtp.ionos.com', 25, 'tls');
            $transport->setUsername('no-reply@emailer.axisecorp.com');
            $transport->setPassword('N0jd84yfhKDUID(E$839439');
            // Any other mailer configuration stuff needed...
            $gmail = new Swift_Mailer($transport);
            // Set the mailer as gmail
            Mail::setSwiftMailer($gmail);

            $mail = Mail::send([], [], function ($message) use ($mail, $toname, $subject, $from, $fromname, $content) {

                $message->from($from, $fromname);
                $message->to($mail, $toname);
                $message->subject($subject);
                $message->setBody($content, 'text/html'); // for HTML rich messages
            });

            //dd($mail);die();
            if ($mail) {
                print_r('200-----' . $mail);
            } else {
                print_r('404-----' . $mail);
            }

            // Restore your original mailer
            Mail::setSwiftMailer($backup);

        } catch (Exception $e) {
            Mail::setSwiftMailer($backup);
            print_r('404-----' . $e->getMessage());
        }
    }
	
	
	
	

}

