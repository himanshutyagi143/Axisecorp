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
use App\Models\AssignProject;
use App\Models\Company;
use App\Models\VendorInvite;
use App\Models\VendorProject;
use App\Models\UserDetail;
use App\Models\AssignVendor;

class CompanyController extends Controller
{
	
	
	
	 public function companyTypeWiseList($id)
   {	
   
   
   
      if(Auth::user()->role==1 ) {
		       if($id==1)
			   {
		         $company=Company::where('company_type_id',1)->get();
			   }
			   if($id==2)
			   {
			    $company=Company::where('company_type_id',2)->get();
			   }
			     if($id==3)
			   {
			    $company=Company::where('company_type_id',3)->get();
			   }
			     if($id==4)
			   {
			    $company=Company::where('company_type_id',4)->get();
			   }
	    }
   
   
   
            $company=array(); 
			 if(Auth::user()->company_type_id==1 ) {
				 
		  
			   
             $parent_id=array();
             $company=AssignProject::join('company','company.company_id','=','assign_project.company_id')->where('assign_project.company_type_id','=',1)->groupBy('assign_project.company_id')->get();
		   
		    if($id==1)
		   {
		       return view('company.companys',['company'=>$company]);
		   }
		   
		   
			 if(!empty($company))
			  {
				  
				  foreach($company as $company_type)
				  {
					 $parent_id[]=$company_type->id;
				  }
			  }
			
			$company=AssignProject::join('company','company.company_id','=','assign_project.company_id')->where('assign_project.company_type_id',2)
			->whereIn('assign_project.parent_id',$parent_id)
		    ->groupBy('assign_project.company_id')->get();
			
			
			  if($id==2)
		   {
		       return view('company.companys',['company'=>$company]);
		   }
			
			 if(!empty($company))
			  {
				  
				  foreach($company as $company_type)
				  {
					 $parent_id[]=$company_type->id;
				  }
			  }
			  
			$company=AssignProject::join('company','company.company_id','=','assign_project.company_id')->where('assign_project.company_type_id',3)
			->whereIn('assign_project.parent_id',$parent_id)
		    ->groupBy('assign_project.company_id')->get();
			
			if($id==3)
		   {
		       return view('company.companys',['company'=>$company]);
		   }
			
			 if(!empty($company))
			  {
				  
				  foreach($company as $company_type)
				  {
					 $parent_id[]=$company_type->id;
				  }
			  }
			
			$company=AssignProject::join('company','company.company_id','=','assign_project.company_id')->where('assign_project.company_type_id',4)
			->whereIn('assign_project.parent_id',$parent_id)
		    ->groupBy('assign_project.company_id')->get();
			
			
			//print_r($company); exit;
			
			
				 if($id==4)
			   {
				   return view('company.companys',['company'=>$company]);
			   }
			

			 }
			 elseif(Auth::user()->company_type_id==2 ) {
				 
             $parent_id=array();
            
			
			$company=AssignProject::join('company','company.company_id','=','assign_project.company_id')
			->where('assign_project.company_type_id',2)
			->where('assign_project.user_id',Auth::user()->id)
		    ->groupBy('assign_project.company_id')->get();
			 if($id==2)
		   {
		       return view('company.companys',['company'=>$company]);
		   }
			
			
			 if(!empty($company))
			  {
				  
				  foreach($company as $company_type)
				  {
					 $parent_id[]=$company_type->id;
				  }
			  }
			  
			$company=AssignProject::join('company','company.company_id','=','assign_project.company_id')->where('assign_project.company_type_id',3)
			->whereIn('assign_project.parent_id',$parent_id)
		    ->groupBy('assign_project.company_id')->get();
			
			 if($id==3)
		   {
		       return view('company.companys',['company'=>$company]);
		   }
			
			
			
			 if(!empty($company))
			  {
				  
				  foreach($company as $company_type)
				  {
					 $parent_id[]=$company_type->id;
				  }
			  }
			
			$company=AssignProject::join('company','company.company_id','=','assign_project.company_id')->where('assign_project.company_type_id',4)
			->whereIn('assign_project.parent_id',$parent_id)
		    ->groupBy('assign_project.company_id')->get();
			 
				 if($id==4)
		   {
		       return view('company.companys',['company'=>$company]);
		   } 



			 }
			 elseif(Auth::user()->company_type_id==3 ) {
				 
				 
             $parent_id=array();
			$company=AssignProject::join('company','company.company_id','=','assign_project.company_id')->where('assign_project.company_type_id',3)
			->where('assign_project.user_id',Auth::user()->id)
		    ->groupBy('assign_project.company_id')->get();
			
			 if($id==3)
		   {
		       return view('company.companys',['company'=>$company]);
		   }
			 if(!empty($company))
			  {
				  
				  foreach($company as $company_type)
				  {
					 $parent_id[]=$company_type->id;
				  }
			  }
			
			$company=AssignProject::join('company','company.company_id','=','assign_project.company_id')->where('assign_project.company_type_id',4)
			->whereIn('assign_project.parent_id',$parent_id)
		    ->groupBy('assign_project.company_id')->get();
			 
				 if($id==4)
		   {
		       return view('company.companys',['company'=>$company]);
		   } 

			 }
			 elseif(Auth::user()->company_type_id==4 ) {

            $parent_id=array();
		   
			$company=AssignProject::join('company','company.company_id','=','assign_project.company_id')->where('assign_project.company_type_id',4)
			->where('assign_project.user_id',Auth::user()->id)
		    ->groupBy('assign_project.company_id')->get();
				  if($id==4)
			   {
				   return view('company.companys',['company'=>$company]);
			   }

			 }
			 
			  return view('company.companys',['company'=>$company]);
   
   }
	
	
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
		$company_type=DB::table('company_type')->where('is_active','=',1)->get();
		$user_type=DB::table('user_type')->whereIn('id',[3,4])->get();
        return view('company.create_company',["Project"=>$Project,'company_type'=>$company_type,'current_id'=>$current_id,'user_type'=>$user_type]);
        
    }

    public function store(Request $request)
    {  
        $alldata=$request->all();
	    $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'Project' => 'required',
			'name' => 'required',
			'company_name' => 'required',
            'company_type_id' => 'required',
            'company_code' => 'required|unique:company',
			'user_type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $client_fname = Input::get('name');
		$client_lname = Input::get('lname');
        $client_email = Input::get('email');
        $client_password = Input::get('password');
        $client_phone = Input::get('phone');
        $address = Input::get('address');
        $zip = Input::get('zip');
        $city = Input::get('city');
        $state = Input::get('state');
        $Project = Input::get('Project');
        $user_type = Input::get('user_type');
        $company_type_id = Input::get('company_type_id');
        $company_name = Input::get('company_name');
        $company_code = Input::get('company_code');
        $Project = Input::get('Project');
		
        $gstin = Input::get('gst');
        $rera = Input::get('rera');
        $pan = Input::get('pan');
		
        $confirmation_code = str_random(30);

        $hashed = Hash::make($client_password);
        $id= DB::table('users')->insertGetId(
            ['role'=>2,'email' => $client_email, 'password' => $hashed, 'confirmation_code' => $confirmation_code,'confirmed'=>0,'is_active'=>2,'created_by'=>Auth::user()->id,'company_id'=>0,'user_type_id'=>$user_type]
         );
     
			 if ($request->hasFile('filename')) {
				 $file = $request->file('filename');
				 $extension = $file->getClientOriginalExtension();
				 $image_pro = uniqid() . '_doc.' . $extension;
				 $destinationPath = public_path('assets/userprofile');
				 $file->move($destinationPath, $image_pro);
				 $image_pro_name = '/assets/userprofile/' . $image_pro;
			  }
		 else{
			 $image_pro_name='';
		 }
			

		UserDetail::insert(['user_id'=>$id,'first_name'=>$client_fname,'last_name'=>$client_lname,'user_image'=>$image_pro_name,'created_by'=>Auth::user()->id,'phone' => $client_phone,'email' => $client_email,"address"=>$address,"city"=>$city,"zip"=>$zip,"state"=>$state]);    

		
		$check=DB::table('assign_project')->where('assign_project.user_id','=',Auth::user()->id)->first();
		
		  	
		$filename = '';
			if ($request->hasFile('image')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('image');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$filename = '/assets/company/' . $name;	
					
			}
			 $panfile = '';
			if ($request->hasFile('pan_file')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('pan_file');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$panfile = '/assets/company/' . $name;	
					
			}
			
				
		    $gstinfile = '';
			if ($request->hasFile('gst_file')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('gst_file');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$gstinfile = '/assets/company/' . $name;	
					
			}
				
		    $rerafile = '';
			if ($request->hasFile('rerafile')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('rerafile');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$rerafile = '/assets/company/' . $name;	
					
			}
			
			
		$description = Input::get('description');
        $location = Input::get('location');
        $specifications = Input::get('specifications');
			
			
			
			
			
			
		
		$c_id= DB::table('company')->insertGetId(
            ['company_type_id' =>$company_type_id, 'company_name' =>$company_name,'parent_company_id'=>Auth::user()->company_id, 'created_by' =>Auth::user()->id,'image'=>$filename,'specifications'=>$specifications,'location'=>$location,'description'=>$description, 'company_code' => $company_code,'pan'=>$pan,'gstin'=>$gstin,'rera'=>$rera,'pan_doc'=>$panfile,'gstin_doc'=>$gstinfile,'rera_doc'=>$rerafile]
        );
		
	    DB::table('users')->where('id','=',$id)->update(['company_id'=>$c_id,'company_type_id'=>$company_type_id]);	
			
			
	 if(Auth::user()->role==2)
	   {
		  $assign_project_id=DB::table('assign_project')->insertGetId(
            ['user_id' =>$id, 'parent_id' => isset($check->id)?$check->id:0,'company_type_id'=>$company_type_id,'company_id'=>$c_id]
        );
		
		
		
	   }
	   else
	   {
		   $current_id=DB::table('assign_project')->where('assign_project.company_type_id','=',1)->first();
		     $assign_project_id=DB::table('assign_project')->insertGetId(
            ['user_id' =>$id, 'parent_id' => isset($current_id->id)?$current_id->id:0,'company_type_id'=>$company_type_id,'company_id'=>$c_id]
            );
		   
	   }	   
			
		VendorProject::insertGetId(['user_id'=>$id,'project_id'=>$Project,'assign_project_id'=>$assign_project_id]);	
		AssignVendor::insert(['user_id'=>Auth::user()->id, 'company_id'=>$c_id]);	
			
		
		
		 $user_fname= $client_fname;
		 $user_lname= $client_lname;
		 $path= $_SERVER["HTTP_HOST"]."/update_channel/".$company_code; 
		 $to= $client_email;
         $subject = "Create Channel Partner";		 
		 $data=['path'=>$path,'user_fname'=>$user_fname,'user_lname'=>$user_lname,'useremail'=>$to];
		 $user =$to;            		
			/* $mail = Mail::send('emails.venderinvite', ['data' => $data], function ($m) use ($user) {
             $m->from('no-reply@stagingrelease.com', 'Email Verification');
             $m->to($user)->subject('Create Channel Partner');
           });
	   
	        $data=DB::table('users')->where('role','=',1)->first();
	        $emailData['send_to'] = $client_email;
			$emailData['send_by'] = $data->email;
			$emailData['sender_id'] = $data->id;
			$emailData['subject'] ="Thanks for creating an account";
			$emailData['body'] = $subject." ".$path;
			$emailData['send_date'] = date('Y-m-d');
			$insertEmailDetails = DB::table('send_mail')->insert($emailData); */
			
       \Session::flash('success-msg-registered', 'Thanks for signing up! Please check your email.');

        return redirect()->back();

    }
	
	
	

  
 
    public function tree($parent_id=0)
    {   
	
	  $mainCategory=DB::table('assign_project')
	  ->join('company','company.company_id','=','assign_project.company_id')
	  ->groupBy('assign_project.company_id')
	  ->where('company.company_id','=',$parent_id)
	  ->first();
	   $data=$this->getCategoryTreeForParentId($mainCategory->company_id);
    $user=DB::table('user_details')->where('user_id',$mainCategory->user_id)->pluck("first_name");
	$category = array();
	$categories = array();
    $category['id'] = $mainCategory->company_id;
    $category['user_id'] = $mainCategory->user_id;
    $category['fname'] = $user[0]??'';
    $category['parent_id'] =DB::table('assign_project')->where('id',$mainCategory->parent_id)->first();
    $category['created_by'] =$mainCategory->created_by;
    $category['company'] = $mainCategory->company_name;
    $category['company_type_id'] = $mainCategory->company_type_id;
    $category['company_id'] = $mainCategory->company_id;
    $category['child'] =$data;
    $categories[$mainCategory->company_id] = $category;

		return  view('company.tree', ['data'=>$categories]);	
    }
	
