<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Mail;
use Input;
use Hash;
use Validator;
use App\User;
use Exception;
use Redirect;
use App\Models\Project;
use App\Models\UserDetail;
use App\Models\VendorInvite;
use App\Models\VendorProject;

class userlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first' => 'required',
            'email' => 'required|email',
			'manager' =>'required',
            'project'=>'required'
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
	
	$userId=Auth::user()->id;
    $roleId=$request->input('manager');
	$project_id=$request->input('project');
	$first_name=$request->input('first');
	$last_name=$request->input('last');
	$email=$request->input('email');
	$time=time();
	$url_string='parentId#'.$userId.'||Rollid#'.$roleId.'||time#'.$time;	
    $encryptedtoken = Crypt::encrypt($url_string);
	$url=$encryptedtoken;
	
	
		if(Auth::user()->role==1)
		{
		$check=DB::table('assign_project')->where(['company_type_id'=>'1','role_id'=>'2'])->first();
		DB::table('invitation_link')->insert(
		['sender_id' =>$userId,'link'=>$url,'project_id'=>$project_id,'company_type_id'=>$check->company_type_id,'block_id'=>null,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'invite_type'=>'2','is_active'=>'1']);
		}
		else
		{
		$check=DB::table('assign_project')->where('assign_project.user_id',$userId)->first();
		
		DB::table('invitation_link')->insert(
		['sender_id' =>$userId,'link'=>$url,'project_id'=>$project_id,'company_type_id'=>$check->company_type_id,'block_id'=>null,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'invite_type'=>'2','is_active'=>'1']);
		}
		/*$path= $_SERVER['HTTP_HOST'].'/invite_user/'.$url; 
		$headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
   
        $msg='<!DOCTYPE html>
			<html lang="en-US">
			<head>
			<meta charset="utf-8">
			</head>
			<body>
					<h2>Verify Your Email Address</h2>

				<div>
						Thanks for creating an account with the verification demo app.
						Please follow the link below to verify your email address.<br/> 
						<a href="http://'.$path.'"><h4>Please Click here!</h4></a><br/>
				</div>

			</body>
			</html>';
		$headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       mail($email," Email Verify",$msg,$headers);
	   
	        $emailData['send_to'] = $email;
			$emailData['send_by'] = Auth::user()->email;
			$emailData['sender_id'] = Auth::user()->id;
			$emailData['subject'] ="Verify Your Email Address";
			$emailData['body'] = $msg;
			$emailData['send_date'] = date('Y-m-d');
			$insertEmailDetails = DB::table('send_mail')->insert($emailData);
			
			*/
			
		 $user_fname= $first_name;
		 $user_lname= $last_name;
		 $path= $_SERVER['HTTP_HOST'].'/invite_user/'.$url; 
		 $to= $email;
         $subject = "Verify Your Email Address.";		 
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
				
		return back()->with('success','Employee registration link send successfully,Please check your mail inbox');
			
				
	}
	public function showForm($token)
	{
		
		$role= DB::table('roles')->get();
		$decrypted = Crypt::decrypt($token);
		$exploded=explode('||',$decrypted);//hash exploded
		$implodedRollId=explode('#',$exploded[1]);
	    $implodedParentId=explode('#',$exploded[0]);
		$implodedTime=explode('#',$exploded[2]);
		$RollId=$implodedRollId[1];
		$ParentId=$implodedParentId[1];
		//$Time=$implodedTime[1];
		$link=DB::table('invitation_link')->where(['link'=>$token])->first();
			
		if($token==$link->link)
		{
			if($link->is_active==0)
			{
				return view('invite_user.link_expire');
			}
			else
			{
			return view('invite_user.registration',['rollid'=>$RollId,'parent_id'=>$ParentId,'link'=>$link]);	
			}
		}
			
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$login_user_role = Auth::user()->role;
		if(Auth::user()->role==1)
        {
		   $role = DB::table('roles')->where('status','=',1)->whereNotIn('role_id', [1,2,8])->get();
		   $Project = Project::join('project_type','project_type.project_type_id','=','project.project_type_id')->orderBy('project.project_id','DESC')->get();
		
		}
		elseif(Auth::user()->role==2)
		{
			$role = DB::table('roles')->where('status','=',1)->whereNotIn('role_id', [1,2,8])->get();
			 $Project = Project::join('project_type','project_type.project_type_id','=','project.project_type_id')
			 ->join('vendor_project','vendor_project.project_id','=','project.project_id')
			 ->where('vendor_project.user_id','=',Auth::user()->id)
			 ->orderBy('project.project_id','DESC')->get();
		
			
		}
		else
		{
			$role = DB::table('roles')->where('status','=',1)->whereNotIn('role_id', [1,2,8])->where('role_id','>',$login_user_role)->get();
			 $Project = Project::join('project_type','project_type.project_type_id','=','project.project_type_id')
			 ->join('vendor_project','vendor_project.project_id','=','project.project_id')
			 ->where('vendor_project.user_id','=',Auth::user()->id)
			 ->orderBy('project.project_id','DESC')->get();
		}
		 
        return view('invite_user.genarateuser',compact("role","Project"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
		
        $validator = Validator::make($request->all(), [
            'first' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required'
        ]);

         if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } 

        $client_first_name = Input::get('first');
		$client_last_name = Input::get('last');
		$_token=Input::get('_token');
        $client_email = Input::get('email');
        $client_password = Input::get('password');
        $client_phone = Input::get('phone');
        $client_address = Input::get('address');
        $client_zip = Input::get('zip');
        $client_city = Input::get('city');
		$roleid = Input::get('Roll_Id');
		$token = Input::get('token');
		$parentId = Input::get('Parent_Id');
        $confirmation_code = str_random(30);
        $hashed = Hash::make($client_password);
		
		   $data=DB::table('invitation_link')->where('link',$token)->where('is_active',1)->first();
			
			if($data)
			{
		        $check=DB::table('assign_project')->where('assign_project.user_id','=',$parentId)->first();
		
			    $id=DB::table('users')->insertGetId(
				    [ 'user_type_id'=>2, 'role'=>$roleid,'email' => $client_email, 'password' =>$hashed,'confirmation_code' => $confirmation_code,'created_by'=>$parentId,'remember_token'=>$_token,'confirmed'=>1,
                        'company_id'=>$check->company_id]
			    );
			
			    UserDetail::insert(['user_id'=>$id,'first_name'=>$client_first_name,'last_name'=>$client_last_name,'email' => $client_email, 'phone' => $client_phone, 'address' => $client_address,
                    'zip' => $client_zip, 'city' => $client_city,]);
			
				$assign_project_id=DB::table('assign_project')->insertGetId(
				['user_id' =>$id, 'role_id' =>$roleid, 'parent_id' =>$check->id,'company_id'=>$check->company_id,'company_type_id'=>$check->company_type_id]
			    );
			
			    $record=VendorProject::where('user_id','=',$parentId)->get();
                if(!empty($record))
                {
                    foreach($record as $recod)
                    {
                      $Project=$recod->project_id??0;
                      VendorProject::insertGetId(['user_id'=>$id,'project_id'=>$Project,'assign_project_id'=>$assign_project_id]);
                    }
                }
			
                DB::table('invitation_link')->where('link',$data->link)->update(['is_active' => 0]);
			
                \Session::flash('success-msg-registered', 'Thanks for signing up! Please login.');

                return redirect('/administrator/login');
			}
			else
			{
				 \Session::flash('success-msg-registered', 'Link In-Active.');

                 return redirect('/administrator/login');
			}

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
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
		$data = DB::table('roles')->where('status','=',1)->whereNotIn('role_id', [1,2,8])->get();
		$editdata = DB::table('users')
            ->join('invitation_link', 'users.created_by', '=', 'invitation_link.sender_id')
            ->where(['invitation_link.id'=>$id,'invitation_link.invite_type'=>'2'])
            ->first();			
		return view('invite_user.edit_user_invite',compact("data","Project","editdata"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
	$userId=Auth::user()->id;
	$first_name=$request->input('first');
	$last_name=$request->input('last');
	DB::table('invitation_link')->where('id',$id)->update(['first_name'=>$first_name,'last_name'=>$last_name]);
	return back()->with('success','Employee registration link updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }
}
