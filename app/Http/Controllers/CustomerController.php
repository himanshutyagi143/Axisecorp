<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Hash;
use PDF;
use Validator;
use Mail;
use App\User;
use Exception;
use Redirect;
use Auth;
use File;
use App\Models\Project;
use App\Models\UserDetail;
use App\Models\UserKyc;
use App\Models\Media;   
use App\Models\AssignProject;   
use App\Models\ProjectBlocks;   
use App\Models\BlockFloors;   
use App\Models\FloorUnit;   
use App\Models\UnitDetails;   
use App\Models\VendorInvite;   
use App\Models\PaymentPlan;   
use App\Models\PlanComponent; 
use App\Models\UserPlanComponent;
use App\Models\PaymentDetails;
use App\Models\VendorProject;
use App\Models\Ticket;
use App\Models\TicketSubject;
use App\Models\CrmCall;
use App\Models\CustomerAddressDetails;
use App\Models\CustomerDetails;
use App\Models\CustomerKyc;
use App\Models\Leads;
use DateTime;
use CommonHelper; 
use App\Models\TempCustomer;
use App\Models\TempCustomerAddressDetails;
use App\Models\TempCustomerDetails;
use App\Models\TempCustomerKyc;
use App\Helpers\Mailnotification;

class CustomerController extends Controller
{
   public function customersApproval(Request $request){
   	$id=$request->input('id');
   	$getUserData = DB::table('users')->where('id',$id)->first();
		if($getUserData->confirmed == 1){
			$updateStatus = DB::table('users')->where('id',$id)->update(['confirmed' => 0, 'updated_at' => date('y-m-d')]);
			return response()->json(['message' => 'success', 'confirmed' => 0]);
		}
		elseif($getUserData->confirmed == 0){
			$updateStatus = DB::table('users')->where('id', '=', $id)->update(['confirmed' => 1, 'updated_at' => date('y-m-d')]);
			return response()->json(['message' => 'success', 'confirmed' => 1]);
		}
		else{
			return response()->json(['message' => 'failure']);
		}  					
    }
    public function deletecustomerdoc(){
	    $id = Input::get('id');
		$imagelist=UserKyc::where("media_id","=",$id)->delete();
        return $id;
        
    }
     public function createCustomer(){
	 $document_type = DB::table('kyc_type')->get();
        return view('customer.create_customer',['document_type'=>$document_type]);
        
    }
    public function store(Request $request)
    {  
	   /* $id= '577';
		$client_email="ravi@gmail.com";
		$document_type='';
		
	     return view('customer.second_applicant',['client_id'=> $id,'email'=> $client_email,'document_type'=>$document_type]); */
	
	
	     $userData= $request->all();
		
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            //'email'		 => 'required|email|unique:users',
            'password'	 => 'required|min:6',
            'address' 	 => 'required',
			'dob'        => 'required',
		//'pancard_number' => 'required',
            'zip'	  	 => 'required',
			'address'	 => 'required',
            'city'		 => 'required',
            'state'		 => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
				
        }

        $second_applicant = Input::get('second_applicant');
		//For User Registration Without Booking Unit...
		
        $client_fname      = Input::get('first_name');
		$client_lname      = Input::get('last_name');		
        $client_email      = Input::get('email');
        $client_password   = trim(Input::get('password'));
        $client_mobile      = Input::get('mobile');
		$client_landline     = Input::get('landline');
		$father_husband_name  = Input::get('father_husband_name');
		$dob                    = Input::get('dob');		 
	    //$pancard_number         = Input::get('pancard_number');
		$father_husband_mobile  = Input::get('father_husband_mobile');
		$father_husband_landline = Input::get('father_husband_landline');  
		$marital_status          =Input::get('marital');
	    $spouse_name             = Input::get('spouse_name');
		$if_foreigner            = Input::get('foreigner');
		$foreigner_country       = Input::get('foreigner_country');	
        $if_poa                  = Input::get('nopoa');		
		$poa_name                = Input::get('poa_name');		      
        $zip                     = Input::get('zip');
		$address                 = Input::get('address');
        $city                    = Input::get('city');
        $state                   = Input::get('state');		
		$permanentpincode        = Input::get('permanentpincode');
		$permanentaddress        = Input::get('permanentaddress');
        $permanentcity           = Input::get('permanentcity');
        $permanentstate          = Input::get('permanentstate');		
		$organisation_business_name  = Input::get('organisation_business_name');
		$designation          = Input::get('designation');
		$organisation_type          = Input::get('organisation_type');
		$organisation_phone          = Input::get('organisation_phone');
		$organisation_extension          = Input::get('organisation_extension');		
		$organisation_zip        = Input::get('organisation_zip');
		$org_address             = Input::get('org_address');
		$organisationcity        = Input::get('organisationcity');
		$organisationstate       = Input::get('organisationstate');	
        $Project             = Input::get('Project');
        $role                    = Input::get('role');
		$confirmed               = Input::get('confirmed');
        $confirmation_code       = str_random(30);
        $hashed                  = Hash::make($client_password);
				
		 $id      = DB::table('users')->insertGetId(['role'=>8,'email' => $client_email,'password' => $hashed,'confirmation_code' => $confirmation_code,'created_by'=>Auth::user()->id??0,'company_id'=>isset(Auth::user()->company_id)?Auth::user()->company_id:0,'company_type_id'=>isset(Auth::user()->company_type_id)?Auth::user()->company_type_id:0,'confirmed'=> 0]);
		 
		 if ($request->hasFile('image_profile')) {
				 $file = $request->file('image_profile');
				 $extension = $file->getClientOriginalExtension();
				 $image_pro = uniqid() . '_doc.' . $extension;
				 $destinationPath = public_path('assets/userprofile');
				 $file->move($destinationPath, $image_pro);
				 $image_pro_name = '/assets/userprofile/' . $image_pro;
			  }
		 else{$image_pro_name='';}
		 
