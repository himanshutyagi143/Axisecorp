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

use App\Models\Project;
use App\Models\Company;
use App\Models\VendorInvite;
class VenderInviteController extends Controller
{ 

   public function createClient(){
	   
         if(Auth::user()->role==1)
        {
		   $Project = Project::join('project_type','project_type.project_type_id','=','project.project_type_id')->orderBy('project.project_id','DESC')->get();
		
		}
		else
		{
			
			 $Project = Project::join('project_type','project_type.project_type_id','=','project.project_type_id')
			 ->join('vendor_project','vendor_project.project_id','=','project.project_id')
			 ->where('vendor_project.user_id','=',Auth::user()->id)
			 ->orderBy('project.project_id','DESC')->get();
		
			
		}
		
		$current_id=DB::table('assign_project')->where('assign_project.user_id','=',Auth::user()->id)->first();
		$user_type=DB::table('user_type')->whereIn('id',[3,4])->get();
		$company_type=DB::table('company_type')->where('is_active','=',1)->get();
    
        return view('vendor_invite.create_vendor_invite',["Project"=>$Project,'company_type'=>$company_type,'current_id'=>$current_id,'user_type'=>$user_type]);
        
    }

    public function store(Request $request)
     {
	   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'Project' => 'required',
            'company_type_id' => 'required',
            'user_type' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
        $first_name = Input::get('name');
		$last_name = Input::get('lname');
        $email = Input::get('email');
        $company_type_id = Input::get('company_type_id');
        $Project = Input::get('Project');
        $user_type = Input::get('user_type');
        $link =time();
		$confirmation_code= $link;
       if(Auth::user()->role==2)
	   {
		  
		   $c_id= VendorInvite::insertGetId(
				['company_type_id' =>$company_type_id,'project_id'=>$Project,'email' =>$email, 'first_name' =>$first_name, 'last_name' =>$last_name,'sender_id' =>Auth::user()->id,"link"=>$link,'user_type_id'=>$user_type]
			);
	   }
	   else
	   {
		   $current_id=DB::table('assign_project')->where('assign_project.role_id','=',2)->where('assign_project.company_type_id','=',1)->first();
		      $c_id= VendorInvite::insertGetId(
				['company_type_id' =>$company_type_id,'project_id'=>$Project,'email' =>$email, 'first_name' =>$first_name, 'last_name' =>$last_name,'sender_id' =>$current_id->user_id,"link"=>$link,'user_type_id'=>$user_type]
			); 
		   
	     }
		 			
		
		 $user_fname= $first_name;
		 $user_lname= $last_name;
		 $path= $_SERVER["HTTP_HOST"]."/invite_vendor/".$link; 
		 $to= $email;
         $subject = "Verify Your Email Address";		 
		 $data=['path'=>$path,'user_fname'=>$user_fname,'user_lname'=>$user_lname,'useremail'=>$to];
		 $user =$to;            		
			$mail = Mail::send('emails.venderinvite', ['data' => $data], function ($m) use ($user) {
             $m->from('no-reply@stagingrelease.com', 'Email Verification');
             $m->to($user)->subject('Email Verification');
           });
		if($mail){
			$emailData['send_to']   = $to;
			$emailData['send_by']   = "no-reply@stagingrelease.com";
			$emailData['sender_id'] = Auth::user()->id;
			$emailData['subject']   = $subject;
			$emailData['body']      = view('emails.venderinvite', ['data' => $data])->render();
			$emailData['send_date'] = date('Y-m-d');
			$insertEmailDetails = DB::table('send_mail')->insert($emailData);
			\Session::flash('success-msg-registered', 'Thanks For Invite Channel Partner .');
			return redirect()->back();
		}
		else{
			\Session::flash('success-msg-registered', 'Email not sent.');
			return redirect()->back();
		} 	
		
		


    }

   
 