public function getCategoryTreeForParentId($company_id) {
  $categories = array();
  
   $result=DB::table('company')
  ->join('assign_project','company.created_by','=','assign_project.user_id')
  ->where('company.parent_company_id',$company_id)
  ->select('company.*','assign_project.user_id','assign_project.id','assign_project.parent_id')
  ->get();
    if(!empty($result))
	{
		  foreach ($result as $mainCategory)
		  {
			$category = array();
			$user=DB::table('user_details')->where('id',$mainCategory->user_id)->first();
			$category['id'] = $mainCategory->company_id;
			$category['user_id'] = $mainCategory->user_id;
			$category['fname'] = $user->first_name??'';
			$category['parent_id'] =DB::table('assign_project')->where('id',$mainCategory->parent_id)->first();
			$category['created_by'] =$mainCategory->created_by;
			$category['company'] = $mainCategory->company_name;
			$category['company_type_id'] = $mainCategory->company_type_id;
			$category['company_id'] =$mainCategory->company_id;
			$category['child'] = $this->getCategoryTreeForParentId($mainCategory->company_id);
			$categories[$mainCategory->company_id] = $category;
		 }
  }
  
  return $categories;
}
	
	
	

    public function edit($id)
    {
       
        $clients = DB::table('company')->where('company.company_id', '=', $id)->first();
        return view('company.edit_company ', ['client' => $clients]);
        

    }

    public function update($company_id,Request $request)
    {
       
        $validator = Validator::make(Input::all(), [
            'company_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company_name = Input::get('company_name');
		 $data = DB::table('assign_project')->where('assign_project.company_id', $company_id)->first();
         $id=isset($data->user_id)?$data->user_id:0;
       
			
		$description = Input::get('description');
        $location = Input::get('location');
        $specifications = Input::get('specifications');
			$filename = '';
			if ($request->hasFile('image')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('image');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$filename = '/assets/company/' . $name;	
					
					
				 DB::table('company')->where('company.company_id', $company_id)->update(
            [ 'company_name' =>$company_name, 'created_by' =>Auth::user()->id,'image'=>$filename,'specifications'=>$specifications,'location'=>$location,'description'=>$description]
        );	
					
			}
			else
			{
				
				 DB::table('company')->where('company.company_id', $company_id)->update(
					[ 'company_name' =>$company_name, 'created_by' =>Auth::user()->id,'specifications'=>$specifications,'location'=>$location,'description'=>$description]
				);
				
			}

            \Session::flash('success-msg', 'Successfully Edited');
            return redirect()->back();
      // }


    }

    public function delete($id)
    {
       DB::table('users')->where('id', '=', $id)->update(
                ['is_active' => 0]
            );

     \Session::flash('success_msg', 'Successfully Deleted');
        return redirect()->back();
       


    }
	
	 public function invite_vendor($link)
    {   
	    $data=VendorInvite::where('link','=',$link)->first();
		if(!empty($data))
		{
			if($data->is_active==0)
		   {
			  \Session::flash('success-msg-registered', 'Inactive Link.');

               return redirect('/admin/login');
		    }
		}
		else
		{
			 \Session::flash('success-msg-registered', 'Inactive Link.');

               return redirect('/admin/login');
		}
	
       return view('company.create_vender_invite_company')->with(['data' => $data]);
    }
	
	
	public function updatechannel($link='')	  
     { 
	   
	   $data=Company::join('assign_project','assign_project.company_id','=','company.company_id')
                    ->join('users','users.id','=','assign_project.user_id')
                    ->join('user_details','user_details.user_id','=','users.id')->where('company_code','=',$link)->first();
		if(empty($data))
		{
			  \Session::flash('success-msg-registered', 'Inactive Link.');
               return redirect('/admin/login');
		}
       return view('company.updatechannel')->with(['data' => $data]);
	 }
	
	
	  public function vendorregister(Request $request)
    {
		$data = $request->all();
		//echo "<pre>"; print_r($data); die;
       
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'company_name' => 'required',
            'reference' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		$link=Input::get('reference');
		
		
		$data1=DB::table('company')->where('company.company_code', $link)->first();
		
		if(empty($data1))
		{
		  \Session::flash('success-msg-registered', 'Invalid Reference Code.');
          // return redirect('/admin/login');
           return back();
		}
		$data=DB::table('assign_project')->where('assign_project.company_id', $data1->company_id)->first();
		

        $client_fname = Input::get('name');
		$client_lname = Input::get('lname');
        $client_email = Input::get('email');
        $client_password = Input::get('password');
        $client_phone = Input::get('phone');
        $client_address = Input::get('address');
        $client_zip = Input::get('zip');
        $client_city = Input::get('city');
        $client_state = Input::get('state');
        $company_name = Input::get('company_name');
        $confirmation_code = str_random(30);
        $hashed = Hash::make($client_password);
	   $Project = $data->project_id??'';
	   $company_type_id = $data->company_type_id??'';
	   $sender_id = $data->user_id??0;
	   $check=DB::table('assign_project')->where('assign_project.user_id','=',$data->user_id)->first();
      $id= DB::table('users')->insertGetId(
            ['role'=>2,'email' => $client_email, 'password' => $hashed, 'phone' => $client_phone, 'address' => $client_address, 'zip' => $client_zip, 'city' => $client_city, 'state' => $client_state, 'confirmation_code' => $confirmation_code
			,'created_by'=>$data->sender_id??0,'confirmed'=>1,'company_id'=>0]
        );
		UserDetail::insert(['user_id'=>$id,'first_name'=>$client_fname,'last_name'=>$client_lname,'user_image'=>'','created_by'=>Auth::user()->id]);   
		
		

       /*  Mail::send('frontend.verify', ['confirmation_code'=>$confirmation_code], function($message) {
            $message->to(Input::get('email'))
                ->subject('Verify your email address');
        });
		 */
		 
		 
		 
		  	
		$filename = '';
			if ($request->hasFile('image')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('image');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$filename = '/assets/company/' . $name;	
					
			}
			
			
			
		$description = Input::get('description');
        $location = Input::get('location');
        $specifications = Input::get('specifications');
			
			
			
	    $check=DB::table('assign_project')->where('assign_project.user_id','=',$sender_id)->first();
		$c_id= DB::table('company')->insertGetId(
            ['company_type_id' =>$company_type_id,'parent_company_id'=>$check->company_id,'company_name' =>$company_name, 'created_by' =>$sender_id,'image'=>$filename,'specifications'=>$specifications,'location'=>$location,'description'=>$description]
        );
			
		 DB::table('users')->where('id','=',$id)->update(['company_id'=>$c_id,'company_type_id'=>$company_type_id]);		
			
			
			
		if($check)
		{
		 $assign_project_id=DB::table('assign_project')->insertGetId(
            [ 'user_id' =>$id,  'parent_id' => isset($check->id)?$check->id:0,'company_type_id'=>$company_type_id,'company_id'=>$c_id]
        );
		}
		else
		{
			$check=DB::table('assign_project')->where('assign_project.company_type_id','=',1)->first();
			 $assign_project_id=DB::table('assign_project')->insertGetId(
            ['user_id' =>$id,  'parent_id' => isset($check->id)?$check->id:0,'company_type_id'=>$company_type_id,'company_id'=>$c_id]
            );
			
		}
		 
		VendorProject::insertGetId(['user_id'=>$id,'project_id'=>$Project,'assign_project_id'=>$assign_project_id]); 
		 
	   VendorInvite::where('link','=',$link)->update(['is_active'=>0]);
	   AssignVendor::insert(['user_id'=>$sender_id, 'company_id'=>$c_id]);
		
		
		Mail::raw('Thanks for signing up! Please login.', function ($message) use($client_email){
			 $message->from('no-reply@stagingrelease.com');
            $message->to($client_email);
         });  
		
		
		
		
       \Session::flash('success-msg-registered', 'Thanks for signing up! Please login.');

        return redirect('/admin/login');

    }
	
	
	  public function save_vendor($link,Request $request)
    {
		//dd($request->all());
		$companyCode = $this->generateCompanyCode();
		
		$data=VendorInvite::where('link','=',$link)->first();
		
		if($data)
		{
			if($data->is_active==0)
		   {
			 \Session::flash('success-msg-registered', 'Inactive Link.');
			 return back();
		    }
	   $user_type_id=$data->user_type_id??0;
		
	   if($user_type_id==4)
		   {
				$validator = Validator::make($request->all(), [
				    'company_name' => 'required',
					'name' => 'required',
					'email' => 'required|email|unique:users',
					'password' => 'required|min:6',
					'phone' => 'required',
					'address' => 'required',
					'zip' => 'required',
					'city' => 'required',
					'state' => 'required',
					'pan' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
					'pan_file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
					'gstin' => 'required|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
					'gstin_file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
					

				]);
		   }
		   else
		   {
			   $validator = Validator::make($request->all(), [
				    'company_name' => 'required',
					'name' => 'required',
					'email' => 'required|email|unique:users',
					'password' => 'required|min:6',
					'phone' => 'required',
					'address' => 'required',
					'zip' => 'required',
					'city' => 'required',
					'state' => 'required',
					'pan' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
					'pan_file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
				]);
		   }
		
        }
		else
		{
			\Session::flash('success-msg-registered', 'Inactive Link.');
			 return back();
		}
       
		if ($validator->fails()) {
            return response()->json(['message' => 'failure', 'errors'=> $validator->errors()]);
        }

        $client_fname = Input::get('name');
		$client_lname = Input::get('lname');
        $client_email = Input::get('email');
        $client_password = Input::get('password');
        $client_phone = Input::get('phone');
        $client_address = Input::get('address');
        $client_zip = Input::get('zip');
        $client_city = Input::get('city');
        $company_name = Input::get('company_name');
        $pan = Input::get('pan');
        $gstin = Input::get('gstin');
        $rera = Input::get('rera');
        $state = Input::get('state');
        $company_code = $companyCode;
        $confirmation_code = str_random(30);
        $hashed = Hash::make($client_password);

       $data=VendorInvite::where('link','=',$link)->first();
	   $Project = $data->project_id??'';
	   $company_type_id = $data->company_type_id??'';
	   $sender_id = $data->sender_id??'';
	   
	   
      $id= DB::table('users')->insertGetId(
            ['role'=>2,'email' => $client_email, 'password' => $hashed,'confirmation_code' => $confirmation_code
			,'created_by'=>$data->sender_id??0,'confirmed'=>1,'company_id'=>0,'is_active'=>1,'user_type_id'=>$user_type_id]
        );
		 UserDetail::insert(['user_id'=>$id,'first_name'=>$client_fname,'last_name'=>$client_lname,'user_image'=>'','created_by'=>$sender_id,'phone' => $client_phone,'email' => $client_email,"address"=>$client_address,"city"=>$client_city,"zip"=>$client_zip,"state"=>$state]); 
		 
		

		
		  	
		    $filename = '';
			if ($request->hasFile('image')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('image');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$filename = '/assets/company/' . $name;	
					
			}
			
				
		    $panfile = '';
			if ($request->hasFile('pan_file')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('pan_file');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$panfile = '/assets/company/' . $name;	
					
			}
			
				
		    $gstinfile = '';
			if ($request->hasFile('gstin_file')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('gstin_file');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$gstinfile = '/assets/company/' . $name;	
					
			}
				
		    $rerafile = '';
			if ($request->hasFile('rerafile')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('rerafile');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$rerafile = '/assets/company/' . $name;	
					
			}
		$check=DB::table('assign_project')->where('assign_project.user_id','=',$sender_id)->first();	
		$description = Input::get('description');
        $location = Input::get('location');
        $specifications = Input::get('specifications');
		$c_id= DB::table('company')->insertGetId(
            ['company_type_id' =>$company_type_id,'parent_company_id'=>$check->company_id, 'company_name' =>$company_name, 'created_by' =>$sender_id,'image'=>$filename,'specifications'=>$specifications,'location'=>$location,'description'=>$description, 'company_code' => $company_code,'pan'=>$pan,'gstin'=>$gstin,'rera'=>$rera,'pan_doc'=>$panfile,'gstin_doc'=>$gstinfile,'rera_doc'=>$rerafile]
        );
		
		DB::table('users')->where('id','=',$id)->update(['company_id'=>$c_id,'company_type_id'=>$company_type_id]);
		
		if($check)
		{
		  $assign_project_id= DB::table('assign_project')->insertGetId(
            ['user_id' =>$id,  'parent_id' => isset($check->id)?$check->id:0,'company_type_id'=>$company_type_id,'company_id'=>$c_id]
        );
		}
		else
		{
			$check=DB::table('assign_project')->where('assign_project.company_type_id','=',1)->first();
			$assign_project_id= DB::table('assign_project')->insertGetId(
            [ 'user_id' =>$id,  'parent_id' => isset($check->id)?$check->id:0,'company_type_id'=>$company_type_id,'company_id'=>$c_id]
            );
			
		}
		
	   VendorProject::insertGetId(['user_id'=>$id,'project_id'=>$Project,'assign_project_id'=>$assign_project_id]); 
	   VendorInvite::where('link','=',$link)->update(['is_active'=>0]);
	   AssignVendor::insert(['user_id'=>$sender_id, 'company_id'=>$c_id]);
	   
	   $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       $msg='<!DOCTYPE html>
			<html lang="en-US">
			<head>
			<meta charset="utf-8">
			</head>
			<body>
					

				<div>
						Thanks for creating an account <br/>
				</div>

			</body>
			</html>';
		$headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	    Mail::raw($msg, function ($message) use($client_email){
			 $message->from('no-reply@stagingrelease.com');
            $message->to($client_email);
         });  
	   
	        $data=DB::table('users')->where('role','=',1)->first();
	        $emailData['send_to'] = $client_email;
			$emailData['send_by'] = $data->email;
			$emailData['sender_id'] = $data->id;
			$emailData['subject'] ="Thanks for creating an account";
			$emailData['body'] = $msg;
			$emailData['send_date'] = date('Y-m-d');
			$insertEmailDetails = DB::table('send_mail')->insert($emailData);
		return response()->json(['message' => 'success']);

    }
	
	
	
	  public function saveUpdateChannel($link,Request $request)
    {
		
		$companyCode = $link;
		
		 $data=Company::join('assign_project','assign_project.company_id','=','company.company_id')
                    ->join('users','users.id','=','assign_project.user_id')
                    ->join('user_details','user_details.user_id','=','users.id')->where('company_code','=',$link)->first();
		if($data)
		{
			
	   $user_type_id=$data->user_type_id??0;
		
	   if($user_type_id==4)
		   {
				$validator = Validator::make($request->all(), [
				    'company_name' => 'required',
					'name' => 'required',
					'email' => 'required|email',
					'password' => 'required|min:6',
					'phone' => 'required',
					'address' => 'required',
					'zip' => 'required',
					'city' => 'required',
					'state' => 'required',
					'pan' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
					'pan_file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
					'gstin' => 'required|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
					'gstin_file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
					

				]);
		   }
		   else
		   {
			   $validator = Validator::make($request->all(), [
				    'company_name' => 'required',
					'name' => 'required',
					'email' => 'required|email',
					'password' => 'required|min:6',
					'phone' => 'required',
					'address' => 'required',
					'zip' => 'required',
					'city' => 'required',
					'state' => 'required',
					'pan' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
					'pan_file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
				]);
		   }
		
        }
		else
		{
			\Session::flash('success-msg-registered', 'Inactive Link.');
			 return back();
			 
		}
       
		if ($validator->fails()) {
            return response()->json(['message' => 'failure', 'errors'=> $validator->errors()]);
        }

        $client_fname = Input::get('name');
		$client_lname = Input::get('lname');
        $client_email = Input::get('email');
        $client_password = Input::get('password');
        $client_phone = Input::get('phone');
        $client_address = Input::get('address');
        $client_zip = Input::get('zip');
        $client_city = Input::get('city');
        $company_name = Input::get('company_name');
        $pan = Input::get('pan');
        $gstin = Input::get('gstin');
        $rera = Input::get('rera');
        $state = Input::get('state');
        $company_code = $companyCode;
        $confirmation_code = str_random(30);
        $hashed = Hash::make($client_password);

      
	  
	   $company_type_id = $data->company_type_id??'';
	   $company_id = $data->company_id??'';
	   
	   
	    $id=$data->user_id??0;
		
     DB::table('users')->where('id','=',$id)->update( ['role'=>2,'email' => $client_email, 'password' => $hashed,'confirmed'=>1,'is_active'=>1,'user_type_id'=>$user_type_id]
        );
		 UserDetail::where('user_id','=',$id)->update(['user_id'=>$id,'first_name'=>$client_fname,'last_name'=>$client_lname,'user_image'=>'','phone' => $client_phone,'email' => $client_email,"address"=>$client_address,"city"=>$client_city,"zip"=>$client_zip,"state"=>$state]); 
		 
		

		
		  	
		    $filename = '';
			if ($request->hasFile('image')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('image');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$filename = '/assets/company/' . $name;	
					
			}
			
				
		    $panfile = '';
			if ($request->hasFile('pan_file')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('pan_file');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$panfile = '/assets/company/' . $name;	
					
			}
			
				
		    $gstinfile = '';
			if ($request->hasFile('gstin_file')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('gstin_file');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$gstinfile = '/assets/company/' . $name;	
					
			}
				
		    $rerafile = '';
			if ($request->hasFile('rerafile')) {
				
				 $destinationPath = public_path('assets/company');
				 $file=$request->file('rerafile');
					$extension = $file->getClientOriginalExtension();
					$name = uniqid() . '_img.' . $extension;
					$file->move($destinationPath, $name);
					$rerafile = '/assets/company/' . $name;	
					
			}
			
		$description = Input::get('description');
        $location = Input::get('location');
        $specifications = Input::get('specifications');
		$c_id=$company_id;
		DB::table('company')->where('company_id','=',$company_id)->update(
            ['company_type_id' =>$company_type_id, 'company_name' =>$company_name,'image'=>$filename,'specifications'=>$specifications,'location'=>$location,'description'=>$description, 'company_code' => $company_code,'pan'=>$pan,'gstin'=>$gstin,'rera'=>$rera,'pan_doc'=>$panfile,'gstin_doc'=>$gstinfile,'rera_doc'=>$rerafile]
        );
	 
	   
	   $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       $msg='<!DOCTYPE html>
			<html lang="en-US">
			<head>
			<meta charset="utf-8">
			</head>
			<body>
					

				<div>
						Thanks for creating an account <br/>
				</div>

			</body>
			</html>';
		$headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	    Mail::raw($msg, function ($message) use($client_email){
			 $message->from('no-reply@stagingrelease.com');
            $message->to($client_email);
         });  
	   
	        $data=DB::table('users')->where('role','=',1)->first();
	        $emailData['send_to'] = $client_email;
			$emailData['send_by'] = $data->email;
			$emailData['sender_id'] = $data->id;
			$emailData['subject'] ="Thanks for creating an account";
			$emailData['body'] = $msg;
			$emailData['send_date'] = date('Y-m-d');
			$insertEmailDetails = DB::table('send_mail')->insert($emailData);
		return response()->json(['message' => 'success']);

    }
	
	
	public function checkCompanyCode($companyCode){
		$check = Company::where('company_code', '=', $companyCode)->get();
		
		if(count($check) !=0 ){
			return response()->json(['message' => 'failure']);
		}
		else{
			return response()->json(['message' => 'success']);
		}
	}
	
	
	public function generateCompanyCode(){
		$companyCode = substr(number_format(time() * rand(),0,'',''),0,6);
		
		$checkCompayCode = Company::where('company_code', '=', $companyCode)->first();
		if(!empty($checkCompayCode)){
			$companyCode = $this->generateCompanyCode();
		}
		return $companyCode;
	}

	
}