		 $user_detail_id=DB::table('user_details')->insertGetId(['user_id'=> $id,'first_name'=>$client_fname,'last_name'=>$client_lname,'mobile_number'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,
		 'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,		 
		 'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation ,
		 'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone ,'organisation_extention'=>$organisation_extension,'applicant_type'=>'1','created_by'=>Auth::user()->id??0]) ;
		
		 
		 $user_address_correspondence=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>1,'address_line'=>$address,'pin_code'=> $zip ,'city'=>$city ,'state'=> $state]);
		 $user_address_permanent=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>2,'address_line'=>$permanentaddress,'pin_code'=> $permanentpincode ,'city'=>$permanentcity ,'state'=> $permanentstate]);
		 
		 $user_address_business=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>3,'address_line'=>$org_address,'pin_code'=>$organisation_zip ,'city'=>$organisationcity ,'state'=> $organisationstate]);
		 
	
	     $destinationPath= public_path('assets/kyc');
		 //$document_type = DB::table('kyc_type')->get();

		 
		 	for($i=1; $i<=10; $i++)
		 	{	
			if ($request->hasFile('profileImg_'.$i)) {  	
				$kyc_type_id= Input::get('mySelect_'.$i);
				$description = Input::get('desc_'.$i);
				$pancardNumberKyc = Input::get('pancardNumberKyc_'.$i);
				$adharNumberKyc = Input::get('adharNumberKyc_'.$i);
				$voterIdKyc = Input::get('voterIdKyc_'.$i);
				$dobKyc = Input::get('dobKyc_'.$i);
				$passportNumberKyc = Input::get('passportNumberKyc_'.$i);
				$passportIssueBy = Input::get('passportIssueBy_'.$i);
				$file=$request->file('profileImg_'.$i);
				$extension = $file->getClientOriginalExtension();
				$name = uniqid() . '_doc.' . $extension;
				$file->move($destinationPath, $name);
				$filename = '/assets/kyc/' . $name;
				$media_id = Media::insertGetId(['media_name' => $filename]);
				
			  $check=UserKyc::where('user_id', '=', $id)->where('kyc_type_id', '=', $kyc_type_id)->first();
			    if($check)
			    {
					$media_id = UserKyc::where('user_id','=', $id)->where('kyc_type_id', '=',$kyc_type_id)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>'1']);
			    }
				else
				{
				$media_id = UserKyc::insertGetId(['media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'user_id'=>$id,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>'1']);
				}
			}	
		} 
			
		 $user_fname= $client_fname;
		 $user_lname= $client_lname;
		 $path = $_SERVER["HTTP_HOST"]."/register/verify/".$confirmation_code;
		 $to= $client_email;
         $subject = "Email Verification.";		 
		 $data=['path'=>$path,'user_fname'=>$user_fname,'user_lname'=>$user_lname,'username'=>$client_email,'password'=>$client_password];
		 $user =$to;            		
			$mail = Mail::send('emails.userregistration', ['data' => $data], function ($m) use ($user) {
             $m->from('no-reply@stagingrelease.com', 'Email Verification');
             $m->to($user)->subject('Email Verification');
           });
		if($mail){
			$emailData['send_to']   = $client_email;
			$emailData['send_by']   = "no-reply@stagingrelease.com";
			$emailData['sender_id'] = Auth::user()->id;
			$emailData['subject']   = $subject;
			$emailData['body']      = view('emails.userregistration', ['data' => $data])->render();
			$emailData['send_date'] = date('Y-m-d');
			$insertEmailDetails = DB::table('send_mail')->insert($emailData);
			
			$document_type = DB::table('kyc_type')->get();
			   if($second_applicant == '1'){
				  \Session::flash('success-msg-registered', 'Your First Applicant Created! Please check your email and Enter Second Applicant detail.');
			      return view('customer.second_applicant',['client_id'=> $id,'email'=> $client_email,'document_type'=>$document_type]); 
			     }
			   else{
				   \Session::flash('success-msg-registered', 'Thanks for signing up! Please check your email.');
			        return redirect()->back(); 
			     }	
		  }
		else{
			\Session::flash('success-msg-registered', 'Email not sent.');
			return redirect()->back();
		} 
    }

    public function create_second_applicant(Request $request)	
     {
				
		$userData= $request->all();
		
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
           // 'email'		 => 'required|email|unique:users',
           // 'password'	 => 'required|min:6',
            'address' 	 => 'required',
			'dob'        => 'required',
            'zip'	  	 => 'required',
			'address'	 => 'required',
            'city'		 => 'required',
            'state'		 => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
				
        }
	
		
       // $second_applicant = Input::get('second_applicant');
		//For User Registration Without Booking Unit...
		 $id = Input::get('u_id');
        $client_fname      = Input::get('first_name');
		$client_lname      = Input::get('last_name');		
        $client_email      = Input::get('email');
       // $client_password   = trim(Input::get('password'));
        $client_mobile      = Input::get('mobile');
		$client_landline     = Input::get('landline');
		$father_husband_name  = Input::get('father_husband_name');
		$dob                    = Input::get('dob');
		$father_husband_mobile  = Input::get('father_husband_mobile');
		$father_husband_landline = Input::get('father_husband_landline');  
		$marital_status          =Input::get('marital');
	    $spouse_name             = Input::get('spouse_name');
		$if_foreigner            = Input::get('foreigner');
		$foreigner_country       = Input::get('foreigner_country');	
        $if_poa                  = Input::get('nopoa');		
		$poa_name                = Input::get('poa_name');		      
        $zip                     = Input::get('zip');
		$address                 = Input::get('address');
        $city                    = Input::get('city');
        $state                   = Input::get('state');		
		$permanentpincode        = Input::get('permanentpincode');
		$permanentaddress        = Input::get('permanentaddress');
        $permanentcity           = Input::get('permanentcity');
        $permanentstate          = Input::get('permanentstate');		
		$organisation_business_name  = Input::get('organisation_business_name');
		$designation          = Input::get('designation');
		$organisation_type          = Input::get('organisation_type');
		$organisation_phone          = Input::get('organisation_phone');
		$organisation_extension          = Input::get('organisation_extension');		
		$organisation_zip        = Input::get('organisation_zip');
		$org_address             = Input::get('org_address');
		$organisationcity        = Input::get('organisationcity');
		$organisationstate       = Input::get('organisationstate');	
        $Project             = Input::get('Project');
        $role                    = Input::get('role');
		$confirmed               = Input::get('confirmed');
        $confirmation_code       = str_random(30);
       // $hashed                  = Hash::make($client_password);
				
		
		 
		 if ($request->hasFile('image_profile')) {
				 $file = $request->file('image_profile');
				 $extension = $file->getClientOriginalExtension();
				 $image_pro = uniqid() . '_doc.' . $extension;
				 $destinationPath = public_path('assets/userprofile');
				 $file->move($destinationPath, $image_pro);
				 $image_pro_name = '/assets/userprofile/' . $image_pro;
			  }
		 else{$image_pro_name='';}
		 
		 $user_detail_id=DB::table('user_details')->insertGetId(['user_id'=> $id,'first_name'=>$client_fname,'last_name'=>$client_lname,'mobile_number'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,
		 'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,		 
		 'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation ,
		 'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone ,'organisation_extention'=>$organisation_extension,'applicant_type'=>'2','created_by'=>Auth::user()->id??0]) ;
		
		 
		 $user_address_correspondence=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>1,'applicant_type'=>2,'address_line'=>$address,'pin_code'=> $zip ,'city'=>$city ,'state'=> $state]);
		 $user_address_permanent=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>2,'applicant_type'=>2,'address_line'=>$permanentaddress,'pin_code'=> $permanentpincode ,'city'=>$permanentcity ,'state'=> $permanentstate]);
		 
		 $user_address_business=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>3,'applicant_type'=>2,'address_line'=>$org_address,'pin_code'=>$organisation_zip ,'city'=>$organisationcity ,'state'=> $organisationstate]);
		 
	
	     $destinationPath= public_path('assets/kyc');
		 //$document_type = DB::table('kyc_type')->get();
		 	for($i=1; $i<=10; $i++)
		 	{	

			if ($request->hasFile('profileImg_'.$i)) { 
				$kyc_type_id= Input::get('mySelect_'.$i);
				$description = Input::get('desc_'.$i);
				$pancardNumberKyc = Input::get('pancardNumberKyc_'.$i);
				$adharNumberKyc = Input::get('adharNumberKyc_'.$i);
				$voterIdKyc = Input::get('voterIdKyc_'.$i);
				$dobKyc = Input::get('dobKyc_'.$i);
				$passportNumberKyc = Input::get('passportNumberKyc_'.$i);
				$passportIssueBy = Input::get('passportIssueBy_'.$i);
				$file=$request->file('profileImg_'.$i);
				$extension = $file->getClientOriginalExtension();
				$name = uniqid() . '_doc.' . $extension;
				$file->move($destinationPath, $name);
				$filename = '/assets/kyc/' . $name;
				$media_id = Media::insertGetId(['media_name' => $filename]);
				
			  //$check=UserKyc::where('user_id', '=', $id)->where('kyc_type_id', '=', $kyc_type_id)->first();
			 //    if($check)
			 //    {
				// 	$media_id = UserKyc::where('user_id','=', $id)->where('kyc_type_id', '=', $kyc_type_id)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>'2']);
			 //    }
				// else
				// {

				// }
								$media_id = UserKyc::insertGetId(['media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'user_id'=>$id,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>'2']);
			}	
		}  
			
		 $user_fname= $client_fname;
		 $user_lname= $client_lname;
		 $path = $_SERVER["HTTP_HOST"]."/register/verify/".$confirmation_code;
		 $to= $client_email;
         $subject = "Email Verification.";		 
		 $data=['path'=>$path,'user_fname'=>$user_fname,'user_lname'=>$user_lname,'username'=>'','password'=>''];
		 $user =$to;            		
			$mail = Mail::send('emails.userregistration', ['data' => $data], function ($m) use ($user) {
             $m->from('no-reply@stagingrelease.com', 'Second Email is generated Succesfully');
             $m->to($user)->subject('Email Verification');
           });
		if($mail){
			$emailData['send_to']   = $client_email;
			$emailData['send_by']   = "no-reply@stagingrelease.com";
			$emailData['sender_id'] = Auth::user()->id;
			$emailData['subject']   = $subject;
			$emailData['body']      = view('emails.userregistration', ['data' => $data])->render();
			$emailData['send_date'] = date('Y-m-d');
			$insertEmailDetails = DB::table('send_mail')->insert($emailData);   
				   \Session::flash('success-msg-registered', 'Second Applicant Created Succesfully');
			        return redirect()->back(); 
			     	
		  }
		else{
			\Session::flash('success-msg-registered', 'Email not sent.');
			return redirect()->back();
		}
		
		
		
		
		 
	 }
	 
	 /* public function create_invite_firstuser(Request $request)
      { 	 
	      $userData= $request->all();
			

		   $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'email'		 => 'required|email|unique:users',
            'password'	 => 'required|min:6',
			'dob'        => 'required',
            'zip'	  	 => 'required',
			'address'	 => 'required',
            'city'		 => 'required',
            'state'		 => 'required'
        ]);

        if ($validator->fails()) {    
         return response()->json($validator->messages(), 200);
         } 					


		$link      = Input::get('link');
        $client_fname      = Input::get('first_name');
		$client_lname      = Input::get('last_name');		
        $client_email      = Input::get('email');
        $client_password   = trim(Input::get('password'));
        $client_mobile      = Input::get('mobile');
		$client_landline     = Input::get('landline');
		$father_husband_name  = Input::get('father_husband_name');
		$dob                    = Input::get('dob');		 
		$father_husband_mobile  = Input::get('father_husband_mobile');
		$father_husband_landline = Input::get('father_husband_landline');  
		$marital_status          =Input::get('marital');
	    $spouse_name             = Input::get('spouse_name');
		$if_foreigner            = Input::get('foreigner');
		$foreigner_country       = Input::get('foreigner_country');	
        $if_poa                  = Input::get('nopoa');		
		$poa_name                = Input::get('poa_name');		      
        $zip                     = Input::get('zip');
		$address                 = Input::get('address');
        $city                    = Input::get('city');
        $state                   = Input::get('state');		
		$permanentpincode        = Input::get('permanentpincode');
		$permanentaddress        = Input::get('permanentaddress');
        $permanentcity           = Input::get('permanentcity');
        $permanentstate          = Input::get('permanentstate');		
		$organisation_business_name  = Input::get('organisation_business_name');
		$designation          = Input::get('designation');
		$organisation_type          = Input::get('organisation_type');
		$organisation_phone          = Input::get('organisation_phone');
		$organisation_extension          = Input::get('organisation_extension');		
		$organisation_zip        = Input::get('organisation_zip');
		$org_address             = Input::get('org_address');
		$organisationcity        = Input::get('organisationcity');
		$organisationstate       = Input::get('organisationstate');	
        $Project             = Input::get('Project');
        $role                    = Input::get('role');
		$confirmed               = Input::get('confirmed');
        $confirmation_code       = str_random(30);
        $hashed                  = Hash::make($client_password);
		$sender_id               = Input::get('sender_id');
		$company_id               = Input::get('company_id');
		
				Customer
		 $id      = DB::table('users')->insertGetId(['role'=>8,'email' => $client_email,'password' => $hashed,'confirmation_code' =>'' ,'created_by'=>$sender_id??0,'company_id'=>$company_id??0,'confirmed'=> 1]);
		 
		 if ($request->hasFile('image_profile')) {
				 $file = $request->file('image_profile');
				 $extension = $file->getClientOriginalExtension();
				 $image_pro = uniqid() . '_doc.' . $extension;
				 $destinationPath = public_path('assets/userprofile');
				 $file->move($destinationPath, $image_pro);
				 $image_pro_name = '/assets/userprofile/' . $image_pro;
			  }
		 else{$image_pro_name='';}
		 
		 $user_detail_id=DB::table('user_details')->insertGetId(['user_id'=> $id,'first_name'=>$client_fname,'last_name'=>$client_lname,'mobile_number'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,
		 'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,		 
		 'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation ,
		 'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone ,'organisation_extention'=>$organisation_extension,'applicant_type'=>'1',
		 'created_by'=>$sender_id??0]);
		
		 
		 $user_address_correspondence=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>1,'address_line'=>$address,'pin_code'=> $zip ,'city'=>$city ,'state'=> $state]);
		 $user_address_permanent=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>2,'address_line'=>$permanentaddress,'pin_code'=> $permanentpincode ,'city'=>$permanentcity ,'state'=> $permanentstate]);
		 
		 $user_address_business=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>3,'address_line'=>$org_address,'pin_code'=>$organisation_zip ,'city'=>$organisationcity ,'state'=> $organisationstate]);
		 $updateLinkStatus = VendorInvite::where('link', '=', $link)->update(['is_active' => 0]);
		 
		 $destinationPath= public_path('assets/kyc');
		 for($i=1; $i<=10; $i++)
		 	{	
			if ($request->hasFile('profileImg_'.$i)) { 
			   
				$kyc_type_id= Input::get('mySelect_'.$i);
				//echo $kyc_type_id;
				//die;
				$description = Input::get('desc_'.$i);
				$pancardNumberKyc = Input::get('pancardNumberKyc_'.$i);
				$adharNumberKyc = Input::get('adharNumberKyc_'.$i);
				$voterIdKyc = Input::get('voterIdKyc_'.$i);
				$dobKyc = Input::get('dobKyc_'.$i);
				$passportNumberKyc = Input::get('passportNumberKyc_'.$i);
				$passportIssueBy = Input::get('passportIssueBy_'.$i);
				$file=$request->file('profileImg_'.$i);
				$extension = $file->getClientOriginalExtension();
				$name = uniqid() . '_doc.' . $extension;
				$file->move($destinationPath, $name);
				$filename = '/assets/kyc/' . $name;
				$media_id = Media::insertGetId(['media_name' => $filename]);
				
			$check=UserKyc::where('user_id', '=', $id)->where('kyc_type_id', '=', $kyc_type_id)->first();
			    if($check)
			    {
					$media_id = UserKyc::where('user_id','=', $id)->where('kyc_type_id', '=',$kyc_type_id)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>'1']);
			    }
				else
				{
				$media_id = UserKyc::insertGetId(['media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'user_id'=>$id,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>'1']);
				}
			}	
		} 
		 
		 
		 
		 
		 
		if($user_detail_id){
			    $user_fname= $client_fname;
		        $user_lname= $client_lname;
		        $path = $_SERVER["HTTP_HOST"]."/register/verify/".$confirmation_code;
		        $to= $client_email;
                $subject = "Email Verification link.";		 
		        $data=['path'=>$path,'user_fname'=>$user_fname,'user_lname'=>$user_lname,'username'=>$client_email,'password'=>$client_password];
		        $user =$to;            		
			    $mail = Mail::send('emails.invite_userregistration', ['data' => $data], function ($m) use ($user) {
                $m->from('no-reply@stagingrelease.com', 'Email Verification Link');
                $m->to($user)->subject('Email Verification Link');
               });
			       if($mail){
							$emailData['send_to']   = $client_email;
							$emailData['send_by']   = "no-reply@stagingrelease.com";
							$emailData['sender_id'] = '0';
							$emailData['subject']   = $subject;
				            $emailData['body']      = view('emails.invite_userregistration', ['data' => $data])->render();
							$emailData['send_date'] = date('Y-m-d');
							$insertEmailDetails = DB::table('send_mail')->insert($emailData);
							 return response()->json(['message' => 'success', 'success_msg' => "First applicant created Successfully", 'user_id' =>$id,'client_email'=>$client_email,'client_password'=>$client_password ]);
						  }
						  
						else{
							return response()->json(['message' => 'failure', 'success_msg' => "First applicant Not Created."]);
						   }
				    return response()->json(['message' => 'success', 'success_msg' => "First applicant created Successfully", 'user_id' =>$id,'client_email'=>$client_email,'client_password'=>$client_password ]);
			    }
			else{
				 return response()->json(['message' => 'failure', 'success_msg' => "First applicant Not Created."]);
			   }   	 
	 
    }
	 */
	
  /*  public function create_invite_seconduser(Request $request)
      {          
	    $userData= $request->all();
	
		    $userid =Input::get('first_userid');
			
		    $validator = Validator::make($request->all(), [
            'first_name' => 'required',
			'dob'        => 'required',
            'zip'	  	 => 'required',
			'address'	 => 'required',
            'city'		 => 'required',
            'state'		 => 'required'
          ]);

          if ($validator->fails()) {    
           return response()->json($validator->messages(), 200);
          } 
				
       
        $client_fname      = Input::get('first_name');
		$client_lname      = Input::get('last_name');		
        $client_mobile      = Input::get('mobile');
		$client_landline     = Input::get('landline');
		$father_husband_name  = Input::get('father_husband_name');
		$dob                    = Input::get('dob');		 
	   // $pancard_number         = Input::get('pancard_number');
		$father_husband_mobile  = Input::get('father_husband_mobile');
		$father_husband_landline = Input::get('father_husband_landline');  
		$marital_status          =Input::get('marital');
	    $spouse_name             = Input::get('spouse_name');
		$if_foreigner            = Input::get('foreigner');
		$foreigner_country       = Input::get('foreigner_country');	
        $if_poa                  = Input::get('nopoa');		
		$poa_name                = Input::get('poa_name');		      
        $zip                     = Input::get('zip');
		$address                 = Input::get('address');
        $city                    = Input::get('city');
        $state                   = Input::get('state');		
		$permanentpincode        = Input::get('permanentpincode');
		$permanentaddress        = Input::get('permanentaddress');
        $permanentcity           = Input::get('permanentcity');
        $permanentstate          = Input::get('permanentstate');		
		$organisation_business_name  = Input::get('organisation_business_name');
		$designation          = Input::get('designation');
		$organisation_type          = Input::get('organisation_type');
		$organisation_phone          = Input::get('organisation_phone');
		$organisation_extension          = Input::get('organisation_extension');		
		$organisation_zip        = Input::get('organisation_zip');
		$org_address             = Input::get('org_address');
		$organisationcity        = Input::get('organisationcity');
		$organisationstate       = Input::get('organisationstate');	
		$second_sender_id       = Input::get('second_sender_id');	
		
				
		 $id  = $userid;
		 
		 if ($request->hasFile('second_image_profile')) {
				 $file = $request->file('second_image_profile');
				 $extension = $file->getClientOriginalExtension();
				 $image_pro = uniqid() . '_doc.' . $extension;
				 $destinationPath = public_path('assets/userprofile');
				 $file->move($destinationPath, $image_pro);
				 $image_pro_name = '/assets/userprofile/' . $image_pro;
			  }
		 else{$image_pro_name='';}
		 
		 $user_detail_id=DB::table('user_details')->insertGetId(['user_id'=> $id,'first_name'=>$client_fname,'last_name'=>$client_lname,'mobile_number'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,
		 'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,		 
		 'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation ,
		 'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone ,'organisation_extention'=>$organisation_extension,'applicant_type'=>'2','created_by'=>$second_sender_id??0]) ;
		
		 
		 $user_address_correspondence=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>1,'applicant_type'=>2,'address_line'=>$address,'pin_code'=> $zip ,'city'=>$city ,'state'=> $state]);
		 $user_address_permanent=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>2,'applicant_type'=>2,'address_line'=>$permanentaddress,'pin_code'=> $permanentpincode ,'city'=>$permanentcity ,'state'=> $permanentstate]);
		 
		 $user_address_business=DB::table('user_address_details')->insertGetId(['user_id'=>$id,
		 'address_type_id'=>3,'applicant_type'=>2,'address_line'=>$org_address,'pin_code'=>$organisation_zip ,'city'=>$organisationcity ,'state'=> $organisationstate]);
		 
		 
		$destinationPath= public_path('assets/kyc');
		 //$document_type = DB::table('kyc_type')->get();
		 	for($i=1; $i<=10; $i++)
		 	{	

			if ($request->hasFile('secondprofileImg_'.$i)) { 
				$kyc_type_id= Input::get('secondmySelect_'.$i);
				$description = Input::get('seconddesc_'.$i);
				$pancardNumberKyc = Input::get('secondpancardNumberKyc_'.$i);
				$adharNumberKyc = Input::get('secondadharNumberKyc_'.$i);
				$voterIdKyc = Input::get('secondvoterIdKyc_'.$i);
				$dobKyc = Input::get('seconddobKyc_'.$i);
				$passportNumberKyc = Input::get('secondpassportNumberKyc_'.$i);
				$passportIssueBy = Input::get('secondpassportIssueBy_'.$i);
				$file=$request->file('secondprofileImg_'.$i);
				$extension = $file->getClientOriginalExtension();
				$name = uniqid() . '_doc.' . $extension;
				$file->move($destinationPath, $name);
				$filename = '/assets/kyc/' . $name;
				$media_id = Media::insertGetId(['media_name' => $filename]);
				
								$media_id = UserKyc::insertGetId(['media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'user_id'=>$id,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>'2']);
			}	
		} 
		 
		 
		if($user_detail_id){
				return response()->json(['message' => 'success', 'success_msg' => "Second applicant created Successfully", 'user_id' =>$id ]);
			}
			else{
				return response()->json(['message' => 'failure', 'success_msg' => "second applicant Not Created."]);
			}   
			
	   
    } */
	 	 
	
	public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            \Session::flash('success-msg-registered', 'Link has been expired.');
			return redirect('/user_register');
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
			\Session::flash('success-msg-registered', 'Link has been expired.');
			return redirect('/user_register');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        \Session::flash('success-msg-registered', 'Successfully Registered');

        return redirect('/login');
    }


    public function show()
    {
			/*   if(\Auth::user()->role==1)
			  {
				  
				  $clients = DB::table('users')
				  ->join('user_details', function($on)
				  {
					  $on->on('users.id','=','user_details.user_id')->where('user_details.applicant_type','=',1);
					  
				  })->leftjoin('user_details as ud','users.created_by', '=', 'ud.user_id')
				  ->where('users.is_active','=',1)
				  ->where('users.role','=',8)
				  ->orderBy('users.id','desc')
				  ->select(DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),DB::raw('CONCAT( ud.first_name ," ",ud.last_name ) AS booked_by'),DB::raw('CONCAT(user_details.mobile_number) AS mobile_number'),'users.*')
				  ->get();  
				  
			  }
	        else
			{
				  $check_type = DB::table('assign_project')->where('user_id','=',\Auth::user()->id)->first();
				  if($check_type)
				  {
					  if($check_type->company_type_id==1)
					  {
                           
						   $clients = DB::table('users')
							  ->join('customer_details', function($on)
							  {
								  $on->on('users.id','=','customer_details.user_id')->where('customer_details.applicant_type','=',1);
								  
							  })->leftjoin('customer_details as ud','users.created_by', '=', 'ud.user_id')
							  ->where('users.is_active','=',1)
							  ->where('users.role','=',8)
							  ->orderBy('users.id','desc')
							  ->select(DB::raw('CONCAT(customer_details.first_name," ", customer_details.last_name) AS name'),DB::raw('CONCAT( ud.first_name ," ",ud.last_name ) AS booked_by'),'users.*','customer_details.phone as mobile_number')
							  ->get();  
                        
					  }
					  else
					  {
						 
						  $array=array();
						  $check_type = DB::table('assign_project')->where('company_id','=',\Auth::user()->company_id)->get();
						  foreach($check_type as $ctype)
						  {
							 $array[]= $ctype->user_id;
						  }

                             $clients = DB::table('users')
							  ->join('user_details', function($on)
							  {
								  $on->on('users.id','=','user_details.user_id')->where('user_details.applicant_type','=',1);
								  
							  })->leftjoin('user_details as ud','users.created_by', '=', 'ud.user_id')
							  ->where('users.is_active','=',1)
							  ->where('users.role','=',8)
							  ->whereIn('users.created_by',$array)
							  ->orderBy('users.id','desc')
							  ->select(DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),DB::raw('CONCAT( ud.first_name ," ",ud.last_name ) AS booked_by'),'users.*','user_details.mobile_number')
							  ->get();  


							  
						  
                         
						  
					  }
				  }
				  else
				  {
					  $clients = DB::table('users')
					  ->join('user_details', function($on)
					  {
						  $on->on('users.id','=','user_details.user_id')->where('user_details.applicant_type','=',1);
						  
					  })->leftjoin('user_details as ud','users.created_by', '=', 'ud.user_id')
					  ->where('users.is_active','=',1)
					  ->where('users.role','=',8)
					  ->orderBy('users.id','desc')
					  ->select(DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),DB::raw('CONCAT( ud.first_name ," ",ud.last_name ) AS booked_by'),'users.*','user_details.mobile_number')
					  ->get(); 

					  
				  }
	        } */ 
			//dd($clients);
				// return view('customer.customers', ['clients' => $clients]); 
				 return view('customer.customers'); 
    }
  
     /* public function customer_detail($id)
	  {
		
		 $user_id= $id;
		 	$userdetail = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('user_details.*','users.email as users_email')->where('is_active','=',1)
            ->where('user_details.user_id','=',$user_id)->get();
           $users_add_details=DB::table('user_address_details')->where('address_type_id','=',1)->where('user_id','=',$user_id)->where('applicant_type','=',1)->first();
            $users_add_details1=DB::table('user_address_details')->where('address_type_id','=',1)->where('user_id','=',$user_id)->where('applicant_type','=',2)->first();
       				 
		 
         $bookingDetails = DB::table('booking')->where('user_id', '=', $user_id)->first();
         $booking_id = isset($bookingDetails->booking_id)?$bookingDetails->booking_id:0;
		
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',$user_id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();	
		 $property_detail=DB::table('unit_details')
		                 ->join('booking','booking.unit_id','=','unit_details.unit_id')
						 ->join('project_blocks','project_blocks.block_id','=','unit_details.block_id')
						 ->join('project','project.project_id','=','project_blocks.project_id')
			             ->where('booking.booking_id','=',$booking_id)
			             ->orderBy('unit_details.unit_id','ASC')
						 ->get(); 
         $userplan_detail= DB::table('user_plan_component')
		                   ->join('payment_plan','payment_plan.payment_plan_id','=','user_plan_component.payment_plan_id')
		                   ->where('user_plan_component.booking_id','=',$booking_id)
						   ->orderBy('payment_plan.payment_plan_id','ASC')
						   ->first(); 
		  
		  		   		   
		   $payment_plan=DB::table('user_plan_component')
		                 ->join('booking','booking.booking_id','=','user_plan_component.booking_id')
			             ->where('booking.user_id','=',$user_id)
			             ->orderBy('user_plan_component.user_plan_component_id','ASC')
						 ->get();  
						 
		   $payment_detail=DB::table('payment_details')
		                 ->join('booking','booking.booking_id','=','payment_details.booking_id')
			             ->where('payment_details.booking_id','=',$booking_id)
			             ->orderBy('payment_details.payment_details_id','ASC')
						 ->get();  
         		  
		 
		  
		    $system = DB::table('system')->first();
			$document_type = DB::table('kyc_type')->get();
		           foreach( $document_type as  $document)
		     {
		  	$data=UserKyc::join('media','media.media_id','=','user_kyc.media_id')->where("user_kyc.user_id","=",$user_id)->where("user_kyc.kyc_type_id","=",$document->kyc_type_id)->first();
			$document->value=isset($data->media_name)?$data->media_name:'';
			$document->media_id=isset($data->media_id)?$data->media_id:'';
			$document->description=isset($data->description)?$data->description:'';
			$document->created_date=isset($data->created_date)?$data->created_date:'';				
		     }
         			
		
			$property_document = DB::table('history_templets')
			                      ->join('user_assign_templet','user_assign_templet.history_templets_id','=','history_templets.id')
			                     ->where("user_assign_templet.user_id","=",$user_id)->get();
			
		   
		   
		   
		   $treedata=$this->getUserTreeForParentId($user_id); 
		   //echo "<pre>";print_r($treedata); exit;
		   
		   
		   
		   
		 return view('customer.customer_detail',['userdetail' => $userdetail,'users_add_details'=>$users_add_details,'users_add_details1'=>$users_add_details1,'property_detail' => $property_detail,'property_detail_unit' => $property_detail_unit,'userplan_detail' => $userplan_detail,'payment_plan' => $payment_plan,'payment_detail' => $payment_detail,'system' => $system,'document_type'=>$document_type,'property_document'=>$property_document,'treedata'=>$treedata,'user_id'=>$user_id]);		
	   }  */
	   
	   public function temp_customer_detail(Request $request,$code)
	   {	
	     $userData = DB::table('temp_customer')
			->join('temp_customer_details', function($on)
			{
			$on->on('temp_customer.id','=','temp_customer_details.temp_customer_id')->where('temp_customer_details.applicant_type','=',1);
			})
			->join('temp_customer_address_details as ca', function($on)
			{
				$on->on('ca.temp_customer_id','=','temp_customer_details.temp_customer_id')->where('ca.applicant_type','=',1)->where('ca.address_type_id','=',1);
			})->join('temp_customer_address_details as pa', function($on)
			{
				$on->on('pa.temp_customer_id','=','temp_customer_details.temp_customer_id')->where('pa.applicant_type','=',1)->where('pa.address_type_id','=',1);
			})->join('temp_customer_address_details as oa', function($on)
			{
				$on->on('oa.temp_customer_id','=','temp_customer_details.temp_customer_id')->where('oa.applicant_type','=',1)->where('oa.address_type_id','=',1);
			})
			->leftjoin('invitation_link','invitation_link.id','=','temp_customer_details.invitation_link_id')
			->leftjoin('invite_block','invite_block.invitation_link_id','=','invitation_link.id')
			->leftjoin('user_details','user_details.user_id','=','invitation_link.sender_id')
			->where('temp_customer.is_active','=',1)
			->where('temp_customer.customer_code','=',$code)
			->groupBy('invite_block.invitation_link_id')
			->orderBy('temp_customer.id','desc')
			->select('temp_customer.email as user_email', 'temp_customer_details.*',
									DB::raw('CONCAT(ca.address_line, ", ", ca.city, ", ", ca.state, ", ", ca.pin_code) AS correspondence_address'),
									DB::raw('CONCAT(pa.address_line, ", ", pa.city, ", ", pa.state, ", ", pa.pin_code) AS permanent_address'),
									DB::raw('CONCAT(oa.address_line, ", ", oa.city, ", ", oa.state, ", ", oa.pin_code) AS organisation_address')
								)
			->first();
	   

		$userKycData = TempCustomerKyc::leftjoin('kyc_type', 'kyc_type.kyc_type_id','=','temp_customer_kyc.kyc_type_id')->where('temp_customer_kyc.customer_code','=', $code)->where('temp_customer_kyc.applicant_type','=',1)->select('temp_customer_kyc.*','kyc_type.kyc_type_name')->get();
			

			
		
		
		$coApplicantdata = DB::table('temp_customer')
			->join('temp_customer_details', function($on)
			{
			$on->on('temp_customer.id','=','temp_customer_details.temp_customer_id')->where('temp_customer_details.applicant_type','=',2);
			})
			->join('temp_customer_address_details as ca', function($on)
			{
				$on->on('ca.temp_customer_id','=','temp_customer_details.temp_customer_id')->where('ca.applicant_type','=',1)->where('ca.address_type_id','=',1);
			})->join('temp_customer_address_details as pa', function($on)
			{
				$on->on('pa.temp_customer_id','=','temp_customer_details.temp_customer_id')->where('pa.applicant_type','=',1)->where('pa.address_type_id','=',1);
			})->join('temp_customer_address_details as oa', function($on)
			{
				$on->on('oa.temp_customer_id','=','temp_customer_details.temp_customer_id')->where('oa.applicant_type','=',1)->where('oa.address_type_id','=',1);
			})
			->leftjoin('invitation_link','invitation_link.id','=','temp_customer_details.invitation_link_id')
			->leftjoin('invite_block','invite_block.invitation_link_id','=','invitation_link.id')
			->leftjoin('user_details','user_details.user_id','=','invitation_link.sender_id')
			->where('temp_customer.is_active','=',1)
			->where('temp_customer.customer_code','=',$code)
			->groupBy('invite_block.invitation_link_id')
			->orderBy('temp_customer.id','desc')
			->select('temp_customer.email as user_email', 'temp_customer_details.*',
									DB::raw('CONCAT(ca.address_line, ", ", ca.city, ", ", ca.state, ", ", ca.pin_code) AS correspondence_address'),
									DB::raw('CONCAT(pa.address_line, ", ", pa.city, ", ", pa.state, ", ", pa.pin_code) AS permanent_address'),
									DB::raw('CONCAT(oa.address_line, ", ", oa.city, ", ", oa.state, ", ", oa.pin_code) AS organisation_address')
								)
			->first();
		
		$coApplicantKycData = TempCustomerKyc::leftjoin('kyc_type', 'kyc_type.kyc_type_id','=','temp_customer_kyc.kyc_type_id')->where('temp_customer_kyc.customer_code','=', $code)->where('temp_customer_kyc.applicant_type','=',2)->select('temp_customer_kyc.*','kyc_type.kyc_type_name')->get();
		
		if(Auth::user()->role==1){
			$employees=AssignProject::join('users','users.id','=','assign_project.user_id')->join('user_details','user_details.user_id','=','assign_project.user_id')
						->where('users.role',"!=",8)
						->where('user_details.user_id','!=', Auth::user()->id)
						->get();
		}
		else{
			$employees=AssignProject::join('users','users.id','=','assign_project.user_id')->join('user_details','user_details.user_id','=','assign_project.user_id')
				->where('assign_project.company_id','=',Auth::user()->company_id)
				->where('users.role',"!=",8)
				->where('user_details.user_id','!=', Auth::user()->id)
				->get();
		}
		
		$ticketsubjects = TicketSubject::where('status','=',1)->get();
		

		return view('customer.crm_tempcustmerdetail')->with([	'userData'=> $userData,								
										'coApplicantdata' => $coApplicantdata,
										'userKycData'=> $userKycData,
										'coApplicantKycData' => $coApplicantKycData,
										'employees' => $employees,
										'ticketsubjects'=> $ticketsubjects			
									]); 
	   }
	   
	   public function customer_detail(Request $request,$code)
	   {	
	    $userdataids= DB::table('users')->join('customer_details','customer_details.user_id','=','users.id')->where('customer_details.applicant_type','=',1)->where('customer_details.customer_code','=',$code)->select('users.id','users.is_active','users.confirmed')->first();
		//echo '<pre>'; print_r( $userdataids); exit;
		$user_id=$userdataids->id;
		$is_active=$userdataids->is_active;
		$confirmed=$userdataids->confirmed;
		//active
		if($is_active==1 && $confirmed==1){
			$userstatus='1';
			
		}
		//temp
		if($is_active==2 && $confirmed==0){
			$userstatus='2';
		}
		//new
		if($is_active==3 && $confirmed==0){
			$userstatus='3';
		}
		//inactive
		if($is_active==0 && $confirmed==0){
			$userstatus='0';
		}
		$searchType = "";
		$searchName = "";
		
		$userData = DB::table('users')->join('customer_details','customer_details.user_id','=','users.id')
						->leftjoin('customer_address_details as ca','ca.user_id','=','users.id')
						->leftjoin('customer_address_details as pa','pa.user_id','=','users.id')
						->leftjoin('customer_address_details as oa','oa.user_id','=','users.id')
						->where('users.id','=', $user_id)->where('users.role','=', 8)
						->where('customer_details.applicant_type','=',1)
						->where('ca.address_type_id','=',1)->where('ca.applicant_type','=',1)
						->where('pa.address_type_id','=',2)->where('pa.applicant_type','=',1)
						->where('oa.address_type_id','=',3)->where('ca.applicant_type','=',1)
						->select('users.email as user_email', 'customer_details.*',
									DB::raw('CONCAT(ca.address_line, ", ", ca.city, ", ", ca.state, ", ", ca.pin_code) AS correspondence_address'),
									DB::raw('CONCAT(pa.address_line, ", ", pa.city, ", ", pa.state, ", ", pa.pin_code) AS permanent_address'),
									DB::raw('CONCAT(oa.address_line, ", ", oa.city, ", ", oa.state, ", ", oa.pin_code) AS organisation_address')
								)
						->first();
						
		
		$userKycData = CustomerKyc::leftjoin('kyc_type', 'kyc_type.kyc_type_id','=','customer_kyc.kyc_type_id')->where('customer_kyc.user_id','=', $user_id)->where('customer_kyc.applicant_type','=',1)->select('customer_kyc.*','kyc_type.kyc_type_name')->get();
			

			
		$propertyData = DB::table('users')->join('booking', 'booking.user_id','=','users.id')
								->leftjoin('unit_details','unit_details.unit_id','=','booking.unit_id')
								->leftjoin('project', 'project.project_id','=','booking.project_id')
								->leftjoin('project_blocks','project_blocks.block_id','=','booking.block_id')
								->leftjoin('payment_plan','payment_plan.payment_plan_id','=','booking.payment_plan_id')
								->where('users.id','=',$user_id)
								->where('booking.booking_status','=',2)
								->select('unit_details.unit_name','unit_details.floor_id','unit_details.type', 'project.project_name', 'project_blocks.block_name','payment_plan.plan_name','booking.booking_id')
								->get();
		
		
		
		foreach($propertyData as $property)
		{
			$property->paymentdetails = DB::table('payment_details')->leftjoin('user_plan_component','user_plan_component.user_plan_component_id','=','payment_details.user_plan_component_id')->where('payment_details.booking_id','=',$property->booking_id)->select('payment_details.*','user_plan_component.component_name')->get();
			foreach($property->paymentdetails as $a){
				
				$a->created_at = date('d/m/Y', strtotime($a->created_at));
			}
			
		}
		
		//dd($propertyData);
		$coApplicantdata = DB::table('users')->join('customer_details','customer_details.user_id','=','users.id')
							->leftjoin('customer_address_details as ca','ca.user_id','=','users.id')
							->leftjoin('customer_address_details as pa','pa.user_id','=','users.id')
							->leftjoin('customer_address_details as oa','oa.user_id','=','users.id')
							->where('users.id','=', $user_id)->where('users.role','=', 8)
							->where('customer_details.applicant_type','=',2)
							->where('ca.address_type_id','=',1)->where('ca.applicant_type','=',2)
							->where('pa.address_type_id','=',2)->where('pa.applicant_type','=',2)
							->where('oa.address_type_id','=',3)->where('ca.applicant_type','=',2)
							->select('users.email as user_email', 'customer_details.*',
										DB::raw('CONCAT(ca.address_line, ", ", ca.city, ", ", ca.state, ", ", ca.pin_code) AS correspondence_address'),
										DB::raw('CONCAT(pa.address_line, ", ", pa.city, ", ", pa.state, ", ", pa.pin_code) AS permanent_address'),
										DB::raw('CONCAT(oa.address_line, ", ", oa.city, ", ", oa.state, ", ", oa.pin_code) AS organisation_address')
									)
							->first();
		
	
		$coApplicantKycData = CustomerKyc::leftjoin('kyc_type', 'kyc_type.kyc_type_id','=','customer_kyc.kyc_type_id')->where('customer_kyc.user_id','=', $user_id)->where('customer_kyc.applicant_type','=',2)->select('customer_kyc.*','kyc_type.kyc_type_name')->get();							
		
		if(Auth::user()->role==1){
			$employees=AssignProject::join('users','users.id','=','assign_project.user_id')->join('user_details','user_details.user_id','=','assign_project.user_id')
						->where('users.role',"!=",8)
						->where('user_details.user_id','!=', Auth::user()->id)
						->get();
		}
		else{
			$employees=AssignProject::join('users','users.id','=','assign_project.user_id')->join('user_details','user_details.user_id','=','assign_project.user_id')
				->where('assign_project.company_id','=',Auth::user()->company_id)
				->where('users.role',"!=",8)
				->where('user_details.user_id','!=', Auth::user()->id)
				->get();
		}
		
		$ticketsubjects = TicketSubject::where('status','=',1)->get();
		$getActivityLog = CrmCall::leftjoin('user_details', 'user_details.user_id','=','crm_calls.created_by')
									->where('related_to_cust_id','=',$user_id)
									->where('is_save','=',0)
									->select('crm_calls.*','user_details.first_name', 'user_details.last_name')
									->orderBy('crm_calls_id','desc')
									->get();
		
		foreach($getActivityLog as $activityLog){
			$activityLog->date_entered = date("d-m-Y g:i A", strtotime($activityLog->date_entered));
		}
		
		
		
		$ticket_activities_data =  Ticket::leftjoin('ticket_subject', 'ticket_subject.ticket_subject_id','=',											'tickets.ticket_subject_id')
													->leftjoin('ticket_status', 'ticket_status.ticket_status_id','=','tickets.ticket_status')
													->where('tickets.related_to_cust_id','=',$user_id)
													->select('tickets.*','ticket_subject.ticket_subject_name','ticket_status.ticket_status as ticket_status_name')->orderBy('tickets.ticket_id', 'desc')->get();
		
		foreach($ticket_activities_data as $ticketdata){
			$ticketdata->created_date = date('F d, Y g:i A', strtotime($ticketdata->created_date));
		}
		
		$documentdata = DB::table('history_templets')->join('user_assign_templet', 'history_templets.id', '=', 'user_assign_templet.history_templets_id')
		->where('user_assign_templet.user_id', '=', $user_id)
		->where('user_assign_templet.status', '=', 1)
		->get();
		
		if(!empty($data))
		{
		foreach($data as $data1)
		{
		$originalDate = $data1->created_at;

		$data1->created_at = "  ".date("d-m-Y", strtotime($originalDate));

		}
		}
		
		//$existing_ticket = Ticket::where("related_to_cust_id",'=',$user_id)->get();
		//dd($ticket_activities_data);
		
		
		
		return view('customer.crm_custmerdetail')->with([	'userData'=> $userData,
										'propertyData'=> $propertyData,
										'coApplicantdata' => $coApplicantdata,
										'userKycData'=> $userKycData,
										'coApplicantKycData' => $coApplicantKycData,
										'employees' => $employees,
										'ticketsubjects'=> $ticketsubjects,
										'getActivityLog'=> $getActivityLog,
										'searchType' => $searchType,
										'searchName' => $searchName,
										'ticket_activities_data' => $ticket_activities_data,
										'user_id' => $user_id,
										'documentdata' => $documentdata,
										'userstatus'=>$userstatus
									]); 
	   }
	   
	   public function new_customer_detail(Request $request,$code)
	   {	
	    $userdataids= DB::table('users')->join('customer_details','customer_details.user_id','=','users.id')->where('customer_details.applicant_type','=',1)->where('customer_details.customer_code','=',$code)->select('users.id','users.is_active','users.confirmed')->first();
		
		$user_id=$userdataids->id;
		$is_active=$userdataids->is_active;
		$confirmed=$userdataids->confirmed;
		//active
		if($is_active==1 && $confirmed==1){
			$userstatus='1';
			
		}
		//temp
		if($is_active==2 && $confirmed==0){
			$userstatus='2';
		}
		//new
		if($is_active==3 && $confirmed==0){
			$userstatus='3';
		}
		//inactive
		if($is_active==0 && $confirmed==0){
			$userstatus='0';
		}
		$searchType = "";
		$searchName = "";
		
		$userData = DB::table('users')->join('customer_details','customer_details.user_id','=','users.id')
						->leftjoin('customer_address_details as ca','ca.user_id','=','users.id')
						->leftjoin('customer_address_details as pa','pa.user_id','=','users.id')
						->leftjoin('customer_address_details as oa','oa.user_id','=','users.id')
						->where('users.id','=', $user_id)->where('users.role','=', 8)
						->where('customer_details.applicant_type','=',1)
						->where('ca.address_type_id','=',1)->where('ca.applicant_type','=',1)
						->where('pa.address_type_id','=',2)->where('pa.applicant_type','=',1)
						->where('oa.address_type_id','=',3)->where('ca.applicant_type','=',1)
						->select('users.email as user_email', 'customer_details.*',
									DB::raw('CONCAT(ca.address_line, ", ", ca.city, ", ", ca.state, ", ", ca.pin_code) AS correspondence_address'),
									DB::raw('CONCAT(pa.address_line, ", ", pa.city, ", ", pa.state, ", ", pa.pin_code) AS permanent_address'),
									DB::raw('CONCAT(oa.address_line, ", ", oa.city, ", ", oa.state, ", ", oa.pin_code) AS organisation_address')
								)
						->first();
						
		
		$userKycData = CustomerKyc::leftjoin('kyc_type', 'kyc_type.kyc_type_id','=','customer_kyc.kyc_type_id')->where('customer_kyc.user_id','=', $user_id)->where('customer_kyc.applicant_type','=',1)->where('customer_kyc.status','=',1)->select('customer_kyc.*','kyc_type.kyc_type_name')->get();
			

			
		$propertyData = DB::table('users')->join('booking', 'booking.user_id','=','users.id')
								->leftjoin('unit_details','unit_details.unit_id','=','booking.unit_id')
								->leftjoin('project', 'project.project_id','=','booking.project_id')
								->leftjoin('project_blocks','project_blocks.block_id','=','booking.block_id')
								->leftjoin('payment_plan','payment_plan.payment_plan_id','=','booking.payment_plan_id')
								->where('users.id','=',$user_id)
								->where('booking.booking_status','=',2)
								->select('unit_details.unit_name','unit_details.floor_id','unit_details.type', 'project.project_name', 'project_blocks.block_name','payment_plan.plan_name','booking.booking_id')
								->get();
		
		
		
		foreach($propertyData as $property)
		{
			$property->paymentdetails = DB::table('payment_details')->leftjoin('user_plan_component','user_plan_component.user_plan_component_id','=','payment_details.user_plan_component_id')->where('payment_details.booking_id','=',$property->booking_id)->select('payment_details.*','user_plan_component.component_name')->get();
			foreach($property->paymentdetails as $a){
				
				$a->created_at = CommonHelper::display_date($a->created_at);
			}
			
		}
		
		//dd($propertyData);
		$coApplicantdata = DB::table('users')->join('customer_details','customer_details.user_id','=','users.id')
							->leftjoin('customer_address_details as ca','ca.user_id','=','users.id')
							->leftjoin('customer_address_details as pa','pa.user_id','=','users.id')
							->leftjoin('customer_address_details as oa','oa.user_id','=','users.id')
							->where('users.id','=', $user_id)->where('users.role','=', 8)
							->where('customer_details.applicant_type','=',2)
							->where('ca.address_type_id','=',1)->where('ca.applicant_type','=',2)
							->where('pa.address_type_id','=',2)->where('pa.applicant_type','=',2)
							->where('oa.address_type_id','=',3)->where('ca.applicant_type','=',2)
							->select('users.email as user_email', 'customer_details.*',
										DB::raw('CONCAT(ca.address_line, ", ", ca.city, ", ", ca.state, ", ", ca.pin_code) AS correspondence_address'),
										DB::raw('CONCAT(pa.address_line, ", ", pa.city, ", ", pa.state, ", ", pa.pin_code) AS permanent_address'),
										DB::raw('CONCAT(oa.address_line, ", ", oa.city, ", ", oa.state, ", ", oa.pin_code) AS organisation_address')
									)
							->first();
		
	
		$coApplicantKycData = CustomerKyc::leftjoin('kyc_type', 'kyc_type.kyc_type_id','=','customer_kyc.kyc_type_id')->where('customer_kyc.user_id','=', $user_id)->where('customer_kyc.applicant_type','=',2)->where('customer_kyc.status','=',1)->select('customer_kyc.*','kyc_type.kyc_type_name')->get();							
		
		if(Auth::user()->role==1){
			$employees=AssignProject::join('users','users.id','=','assign_project.user_id')->join('user_details','user_details.user_id','=','assign_project.user_id')
						->where('users.role',"!=",8)
						->where('user_details.user_id','!=', Auth::user()->id)
						->get();
		}
		else{
			$employees=AssignProject::join('users','users.id','=','assign_project.user_id')->join('user_details','user_details.user_id','=','assign_project.user_id')
				->where('assign_project.company_id','=',Auth::user()->company_id)
				->where('users.role',"!=",8)
				->where('user_details.user_id','!=', Auth::user()->id)
				->get();
		}
		
		$ticketsubjects = TicketSubject::where('status','=',1)->get();
		$getActivityLog = CrmCall::leftjoin('user_details', 'user_details.user_id','=','crm_calls.created_by')
									->where('related_to_cust_id','=',$user_id)
									->where('is_save','=',0)
									->select('crm_calls.*','user_details.first_name', 'user_details.last_name')
									->orderBy('crm_calls_id','desc')
									->get();
		
		foreach($getActivityLog as $activityLog){
			$activityLog->date_entered =CommonHelper::display_date($activityLog->date_entered);
		}
		
		
		
		$ticket_activities_data =  Ticket::leftjoin('ticket_subject', 'ticket_subject.ticket_subject_id','=',											'tickets.ticket_subject_id')
													->leftjoin('ticket_status', 'ticket_status.ticket_status_id','=','tickets.ticket_status')
													->where('tickets.related_to_cust_id','=',$user_id)
													->select('tickets.*','ticket_subject.ticket_subject_name','ticket_status.ticket_status as ticket_status_name')->orderBy('tickets.ticket_id', 'desc')->get();
		
		foreach($ticket_activities_data as $ticketdata){
			$ticketdata->created_date =date('F d, Y g:i A', strtotime($ticketdata->created_date));
		}
		
		$documentdata = DB::table('history_templets')->join('user_assign_templet', 'history_templets.id', '=', 'user_assign_templet.history_templets_id')
		->where('user_assign_templet.user_id', '=', $user_id)
		->where('user_assign_templet.status', '=', 1)
		->get();
		
		if(!empty($data))
		{
		foreach($data as $data1)
		{
		$originalDate = $data1->created_at;

		$data1->created_at = "  ".CommonHelper::display_date($originalDate);

		}
		}
		$user_list=DB::table('users')->join('user_details','user_details.user_id','=','users.id')->where('users.role','=',5)->where('users.is_active','=',1)->select('user_details.first_name','user_details.last_name','users.id')->get();
		
		$manager_id=isset($userData->relationship_manager_id)?$userData->relationship_manager_id:0;
		
		$clientsmanager=DB::table('users')->join('user_details','user_details.user_id','=','users.id')->join('company','company.company_id','=','users.company_id')->select('company.company_name','users.email',DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),'user_details.phone')->where('users.id','=',$manager_id)->first();
		
		$chennelpartner=AssignProject::join('users','users.id','=','assign_project.user_id')->join('user_details','user_details.user_id','=','assign_project.user_id')
				->join('company','company.company_id','=','assign_project.company_id')
				->where('users.id',"=",$userData->created_by)
				->select('company.company_name',DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'))
				->first();
		
		return view('customer.crm_newcustmerdetail')->with([	'userData'=> $userData,
										'propertyData'=> $propertyData,
										'coApplicantdata' => $coApplicantdata,
										'userKycData'=> $userKycData,
										'coApplicantKycData' => $coApplicantKycData,
										'employees' => $employees,
										'ticketsubjects'=> $ticketsubjects,
										'getActivityLog'=> $getActivityLog,
										'searchType' => $searchType,
										'searchName' => $searchName,
										'ticket_activities_data' => $ticket_activities_data,
										'user_id' => $user_id,
										'documentdata' => $documentdata,
										'userstatus'=>$userstatus,
										'user_list'=>$user_list,
										'clientsmanager'=>$clientsmanager,
										'chennelpartner'=>$chennelpartner
									]); 
	   }
	   
	  public function edit_customer_detail(Request $request)
	    {
	    	 $applicant_type=$request->input('applicant_type');
	    	if($applicant_type=='1')
	    	{
 			$id=$request->id;
		   //echo $id;die; 
		   $first_name=trim($request->first_name);
		   $last_name=trim($request->last_name);		  
		   $contact=$request->contact;
		   $phone=trim($request->phone);
		   $pancard=$request->pancard;
		   $dob=$request->dob;
		   $address=$request->address;
		   $zip=$request->zip;
		   $city=$request->city;
		   $state=$request->state;

		  $update_detail=DB::table('user_details')->where('applicant_type',$applicant_type)->where('user_id','=',$id)->update(
	            ['first_name' => $first_name,'last_name'=> $last_name,'mobile_number' => $phone,'landline_number' => $contact,'pancard_number'=> $pancard,'dob' => $dob]);
		  $update_address=DB::table('user_address_details')
		                  ->where('user_id','=',$id)
						  ->where('address_type_id','=','1')
						  ->where('applicant_type',$applicant_type)					  
						  ->update(
	            ['address_line' => $address,'pin_code'=> $zip,'city' => $city,'state' =>$state]);			
		 if($update_detail=='1' or $update_address=='1'){ 		 
		      return response()->json(['message' => 'success', 'success_msg' => "Updated Successfully"]);
		     }
		 else{
			// echo "here";
			return response()->json(['message' => 'success', 'success_msg' => "Not Updated"]);
		 } 	    		

	    	}
	    	else
	    	{

 			$id=$request->id;
		   $first_name=trim($request->first_name);
		   $last_name=trim($request->last_name);		  
		   $contact=$request->contact;
		   $phone=trim($request->phone);
		   $pancard=$request->pancard;
		   $dob=$request->dob;
		   $address=$request->address;
		   $zip=$request->zip;
		   $city=$request->city;
		   $state=$request->state;
		   
				  
		  $update_detail=DB::table('user_details')->where('applicant_type',$applicant_type)->where('user_id','=',$id)->update(
	            ['first_name' => $first_name,'last_name'=> $last_name,'mobile_number' => $phone,'landline_number' => $contact,'pancard_number'=> $pancard,'dob' => $dob]);
		  $update_address=DB::table('user_address_details')
		                  ->where('user_id','=',$id)
						  ->where('address_type_id','=','1')
						  ->where('applicant_type',$applicant_type)					  
						  ->update(
	            ['address_line' => $address,'pin_code'=> $zip,'city' => $city,'state' =>$state]);			
		 if($update_detail=='1' or $update_address=='1'){ 		 
		      return response()->json(['message' => 'success', 'success_msg' => "Updated Successfully"]);
		     }
		 else{
			// echo "here";
			return response()->json(['message' => 'success', 'success_msg' => "Not Updated"]);
		 } 	    		

	    	}
		  
     }
    
	  public function generateInvoicecustomer($id ,$userid)
       {
		   
		  $user_id= $userid;         		  
  		  $bookingDetails = DB::table('booking')->where('user_id', '=', $user_id)->first();
          $booking_id = $bookingDetails->booking_id;
		  $userDetails = DB::table('users')
		  ->join('user_details','user_details.user_id','=','users.id')
		  ->where('users.id', '=', $user_id)
		  ->where('user_details.applicant_type','=',1)
		  ->first();
		  $user_address_details = DB::table('user_address_details')
		  ->where('user_address_details.id', '=', $user_id)
		  ->where('user_address_details.applicant_type','=',1)
		  ->first();
		$address='';
		if(!empty($user_address_details))
		{
			$address=$user_address_details->address_line.", ".$user_address_details->city.", ".$user_address_details->state.", ".$user_address_details->pin_code." ";
		}
		  
		  $company_detail_check=DB::table('booking')
		                 ->join('assign_project','assign_project.user_id','=','booking.created_by')
						 ->join('company','company.company_id','=','assign_project.company_id')
						  ->join('company_type','company_type.company_type_id','=','assign_project.company_type_id')
			             ->where('booking.booking_id','=',$booking_id)
			             ->orderBy('company.company_id','ASC')
						 ->first(); 
				
		   if (Empty($company_detail_check)) {
			   
					 $company_detail= DB::table('assign_project')
		                 ->join('company','company.company_id','=','assign_project.company_id')
						 ->join('company_type','company_type.company_type_id','=','assign_project.company_type_id')
		                 ->where('assign_project.role_id','2')
						 ->where('assign_project.company_id','1')
			             ->orderBy('company.company_type_id','ASC')
						 ->first();
		          }	
          else{
			    $company_detail=$company_detail_check;
		  }	  
				 
		  $property_detail=DB::table('unit_details')
		                 ->join('booking','booking.unit_id','=','unit_details.unit_id')
						 ->join('project_blocks','project_blocks.block_id','=','unit_details.block_id')
			             ->where('booking.booking_id','=',$booking_id)
			             ->orderBy('unit_details.unit_id','ASC')
						 ->first(); 
         $userplan_detail= DB::table('user_plan_component')
		                   ->join('payment_plan','payment_plan.payment_plan_id','=','user_plan_component.payment_plan_id')
		                   ->where('user_plan_component.booking_id','=',$booking_id)
						   ->orderBy('payment_plan.payment_plan_id','ASC')
						   ->first(); 		  
	
		  		   
		  $data=DB::table('payment_details')->where('txnid', '=', $id)->first();
		 		  
            $arr='<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Invoice</title>
    <style type="text/css">
        table { border-collapse: collapse;}
		body{font-size:11px;font-family: sans-serif;}
#checkout-content label {
    color: #8e8d8d;
    font-size: 11px;
    font-weight: 500;
    line-height: 26px;
    margin-bottom: 4px;
}
tr td:first-child{
	border:0px;
}