    public function show($typeid='')	  
     { 
	    
		 
          if($typeid=='') {		
					   if(Auth::user()->role==1)
						 {
							 $vender_invite =VendorInvite::join('users','invitation_link.sender_id','=','users.id')->join('user_details','user_details.user_id','=','users.id')
							 ->select('invitation_link.*','user_details.first_name as firstname','user_details.last_name as lastname')->orderBy('users.id','DESC')->get();
						 }
						else
						  {      $array=array();
							   $check_type = DB::table('assign_project')->where('user_id','=',\Auth::user()->id)->first();
						
								  if($check_type)
								  {
									  $checkype = DB::table('assign_project')->where('company_id','=',$check_type->company_id)->get();
									  foreach($checkype as $checkype)
									  {
										 $array[]=$checkype->user_id;
									  }
									  
								  }
						   
						   
							 $vender_invite =VendorInvite::join('users','invitation_link.sender_id','=','users.id')->leftJoin('user_details','user_details.user_id','=','users.id')->whereIn('invitation_link.sender_id',$array)
							 ->select('invitation_link.*','user_details.first_name as firstname','user_details.last_name as lastname')
							 ->orderBy('users.id','DESC')->get();
							 // ->toSql();
							 // dd($vender_invite);
							 
						   
					   }
              return view('vendor_invite.vendor_invite', ['user' => $vender_invite,'typeid' =>'']);
           }
	 else
	       {
			// echo $typeid = $request->id;
		       if(Auth::user()->role==1)
						 {
							 $vender_invite =VendorInvite::where('invite_type', $typeid)->join('users','invitation_link.sender_id','=','users.id')->join('user_details','user_details.user_id','=','users.id')
							 ->select('invitation_link.*','user_details.first_name as firstname','user_details.last_name as lastname')->orderBy('users.id','DESC')->get();
						 }
						else
						  {      $array=array();
							   $check_type = DB::table('assign_project')->where('user_id','=',\Auth::user()->id)->first();
						
								  if($check_type)
								  {
									  $checkype = DB::table('assign_project')->where('company_id','=',$check_type->company_id)->get();
									  foreach($checkype as $checkype)
									  {
										 $array[]=$checkype->user_id;
									  }
									  
								  }
						   
						   
							 $vender_invite =VendorInvite::where('invite_type', $typeid)->join('users','invitation_link.sender_id','=','users.id')->join('user_details','user_details.user_id','=','users.id')->whereIn('invitation_link.sender_id',$array)
							 ->select('invitation_link.*','user_details.first_name as firstname','user_details.last_name as lastname')->orderBy('users.id','DESC')->get();
						   
					   }
             return view('vendor_invite.vendor_invite', ['user' => $vender_invite,'typeid' => $typeid]);		   
			 
		 }
	
	 }
	

    public function edit($id)
    {
		
		
		  if(Auth::user()->role==1)
        {
		   $Project = Project::join('project_type','project_type.project_type_id','=','project.project_type_id')->orderBy('project.project_id','DESC')->get();
		
		}
		else
		{
			
			 $Project = Project::join('project_type','project_type.project_type_id','=','project.project_type_id')
			 ->join('vendor_project','vendor_project.project_id','=','project.project_id')
			 ->where('vendor_project.user_id','=',Auth::user()->id)
			 ->orderBy('project.project_id','DESC')->get();
		
			
		}
		
		$current_id=DB::table('assign_project')->where('assign_project.user_id','=',Auth::user()->id)->first();
		$company_type=DB::table('company_type')->get();
		
		
        $clients = VendorInvite::where('id', '=',$id)->first();
        return view('vendor_invite.edit_vendor_invite', ['client' =>$clients,"Project"=>$Project,'company_type'=>$company_type,'current_id'=>$current_id]);
        

    }

    public function update($id,Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'Project' => 'required',
            'company_type_id' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
        $first_name = Input::get('name');
		$last_name = Input::get('lname');
        $email = Input::get('email');
        $company_type_id = Input::get('company_type_id');
        $Project = Input::get('Project');
        $link =time();
       

       $c_id= VendorInvite::where('id', '=',$id)->update(
            ['company_type_id' =>$company_type_id,'project_id'=>$Project,'email' =>$email, 'first_name' =>$first_name,'last_name' =>$last_name, "link"=>$link]
        );

            \Session::flash('success-msg', 'Successfully Updated');
            return redirect()->back();
     


    }

    public function delete($id)
    {
       // VendorInvite::where('id', '=', $id)->update(['is_active' => 0]);

       // \Session::flash('success_msg', 'Successfully Deleted');
        return redirect()->back();
       


    }
	
    }
