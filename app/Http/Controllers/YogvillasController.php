<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Validator;
use Mail;
use Exception;
use Redirect;
use DateTime;
use CommonHelper; 

class YogvillasController extends Controller
{
	public function getClientIP()
	{ 
		if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){ 
			return explode(':',$_SERVER["HTTP_X_FORWARDED_FOR"]); 
		}else if (array_key_exists('REMOTE_ADDR', $_SERVER)) { 
			return explode(':',$_SERVER["REMOTE_ADDR"]); 
		}else if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) { 
			return explode(':',$_SERVER["HTTP_CLIENT_IP"]); 
		} 
		return ''; 
	}
	public function createEnquiryLeads(Request $request)
	{
		$formData = $request->all();
		
		$validator = Validator::make($request->all(), [
            'contact_name' => 'required',
            'contact_email'		 => 'required|email',
            'contact_phone'	 => 'required|min:10'
        ]);
        $ipaddress=$this->getClientIP();
		if(!$validator->fails()){
			$enquiryData['name'] = $formData['contact_name'];
			$enquiryData['phone'] = $formData['contact_phone'];
			$enquiryData['email'] = $formData['contact_email'];
			$enquiryData['comments'] = $formData['contact_comment'];
			$enquiryData['utm_source'] = $formData['utm_source'];
			$enquiryData['utm_campaign'] = $formData['utm_campaign'];
			$enquiryData['utm_medium'] = $formData['utm_medium'];
			$enquiryData['ip_address'] = $ipaddress[0];
			$enquiryData['added_date'] = date('d-m-Y');
			$getUserID = DB::table('enquiry_now_leads')->insertGetId($enquiryData);
			if($getUserID){
				//$to='chetan.j@amuratech.com';
				$to='info@axisblues.com';	 
				$data=['contact_name'=>$formData['contact_name'],'contact_phone'=>$formData['contact_phone'],'contact_email'=>$formData['contact_email'],'contact_comment'=>$formData['contact_comment'],'utm_source'=>$formData['utm_source'],'utm_campaign'=>$formData['utm_campaign'],'utm_medium'=>$formData['utm_medium'],'added_date'=>$enquiryData['added_date']];
				//Mail to admin
				$mail = Mail::send('emails.yogvillasenquiryleads', ['data' => $data], function ($m) use ($to) {
					$m->from('info@axisblues.com', 'Yogvillas');
					$m->to($to)->subject('The new enquiry lead, found from Yogvillas');
				}); 
				//Mail to Customer
				$customerEmail=$formData['contact_email'];
				$mail = Mail::send('emails.yogvillasenquiryleadstocustomer', ['data' => $data], function ($m) use ($customerEmail) {
					$m->from('info@axisblues.com', 'Yogvillas');
					$m->to($customerEmail)->subject('Thankyou for Registration with Yogvillas');
				}); 
				return 'success'; 
			} else {
				return 'fail'; 
			}
		}else {
			return 'error'; 
		}
	}
	
	public function createScheduleSiteVisit(Request $request)
	{
		$formData = $request->all();
		
		$validator = Validator::make($request->all(), [
            'schedule_name' => 'required',
            'schedule_email'		 => 'required|email',
            'schedule_phone'	 => 'required|min:10'
        ]);
        $ipaddress=$this->getClientIP();
		if(!$validator->fails()){
			$enquiryData['name'] = $formData['schedule_name'];
			$enquiryData['phone'] = $formData['schedule_phone'];
			$enquiryData['email'] = $formData['schedule_email'];
			$enquiryData['visit_date'] = $formData['schedule_date'];
			$enquiryData['comments'] = $formData['schedule_comment'];
			$enquiryData['utm_source'] = $formData['schedule_utm_source'];
			$enquiryData['utm_campaign'] = $formData['schedule_utm_campaign'];
			$enquiryData['utm_medium'] = $formData['schedule_utm_medium'];
			$enquiryData['ip_address'] = $ipaddress[0];
			$enquiryData['added_date'] = date('d-m-Y');
			$getUserID = DB::table('schedule_site_visit')->insertGetId($enquiryData);
			if($getUserID){
				//$to='chetan.j@amuratech.com';
				$to='info@axisblues.com';		 
				$data=['schedule_name'=>$formData['schedule_name'],'schedule_phone'=>$formData['schedule_phone'],'schedule_email'=>$formData['schedule_email'],'visit_date'=>$formData['schedule_date'],'schedule_comment'=>$formData['schedule_comment'],'schedule_utm_source'=>$formData['schedule_utm_source'],'schedule_utm_campaign'=>$formData['schedule_utm_campaign'],'schedule_utm_medium'=>$formData['schedule_utm_medium'],'added_date'=>$enquiryData['added_date']];
				//Mail to Admin
				$mail = Mail::send('emails.yogvillaschedulesitevisit', ['data' => $data], function ($m) use ($to) {
					$m->from('info@axisblues.com', 'Yogvillas');
					$m->to($to)->subject('The new schedule for a site visit found from Yogvillas');
				}); 
				//Mail to Customer
				$customerEmail=$formData['schedule_email'];
				$mail = Mail::send('emails.yogvillaschedulesitevisittocustomer', ['data' => $data], function ($m) use ($customerEmail) {
					$m->from('info@axisblues.com', 'Yogvillas');
					$m->to($customerEmail)->subject('Congratulations! Your site visit is scheduled with Yogvillas');
				}); 
				return 'success'; 
			} else {
				return 'fail'; 
			}
		}else {
			return 'error'; 
		}
	}
	
	public function createWebsiteEnquiry(Request $request)
	{
		$formData = $request->all();
		$validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'contact_email'		 => 'required|email',
            'contact_phone'	 => 'required|min:10',
            'contact_remark' => 'required'
        ]);
        $ipaddress=$this->getClientIP();
		if(!$validator->fails()){
			$enquiryData['name'] = $formData['full_name'];
			$enquiryData['phone'] = $formData['contact_phone'];
			$enquiryData['email'] = $formData['contact_email'];
			$enquiryData['remarks'] = $formData['contact_remark'];
			$enquiryData['ip_address'] = $ipaddress[0];
			$enquiryData['added_date'] = date('d-m-Y');
			$getUserID = DB::table('enquiry_site_visit')->insertGetId($enquiryData);
			//$to='chetan.j@amuratech.com';
			$to='info@eejak.com';	 
			$data=['full_name'=>$formData['full_name'],'contact_phone'=>$formData['contact_phone'],'contact_email'=>$formData['contact_email'],'contact_remark'=>$formData['contact_remark'],'added_date'=>date('d-m-Y')];
			//Mail to admin
			$mail = Mail::send('emails.websiteenquiryleads', ['data' => $data], function ($m) use ($to) {
				$m->from('info@axisblues.com', 'Axis Ecorp');
				$m->to($to)->subject('The new enquiry lead, found from Axis Ecorp');
			}); 
			return 'success'; 
		}else {
			return 'error'; 
		}
	}
}