tr{padding:10px 0px;}
td {    border: 1px solid #e2e2e2;
margin-top: 10px;
    margin-bottom: 10px;
    outline: medium none;
  float:left;
    border-radius: 0;
    box-shadow: none;
    width: 100%;
}
.tableorder{
	background-color:white;float:left;width:100%;
}
td{
	    display: table-cell;
}
#checkout-content input{
    border: 1px solid #e2e2e2;
    color: #c6c6c6;
    font-size: 14px;
    font-weight: 400;
    height: 46px;
    line-height: 46px;
    margin-bottom: 10px;
    outline: medium none;
    padding: 0 20px;
    border-radius: 0;
    box-shadow: none;
    width: 100%;
	background-color:white;
}
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.no-border td{border:0px;}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
	font-family: sans-serif;
	font-size: 11px;
}
#checkout-content label {
    color: #8e8d8d;
    font-size: 14px;
    font-weight: 500;
    line-height: 26px;
    margin-bottom: 4px;
}

#checkout-content input[type="text"]:last-child {
    margin-bottom: 0;
}
#checkout-content label, #checkout-content input[type="text"] {
    display: block;
}
.table>tbody>tr>td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    
}
    </style>
</head>
<body >
    	
    <section class="row" style="border-style: solid; border-width: 5px; border-color: green;">
	   <div class="invoice-title" style="">
    			<h5 style="margin-left:200px;">Invoice Detail</h5>
    		</div>
        <div class="pull-left">
		   <h5>Company Detail</h5>		     
				   Company Name: '.$company_detail ->company_name. ' <br />
				   Company Type: '.$company_detail ->company_type_name. ' <br />
				   Company Address: '.$company_detail ->location.' <br />	      
        </div>
		<div class="pull-right" style="margin-left:200px;">
		    <h5>Customer Detail</h5>
            Name: '.$userDetails ->first_name.' '.$userDetails ->last_name. ' <br />
            Phone: ' .$userDetails->phone.' <br />
			Email: ' .$userDetails->email.' <br />
            Address: ' .$address.' <br />
           
        </div>
       
    </section>
    <section class="row">
        <div class="col-md-12">
            <h5>Payment Details</h5>
            <table class="table table-striped" width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Tower Name</th>
                        <th>Floor Name</th>
                        <th>Unit Size</th>
                        <th>Txn.Id</th>
						<th>Discount</th>
						<th>Tax</th>
                        <th>Paid Amount</th>
                        <th style="color:red;">Paid date</th>
                    </tr>
                </thead>
                <tbody>
                
                    <tr>
                        <td>' . $property_detail ->block_name . '</td>
                        <td>' . $property_detail->floor_id . '</td>
                        <td>' .$property_detail->unit_size .'</td>
                        <td>' .$data ->txnid .'</td>
						<td>' .$data ->discount .'</td>
						<td>' .$data ->tax .'</td>
                        <td>' .$data ->net_amount .'</td>
                        <td>' .date('d-m-Y', strtotime($userplan_detail ->created_at)) .'</td>
                    </tr>
               
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
						<td></td>
						<td></td>
                        <th><strong>total Paid Amount:</strong></th>
                        <td>' .$data ->net_amount .' /-</td>
                    </tr>
                  
                    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
						<td></td>
						<td></td>
                        <td><strong>Total Payable Amount:</strong></td>
                        <td><strong>' .$property_detail ->total_unit_cost .' /-</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
   
