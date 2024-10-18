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

    public function contact(request $request){
        Contact::create([
            'name' => $request->txtName,
            'phone' => $request->txtPhone,
            'email' => $request->txtEmail,
            'subject' => $request->txtSubject,
            'message' => $request->txtMsg
        ]);

        $toemailid = 'info@axisecorp.com';
        $emailname = 'Axis Ecorp';
        $subject = 'Contact Us Mail';
        $from = 'info@eejak.com';
        $fromname = 'Axis Ecorp';
        $content = "<h3>From: $request->txtEmail</h3>";
        $content .= "<p>Name: $request->txtName</p>";
        $content .= "<p>Subject: $request->txtSubject</p>";
        $content .= "<p>Phone: $request->txtPhone</p>";
        $content .= "<p>Message: $request->txtMsg</p>";
 
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
                \Session::flash('error-msg', 'Something went wrong.');
                return Redirect()->back();
            }
        }catch(Exception $e){
            \Session::flash('error-msg', 'Something went wrong.');
            return Redirect()->back();
        }
        
        \Session::flash('success-msg', 'Thanks For Contacting us');
        return Redirect()->back();
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