</body>
</html>';  




		  
		  $file_name='pdf/'.time();
	      $html= view('pdfdoc.previewcertificate', ['dowload_option'=>'','template_id'=>'1','certificate_title'=>'title','bg_img_mode'=>'','template_bg_image'=>'','certificate_content'=>$arr,'baseUrl'=>'','file_name'=>$file_name]);	   
	  echo $html; 
      //return view('invoice.orders', ['data' => $data,"arr"=>$arr,'file_name'=>$file_name]);
     
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
			
			
			$orderData = DB::table('orders')->where('booking_id','=',$bookingData->booking_id)->where('user_id','=',$bookingData->user_id)->first();
			$Payment = DB::table('payment_details')->where('booking_id','=',$bookingData->booking_id)->where('user_id','=',$bookingData->user_id)->first();
			$payamtpay=$Payment->net_amount??0;
			if($orderData){
				$orderData->payment_date = CommonHelper::display_date($orderData->created_at);
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
			</div>

			<div style="margin-top:20px;">
			<h3 style="font-size:15px; font-weight:bold; font-style:italic; font-family:Verdana, sans-serif; margin:0px; padding-top:10px; color:#5a5555 ">Property Details</h3>
			<p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Project Name:'.$unitData->project_name.'</p>
			<p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Villa #:'.substr($unitData->unit_name,6).'</p>
			<p style="font-size:15px; font-family:Verdana, sans-serif; font-style:italic;  margin:0px; padding-top:10px; color:#5a5555">Villa Type:'.$unitData->villa_type.'</p>
			</div>
			</div>

			<div style="float:right; margin-top:20px;">
			<p style="font-size:15px; font-style:italic; font-family:Verdana, sans-serif; margin:0px; padding-top:10px; color:#5a5555">Date:'.date("M d, Y",strtotime($orderData->created_at)).'</p>
			<p style="font-size:15px; font-style:italic; font-family:Verdana, sans-serif;  margin:0px; padding-top:10px; color:#5a5555">Transaction Id #:'.$orderData->txnid .'</p>
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

			<div style=" margin-top:20px;">
			<button type="button" style="background:#5cb85c; border:0px; color:#fff; padding:10px; border-radius:2px; width:100%; text-transform:uppercase; cursor:pointer;">
			Successfully Paid&nbsp;
			</button>
			</div>

			</div>
			</body>
			</html>
    	';

    	 $file_name='payment_status/'.time();
	     /* $html= view('pdfdoc.previewcertificate', ['dowload_option'=>'','template_id'=>'1','certificate_title'=>'title','bg_img_mode'=>'','template_bg_image'=>'','certificate_content'=>$arr,'baseUrl'=>'','file_name'=>$file_name]);	*/
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

   
  	public function customerpropertydetails($id)
     { 
	    $data = DB::table('user_assign_templet')->where('id','=',$id)->first();
		
		if(!empty($data))
		{
		$file_name='pdf/'.time();
	 
	   $pdf = PDF::loadView('frontend.adminpletdetailview', ['data' =>$data->templet_html,'file_name'=>$file_name]);
        return $pdf->download('Property.pdf');
	  
	  
       return view('frontend.adminpletdetailview', ['data' =>$data->templet_html,'file_name'=>$file_name]);
	  }
	  return view('frontend.adminpletdetailview', ['data' =>'','file_name'=>'']);
    }

    public function customerpropertydetailsview($id)
      {   
	    $data = DB::table('user_assign_templet')->where('id','=',$id)->first();
		
		if(!empty($data))
		{
		$file_name='pdf/'.time();
	     $html= view('pdfdoc.previewcertificate', ['dowload_option'=>'','certificate_title'=>'document','bg_img_mode'=>'','template_bg_image'=>'','certificate_content'=>view('frontend.adminpletdetailview', ['data' =>$data->templet_html,'file_name'=>$file_name]),'baseUrl'=>'','file_name'=>$file_name, 'duplicate' => '']);
	   echo $html; 
	   
	   
	   
	   $pdf = PDF::loadView('frontend.adminpletdetailview', ['data' =>$data->templet_html,'file_name'=>$file_name]);
     //  return $pdf->download('Property.pdf');
	  
	  
       return view('frontend.adminpletdetailview', ['data' =>$data->templet_html,'file_name'=>$file_name]);
	  }
	  return view('frontend.adminpletdetailview', ['data' =>'','file_name'=>'']);
    }	
    
	public function customertempletsgenerate($id =0){
		     $assign_template = DB::table('user_assign_templet')->where('id','=',$id)->first();
		$assign_template->templet_html=$this->changetempcontent($assign_template->templet_html);	
		return view('customer.adminuser_assign_document')->with(['assign_template' => $assign_template]);
	}
	
	public function customertempletsgeneratesubmit(Request $request, $id = 0){
		$document_template_data = $request->all();
		 if(isset($document_template_data)){
			$data = DB::table('user_assign_templet')->where('id', '=', $id)->first();
			if(isset($data)){
				$user_assign_templet['templet_html'] = $document_template_data['templet_html'];
				$user_assign_templet['generate'] = 1;
				$user_assign_templet['updated_at'] = date('Y-m-d');
				
				$update = DB::table('user_assign_templet')->where('id', '=', $id)->update($user_assign_templet);
				return redirect('/administrator/customers');
			}
		} 
	}
	
		
	public function changetempcontent($data)
    { 
      
	   If(!empty($data))
	   {   $arr=$data;
		   $arr=str_replace("{first_name}",Auth::user()->first_name,$arr);
		   $arr=str_replace("{last_name}",Auth::user()->last_name,$arr);
		   
		  return $arr;
	  }
	    return $data;
	 
    }
	
	
	/* public function templetsGenerateSubmit(Request $request, $id = 0){
		$document_template_data = $request->all();
		if(isset($document_template_data)){
			$data = DB::table('user_assign_templet')->where('id', '=', $id)->first();
			if(isset($data)){
				$user_assign_templet['templet_html'] = $document_template_data['templet_html'];
				$user_assign_templet['generate'] = 1;
				//$user_assign_templet['count'] = $data->count + 1;
				$user_assign_templet['updated_at'] = date('Y-m-d');
				
				$update = DB::table('user_assign_templet')->where('id', '=', $id)->update($user_assign_templet);
				return redirect('/user/documantation');
			}
		}
		//echo "<pre>"; print_r($data); die;
		
	} */





	   
    public function edit($id)
    { 
    		$document_type1=DB::table('kyc_type')->get();
		  	$document_type=User::join('user_kyc','user_kyc.user_id','=','users.id')->
		  	join('media','media.media_id','=','user_kyc.media_id')->
		  	join('kyc_type','kyc_type.kyc_type_id','=','user_kyc.kyc_type_id')->where('users.id',$id)->select('user_kyc.description','user_kyc.applicant_type','user_kyc.kyc_type_id','user_kyc.created_date','kyc_type.kyc_type_name','media.media_name','media.media_id')->get();
		  	//print_r($document_type);die;		    

			$users_details = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('user_details.*','users.email as users_email')->where('is_active','=',1)->where('user_details.user_id','=',$id)->get(); 
           $users_add_details=DB::table('user_address_details')->where('user_id','=',$id)->get();
          // print_r($users_add_details);die;
        return view('customer.edit_customer', ['users_details' => $users_details,'document_type'=>$document_type,'users_add_details'=>$users_add_details,'document_type1'=>$document_type1]);
       

    }

    public function update($id,Request $request)
    {  
		//print_r($request->all());die;
        $validator = Validator::make(Input::all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'dob' => 'required',
            'zip' => 'required',
            'address' => 'required',            
            'city' => 'required',
            'state' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $client_fname      = Input::get('first_name');
		$client_lname      = Input::get('last_name');		
        $client_password   = trim(Input::get('password'));
        $client_mobile      = Input::get('mobile');
		$client_landline     = Input::get('landline');
		$father_husband_name  = Input::get('father_husband_name');
		$dob                    = Input::get('dob');
		$father_husband_mobile  = Input::get('father_husband_mobile');
		$father_husband_landline = Input::get('father_husband_landline');  
		$marital_status          =Input::get('marital');
	    $spouse_name             = Input::get('spouse_name');
		$if_foreigner            = Input::get('foreigner');
		$foreigner_country       = Input::get('foreigner_country');	
        $if_poa                  = Input::get('nopoa');		
		$poa_name                = Input::get('poa_name');		      
        $zip                     = Input::get('zip');
		$address                 = Input::get('address');
        $city                    = Input::get('city');
        $state                   = Input::get('state');		
		$permanentpincode        = Input::get('permanentpincode');
		$permanentaddress        = Input::get('permanentaddress');
        $permanentcity           = Input::get('permanentcity');
        $permanentstate          = Input::get('permanentstate');		
		$organisation_business_name  = Input::get('organisation_business_name');
		$designation          = Input::get('designation');
		$organisation_type          = Input::get('organisation_type');
		$organisation_phone          = Input::get('organisation_phone');
		$organisation_extension          = Input::get('organisation_extension');		
		$organisation_zip        = Input::get('organisation_zip');
		$org_address             = Input::get('org_address');
		$organisationcity        = Input::get('organisationcity');
		$organisationstate       = Input::get('organisationstate');	
		$confirmed               = Input::get('confirmed');
        $confirmation_code       = str_random(30);
		$editimage      		 = Input::get('editimage');
        $hashed                  = Hash::make($client_password);
        $updated_at=date('y-m-d');
		DB::table('users')->where('id', $id)->update(
			['password' => $hashed,'updated_at'=>$updated_at]
		);
		 if ($request->hasFile('image_profile')) {
				 $file = $request->file('image_profile');
				 $extension = $file->getClientOriginalExtension();
				 
				 $image_pro = uniqid() . '_doc.' . $extension;
				 
				 $destinationPath = public_path('assets/userprofile');
				 
				 $file->move($destinationPath, $image_pro);
				 $image_pro_name = '/assets/userprofile/' . $image_pro;
			  }
		else
		{
			$image_pro_name=$editimage;
		}	  		
	  DB::table('user_details')->where('user_id',$id)->where('applicant_type',1)->update(
	  	['first_name'=>$client_fname,'last_name'=>$client_lname,'mobile_number'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_name'=>$father_husband_name,'father_husband_mobile'=>$father_husband_name,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation,'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone,'organisation_extention'=>$organisation_extension,'updated_at'=>$updated_at]);

	  DB::table('user_address_details')->where('user_id',$id)->where('applicant_type','=','1')->where('address_type_id','=','1')->update(
	  	['address_line'=>$address,'pin_code'=>$zip,'city'=>$city,'state'=>$state,'last_update'=>$updated_at]);	
	  DB::table('user_address_details')->where('user_id',$id)->where('applicant_type','=','1')->where('address_type_id','=','2')->update(
	  	['address_line'=>$permanentaddress,'pin_code'=>$permanentpincode,'city'=>$permanentcity,'state'=>$permanentstate,'last_update'=>$updated_at]);	
	  DB::table('user_address_details')->where('user_id',$id)->where('applicant_type','=','1')->where('address_type_id','=','3')->update(
	  	['address_line'=>$org_address,'pin_code'=>$organisation_zip,'city'=>$organisationcity,'state'=>$organisationstate,'last_update'=>$updated_at]);		  		  	  
	   
	     $destinationPath= public_path('assets/kyc');
		 //$document_type = DB::table('kyc_type')->get();
		 	for($i=1; $i<=10; $i++)
		 	{	
			if ($request->hasFile('profileImg_'.$i)) {  	
				$kyc_type_id= Input::get('mySelect_'.$i);
				$description = Input::get('desc_'.$i);
				$pancardNumberKyc = Input::get('pancardNumberKyc_'.$i);
				$adharNumberKyc = Input::get('adharNumberKyc_'.$i);
				$voterIdKyc = Input::get('voterIdKyc_'.$i);
				$dobKyc = Input::get('dobKyc_'.$i);
				$passportNumberKyc = Input::get('passportNumberKyc_'.$i);
				$passportIssueBy = Input::get('passportIssueBy_'.$i);
				$file=$request->file('profileImg_'.$i);
				$extension = $file->getClientOriginalExtension();
				$name = uniqid() . '_doc.' . $extension;
				$file->move($destinationPath, $name);
				$filename = '/assets/kyc/' . $name;
				$media_id = Media::insertGetId(['media_name' =>$filename]);

				$media_id = UserKyc::insertGetId(['media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'user_id'=>$id,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>'1']);
			}	
		} 
	   

		\Session::flash('success-msg', 'Successfully Edited');
		return redirect()->back();
    }
	public function updateSecond($user_id,Request $request)
	{
		//print_r($request->all());die;
        $validator = Validator::make(Input::all(), [
            'secondfirst_name' => 'required',
            'secondlast_name' => 'required',
            'seconddob' => 'required',
            'secondzip' => 'required',
            'secondaddress' => 'required',            
            'secondcity' => 'required',
            'secondstate' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $client_fname      = Input::get('secondfirst_name');
		$client_lname      = Input::get('secondlast_name');		
        $client_password   = trim(Input::get('secondpassword'));
        $client_mobile      = Input::get('secondmobile');
		$client_landline     = Input::get('secondlandline');
		$father_husband_name  = Input::get('secondfather_husband_name');
		$dob                    = Input::get('seconddob');		 
		$father_husband_mobile  = Input::get('secondfather_husband_mobile');
		$father_husband_landline = Input::get('secondfather_husband_landline');  
		$marital_status          =Input::get('secondmarital');
	    $spouse_name             = Input::get('secondspouse_name');
		$if_foreigner            = Input::get('secondforeigner');
		$foreigner_country       = Input::get('secondforeigner_country');	
        $if_poa                  = Input::get('secondnopoa');		
		$poa_name                = Input::get('secondpoa_name');		      
        $zip                     = Input::get('secondzip');
		$address                 = Input::get('secondaddress');
        $city                    = Input::get('secondcity');
        $state                   = Input::get('secondstate');		
		$permanentpincode        = Input::get('secondpermanentpincode');
		$permanentaddress        = Input::get('secondpermanentaddress');
        $permanentcity           = Input::get('secondpermanentcity');
        $permanentstate          = Input::get('secondpermanentstate');		
		$organisation_business_name  = Input::get('secondorganisation_business_name');
		$designation          = Input::get('seconddesignation');
		$organisation_type          = Input::get('secondorganisation_type');
		$organisation_phone          = Input::get('secondorganisation_phone');
		$organisation_extension          = Input::get('secondorganisation_extension');		
		$organisation_zip        = Input::get('secondorganisation_zip');
		$org_address             = Input::get('secondorg_address');
		$organisationcity        = Input::get('secondorganisationcity');
		$organisationstate       = Input::get('secondorganisationstate');
		$editimage2       = Input::get('editimage2');
        $confirmation_code       = str_random(30);
        $hashed                  = Hash::make($client_password);
        $updated_at=date('y-m-d');
		DB::table('users')->where('id', $user_id)->update(
			['password' => $hashed,'updated_at'=>$updated_at]
		);
		 if ($request->hasFile('secondimage_profile')) {
				 $file = $request->file('secondimage_profile');
				 $extension = $file->getClientOriginalExtension();
				 $image_pro = uniqid() . '_doc.' . $extension;
				 $destinationPath = public_path('assets/userprofile');
				 $file->move($destinationPath, $image_pro);
				 $image_pro_name = '/assets/userprofile/' . $image_pro;
			  }
		else
		{
			$image_pro_name=$editimage2;
		}	  		
	  DB::table('user_details')->where('user_id',$user_id)->where('applicant_type','=','2')->update(
	  	['first_name'=>$client_fname,'last_name'=>$client_lname,'mobile_number'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_name'=>$father_husband_name,'father_husband_mobile'=>$father_husband_name,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation,'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone,'organisation_extention'=>$organisation_extension,'updated_at'=>$updated_at]);

	  DB::table('user_address_details')->where('user_id',$user_id)->where('applicant_type','=','2')->where('address_type_id','=','1')->update(
	  	['address_line'=>$address,'pin_code'=>$zip,'city'=>$city,'state'=>$state,'last_update'=>$updated_at]);	
	  DB::table('user_address_details')->where('user_id',$user_id)->where('applicant_type','=','2')->where('address_type_id','=','2')->update(
	  	['address_line'=>$permanentaddress,'pin_code'=>$permanentpincode,'city'=>$permanentcity,'state'=>$permanentstate,'last_update'=>$updated_at]);	
	  DB::table('user_address_details')->where('user_id',$user_id)->where('applicant_type','=','2')->where('address_type_id','=','3')->update(
	  	['address_line'=>$org_address,'pin_code'=>$organisation_zip,'city'=>$organisationcity,'state'=>$organisationstate,'last_update'=>$updated_at]);		  		  	  
	   
	     $destinationPath= public_path('assets/kyc');
		 //$document_type = DB::table('kyc_type')->get();
		 	for($i=1; $i<=10; $i++)
		 	{	
			if ($request->hasFile('secondprofileImg_'.$i)) {  	
				$kyc_type_id= Input::get('secondmySelect_'.$i);
				$description = Input::get('seconddesc_'.$i);
				$pancardNumberKyc = Input::get('secondpancardNumberKyc_'.$i);
				$adharNumberKyc = Input::get('secondadharNumberKyc_'.$i);
				$voterIdKyc = Input::get('secondvoterIdKyc_'.$i);
				$dobKyc = Input::get('seconddobKyc_'.$i);
				$passportNumberKyc = Input::get('secondpassportNumberKyc_'.$i);
				$passportIssueBy = Input::get('secondpassportIssueBy_'.$i);
				$file=$request->file('secondprofileImg_'.$i);
				$extension = $file->getClientOriginalExtension();
				$name = uniqid() . '_doc.' . $extension;
				$file->move($destinationPath, $name);
				$filename = '/assets/kyc/' . $name;
				$media_id = Media::insertGetId(['media_name' =>$filename]);

				$media_id = UserKyc::insertGetId(['media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'user_id'=>$user_id,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>'2']);
			}	
		} 
	   

		\Session::flash('success-msg', 'Successfully Edited');
		return redirect()->back();		
	}

	
    public function delete($id)
    {
        
       DB::table('users')->where('id', '=', $id)->update(
                ['is_active' => 0]
            );

     \Session::flash('success_msg', 'Successfully Deleted');
        return redirect()->back();
       


    }
    public function customerTypeStatusUpdate(Request $request)
    {
		$id = $request->input('id');
		$getUserData = DB::table('users')->where('id', '=',$id)->first();
		if($getUserData->confirmed == 1){
			$updateStatus = DB::table('users')->where('id', '=', $id)->update(['confirmed' => 0, 'updated_at' => date('y-m-d')]);
			return response()->json(['message' => 'success', 'confirmed' => 0]);
		}
		elseif($getUserData->confirmed == 0){
			$updateStatus = DB::table('users')->where('id', '=', $id)->update(['confirmed' => 1, 'updated_at' => date('y-m-d')]);
			return response()->json(['message' => 'success', 'confirmed' => 1]);
		}
		else{
			return response()->json(['message' => 'failure']);
		}    	
    }

	
	
	public function getpincodedetails(Request $request){
		$data = $request->all();
		$pincode=isset($data['pincode'])?$data['pincode']:'';
		$pincodeData = DB::table('pincode_data')->where('pincode', '=', $pincode)->groupBy('districtname')->get();
		
		return response()->json(['message' => 'success', 'pincodeData' => $pincodeData]);
	}
	
	
	public function email_verify($confirmationCode = 0){

		if( ! $confirmationCode)
        {
            \Session::flash('success-msg-registered', 'Link has been expired.');
			return redirect('/user_register');
        }
		else{
			$userData = DB::table('users')->where('confirmation_code', '=', $confirmationCode)->first();
			if(isset($userData)){
				
			
				$getProjectId = AssignProject::where('role_id', '=', 2)->where('company_type_id', '=', 1)->first();
				$getBlockData = ProjectBlocks::where('project_id', '=', $getProjectId->project_id)->where('status', '=', 1)->get();
				
				
				foreach($getBlockData as $blockData){	
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
				$paymentPlanData = PaymentPlan::where('is_active', '=', 1)->get();
				$assign_templet = DB::table('templets')->where('type', '=', 2)->where('status', '=', 1)->get();
				
				$key_value = count($assign_templet) - 1;
				//echo '<pre>'; print_r($assign_templet); die;
				return view('frontend.unitbook')->with(['userData' => $userData, 'getBlockData' => $getBlockData, 'paymentPlanData' => $paymentPlanData, 'assign_templet' => $assign_templet, 'key_value' => $key_value]);
				
			}
			else{
				\Session::flash('success-msg-registered', 'Link has been expired.');
				return redirect('/user_register');
			}
		}
	}
	
	
	public function getunitimages(Request $request){
		//echo "controller called."; die;
		$unit_id = $request->input("unit_id");
		$image_type = $request->input("image_type");
		$getUnitDetails = UnitDetails::where('unit_id' ,'=', $unit_id)->first();
		$img = $getUnitDetails->$image_type;
		if($img != NULL){
			$image_path = $img;
		}
		else{
			$image_path = "/assets/img/whiteimage.jpg";
		}
		return response()->json(['message' => 'success', 'image_path' => $image_path]);
	}
	public function ImageUpdate(Request $request)
	{
		$image=$request->file('imgupdate');
	if(isset($image))	
	{
		$id=$request->input('id');
		$applicant_type=$request->input('applicant_type');
		$users=DB::table('user_details')->where('applicant_type',$applicant_type)->where('user_id',$id)->first();
		 if($request->hasFile('imgupdate')) { 
        $usersImage = public_path($users->user_image); // get previous image from folder
        if (File::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }		 	
				 $file = $request->file('imgupdate');
				 $extension = $file->getClientOriginalExtension();
				 $image_pro = uniqid() . '_doc.' . $extension;
				 $destinationPath = public_path('assets/userprofile');
				 $file->move($destinationPath, $image_pro);
				 $image_pro_name = '/assets/userprofile/' . $image_pro;
				 $update=date('y-m-d');
				 $updated=DB::table('user_details')->where('applicant_type',$applicant_type)->where('user_id',$id)->update(['user_image'=>$image_pro_name,'updated_at'=>$update]);
				if($updated)
				{
					 return back()->with('success','Image Update Successfully');
				}
				else
				{
					return back()->with('error','!Opps something went wrong to image update');
				} 
			  }	
			  else
			 {
			 	$image_pro_name='';
			 }
	}
	else
	{
	return back()->with('error','!!Please Upload Image File!!');
	}	

	}
	
	public function getUserTreeForParentId($user_id=0) 
	{
		
		
		
		
		
	$main=DB::table('user_details')->where('user_id',$user_id)->first();
	if(!empty($main))
	{
		$created_by=$main->created_by;
	}
	else
	{
		$created_by=0;
	}
	//echo "<pre>";print_r($created_by);  exit;
	
	if($created_by)
	{
		$main=DB::table('assign_project')
		  ->where('assign_project.user_id',$created_by)
		  ->first();
	}
	else
	{
		
	  $main=DB::table('assign_project')
		  ->where('assign_project.role_id',2)
		  ->where('assign_project.company_type_id',1)
		  ->first();
		
	}
	
  //echo "<pre>";print_r($main->company_id);  exit;
  $mainCategory=DB::table('assign_project')
  ->where('assign_project.company_id',$main->company_id)
  ->where('assign_project.role_id',2)
  ->first();
	
	
	
	//echo "<pre>";print_r($mainCategory->id);  exit;
	   $data=$this->getCategoryTreeForParentId($mainCategory->id);
	
	//echo "<pre>";print_r($data); 
	   $return= $this->lavel1($data);
	
	return $return;
	
	}
	
	
	public function lavel1($data)
	{
		
		$array=$data[0];
		
		$child=$array['child'];
		unset($array['child']);
		$array['child']=array();
		if(!empty($child))
		{
		$chh=$this->lavel2($child,$array);
		return $chh;
		}
		
		return $array;
		
	}
	
	public function lavel2($data,$array1)
	{
		
		$array=$data[0];
		
		$child=$array['child'];
		unset($array['child']);
		if(!empty($child))
		{
		$chh=$this->lavel3($child,$array,$array1);
		return $chh;
		}
		
		$array['child']=$array1;
		return $array;
	}
	public function lavel3($data,$array2,$array1)
	{
		
		$array=$data[0];
		$child=$array['child'];
		unset($array['child']);
		if(!empty($child))
		{
		$chh=$this->lavel4($child,$array,$array2,$array1);
		return $chh;
		}
		
		$array2['child']=$array1;
		$array['child']=$array2;
		return $array;
	}
	public function lavel4($data,$array3,$array2,$array1)
	{
		
		$array=$data[0];
		unset($array['child']);
		$array2['child']=$array1;
		$array3['child']=$array2;
		$array['child']=$array3;
		return $array;
	}
	
	public function getCategoryTreeForParentId($parent_id) {
		//echo "<pre>";print_r($parent_id);  exit;
	  $categories = array();
	  
	  $result=DB::table('assign_project')
	  ->join('company','company.company_id','=','assign_project.company_id')
	   ->leftjoin('user_details','user_details.user_id','=','assign_project.user_id')
	  ->groupBy('assign_project.company_id')
	  ->where('assign_project.id',$parent_id)
	  ->get();
	 
	  foreach ($result as $mainCategory) {
		$category = array();
	 
		$category['id'] = $mainCategory->id;
		$category['user_id'] = $mainCategory->user_id;
		$category['fname'] = $mainCategory->first_name;
		$category['lname'] = $mainCategory->last_name;
		$category['parent_id'] =$mainCategory->parent_id;
		$category['created_by'] =$mainCategory->created_by;
		$category['company'] = $mainCategory->company_name;
		$category['company_type_id'] = $mainCategory->company_type_id;
		$category['company_id'] = $mainCategory->company_id;
		$category['child'] = $this->getCategoryTreeForParentId($category['parent_id']);
		$categories[0] = $category;
	  }
	  
	  return $categories;
	}
	public function kycMediaDelete($media_id,$kyc_type_id){
		DB::table('user_kyc')->where('media_id',$media_id)->where('kyc_type_id',$kyc_type_id)->delete();
		DB::table('media')->where('media_id',$media_id)->delete();
		return response(['success'=>'deleted successfully']);
		
	}
	
	
	/* public function getcustomers(Request $request, $customer_type){
				$data=array();
				$administrator=$request->segment(1);
				if($customer_type == 1){
					$is_active = 0;
					$confirmed = 0;
				}
				elseif($customer_type == 2){
					$is_active = 1;
					$confirmed = 1;
				}
				elseif($customer_type == 3){
					$is_active = 0;
					$confirmed = 1;
				}
		if(\Auth::user()->role==1)
		{
				  
			$clients = DB::table('users')
				->join('user_details', function($on)
				{
					$on->on('users.id','=','user_details.user_id')->where('user_details.applicant_type','=',1);
				  
				})->leftjoin('user_details as ud','users.created_by', '=', 'ud.user_id')
				->where('users.is_active','=',$is_active)
				->where('users.confirmed','=',$confirmed)
				->where('users.role','=',8)
				->orderBy('users.id','desc')
				->select(DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),DB::raw('CONCAT( ud.first_name ," ",ud.last_name ) AS booked_by'),DB::raw('CONCAT(user_details.mobile_number) AS mobile_number'),'users.*')
				->get();  
				  
		}
		else
		{
			$check_type = DB::table('assign_project')->where('user_id','=',\Auth::user()->id)->first();
			if($check_type)
			{
				if($check_type->company_type_id==1)
				{
					if($check_type->company_type_id==1 && $check_type->role_id==2)
				     {   
						$clients = DB::table('users')
							->join('user_details', function($on)
							{
								$on->on('users.id','=','user_details.user_id')->where('user_details.applicant_type','=',1);
							  
							})->leftjoin('user_details as ud','users.created_by', '=', 'ud.user_id')
							->leftjoin('assign_project','assign_project.user_id','=','users.created_by')
							->leftjoin('company','company.company_id','=','assign_project.company_id')
							->where('users.is_active','=',$is_active)
							->where('users.confirmed','=',$confirmed)
							->where('users.role','=',8)
							->orderBy('users.id','desc')
							->select(DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),DB::raw('CONCAT( ud.first_name ," ",ud.last_name ) AS booked_by'),'users.*','user_details.mobile_number','company.company_name')
							->get();  
					 }else{
						
						 $clients = DB::table('users')
							->join('user_details', function($on)
							{
								$on->on('users.id','=','user_details.user_id')->where('user_details.applicant_type','=',1);
							  
							})->leftjoin('user_details as ud','users.created_by', '=', 'ud.user_id')
							->join('assign_customer','assign_customer.customer_id','=','users.id')
							->leftjoin('assign_project','assign_project.user_id','=','users.created_by')
							->leftjoin('company','company.company_id','=','assign_project.company_id')
							->where('assign_customer.user_id','=',Auth::user()->id)
							->where('users.is_active','=',$is_active)
							->where('users.confirmed','=',$confirmed)
							->where('users.role','=',8)
							->orderBy('users.id','desc')
							->select(DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),DB::raw('CONCAT( ud.first_name ," ",ud.last_name ) AS booked_by'),'users.*','user_details.mobile_number','company.company_name')
							->get(); 
						 //echo '<pre>'; print_r($clients); exit;
					 }
				}
				else
				{
					 
					$array=array();
					$check_type = DB::table('assign_project')->where('company_id','=',\Auth::user()->company_id)->get();
					foreach($check_type as $ctype)
					{
						$array[]= $ctype->user_id;
					}

						$clients = DB::table('users')
							->join('user_details', function($on)
						{
							$on->on('users.id','=','user_details.user_id')->where('user_details.applicant_type','=',1);
							  
						})
						->leftjoin('user_details as ud','users.created_by', '=', 'ud.user_id')
						->leftjoin('assign_project','assign_project.user_id','=','users.created_by')
							->leftjoin('company','company.company_id','=','assign_project.company_id')
						->where('users.is_active','=',$is_active)
						->where('users.confirmed','=',$confirmed)
						->where('users.role','=',8)
						->whereIn('users.created_by',$array)
						->orderBy('users.id','desc')
						->select(DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),DB::raw('CONCAT( ud.first_name ," ",ud.last_name ) AS booked_by'),'users.*','user_details.mobile_number','company.company_name')
						->get();  

				}
			}
			else
			{
				$clients = DB::table('users')
				->join('user_details', function($on)
				{
					$on->on('users.id','=','user_details.user_id')->where('user_details.applicant_type','=',1);
					  
				})
				->leftjoin('user_details as ud','users.created_by', '=', 'ud.user_id')
				->leftjoin('assign_project','assign_project.user_id','=','users.created_by')
				->leftjoin('company','company.company_id','=','assign_project.company_id')
				->where('users.is_active','=',$is_active)
				->where('users.confirmed','=',$confirmed)
				->where('users.role','=',8)
				->orderBy('users.id','desc')
				->select(DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS name'),DB::raw('CONCAT( ud.first_name ," ",ud.last_name ) AS booked_by'),'users.*','user_details.mobile_number','company.company_name')
				->get(); 

				  
			}
		} 

		foreach($clients as $_key=>$client){
			$sub_array = array();
			//$sub_array[] = $client->name;
			$sub_array[] = '<a href="/'.$administrator.'/customer_detail/'.$client->id.'">'.$client->name.'</a>';
			$sub_array[] = $client->email;
			 $sub_array[] = $client->mobile_number;
			 $sub_array[] = $client->company_name;
			 $sub_array[] = $client->booked_by;
			if($client->confirmed == 0){
				$confirmed = '<a class="" onclick="adminApprovelStatus('.$client->id.')" id="confirmed'.$client->id.'" class="btn btn-sm admin_notapprov"><i class="fa fa-times-circle" style="font-size: 25px;"></i></a>';
			}
			elseif($client->confirmed == 1){
				$confirmed = '<a class="" onclick="adminApprovelStatus('.$client->id.')" id="confirmed'.$client->id.'" class="btn btn-sm admin_approv"><i class="fa fa-check-circle" style="font-size: 25px;"></i></a>';
			}
			$sub_array[] = $confirmed;
			
			$data[] = $sub_array;
		}
		
		$datatabledata=array('data'=>$data,'recordsFiltered'=>count($data));
		return response()->json($datatabledata);
	} */
	
	
	public function getCrmCustomerDetail(Request $request){
		$user_id=$request->input('user_id');
		$applicant_type=$request->input('applicant_type');
		$userData = DB::table('users')->join('customer_details','customer_details.user_id','=','users.id')
						->leftjoin('customer_address_details as ca','ca.user_id','=','users.id')
						->leftjoin('customer_address_details as pa','pa.user_id','=','users.id')
						->leftjoin('customer_address_details as oa','oa.user_id','=','users.id')
						->where('users.id','=', $user_id)->where('users.role','=', 8)
						->where('customer_details.applicant_type','=',$applicant_type)
						->where('ca.address_type_id','=',1)->where('ca.applicant_type','=',$applicant_type)
						->where('pa.address_type_id','=',2)->where('pa.applicant_type','=',$applicant_type)
						->where('oa.address_type_id','=',3)->where('ca.applicant_type','=',$applicant_type)
						->select('users.email as user_email', 'customer_details.*',
									DB::raw('CONCAT(ca.address_line, ", ", ca.city, ", ", ca.state, ", ", ca.pin_code) AS correspondence_address'),
									DB::raw('CONCAT(pa.address_line, ", ", pa.city, ", ", pa.state, ", ", pa.pin_code) AS permanent_address'),
									DB::raw('CONCAT(oa.address_line, ", ", oa.city, ", ", oa.state, ", ", oa.pin_code) AS organisation_address')
								,'oa.address_line as organisation_address','oa.city as organisation_city','oa.state as organisation_state','oa.pin_code as organisation_zip','ca.address_line as correspondanse_address','ca.city as correspondanse_city','ca.state as correspondanse_state','ca.pin_code as correspondanse_zip','pa.address_line as permanent_address','pa.city as permanent_city','pa.state as permanent_state','pa.pin_code as permanent_zip')
						->first();
					$userData->dob=	CommonHelper::display_date($userData->dob);						
		
		$userKycData = CustomerKyc::leftjoin('kyc_type', 'kyc_type.kyc_type_id','=','customer_kyc.kyc_type_id')->where('customer_kyc.user_id','=', $user_id)->where('customer_kyc.applicant_type','=',$applicant_type)->select('customer_kyc.*','kyc_type.kyc_type_name')->get();
			

		return response()->json(array('success'=>'200','userdata'=>$userData,'userKycData'=>$userKycData));
	}
	
	public function getPropertyDetails(Request $request){
		$user_id=$request->input('user_id');
		$propertyData = DB::table('users')->join('booking', 'booking.user_id','=','users.id')
								->join('unit_details','unit_details.unit_id','=','booking.unit_id')
								->join('project', 'project.project_id','=','booking.project_id')
								->join('project_blocks','project_blocks.block_id','=','booking.block_id')
								->join('payment_plan','payment_plan.payment_plan_id','=','booking.payment_plan_id')
								->where('users.id','=',$user_id)
								->where('booking.booking_status','=',2)
								->select('unit_details.unit_name','unit_details.floor_id','unit_details.type', 'project.project_name', 'project_blocks.block_name','payment_plan.plan_name','booking.booking_id')
								->get();
		
		
		
		foreach($propertyData as $property)
		{
			//echo $property->booking_id; exit;
			$property->paymentdetails = DB::table('payment_details')->leftjoin('user_plan_component','user_plan_component.user_plan_component_id','=','payment_details.user_plan_component_id')->where('payment_details.booking_id','=',$property->booking_id)->select('payment_details.*','user_plan_component.component_name')->get();
			foreach($property->paymentdetails as $a){
				
				$a->created_at = CommonHelper::display_date($a->created_at);
			}
			
		}
		
		return response()->json(array('success'=>'200','propertyData'=>$propertyData));
	}
	
	public function updateUserDetailFinal(Request $request){
			$user_id=$request->input('user_id');
			$updatedata=$request->input('updatedata');
			$message=$this->validateParam($updatedata);
			if($message){
				return response()->json(array('status'=>'408','message'=>$message));
				exit;
			}
			$datacustomer=array('email'=>$updatedata['email']);
             
			$applicant_type=1;
			
			$dataCustomerDetailArray			=	array('first_name'=>$updatedata['first_name'],'last_name'=>$updatedata['last_name'],'email'=>$updatedata['email'],'phone'=>$updatedata['phone'],'landline_number'=>$updatedata['landline_number'],'father_husband_name'=>$updatedata['father_husband_name'],'dob'=>$updatedata['dob'],'father_husband_mobile'=>$updatedata['father_husband_mobile'],'father_husband_landline'=>$updatedata['father_husband_landline'],'user_image'=>$updatedata['user_image'],'if_foreigner'=>$updatedata['if_foreigner'],'country_name'=>$updatedata['country_name'],'maritual_status'=>$updatedata['maritual_status'],'spouse_name'=>$updatedata['spouse_name'],'if_poa'=>$updatedata['if_poa'],'poa_holder_name'=>$updatedata['poa_holder_name'],'organisation_name'=>$updatedata['organisation_name'],'organisation_designation'=>$updatedata['organisation_designation'],'organisation_type'=>$updatedata['organisation_type'],'organisation_phone_number'=>$updatedata['organisation_phone_number'],'organisation_extention'=>$updatedata['organisation_extention']);
			
			$this->updateCustomer($datacustomer,$user_id);
			
			$this->updateCustomerDetail($dataCustomerDetailArray,$user_id,$applicant_type);
		
			//create customer address
			$dataCustomerCorrespondenceAddressArray			=	array('address_line'=>$updatedata['correspondanse_address'],'pin_code'=>$updatedata['correspondanse_zip'],'city'=>$updatedata['correspondanse_city'],'state'=>$updatedata['correspondanse_state']);
			
			$dataCustomerPermanentAddressArray			=	array('address_line'=>$updatedata['permanent_address'],'pin_code'=>$updatedata['permanent_zip'],'city'=>$updatedata['permanent_city'],'state'=>$updatedata['permanent_state']);
			
			$dataCustomerBusinessAddressArray			=	array('address_line'=>$updatedata['organisation_address'],'pin_code'=>$updatedata['organisation_zip'],'city'=>$updatedata['organisation_city'],'state'=>$updatedata['organisation_state']);
	
			$this->updateCustomerAddressFunction($dataCustomerCorrespondenceAddressArray,$user_id,1,$applicant_type);
			$this->updateCustomerAddressFunction($dataCustomerPermanentAddressArray,$user_id,2,$applicant_type);
			$this->updateCustomerAddressFunction($dataCustomerBusinessAddressArray,$user_id,3,$applicant_type);
			
			/* $destinationPath= public_path('assets/kyc');
			for($i=1; $i<=10; $i++)
			{	
			if ($request->hasFile('profileImg_'.$i)) { 
			   
				$kyc_type_id= Input::get('mySelect_'.$i);
				$description = Input::get('desc_'.$i);
				$pancardNumberKyc = Input::get('pancardNumberKyc_'.$i);
				$adharNumberKyc = Input::get('adharNumberKyc_'.$i);
				$voterIdKyc = Input::get('voterIdKyc_'.$i);
				$dobKyc = Input::get('dobKyc_'.$i);
				$passportNumberKyc = Input::get('passportNumberKyc_'.$i);
				$passportIssueBy = Input::get('passportIssueBy_'.$i);
				$file=$request->file('profileImg_'.$i);
				$extension = $file->getClientOriginalExtension();
				$name = uniqid() . '_doc.' . $extension;
				$file->move($destinationPath, $name);
				$filename = '/assets/kyc/' . $name;
				$media_id = Media::insertGetId(['media_name' => $filename]);
				
				$check=TempCustomerKyc::where('customer_code', '=', $customer_code)->where('kyc_type_id', '=', $kyc_type_id)->where('applicant_type', '=', $applicant_type)->first();
				if($check)
				{
					$media_id = TempCustomerKyc::where('customer_code','=', $customer_code)->where('kyc_type_id', '=',$kyc_type_id)->where('applicant_type', '=', $applicant_type)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy]);
				}
				else
				{
					$media_id = TempCustomerKyc::insertGetId(['temp_customer_id'=>$temp_customer_id,'media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'customer_code'=>$customer_code,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
				}
			}	
			} */
			return response()->json(array('status'=>'200','message'=>'Update Succesfully.'));
	}
	
	
	public function inviteNewcustomer(Request $request, $leads_id=0)
  {
		return view('customer.create_invite_customer',['leads_id'=>$leads_id]);
	}

	public function getLeadInfo(Request $request)
  {
    $leads_id = $request->input('leads_id');
    $leadData = [];
    if($leads_id){
      $leadData =  Leads::where('tbl_leads.leads_id',$leads_id)->first();
    }
    return response()->json(array('status'=>'200','message'=>'success', 'leadData'=>$leadData));
  }

	/* public function create_invite_firstuser(Request $request)
      { 	 
	      $userData= $request->all();
			//echo '<pre>'; print_r($userData); exit;
		$validator = Validator::make($request->all(), [
		'first_name' => 'required',
		'email'		 => 'required|email|unique:users',
		'password'	 => 'required|min:6',
		'dob'        => 'required',
		'zip'	  	 => 'required',
		'address'	 => 'required',
		'city'		 => 'required',
		'state'		 => 'required'
		]);

		if ($validator->fails()) {    
		return response()->json($validator->messages(), 200);
		} 					
		
		$link      							= 	Input::get('link');
        $client_fname     	 				= 	Input::get('first_name');
		$client_lname      					= 	Input::get('last_name');		
        $client_email      					= 	Input::get('email');
        $client_password   					= 	trim(Input::get('password'));
        $client_mobile      				= 	Input::get('mobile');
		$client_landline     				= 	Input::get('landline');
		$father_husband_name  				= 	Input::get('father_husband_name');
		$dob                    			= 	Input::get('dob');		 
		$father_husband_mobile  			= 	Input::get('father_husband_mobile');
		$father_husband_landline 			= 	Input::get('father_husband_landline');  
		$marital_status          			= 	Input::get('marital');
	    $spouse_name             			= 	Input::get('spouse_name');
		$if_foreigner            			= 	Input::get('foreigner');
		$foreigner_country       			= 	Input::get('foreigner_country');	
        $if_poa                  			= 	Input::get('nopoa');		
		$poa_name                			= 	Input::get('poa_name');		      
        $zip                     			= 	Input::get('zip');
		$address                 			= 	Input::get('address');
        $city                    			= 	Input::get('city');
        $state                   			= 	Input::get('state');		
		$permanentpincode        			= 	Input::get('permanentpincode');
		$permanentaddress        			= 	Input::get('permanentaddress');
        $permanentcity           			= 	Input::get('permanentcity');
        $permanentstate          			= 	Input::get('permanentstate');		
		$organisation_business_name 		= 	Input::get('organisation_business_name');
		$designation          				= 	Input::get('designation');
		$organisation_type          		= 	Input::get('organisation_type');
		$organisation_phone          		= 	Input::get('organisation_phone');
		$organisation_extension         	= 	Input::get('organisation_extension');		
		$organisation_zip        			= 	Input::get('organisation_zip');
		$org_address             			= 	Input::get('org_address');
		$organisationcity        			= 	Input::get('organisationcity');
		$organisationstate       			= 	Input::get('organisationstate');	
        $Project             				= 	Input::get('Project');
        $role                    			= 	Input::get('role');
		$confirmed               			= 	Input::get('confirmed');
        $hashed                  			= 	Hash::make($client_password);
		$sender_id               			= 	Input::get('sender_id');
		$company_id               			= 	Input::get('company_id');
		$applicant_type						=	1;
		$customer_code						=	CommonHelper::quickAlphanumericRandom(10);
		$InviteLink = VendorInvite::where('link', '=', $link);
		$link_id=$InviteLink->select('id')->first();
		
		 //create customer
		$dataCustomerArray					=	array('customer_code'=>$customer_code,'first_name'=>$client_fname,'middle_name'=>'','last_name'=>$client_lname,'email'=>$client_email,'password'=>$hashed,'role'=>8,'phone'=>$client_mobile,'status'=>0,'is_confirmed'=>0,'remember_token'=>'');
		
		 $id      = $this->createCustomerFunction($dataCustomerArray); 
		$id      = DB::table('users')->insertGetId(['role'=>8,'email' => $client_email,'password' => $hashed,'confirmation_code' =>'' ,'created_by'=>$sender_id??0,'company_id'=>$company_id??0,'confirmed'=> 0,'user_type_id'=>1,'is_active'=>2]);
		
		if ($request->hasFile('image_profile')) {
			 $file = $request->file('image_profile');
			 $extension = $file->getClientOriginalExtension();
			 $image_pro = uniqid() . '_doc.' . $extension;
			 $destinationPath = public_path('assets/userprofile');
			 $file->move($destinationPath, $image_pro);
			 $image_pro_name = '/assets/userprofile/' . $image_pro;
		}
		 else{$image_pro_name='';}
		 
		 //create customer detail
		 $dataCustomerDetailArray			=	array('user_id'=>$id,'customer_code'=>$customer_code,'first_name'=>$client_fname,'last_name'=>$client_lname,'email'=>$client_email,'phone'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation,'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone,'organisation_extention'=>$organisation_extension,'applicant_type'=>$applicant_type,'status'=>0,'created_by'=>0);
		 
		 $user_detail_id					=	$this->createCustomerDetailFunction($dataCustomerDetailArray);
		
		//create customer address
		$dataCustomerCorrespondenceAddressArray			=	array('user_id'=>$id,'address_type_id'=>1,'applicant_type'=>$applicant_type,'address_line'=>$address,'pin_code'=>$zip,'city'=>$city,'state'=>$state);
		
		$dataCustomerPermanentAddressArray			=	array('user_id'=>$id,'address_type_id'=>2,'applicant_type'=>$applicant_type,'address_line'=>$permanentaddress,'pin_code'=>$permanentpincode,'city'=>$permanentcity,'state'=>$permanentstate);
		
		$dataCustomerBusinessAddressArray			=	array('user_id'=>$id,'address_type_id'=>3,'applicant_type'=>$applicant_type,'address_line'=>$org_address,'pin_code'=>$organisation_zip,'city'=>$organisationcity,'state'=>$organisationstate);
		
	    $this->createCustomerAddressFunction($dataCustomerCorrespondenceAddressArray);
	    $this->createCustomerAddressFunction($dataCustomerPermanentAddressArray);
	    $this->createCustomerAddressFunction($dataCustomerBusinessAddressArray);
		 
		 $InviteLink->update(['is_active' => 0]);
		 
		 $destinationPath= public_path('assets/kyc');
			for($i=1; $i<=10; $i++)
			{	
				if ($request->hasFile('profileImg_'.$i)) { 
				   
					$kyc_type_id= Input::get('mySelect_'.$i);
					$description = Input::get('desc_'.$i);
					$pancardNumberKyc = Input::get('pancardNumberKyc_'.$i);
					$adharNumberKyc = Input::get('adharNumberKyc_'.$i);
					$voterIdKyc = Input::get('voterIdKyc_'.$i);
					$dobKyc = Input::get('dobKyc_'.$i);
					$passportNumberKyc = Input::get('passportNumberKyc_'.$i);
					$passportIssueBy = Input::get('passportIssueBy_'.$i);
					$file=$request->file('profileImg_'.$i);
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_doc.' . $extension;
					$file->move($destinationPath, $name);
					$filename = '/assets/kyc/' . $name;
					$media_id = Media::insertGetId(['media_name' => $filename]);
					
					$check=CustomerKyc::where('user_id', '=', $id)->where('kyc_type_id', '=', $kyc_type_id)->first();
					if($check)
					{
						$media_id = CustomerKyc::where('user_id','=', $id)->where('kyc_type_id', '=',$kyc_type_id)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
					}
					else
					{
						$media_id = CustomerKyc::insertGetId(['media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'user_id'=>$id,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
					}
				}	
			} 
		 
		if($user_detail_id){
			CustomerDetails::where('customer_detail_id','=',$user_detail_id)->update(['invitation_link_id'=>$link_id->id]);
			
				return response()->json(['message' => 'success', 'success_msg' => "First applicant created Successfully", 'user_id' =>$id,'client_email'=>$client_email,'client_password'=>$client_password ]);
			}
			else{
				return response()->json(['message' => 'failure', 'success_msg' => "First applicant Not Created."]);
			}   	 
	 
    } */
	
	public function create_invite_firstuser(Request $request)
	{ 	

	      $userData= $request->all();
			
		$validator = Validator::make($request->all(), [
		'first_name' => 'required',
		'email'		 => 'required|email',
		//'password'	 => 'required|min:6',
		'dob'        => 'required',
		'zip'	  	 => 'required',
		'address'	 => 'required',
		'city'		 => 'required',
		'state'		 => 'required'
		]);

		if ($validator->fails()) {    
			return response()->json($validator->messages(), 200);
		} 					
		
		$link      							= 	Input::get('link');
        $client_fname     	 				= 	Input::get('first_name');
		$client_lname      					= 	Input::get('last_name');		
        $client_email      					= 	Input::get('email');
        $client_password   					= 	trim(Input::get('password'));
        $client_mobile      				= 	Input::get('mobile');
		$client_landline     				= 	Input::get('landline');
		$father_husband_name  				= 	Input::get('father_husband_name');
		$dob                    			= 	Input::get('dob');		 
		$father_husband_mobile  			= 	Input::get('father_husband_mobile');
		$father_husband_landline 			= 	Input::get('father_husband_landline');  
		$marital_status          			= 	Input::get('marital');
	    $spouse_name             			= 	Input::get('spouse_name');
		$if_foreigner            			= 	Input::get('foreigner');
		$foreigner_country       			= 	Input::get('foreigner_country');	
        $if_poa                  			= 	Input::get('nopoa');		
		$poa_name                			= 	Input::get('poa_name');		      
        $zip                     			= 	Input::get('zip');
		$address                 			= 	Input::get('address');
        $city                    			= 	Input::get('city');
        $state                   			= 	Input::get('state');		
		$permanentpincode        			= 	Input::get('permanentpincode');
		$permanentaddress        			= 	Input::get('permanentaddress');
        $permanentcity           			= 	Input::get('permanentcity');
        $permanentstate          			= 	Input::get('permanentstate');		
		$organisation_business_name 		= 	Input::get('organisation_business_name');
		$designation          				= 	Input::get('designation');
		$organisation_type          		= 	Input::get('organisation_type');
		$organisation_phone          		= 	Input::get('organisation_phone');
		$organisation_extension         	= 	Input::get('organisation_extension');		
		$organisation_zip        			= 	Input::get('organisation_zip');
		$org_address             			= 	Input::get('org_address');
		$organisationcity        			= 	Input::get('organisationcity');
		$organisationstate       			= 	Input::get('organisationstate');	
        $Project             				= 	Input::get('Project');
        $role                    			= 	Input::get('role');
		$confirmed               			= 	Input::get('confirmed');
       // $hashed                  			= 	Hash::make($client_password);
        $hashed                  			= 	'';
		$sender_id               			= 	Input::get('sender_id');
		$company_id               			= 	Input::get('company_id');
		$applicant_type						=	1;
		//$customer_code						=	CommonHelper::quickAlphanumericRandom(10);
		$InviteLink = VendorInvite::where('link', '=', $link);
		$link_id=$InviteLink->first();
	
		$tempDetail=TempCustomerDetails::where('invitation_link_id','=',$link_id->id)->where('applicant_type','=',$applicant_type)->first();
		//echo '<pre>'; print_r($tempDetail); exit;
		 //create temp customer
		 if(!$tempDetail){
			 
			$customer_code						=	CommonHelper::quickAlphanumericRandom(10);
			
			$datatempcustom=array('sender_id'=>$link_id->sender_id,'company_type_id'=>$link_id->company_type_id,'project_id'=>$link_id->project_id,'block_id'=>$link_id->block_id,'unit_id'=>$link_id->unit_id,'first_name'=>$client_fname,'last_name'=>$client_lname,'email'=>$client_email,'phone'=>$client_mobile,'block_type'=>$link_id->block_type,'leads_id'=>$link_id->leads_id,'password'=>$hashed,'customer_code'=>$customer_code,'is_active'=>'1','created_at'=>date('Y-m-d H:i:s'));
			
			$temp_customer_id=$this->createTempCustomerFunction($datatempcustom); 
			
			/* if ($request->hasFile('image_profile')) {
				 $file = $request->file('image_profile');
				 $extension = $file->getClientOriginalExtension();
				 $image_pro = uniqid() . '_doc.' . $extension;
				 $destinationPath = public_path('assets/userprofile');
				 $file->move($destinationPath, $image_pro);
				 $image_pro_name = '/assets/userprofile/' . $image_pro;
			}
			 else{$image_pro_name='';} */
			 if ($request->hasFile('image_profile')) {
			 $file = $request->file('image_profile');
			 $image_pro_name = CommonHelper::saveMedia($file,"customer/profileimage",5,'public');
			}
			else{$image_pro_name='';}
			 
			 //create customer detail
			 $dataCustomerDetailArray			=	array('temp_customer_id'=>$temp_customer_id,'customer_code'=>$customer_code,'first_name'=>$client_fname,'last_name'=>$client_lname,'email'=>$client_email,'phone'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation,'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone,'organisation_extention'=>$organisation_extension,'applicant_type'=>$applicant_type,'status'=>1,'created_by'=>$link_id->sender_id,'invitation_link_id'=>$link_id->id);
			 
			 $user_detail_id					=	$this->createTempCustomerDetailFunction($dataCustomerDetailArray);
			
			//create customer address
			$dataCustomerCorrespondenceAddressArray			=	array('temp_customer_id'=>$temp_customer_id,'customer_code'=>$customer_code,'address_type_id'=>1,'applicant_type'=>$applicant_type,'address_line'=>$address,'pin_code'=>$zip,'city'=>$city,'state'=>$state);
			
			$dataCustomerPermanentAddressArray			=	array('temp_customer_id'=>$temp_customer_id,'customer_code'=>$customer_code,'address_type_id'=>2,'applicant_type'=>$applicant_type,'address_line'=>$permanentaddress,'pin_code'=>$permanentpincode,'city'=>$permanentcity,'state'=>$permanentstate);
			
			$dataCustomerBusinessAddressArray			=	array('temp_customer_id'=>$temp_customer_id,'customer_code'=>$customer_code,'address_type_id'=>3,'applicant_type'=>$applicant_type,'address_line'=>$org_address,'pin_code'=>$organisation_zip,'city'=>$organisationcity,'state'=>$organisationstate);
			
			$this->createTempCustomerAddressFunction($dataCustomerCorrespondenceAddressArray);
			$this->createTempCustomerAddressFunction($dataCustomerPermanentAddressArray);
			$this->createTempCustomerAddressFunction($dataCustomerBusinessAddressArray);
			 
			    //$InviteLink->update(['is_active' => 0]);
			 
			   $destinationPath= public_path('assets/kyc');
				for($i=1; $i<=10; $i++)
				{	
					if ($request->hasFile('profileImg_'.$i)) { 
					   
						$kyc_type_id= Input::get('mySelect_'.$i);
						$description = Input::get('desc_'.$i);
						$pancardNumberKyc = Input::get('pancardNumberKyc_'.$i);
						$adharNumberKyc = Input::get('adharNumberKyc_'.$i);
						$voterIdKyc = Input::get('voterIdKyc_'.$i);
						$dobKyc = Input::get('dobKyc_'.$i);
						$passportNumberKyc = Input::get('passportNumberKyc_'.$i);
						$passportIssueBy = Input::get('passportIssueBy_'.$i);
						$file=$request->file('profileImg_'.$i);
						/* $file=$request->file('profileImg_'.$i);
						$extension = $file->getClientOriginalExtension();
						$name = uniqid() . '_doc.' . $extension;
						$file->move($destinationPath, $name);
						$filename = '/assets/kyc/' . $name; */
						$filename=CommonHelper::saveMedia($file,"customer/customerkyc",5,'public');
						$media_id = Media::insertGetId(['media_name' => $filename]);
						
						$check=TempCustomerKyc::where('customer_code', '=', $customer_code)->where('applicant_type', '=', $applicant_type)->where('kyc_type_id', '=', $kyc_type_id)->first();
						if($check)
						{
							$media_id = TempCustomerKyc::where('customer_code','=', $customer_code)->where('applicant_type', '=', $applicant_type)->where('kyc_type_id', '=',$kyc_type_id)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
						}
						else
						{
							$media_id = TempCustomerKyc::insertGetId(['temp_customer_id'=>$temp_customer_id,'media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'customer_code'=>$customer_code,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
						}
					}	
				} 
		 }else{
			 //update
			 
			 $customer_code		= $tempDetail->customer_code;
			 $temp_customer_id	= $tempDetail->temp_customer_id;
			 
			 TempCustomerDetails::where('temp_customer_id','=',$temp_customer_id)->where('applicant_type','=',2)->update(['status'=>0]);
			 
			////'temp_customer_id'=>$temp_customer_id
			 $datatempcustom=array('sender_id'=>$link_id->sender_id,'company_type_id'=>$link_id->company_type_id,'project_id'=>$link_id->project_id,'block_id'=>$link_id->block_id,'unit_id'=>$link_id->unit_id,'first_name'=>$client_fname,'last_name'=>$client_lname,'email'=>$client_email,'phone'=>$client_mobile,'block_type'=>$link_id->block_type,'leads_id'=>$link_id->leads_id,'is_active'=>'1','created_at'=>date('Y-m-d H:i:s'));
			  
			 $this->updateTempCustomer($datatempcustom,$customer_code);
			 
			/* if ($request->hasFile('image_profile')) {
			 $file = $request->file('image_profile');
			 $extension = $file->getClientOriginalExtension();
			 $image_pro = uniqid() . '_doc.' . $extension;
			 $destinationPath = public_path('assets/userprofile');
			 $file->move($destinationPath, $image_pro);
			 $image_pro_name = '/assets/userprofile/' . $image_pro;
			}
			else{$image_pro_name='';} */
			if ($request->hasFile('image_profile')) {
			$file = $request->file('image_profile');
			$image_pro_name = CommonHelper::saveMedia($file,"customer/profileimage",5,'public');
			}
			else
			{
				$image_pro_name=$tempDetail->user_image;
				
			}
			
			//create customer detail
			$dataCustomerDetailArray			=	array('first_name'=>$client_fname,'last_name'=>$client_lname,'email'=>$client_email,'phone'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation,'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone,'organisation_extention'=>$organisation_extension,'status'=>1,'created_by'=>$link_id->sender_id);

			$user_detail_id					=	$this->updateTempCustomerDetailFunction($dataCustomerDetailArray, $customer_code,$applicant_type);
			
			
			//create customer address
			$dataCustomerCorrespondenceAddressArray			=	array('address_line'=>$address,'pin_code'=>$zip,'city'=>$city,'state'=>$state);
			
			$dataCustomerPermanentAddressArray			=	array('address_line'=>$permanentaddress,'pin_code'=>$permanentpincode,'city'=>$permanentcity,'state'=>$permanentstate);
			
			$dataCustomerBusinessAddressArray			=	array('address_line'=>$org_address,'pin_code'=>$organisation_zip,'city'=>$organisationcity,'state'=>$organisationstate);
			
			$this->updateTempCustomerAddressFunction($dataCustomerCorrespondenceAddressArray,$customer_code,1,$applicant_type);
			$this->updateTempCustomerAddressFunction($dataCustomerPermanentAddressArray,$customer_code,2,$applicant_type);
			$this->updateTempCustomerAddressFunction($dataCustomerBusinessAddressArray,$customer_code,3,$applicant_type);
			
			TempCustomerKyc::where('customer_code', '=', $customer_code)->update(['status'=>0]);
			
			$destinationPath= public_path('assets/kyc');
			for($i=1; $i<=10; $i++)
			{	
			if ($request->hasFile('profileImg_'.$i)) { 
			   
				$kyc_type_id= Input::get('mySelect_'.$i);
				$description = Input::get('desc_'.$i);
				$pancardNumberKyc = Input::get('pancardNumberKyc_'.$i);
				$adharNumberKyc = Input::get('adharNumberKyc_'.$i);
				$voterIdKyc = Input::get('voterIdKyc_'.$i);
				$dobKyc = Input::get('dobKyc_'.$i);
				$passportNumberKyc = Input::get('passportNumberKyc_'.$i);
				$passportIssueBy = Input::get('passportIssueBy_'.$i);
				$file=$request->file('profileImg_'.$i);
				/* $extension = $file->getClientOriginalExtension();
				$name = uniqid() . '_doc.' . $extension;
				$file->move($destinationPath, $name);
				$filename = '/assets/kyc/' . $name; */
				$filename=CommonHelper::saveMedia($file,"customer/customerkyc",5,'public');
				$media_id = Media::insertGetId(['media_name' => $filename]);
				
				$check=TempCustomerKyc::where('customer_code', '=', $customer_code)->where('kyc_type_id', '=', $kyc_type_id)->where('applicant_type', '=', $applicant_type)->first();
				if($check)
				{
					$media_id = TempCustomerKyc::where('customer_code','=', $customer_code)->where('kyc_type_id', '=',$kyc_type_id)->where('applicant_type', '=', $applicant_type)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'status'=>1]);
				}
				else
				{
					$media_id = TempCustomerKyc::insertGetId(['temp_customer_id'=>$temp_customer_id,'media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'customer_code'=>$customer_code,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type,'status'=>1]);
				}
			}	
			}
		 }
		 
		if($user_detail_id){
			//CustomerDetails::where('customer_detail_id','=',$user_detail_id)->update(['invitation_link_id'=>$link_id->id]);
			
				return response()->json(['message' => 'success', 'success_msg' => "First applicant created Successfully", 'customer_code' =>$customer_code,'client_email'=>$client_email,'client_password'=>$client_password ]);
			}
			else{
				return response()->json(['message' => 'failure', 'success_msg' => "First applicant Not Created."]);
			}   	 
	 
    }
	
	//create second applicant
	public function create_invite_seconduser(Request $request)
      { 	 			
		$customer_code =Input::get('customer_code');
		$validator = Validator::make($request->all(), [
		'first_name' => 'required',
		'dob'        => 'required',
		'zip'	  	 => 'required',
		'address'	 => 'required',
		'city'		 => 'required',
		'state'		 => 'required'
		]);

		if ($validator->fails()) {    
			return response()->json($validator->messages(), 200);
		} 
		
		$client_fname      					= Input::get('first_name');
		$client_lname      					= Input::get('last_name');		
		$client_mobile      				= Input::get('mobile');
		$client_landline     				= Input::get('landline');
		$father_husband_name  				= Input::get('father_husband_name');
		$dob                    			= Input::get('dob');		 
		$father_husband_mobile  			= Input::get('father_husband_mobile');
		$father_husband_landline 			= Input::get('father_husband_landline');  
		$marital_status          			=Input::get('marital');
		$spouse_name             			= Input::get('spouse_name');
		$if_foreigner            			= Input::get('foreigner');
		$foreigner_country       			= Input::get('foreigner_country');	
		$if_poa                  			= Input::get('nopoa');		
		$poa_name                			= Input::get('poa_name');		      
		$zip                     			= Input::get('zip');
		$address                 			= Input::get('address');
		$city                    			= Input::get('city');
		$state                   			= Input::get('state');		
		$permanentpincode        			= Input::get('permanentpincode');
		$permanentaddress        			= Input::get('permanentaddress');
		$permanentcity           			= Input::get('permanentcity');
		$permanentstate          			= Input::get('permanentstate');		
		$organisation_business_name 		= Input::get('organisation_business_name');
		$designation          				= Input::get('designation');
		$organisation_type          		= Input::get('organisation_type');
		$organisation_phone          		= Input::get('organisation_phone');
		$organisation_extension         	= Input::get('organisation_extension');		
		$organisation_zip       			= Input::get('organisation_zip');
		$org_address             			= Input::get('org_address');
		$organisationcity        			= Input::get('organisationcity');
		$organisationstate       			= Input::get('organisationstate');	
		$second_sender_id       			= Input::get('second_sender_id');	
        $applicant_type						=2;
		

		$tempDetail=TempCustomerDetails::where('customer_code','=',$customer_code)->where('applicant_type','=',$applicant_type)->select('customer_code','temp_customer_id')->first();
		if(!$tempDetail){
			$customer_code  					= $customer_code;
			 
			 $tempDetail=TempCustomerDetails::where('customer_code','=',$customer_code)->where('applicant_type','=',1)->select('customer_code','temp_customer_id')->first();
			 $temp_customer_id	= $tempDetail->temp_customer_id;
			
			if ($request->hasFile('second_image_profile')) {
			 $file = $request->file('second_image_profile');
			 $image_pro_name = CommonHelper::saveMedia($file,"customer/profileimage",5,'public');
			}
			else{$image_pro_name='';}
			
			 //create customer detail
			 $dataCustomerDetailArray			=	array('temp_customer_id'=>$temp_customer_id,'customer_code'=>$customer_code,'first_name'=>$client_fname,'last_name'=>$client_lname,'email'=>'','phone'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation,'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone,'organisation_extention'=>$organisation_extension,'applicant_type'=>$applicant_type,'status'=>1,'created_by'=>'','invitation_link_id'=>'');
			 
			 $user_detail_id					=	$this->createTempCustomerDetailFunction($dataCustomerDetailArray);
			
			
			//create customer address
			$dataCustomerCorrespondenceAddressArray			=	array('temp_customer_id'=>$temp_customer_id,'customer_code'=>$customer_code,'address_type_id'=>1,'applicant_type'=>$applicant_type,'address_line'=>$address,'pin_code'=>$zip,'city'=>$city,'state'=>$state);
			
			$dataCustomerPermanentAddressArray			=	array('temp_customer_id'=>$temp_customer_id,'customer_code'=>$customer_code,'address_type_id'=>2,'applicant_type'=>$applicant_type,'address_line'=>$permanentaddress,'pin_code'=>$permanentpincode,'city'=>$permanentcity,'state'=>$permanentstate);
			
			$dataCustomerBusinessAddressArray			=	array('temp_customer_id'=>$temp_customer_id,'customer_code'=>$customer_code,'address_type_id'=>3,'applicant_type'=>$applicant_type,'address_line'=>$org_address,'pin_code'=>$organisation_zip,'city'=>$organisationcity,'state'=>$organisationstate);
			
			$this->createTempCustomerAddressFunction($dataCustomerCorrespondenceAddressArray);
			$this->createTempCustomerAddressFunction($dataCustomerPermanentAddressArray);
			$this->createTempCustomerAddressFunction($dataCustomerBusinessAddressArray);
			
			 
			 $destinationPath= public_path('assets/kyc');
				for($i=1; $i<=10; $i++)
				{	
					if ($request->hasFile('secondprofileImg_'.$i)) { 
						$kyc_type_id= Input::get('secondmySelect_'.$i);
						$description = Input::get('seconddesc_'.$i);
						$pancardNumberKyc = Input::get('secondpancardNumberKyc_'.$i);
						$adharNumberKyc = Input::get('secondadharNumberKyc_'.$i);
						$voterIdKyc = Input::get('secondvoterIdKyc_'.$i);
						$dobKyc = Input::get('seconddobKyc_'.$i);
						$passportNumberKyc = Input::get('secondpassportNumberKyc_'.$i);
						$passportIssueBy = Input::get('secondpassportIssueBy_'.$i);
						$file=$request->file('secondprofileImg_'.$i);
						/* $extension = $file->getClientOriginalExtension();
						$name = uniqid() . '_doc.' . $extension;
						$file->move($destinationPath, $name);
						$filename = '/assets/kyc/' . $name; */
						$filename=CommonHelper::saveMedia($file,"customer/customerkyc",5,'public');
						$media_id = Media::insertGetId(['media_name' => $filename]);
						
						$check=TempCustomerKyc::where('customer_code', '=', $customer_code)->where('kyc_type_id', '=', $kyc_type_id)->where('applicant_type', '=', $applicant_type)->first();
						if($check)
						{
							$media_id = TempCustomerKyc::where('customer_code','=', $customer_code)->where('kyc_type_id', '=',$kyc_type_id)->where('applicant_type', '=',$applicant_type)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
						}
						else
						{
							$media_id = TempCustomerKyc::insertGetId(['temp_customer_id'=>$temp_customer_id,'media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'customer_code'=>$customer_code,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
						}
					}	
				} 
		}else{
			 $customer_code	= $tempDetail->customer_code;
			 $temp_customer_id	= $tempDetail->temp_customer_id;
			
			/* if ($request->hasFile('second_image_profile')) {
			 $file = $request->file('second_image_profile');
			 $extension = $file->getClientOriginalExtension();
			 $image_pro = uniqid() . '_doc.' . $extension;
			 $destinationPath = public_path('assets/userprofile');
			 $file->move($destinationPath, $image_pro);
			 $image_pro_name = '/assets/userprofile/' . $image_pro;
			}
			else{$image_pro_name='';} */
			if ($request->hasFile('second_image_profile')) {
			 $file = $request->file('second_image_profile');
			 $image_pro_name = CommonHelper::saveMedia($file,"customer/profileimage",5,'public');
			}
			else{$image_pro_name='';}
			 //update customer detail 
			$dataCustomerDetailArray			=	array('temp_customer_id'=>$temp_customer_id,'first_name'=>$client_fname,'last_name'=>$client_lname,'email'=>'','phone'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation,'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone,'organisation_extention'=>$organisation_extension,'status'=>1,'created_by'=>'');

			$user_detail_id					=	$this->updateTempCustomerDetailFunction($dataCustomerDetailArray, $customer_code,$applicant_type);
			
			
			//update customer address
			$dataCustomerCorrespondenceAddressArray			=	array('temp_customer_id'=>$temp_customer_id,'temp_customer_id'=>$temp_customer_id,'address_line'=>$address,'pin_code'=>$zip,'city'=>$city,'state'=>$state);
			
			$dataCustomerPermanentAddressArray			=	array('temp_customer_id'=>$temp_customer_id,'address_line'=>$permanentaddress,'pin_code'=>$permanentpincode,'city'=>$permanentcity,'state'=>$permanentstate);
			
			$dataCustomerBusinessAddressArray			=	array('temp_customer_id'=>$temp_customer_id,'address_line'=>$org_address,'pin_code'=>$organisation_zip,'city'=>$organisationcity,'state'=>$organisationstate);
			
			$this->updateTempCustomerAddressFunction($dataCustomerCorrespondenceAddressArray,$customer_code,1,$applicant_type);
			$this->updateTempCustomerAddressFunction($dataCustomerPermanentAddressArray,$customer_code,2,$applicant_type);
			$this->updateTempCustomerAddressFunction($dataCustomerBusinessAddressArray,$customer_code,3,$applicant_type);
			
			$destinationPath= public_path('assets/kyc');
		 
		 	for($i=1; $i<=10; $i++)
		 	{	

			if ($request->hasFile('secondprofileImg_'.$i)) { 
						$kyc_type_id= Input::get('secondmySelect_'.$i);
						$description = Input::get('seconddesc_'.$i);
						$pancardNumberKyc = Input::get('secondpancardNumberKyc_'.$i);
						$adharNumberKyc = Input::get('secondadharNumberKyc_'.$i);
						$voterIdKyc = Input::get('secondvoterIdKyc_'.$i);
						$dobKyc = Input::get('seconddobKyc_'.$i);
						$passportNumberKyc = Input::get('secondpassportNumberKyc_'.$i);
						$passportIssueBy = Input::get('secondpassportIssueBy_'.$i);
						$file=$request->file('secondprofileImg_'.$i);
						/* $extension = $file->getClientOriginalExtension();
						$name = uniqid() . '_doc.' . $extension;
						$file->move($destinationPath, $name);
						$filename = '/assets/kyc/' . $name; */
						$filename=CommonHelper::saveMedia($file,"customer/customerkyc",5,'public');
						$media_id = Media::insertGetId(['media_name' => $filename]);
						
						$check=TempCustomerKyc::where('customer_code', '=', $customer_code)->where('kyc_type_id', '=', $kyc_type_id)->where('applicant_type', '=', $applicant_type)->first();
						if($check)
						{
							$media_id = TempCustomerKyc::where('customer_code','=', $customer_code)->where('kyc_type_id', '=',$kyc_type_id)->where('applicant_type', '=',$applicant_type)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
						}
						else
						{
							$media_id = TempCustomerKyc::insertGetId(['temp_customer_id'=>$temp_customer_id,'media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'customer_code'=>$customer_code,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
						}
					}	
				}
			
		}
		if($user_detail_id){
			
				return response()->json(['message' => 'success', 'success_msg' => "Second applicant created Successfully", 'customer_code' =>$customer_code ]);
			}
			else{
				return response()->json(['message' => 'failure', 'success_msg' => "Second applicant Not Created."]);
			}   	 
	 
    }
	
	public function updateTempCustomer($datatempcustom,$customer_code){
		
		TempCustomer::where('customer_code','=',$customer_code)->update($datatempcustom);
		return true;
	}
	
	public function updateTempCustomerDetailFunction($dataCustomerDetailArray,$customer_code,$applicant_type){
		
		TempCustomerDetails::where('customer_code','=',$customer_code)->where('applicant_type','=',$applicant_type)->update($dataCustomerDetailArray);
		return true;
	}
	public function updateTempCustomerAddressFunction($dataCustomerTempAddressArray,$customer_code,$addressType,$applicant_type){
		
		TempCustomerAddressDetails::where('customer_code','=',$customer_code)->where('address_type_id','=',$addressType)->where('applicant_type','=',$applicant_type)->update($dataCustomerTempAddressArray);
		return true;
	}	
	
	public function updateCustomerAddressFunction($dataCustomerAddressArray,$user_id,$addressType,$applicant_type){
		
		CustomerAddressDetails::where('user_id','=',$user_id)->where('address_type_id','=',$addressType)->where('applicant_type','=',$applicant_type)->update($dataCustomerAddressArray);
		return true;
	}
	
	//create temp customer
	public function createTempCustomerFunction($dataCustomerArray){

		$newcustomer=TempCustomer::create($dataCustomerArray);
		return $newcustomer->id;
	}
	
	
	//create temp customer Detail
	public function createTempCustomerDetailFunction($dataCustomerDetailArray){

		$newcustomerdetail=TempCustomerDetails::create($dataCustomerDetailArray);
		return $newcustomerdetail->temp_customer_detail_id;
	} 
	
	//create temp customer Address
	public function createTempCustomerAddressFunction($dataCustomerDetailArray){

		$newtempcustomeraddress=TempCustomerAddressDetails::create($dataCustomerDetailArray);
		return $newtempcustomeraddress->id;
	}
	/* //create customer
	public function createCustomerFunction($dataCustomerArray){

		$newcustomer=Customer::create($dataCustomerArray);
		return $newcustomer->id;
	} */
	
/* 	//create customer Detail
	public function createCustomerDetailFunction($dataCustomerDetailArray){

		$newcustomerdetail=CustomerDetails::create($dataCustomerDetailArray);
		return $newcustomerdetail->customer_detail_id;
	} */
	
	/* //create customer Address
	public function createCustomerAddressFunction($dataCustomerAddressArray){

		$newcustomeraddress=CustomerAddressDetails::create($dataCustomerAddressArray);
		return $newcustomeraddress->id;
	} */
	
	public function getTempCustomers(Request $request){
				$administrator=$request->segment(1);
			$clients = DB::table('temp_customer')
			->join('temp_customer_details', function($on)
			{
			$on->on('temp_customer.id','=','temp_customer_details.temp_customer_id')->where('temp_customer_details.applicant_type','=',1);
			})
			->join('temp_customer_address_details as ud', function($on)
			{
			$on->on('ud.temp_customer_id','=','temp_customer_details.temp_customer_id')->where('ud.applicant_type','=',1)->where('ud.address_type_id','=',1);
			})
			->leftjoin('invitation_link','invitation_link.id','=','temp_customer_details.invitation_link_id')
			->leftjoin('invite_block','invite_block.invitation_link_id','=','invitation_link.id')
			->leftjoin('user_details','user_details.user_id','=','invitation_link.sender_id')
			->where('temp_customer.is_active','=',1)
			->groupBy('invite_block.invitation_link_id')
			->orderBy('temp_customer.id','desc')
			->select(DB::raw('CONCAT(temp_customer_details.first_name," ", temp_customer_details.last_name) AS name'),'temp_customer_details.email','temp_customer_details.phone','temp_customer_details.customer_code',DB::raw('CONCAT(ud.city," ", ud.state) AS city_state'),DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS invited_by'),'invitation_link.project_id','invitation_link.created_at as invitation_date','invitation_link.unit_id',DB::raw('GROUP_CONCAT(distinct invite_block.block_id) AS block_ids'))
			->get(); 
			//echo $clients; exit;
        $data=array();
		foreach($clients as $_key=>$client){
			
			$sub_array 		= array();
			$sub_array[] 	= '<a href="/'.$administrator.'/temp_customer_detail/'.$client->customer_code.'">'.$client->name.'</a>';
			$sub_array[] 	= $client->customer_code;
			$sub_array[] 	= $client->email;
			$sub_array[] 	= $client->phone;
			$sub_array[] 	= $client->city_state;
			$sub_array[] 	= $this->getprojectdata($client->project_id)->project_name.'/'.$this->getprojectBlocks($client->project_id,$client->block_ids).'/'.$this->getprojectBlockUnits($client->project_id,$client->unit_id);
			$sub_array[] 	= CommonHelper::display_date($client->invitation_date);
			$sub_array[] 	= $client->invited_by;
			
			$data[] = $sub_array;
		}
		
		$datatabledata=array('data'=>$data,'recordsFiltered'=>count($data));
		return response()->json($datatabledata);
	}
	
	
		//get project detail
		public function getprojectdata($projectId){
			$project = DB::table('project')->where('status','=',1)->where('project_id','=',$projectId)->select('project_id','project_name','project_type_id')->first();
			return $project;	
		}
		//get project Blocks detail
		public function getprojectBlocks($project_id,$block_id){
			if($block_id){
				$project_blocks = DB::table('project_blocks')->where('status','=',1)->where('project_id','=',$project_id)->whereIn('block_id',explode(',',$block_id))->pluck('block_name');
				return implode(',',$project_blocks);
			}else{
				return '---';
			}			
		}
		//get project Blocks unit detail
		public function getprojectBlockUnits($project_id,$unit_id){
		
			$unit_details = DB::table('unit_details')->where('status','=',1)->where('project_id','=',$project_id)->where('unit_id','=',$unit_id)->whereNotNull('unit_name')->select('unit_id','unit_name')->first();
			return isset($unit_details->unit_name)?$unit_details->unit_name:'---';	
		}
		
      /* public function create_invite_seconduser(Request $request)
      { 	 			
		$customer_code =Input::get('customer_code');
		$validator = Validator::make($request->all(), [
		'first_name' => 'required',
		'dob'        => 'required',
		'zip'	  	 => 'required',
		'address'	 => 'required',
		'city'		 => 'required',
		'state'		 => 'required'
		]);

		if ($validator->fails()) {    
			return response()->json($validator->messages(), 200);
		} 
		
		$client_fname      					= Input::get('first_name');
		$client_lname      					= Input::get('last_name');		
		$client_mobile      				= Input::get('mobile');
		$client_landline     				= Input::get('landline');
		$father_husband_name  				= Input::get('father_husband_name');
		$dob                    			= Input::get('dob');		 
		$father_husband_mobile  			= Input::get('father_husband_mobile');
		$father_husband_landline 			= Input::get('father_husband_landline');  
		$marital_status          			=Input::get('marital');
		$spouse_name             			= Input::get('spouse_name');
		$if_foreigner            			= Input::get('foreigner');
		$foreigner_country       			= Input::get('foreigner_country');	
		$if_poa                  			= Input::get('nopoa');		
		$poa_name                			= Input::get('poa_name');		      
		$zip                     			= Input::get('zip');
		$address                 			= Input::get('address');
		$city                    			= Input::get('city');
		$state                   			= Input::get('state');		
		$permanentpincode        			= Input::get('permanentpincode');
		$permanentaddress        			= Input::get('permanentaddress');
		$permanentcity           			= Input::get('permanentcity');
		$permanentstate          			= Input::get('permanentstate');		
		$organisation_business_name 		= Input::get('organisation_business_name');
		$designation          				= Input::get('designation');
		$organisation_type          		= Input::get('organisation_type');
		$organisation_phone          		= Input::get('organisation_phone');
		$organisation_extension         	= Input::get('organisation_extension');		
		$organisation_zip       			= Input::get('organisation_zip');
		$org_address             			= Input::get('org_address');
		$organisationcity        			= Input::get('organisationcity');
		$organisationstate       			= Input::get('organisationstate');	
		$second_sender_id       			= Input::get('second_sender_id');	
        $applicant_type						=2;

		$customer_code  = $customer_code;

		if ($request->hasFile('second_image_profile')) {
		 $file = $request->file('second_image_profile');
		 $extension = $file->getClientOriginalExtension();
		 $image_pro = uniqid() . '_doc.' . $extension;
		 $destinationPath = public_path('assets/userprofile');
		 $file->move($destinationPath, $image_pro);
		 $image_pro_name = '/assets/userprofile/' . $image_pro;
		}
		else{$image_pro_name='';}
		
		 $dataCustomerDetailArray			=	array('user_id'=>$id,'customer_code'=>'','first_name'=>$client_fname,'last_name'=>$client_lname,'email'=>'','phone'=>$client_mobile,'landline_number'=>$client_landline,'father_husband_name'=>$father_husband_name,'dob'=>$dob,'father_husband_mobile'=>$father_husband_mobile,'father_husband_landline'=>$father_husband_landline,'user_image'=>$image_pro_name,'if_foreigner'=>$if_foreigner,'country_name'=>$foreigner_country,'maritual_status'=>$marital_status,'spouse_name'=>$spouse_name,'if_poa'=>$if_poa,'poa_holder_name'=>$poa_name,'organisation_name'=>$organisation_business_name,'organisation_designation'=>$designation,'organisation_type'=>$organisation_type,'organisation_phone_number'=>$organisation_phone,'organisation_extention'=>$organisation_extension,'applicant_type'=>$applicant_type,'status'=>0,'created_by'=>0);
		 
		 $user_detail_id					=	$this->createCustomerDetailFunction($dataCustomerDetailArray);
		
		//create customer address
		$dataCustomerCorrespondenceAddressArray			=	array('user_id'=>$id,'address_type_id'=>1,'applicant_type'=>$applicant_type,'address_line'=>$address,'pin_code'=>$zip,'city'=>$city,'state'=>$state);
		
		$dataCustomerPermanentAddressArray			=	array('user_id'=>$id,'address_type_id'=>2,'applicant_type'=>$applicant_type,'address_line'=>$permanentaddress,'pin_code'=>$permanentpincode,'city'=>$permanentcity,'state'=>$permanentstate);
		
		$dataCustomerBusinessAddressArray			=	array('user_id'=>$id,'address_type_id'=>3,'applicant_type'=>$applicant_type,'address_line'=>$org_address,'pin_code'=>$organisation_zip,'city'=>$organisationcity,'state'=>$organisationstate);
		
	    $this->createCustomerAddressFunction($dataCustomerCorrespondenceAddressArray);
	    $this->createCustomerAddressFunction($dataCustomerPermanentAddressArray);
	    $this->createCustomerAddressFunction($dataCustomerBusinessAddressArray);
		 
		 $destinationPath= public_path('assets/kyc');
			for($i=1; $i<=10; $i++)
			{	
				if ($request->hasFile('profileImg_'.$i)) { 
				   
					$kyc_type_id= Input::get('mySelect_'.$i);
					$description = Input::get('desc_'.$i);
					$pancardNumberKyc = Input::get('pancardNumberKyc_'.$i);
					$adharNumberKyc = Input::get('adharNumberKyc_'.$i);
					$voterIdKyc = Input::get('voterIdKyc_'.$i);
					$dobKyc = Input::get('dobKyc_'.$i);
					$passportNumberKyc = Input::get('passportNumberKyc_'.$i);
					$passportIssueBy = Input::get('passportIssueBy_'.$i);
					$file=$request->file('profileImg_'.$i);
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_doc.' . $extension;
					$file->move($destinationPath, $name);
					$filename = '/assets/kyc/' . $name;
					$media_id = Media::insertGetId(['media_name' => $filename]);
					
					$check=CustomerKyc::where('user_id', '=', $id)->where('kyc_type_id', '=', $kyc_type_id)->first();
					if($check)
					{
						$media_id = CustomerKyc::where('user_id','=', $id)->where('kyc_type_id', '=',$kyc_type_id)->update(['media_id' => $media_id,'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
					}
					else
					{
						$media_id = CustomerKyc::insertGetId(['media_id' => $media_id,'kyc_type_id'=>$kyc_type_id,'user_id'=>$id,'created_date'=>date('y-m-d h:i:s'),'description'=>$description,'pan_number'=>$pancardNumberKyc,'adhar_number'=>$adharNumberKyc,'voter_id'=>$voterIdKyc,'passport_expiry'=>$dobKyc,'passport_number'=>$passportNumberKyc,'passport_issue'=>$passportIssueBy,'applicant_type'=>$applicant_type]);
					}
				}	
			} 
		 
		if($user_detail_id){
			
				return response()->json(['message' => 'success', 'success_msg' => "Second applicant created Successfully", 'user_id' =>$id ]);
			}
			else{
				return response()->json(['message' => 'failure', 'success_msg' => "Second applicant Not Created."]);
			}   	 
	 
    } */
	
	public function updateCustomer($userdata,$user_id)
	{
		User::where('id','=',$user_id)->update($userdata);
		return true;
	}
	
	public function updateCustomerDetail($userdata,$user_id,$applicant_type)
	{
		CustomerDetails::where('user_id','=',$user_id)->where('applicant_type','=',$applicant_type)->update($userdata);
		return true;
	}
	
	public function getCustomerListDetail(Request $request,$status){
		  
		    $administrator=$request->segment(1);
			$clientsQry = DB::table('users')
			->join('customer_details', function($on)
			{
			$on->on('users.id','=','customer_details.user_id')->where('customer_details.applicant_type','=',1);
			})
			->join('customer_address_details as ud', function($on)
			{
			$on->on('ud.user_id','=','customer_details.user_id')->where('ud.applicant_type','=',1)->where('ud.address_type_id','=',1);
			})
			->join('booking','booking.user_id','=','users.id')
			->join('payment_details','payment_details.booking_id','=','booking.booking_id')
			->join('unit_details','unit_details.unit_id','=','booking.unit_id')
			->leftjoin('invitation_link','invitation_link.id','=','customer_details.invitation_link_id')
			->leftjoin('user_details','user_details.user_id','=','invitation_link.sender_id')
			->where('users.is_active','=',$status)->where('payment_details.payment_status','=',1);
			if($status==1){
				$QruString=$clientsQry->where('users.confirmed','=',1);
			}else{
				$QruString=$clientsQry->where('users.confirmed','=',0);
			}
			
			$clients=$QruString->where('users.user_type_id','=',1)
			->where('users.role','=',8)
			->orderBy('users.id','desc')
			->select(DB::raw('CONCAT(customer_details.first_name," ", customer_details.last_name) AS name'),'customer_details.email','customer_details.phone','customer_details.customer_code',DB::raw('CONCAT(ud.city," ", ud.state) AS city_state'),DB::raw('CONCAT(user_details.first_name," ", user_details.last_name) AS invited_by'),'users.id','payment_details.net_amount','payment_details.is_verified as paymentisverified','payment_details.created_at as payment_date','unit_details.unit_name')
			->get(); 
			//echo '<pre>'; print_r($clients); exit;
        $data=array();
		foreach($clients as $_key=>$client){
		$varificationstatus='';
			if($client->paymentisverified==0){
				$varificationstatus='Payment verification pending';
			}
			
			$sub_array 		= array();
			if($status==2){
				$sub_array[] 	= '<a href="/'.$administrator.'/new_customer_detail/'.$client->customer_code.'">'.$client->name.'</a>';
			}else{
				$sub_array[] 	= '<a href="/'.$administrator.'/customer_detail/'.$client->customer_code.'">'.$client->name.'</a>';
			}
			
			$sub_array[] 	= $client->customer_code;
			$sub_array[] 	= $client->email;
			$sub_array[] 	= $client->unit_name??'';
			$sub_array[] 	= $client->city_state;
			if($status==2){
				$sub_array[] 	= $varificationstatus;
			}
			$sub_array[] 	= $client->invited_by;			 
			$sub_array[] 	= CommonHelper::display_date($client->payment_date);
			$sub_array[] 	=$client->net_amount;
			$data[] = $sub_array;
		}
		
		$datatabledata=array('data'=>$data,'recordsFiltered'=>count($data));
		return response()->json($datatabledata);
	}
	public function validateParam($user_data){
		$message = '';
		
		
		  if(!$user_data["first_name"]) {
		   return  $message = "First name is required."; 
		 } 
		 if(!$user_data["last_name"]) {
		   return  $message = "Last name is required."; 
		 }
		 if(!$user_data["email"]) {
		   return  $message = "Email is Required"; 
		 }
		 if (!filter_var($user_data["email"], FILTER_VALIDATE_EMAIL)) {
		   return  $message = "Invalid email format"; 
		 }
		 if(!$user_data["phone"]) {
		   return  $message = "Phone is required."; 
		 }
		 if(!is_numeric($user_data["phone"])) {
		   return  $message = "Phone is invalid."; 
		 }
		 
		 if(!$user_data["permanent_address"]) {
		   return  $message = "Address is required."; 
		 }
		 if(!$user_data["permanent_city"]) {
		   return  $message = "City is required."; 
		 }
		 if(!$user_data["permanent_state"]) {
		   return  $message = "State is required."; 
		 }
		 if(!$user_data["permanent_zip"]) {
		   return  $message = "Zip is required."; 
		 }
		 $checkdata=User::where('email','=',$user_data["email"])->where('id','!=',$user_data["user_id"])->first();
		 if($checkdata){
			  return  $message = "This email is already exists.Please use another email.";
		 }
		 return $message;
	}
	
	
	public function customerDetailsUpdate($link){
						
		//For getting Link's data...
		$getLinkData = DB::table('invitation_link')->where('link','=',$link)->first();
		
		if(!isset($getLinkData)){
			return view('customer.customer_details_update')->with([ 'getLinkData'=>$getLinkData]);
		}
		
		//For getting First Applicant's data...
		$customerDetails = DB::table('users')->join('customer_details','customer_details.user_id','=','users.id')
						->where('customer_details.user_id','=', $getLinkData->customer_id)->where('users.role','=', 8)
						->where('customer_details.applicant_type','=',1)
						->select('users.created_by', 'customer_details.*')
						->first();
							
							
						
		//For getting Second Applicant's data...
		$secondApplicant=$this->getsecondApplicantDetail($customerDetails);
		
			
		$customrAddress5=DB::table('customer_address_details')->where('user_id','=',$customerDetails->user_id)->where('applicant_type','=',1)->where('address_type_id','=',5)->first();
			
		$customrAddress6=DB::table('customer_address_details')->where('user_id','=',$customerDetails->user_id)->where('applicant_type','=',1)->where('address_type_id','=',6)->first();
			
		
		// $sCustomrAddress1=DB::table('customer_address_details')->where('user_id','=',$customerDetails->user_id)->where('applicant_type','=',2)->where('address_type_id','=',1)->first();
			
		$sCustomrAddress5=DB::table('customer_address_details')->where('user_id','=',$customerDetails->user_id)->where('applicant_type','=',2)->where('address_type_id','=',5)->first();
			
		$sCustomrAddress6=DB::table('customer_address_details')->where('user_id','=',$customerDetails->user_id)->where('applicant_type','=',2)->where('address_type_id','=',6)->first();
		
		
		$orgType=array('Agriculture and Allied Industries','Automobiles','Auto Components','Aviation','Banking','Cement','Consumer Durables','Ecommerce','Education and Training','Engineering and Capital Goods','Financial Services','FMCG','Gems and Jewellery','Healthcare','Infrastructure','Insurance','IT & ITeS','Manufacturing','Media and Entertainment','Oil and Gas','Pharmaceuticals','Ports','Power','Railways','Real Estate','Renewable Energy','Retail','Science and Technology','Services','Steel','Roads','Telecommunications','Textiles','Tourism and Hospitality');
		
		
		$addressProofs = DB::table('kyc_type')->where('document_type_id','=',6)->get();
		
		
		return view('customer.customer_details_update')->with(['customerDetails'=>$customerDetails, 'secondApplicant'=>$secondApplicant, 'customrAddress5'=>$customrAddress5,'customrAddress6'=>$customrAddress6, 'sCustomrAddress5'=>$sCustomrAddress5, 'sCustomrAddress6'=>$sCustomrAddress6, 'orgType'=>$orgType, 'addressProofs'=>$addressProofs, 'getLinkData'=>$getLinkData]);
	}
	
	
	
	public function getsecondApplicantDetail($customerDetails){
		$secondApplicant=DB::table('customer_details')->where('customer_details.user_id','=',$customerDetails->user_id)->where('customer_details.applicant_type','=',2)->first();
		
			if(!$secondApplicant){
				$secondApplicant=(object) array('temp_customer_id'=>'','customer_code'=>'','first_name'=>'','last_name'=>'','email'=>'','phone'=>'','landline_number'=>'','father_husband_name'=>'','dob'=>'','father_husband_mobile'=>'','father_husband_landline'=>'','user_image'=>'','if_foreigner'=>'','country_name'=>'','maritual_status'=>'','spouse_name'=>'','if_poa'=>'','poa_holder_name'=>'','organisation_name'=>'','organisation_designation'=>'','organisation_type'=>'','organisation_phone_number'=>'','organisation_extention'=>'','applicant_type'=>'','status'=>'','invitation_link_id'=>'','created_by'=>'','created_at'=>'');
			   }
		return $secondApplicant;
	}
	
	
	
	
	// public function updateCustomerDetails(Request $request){
	// 	$userData= $request->all();
	// 	//dd($userData);	
	// 	$validator = Validator::make($request->all(), [
	// 		'first_name' => 'required',
	// 		'dob'        => 'required',
	// 		'pin_code'	 => 'required',
	// 		'city'		 => 'required',
	// 		'state'		 => 'required'
	// 	]);

	// 	if ($validator->fails()) {    
			
	// 		return response()->json(['message' => 'failure', 'errors'=> $validator->errors()]);
	// 	}
		
		
    //     $client_fname     	 				= 	Input::get('first_name');
	// 	$client_lname      					= 	Input::get('last_name');
    //     $client_mobile      				= 	Input::get('phone');
	// 	$client_landline     				= 	Input::get('landline');
	// 	$father_husband_name  				= 	Input::get('father_husband_name');
	// 	$dob                    			= 	Input::get('dob');		 
	// 	$father_husband_mobile  			= 	Input::get('father_husband_mobile');
	// 	$father_husband_landline 			= 	Input::get('father_husband_landline');  
	// 	$marital_status          			= 	Input::get('marital');
	//     $spouse_name             			= 	Input::get('spouse_name');
	// 	$if_foreigner            			= 	Input::get('if_foreigner');
	// 	$country_name       			    = 	Input::get('country_name');	
    //     $if_poa                  			= 	Input::get('if_poa');		
	// 	$poa_holder_name                	= 	Input::get('poa_holder_name');		      
    //     $zip                     			= 	Input::get('pin_code');
	// 	$address                 			= 	Input::get('address_line');
    //     $city                    			= 	Input::get('city');
    //     $state                   			= 	Input::get('state');		
	// 	$permanentpincode        			= 	Input::get('permanentpincode');
	// 	$permanentaddress        			= 	Input::get('permanentaddress');
    //     $permanentcity           			= 	Input::get('permanentcity');
    //     $permanentstate          			= 	Input::get('permanentstate');		
	// 	$organisation_name 	            	= 	Input::get('organisation_name');
	// 	$organisation_designation          	= 	Input::get('organisation_designation');
	// 	$organisation_type          		= 	Input::get('organisation_type');
	// 	$organisation_phone_number          = 	Input::get('organisation_phone_number');
	// 	$organisation_extention         	= 	Input::get('organisation_extention');		
	// 	$organisation_zip        			= 	Input::get('organisation_zip');
	// 	$org_address             			= 	Input::get('org_address');
	// 	$organisationcity        			= 	Input::get('organisationcity');
	// 	$organisationstate       			= 	Input::get('organisationstate');
    //     $role                    			= 	8;
	// 	$applicant_type						=	1;
	// 	$customer_code						=	Input::get('customer_code');
	// 	$user_id                            =   Input::get('user_id');
	// 	$pan_number                         =   Input::get('pan_number');
	// 	$adhar_number                       =   Input::get('adhar_number');
	// 	$address_proof_number               =   Input::get('address_proof_number');
	// 	$pan_kyc_id                         =   Input::get('pan_kyc_id');
	// 	$adhar_kyc_id                       =   Input::get('adhar_kyc_id');
	// 	$address_proof_kyc_id               =   Input::get('address_proof_kyc_id');
	// 	$applicant_type						=	Input::get('applicant_type');
	// 	//dd($userData);
	// 	if ($request->hasFile('pan_card_img')) {
	// 		$file = $request->file('pan_card_img');
	// 		$is_uploaded = $this->uploadCustomerKyc($user_id, $file, $pan_number,$pan_kyc_id, $applicant_type);
	// 	}
		
	// 	if ($request->hasFile('aadhar_card_img')) {
	// 		$file = $request->file('aadhar_card_img');
	// 		$is_uploaded = $this->uploadCustomerKyc($user_id, $file, $adhar_number,$adhar_kyc_id, $applicant_type);
	// 	}
		
	// 	if ($request->hasFile('address_proof_image')) {
	// 		$file = $request->file('address_proof_image');
	// 		$is_uploaded = $this->uploadCustomerKyc($user_id, $file, $address_proof_number,$address_proof_kyc_id, $applicant_type);
	// 	}
		
	// 	/* if($request->hasFile('user_image')){
	// 		$profile_img = $request->file('user_image');
	// 		$user_image_filename=CommonHelper::saveMedia($profile_img,"customer/profileimage",5,'public');
	// 	} */
		
	// 	$checkCustomer = DB::table('customer_details')->where('customer_code','=',$customer_code)->where('applicant_type','=',$applicant_type)->first();
		
		
	// 	$updateCustomerDetails = DB::table('customer_details')->where('customer_code','=',$customer_code)
	// 							->where('applicant_type','=',$applicant_type)
	// 							->update([  'first_name'				=> $client_fname,
	// 										'last_name'					=> $client_lname,
	// 										'phone'						=> $client_mobile,
	// 										'landline_number'			=> $client_landline,
	// 										'father_husband_name'		=> $father_husband_name,
	// 										'dob'						=> $dob,
	// 										'father_husband_mobile'		=> $father_husband_mobile,
	// 										'father_husband_landline'   => $father_husband_landline,
	// 										'if_foreigner'				=> $if_foreigner,
	// 										'country_name'				=> $country_name,
	// 										'maritual_status'			=> $marital_status,
	// 										'spouse_name'				=> $spouse_name,
	// 										'if_poa'					=> $if_poa,
	// 										'poa_holder_name'			=> $poa_holder_name, 
	// 										'organisation_name'			=> $organisation_name,
	// 										'organisation_designation'	=> $organisation_designation,
	// 										'organisation_type'		    => $organisation_type,
	// 										'organisation_phone_number' => $organisation_phone_number,
	// 										'organisation_extention'    => $organisation_extention,
	// 										//'user_image'    			=> $user_image_filename,
	// 										'applicant_type'			=> 1,
	// 										'status'					=> 1, 
	// 										'updated_at'				=> date("Y-m-d")
	// 									]);
		
		
		
		
	// 	$checkCorrespondadd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',1)->where('applicant_type','=',$applicant_type)->first();
	// 	if($checkCorrespondadd){
	// 		$updateCorespondAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',1)->where('applicant_type','=',$applicant_type)->update(['address_line'=>$address, 'pin_code'=>$zip, 'city'=>$city, 'state'=>$state]);
	// 	}
	// 	else{
	// 		$insertCorespondAdd = DB::table('customer_address_details')->insert(['address_line'=>$address, 'pin_code'=>$zip, 'city'=>$city, 'state'=>$state, 'user_id'=>$user_id, 'address_type_id'=>1, 'applicant_type'=>$applicant_type]);
	// 	}
		
		
		
	// 	$checkPermanentAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',2)->where('applicant_type','=',$applicant_type)->first();
	// 	if($checkPermanentAdd){
	// 		$updatePermanentAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',2)->where('applicant_type','=',$applicant_type)->update(['address_line'=>$permanentaddress, 'pin_code'=>$permanentpincode, 'city'=>$permanentcity, 'state'=>$permanentstate]);
	// 	}
	// 	else{
	// 		$insertPermanentAdd = DB::table('customer_address_details')->insert(['address_line'=>$permanentaddress, 'pin_code'=>$permanentpincode, 'city'=>$permanentcity, 'state'=>$permanentstate, 'user_id'=>$user_id, 'address_type_id'=>2, 'applicant_type'=>$applicant_type]);
	// 	}
		
		
		
	// 	$checkOrgAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',3)->where('applicant_type','=',$applicant_type)->first();
	// 	if($checkOrgAdd){
	// 		$updateOrgAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',3)->where('applicant_type','=',$applicant_type)->update(['address_line'=>$org_address, 'pin_code'=>$organisation_zip, 'city'=>$organisationcity, 'state'=>$organisationstate]);
	// 	}
	// 	else{
	// 		$insertOrgAdd = DB::table('customer_address_details')->insert(['address_line'=>$org_address, 'pin_code'=>$organisation_zip, 'city'=>$organisationcity, 'state'=>$organisationstate, 'user_id'=>$user_id, 'address_type_id'=>3, 'applicant_type'=>$applicant_type]);
	// 	}
		
	// 	return response()->json(['message' => 'success']);
		
	// }
	
	
	
	
	
	public function updateSecondcustomerDetails(Request $request){
		$userData= $request->all();
		//dd($userData);	
		$validator = Validator::make($request->all(), [
			'first_name' => 'required',
			'dob'        => 'required',
			'email'      => 'required',
			'residential_pin_code'	 => 'required',
			'residential_city'		 => 'required',
			'residential_state'		 => 'required'
		]);

		if ($validator->fails()) {    
			return response()->json(['message' => 'failure', 'errors'=> $validator->errors()]);
		}
		
		$email                              =   Input::get('email');
        $client_fname     	 				= 	Input::get('first_name');
		$client_lname      					= 	Input::get('last_name');
        $client_mobile      				= 	Input::get('phone');
		$client_landline     				= 	Input::get('landline');
		$father_husband_name  				= 	Input::get('father_husband_name');
		$dob                    			= 	Input::get('dob');		 
		// $father_husband_mobile  			= 	Input::get('father_husband_mobile');
		// $father_husband_landline 			= 	Input::get('father_husband_landline');  
		$marital_status          			= 	Input::get('marital');
	    $spouse_name             			= 	Input::get('spouse_name');
		// $if_foreigner            			= 	Input::get('if_foreigner');
		$relation							=	Input::get('relation');
		$resident_status					=	Input::get('resident_status');
		$nationality       			    	= 	Input::get('nationality');	
        // $if_poa                  			= 	Input::get('if_poa');		
		// $poa_holder_name                	= 	Input::get('poa_holder_name');		      
        $zip                     			= 	Input::get('residential_pin_code');
		$address                 			= 	Input::get('residential_address_line');
        $city                    			= 	Input::get('residential_city');
        $state                   			= 	Input::get('residential_state');		
		$permanentpincode        			= 	Input::get('office_pincode');
		$permanentaddress        			= 	Input::get('office_address');
        $permanentcity           			= 	Input::get('office_city');
        $permanentstate          			= 	Input::get('office_state');		
		$organisation_name 	            	= 	Input::get('company_name');
		$organisation_designation          	= 	Input::get('company_designation');
		// $organisation_type          		= 	Input::get('organisation_type');
		$organisation_phone_number          = 	Input::get('company_phone_number');
		// $organisation_extention         	= 	Input::get('organisation_extention');		
		// $organisation_zip        			= 	Input::get('organisation_zip');
		// $org_address             			= 	Input::get('org_address');
		// $organisationcity        			= 	Input::get('organisationcity');
		// $organisationstate       			= 	Input::get('organisationstate');
        $role                    			= 	8;
		$applicant_type						=	1;
		$customer_code						=	Input::get('customer_code');
		$user_id                            =   Input::get('user_id');
		$pan_number                         =   Input::get('pan_number');
		$adhar_number                       =   Input::get('adhar_number');
		$address_proof_number               =   Input::get('address_proof_number');
		$pan_kyc_id                         =   Input::get('pan_kyc_id');
		$adhar_kyc_id                       =   Input::get('adhar_kyc_id');
		$address_proof_kyc_id               =   Input::get('address_proof_kyc_id');
		$applicant_type						=	Input::get('applicant_type');
		
		if ($request->hasFile('second_pan_card_img')) {
			$file = $request->file('second_pan_card_img');
			$is_uploaded = $this->uploadCustomerKyc($user_id, $file, $pan_number,$pan_kyc_id, $applicant_type);
		}
		
		if ($request->hasFile('second_aadhar_card_img')) {
			$file = $request->file('second_aadhar_card_img');
			$is_uploaded = $this->uploadCustomerKyc($user_id, $file, $adhar_number,$adhar_kyc_id, $applicant_type);
		}
		
		if ($request->hasFile('second_address_proof_image')) {
			$file = $request->file('second_address_proof_image');
			$is_uploaded = $this->uploadCustomerKyc($user_id, $file, $address_proof_number,$address_proof_kyc_id, $applicant_type);
		}
		
		
		$checkCustomer = DB::table('customer_details')->where('customer_code','=',$customer_code)->where('applicant_type','=',$applicant_type)->first();
		
		
		
		$check = DB::table('customer_details')->where('customer_code','=',$customer_code)
											  ->where('applicant_type','=',$applicant_type)
											  ->first();
		
		
		if($check){
			$updateCustomerDetails = DB::table('customer_details')->where('customer_code','=',$customer_code)
								->where('applicant_type','=',$applicant_type)
								->update([  'first_name'				=> $client_fname,
											'last_name'					=> $client_lname,
											'email'						=> $email,
											'phone'						=> $client_mobile,
											'landline_number'			=> $client_landline,
											'father_husband_name'		=> $father_husband_name,
											'dob'						=> $dob,
											'relation'					=> $relation,
											'resident_status'			=> $resident_status,
											'nationality'				=> $nationality,
											'maritual_status'			=> $marital_status,
											'spouse_name'				=> $spouse_name, 
											'organisation_name'			=> $organisation_name,
											'organisation_designation'	=> $organisation_designation,
											'organisation_phone_number' => $organisation_phone_number,
											'applicant_type'			=> 2,
											'status'					=> 1, 
											'updated_at'				=> date("Y-m-d")
										]);
		}
		else{
			$insertCustomerDetails = DB::table('customer_details')
								->insert([  'user_id'					=> $user_id,
											'customer_code'				=> $customer_code,
											'email'						=> $email,
											'first_name'				=> $client_fname,
											'last_name'					=> $client_lname,
											'phone'						=> $client_mobile,
											'landline_number'			=> $client_landline,
											'father_husband_name'		=> $father_husband_name,
											'dob'						=> $dob,
											'relation'					=> $relation,
											'resident_status'			=> $resident_status,
											'nationality'				=> $nationality,
											'maritual_status'			=> $marital_status,
											'spouse_name'				=> $spouse_name,
											'organisation_name'			=> $organisation_name,
											'organisation_designation'	=> $organisation_designation,
											'organisation_phone_number' => $organisation_phone_number,
											'applicant_type'			=> 2,
											'status'					=> 1, 
											'created_at'				=> date("Y-m-d")
										]);
		}
		
		
		
		
		$checkCorrespondadd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',5)->where('applicant_type','=',$applicant_type)->first();
		if($checkCorrespondadd){
			$updateCorespondAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',5)->where('applicant_type','=',$applicant_type)->update(['address_line'=>$address, 'pin_code'=>$zip, 'city'=>$city, 'state'=>$state]);
		}
		else{
			$insertCorespondAdd = DB::table('customer_address_details')->insert(['address_line'=>$address, 'pin_code'=>$zip, 'city'=>$city, 'state'=>$state, 'user_id'=>$user_id, 'address_type_id'=>5, 'applicant_type'=>$applicant_type]);
		}
		
		
		
		$checkPermanentAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',6)->where('applicant_type','=',$applicant_type)->first();
		if($checkPermanentAdd){
			$updatePermanentAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',6)->where('applicant_type','=',$applicant_type)->update(['address_line'=>$permanentaddress, 'pin_code'=>$permanentpincode, 'city'=>$permanentcity, 'state'=>$permanentstate]);
		}
		else{
			$insertPermanentAdd = DB::table('customer_address_details')->insert(['address_line'=>$permanentaddress, 'pin_code'=>$permanentpincode, 'city'=>$permanentcity, 'state'=>$permanentstate, 'user_id'=>$user_id, 'address_type_id'=>6, 'applicant_type'=>$applicant_type]);
		}
		
		
		
		// $checkOrgAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',3)->where('applicant_type','=',$applicant_type)->first();
		// if($checkOrgAdd){
		// 	$updateOrgAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',3)->where('applicant_type','=',$applicant_type)->update(['address_line'=>$org_address, 'pin_code'=>$organisation_zip, 'city'=>$organisationcity, 'state'=>$organisationstate]);
		// }
		// else{
		// 	$insertOrgAdd = DB::table('customer_address_details')->insert(['address_line'=>$org_address, 'pin_code'=>$organisation_zip, 'city'=>$organisationcity, 'state'=>$organisationstate, 'user_id'=>$user_id, 'address_type_id'=>3, 'applicant_type'=>$applicant_type]);
		// }
		
		return response()->json(['message' => 'success']);
		
	}
	
	
	
	
	
	
	
	
	public function uploadCustomerKyc($user_id, $file, $kyc_number, $kyc_type_id, $applicant_type){
		
		$checkKyc = DB::table('customer_kyc')->where('user_id','=',$user_id)->where('kyc_type_id','=',$kyc_type_id)->where('applicant_type','=',$applicant_type)->where('status','=',1)->first();
		
		if(!$checkKyc){
			$filename=CommonHelper::saveMedia($file,"customer/customerkyc",5,'public');
			$media_id = Media::insertGetId(['media_name' => $filename]);
		
			$insertCustomerKyc = DB::table('customer_kyc')->insert(['user_id'=>$user_id, 'kyc_type_id'=>$kyc_type_id, 'media_id'=>$media_id, 'applicant_type'=> $applicant_type, 'docment_number'=>$kyc_number]);
		}
		
		
		return 1;
		
	}


	public function updateCustomerDetails(Request $request){
		$userData= $request->all();
		//dd($userData);	
		$validator = Validator::make($request->all(), [
			'first_name' => 'required',
			'dob'        => 'required',
			'residential_pin_code'	 => 'required',
			'residential_city'		 => 'required',
			'residential_state'		 => 'required'
		]);

		if ($validator->fails()) {    
			
			return response()->json(['message' => 'failure', 'errors'=> $validator->errors()]);
		}
		
		
        $client_fname     	 				= 	Input::get('first_name');
		$client_lname      					= 	Input::get('last_name');
        $client_mobile      				= 	Input::get('phone');
		$client_landline     				= 	Input::get('landline');
		$father_husband_name  				= 	Input::get('father_husband_name');
		$dob                    			= 	Input::get('dob');		 
		// $father_husband_mobile  			= 	Input::get('father_husband_mobile');
		// $father_husband_landline 			= 	Input::get('father_husband_landline');  
		$marital_status          			= 	Input::get('marital');
	    $spouse_name             			= 	Input::get('spouse_name');
		// $if_foreigner            			= 	Input::get('if_foreigner');
		$relation							=	Input::get('relation');
		$resident_status					=	Input::get('resident_status');
		$nationality       			   		= 	Input::get('nationality');	
        // $if_poa                  			= 	Input::get('if_poa');		
		// $poa_holder_name                	= 	Input::get('poa_holder_name');		      
        $zip                     			= 	Input::get('residential_pin_code');
		$address                 			= 	Input::get('residential_address_line');
        $city                    			= 	Input::get('residential_city');
        $state                   			= 	Input::get('residential_state');		
		$permanentpincode        			= 	Input::get('office_pincode');
		$permanentaddress        			= 	Input::get('office_address');
        $permanentcity           			= 	Input::get('office_city');
        $permanentstate          			= 	Input::get('office_state');		
		$organisation_name 	            	= 	Input::get('company_name');
		$organisation_designation          	= 	Input::get('company_designation');
		$organisation_phone_number          = 	Input::get('company_phone_number');	
        $role                    			= 	8;
		$applicant_type						=	1;
		$customer_code						=	Input::get('customer_code');
		$user_id                            =   Input::get('user_id');
		$pan_number                         =   Input::get('pan_number');
		$adhar_number                       =   Input::get('adhar_number');
		$address_proof_number               =   Input::get('address_proof_number');
		$pan_kyc_id                         =   Input::get('pan_kyc_id');
		$adhar_kyc_id                       =   Input::get('adhar_kyc_id');
		$address_proof_kyc_id               =   Input::get('address_proof_kyc_id');
		$applicant_type						=	Input::get('applicant_type');
		//dd($userData);
		if ($request->hasFile('pan_card_img')) {
			$file = $request->file('pan_card_img');
			$is_uploaded = $this->uploadCustomerKyc($user_id, $file, $pan_number,$pan_kyc_id, $applicant_type);
		}
		
		if ($request->hasFile('aadhar_card_img')) {
			$file = $request->file('aadhar_card_img');
			$is_uploaded = $this->uploadCustomerKyc($user_id, $file, $adhar_number,$adhar_kyc_id, $applicant_type);
		}
		
		if ($request->hasFile('address_proof_image')) {
			$file = $request->file('address_proof_image');
			$is_uploaded = $this->uploadCustomerKyc($user_id, $file, $address_proof_number,$address_proof_kyc_id, $applicant_type);
		}
		
		/* if($request->hasFile('user_image')){
			$profile_img = $request->file('user_image');
			$user_image_filename=CommonHelper::saveMedia($profile_img,"customer/profileimage",5,'public');
		} */
		
		$checkCustomer = DB::table('customer_details')->where('customer_code','=',$customer_code)->where('applicant_type','=',$applicant_type)->first();
		
		
		$updateCustomerDetails = DB::table('customer_details')->where('customer_code','=',$customer_code)
								->where('applicant_type','=',$applicant_type)
								->update([  'first_name'				=> $client_fname,
											'last_name'					=> $client_lname,
											'phone'						=> $client_mobile,
											'landline_number'			=> $client_landline,
											'father_husband_name'		=> $father_husband_name,
											'dob'						=> $dob,
											'relation'					=> $relation,
											'resident_status'			=> $resident_status,
											'nationality'				=> $nationality,
											'maritual_status'			=> $marital_status,
											'spouse_name'				=> $spouse_name,
											'organisation_name'			=> $organisation_name,
											'organisation_designation'	=> $organisation_designation,
											'organisation_phone_number' => $organisation_phone_number,
											//'user_image'    			=> $user_image_filename,
											'applicant_type'			=> 1,
											'status'					=> 1, 
											'updated_at'				=> date("Y-m-d")
										]);
		
		
		
		
		$checkCorrespondadd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',5)->where('applicant_type','=',$applicant_type)->first();
		if($checkCorrespondadd){
			$updateCorespondAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',5)->where('applicant_type','=',$applicant_type)->update(['address_line'=>$address, 'pin_code'=>$zip, 'city'=>$city, 'state'=>$state]);
		}
		else{
			$insertCorespondAdd = DB::table('customer_address_details')->insert(['address_line'=>$address, 'pin_code'=>$zip, 'city'=>$city, 'state'=>$state, 'user_id'=>$user_id, 'address_type_id'=>5, 'applicant_type'=>$applicant_type]);
		}
		
		
		
		$checkPermanentAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',6)->where('applicant_type','=',$applicant_type)->first();
		if($checkPermanentAdd){
			$updatePermanentAdd = DB::table('customer_address_details')->where('user_id','=',$user_id)->where('address_type_id','=',6)->where('applicant_type','=',$applicant_type)->update(['address_line'=>$permanentaddress, 'pin_code'=>$permanentpincode, 'city'=>$permanentcity, 'state'=>$permanentstate]);
		}
		else{
			$insertPermanentAdd = DB::table('customer_address_details')->insert(['address_line'=>$permanentaddress, 'pin_code'=>$permanentpincode, 'city'=>$permanentcity, 'state'=>$permanentstate, 'user_id'=>$user_id, 'address_type_id'=>6, 'applicant_type'=>$applicant_type]);
		}
		
		
		return response()->json(['message' => 'success']);
		
	}
	
	
}