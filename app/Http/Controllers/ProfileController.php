<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Auth;
use App\Models\Project;
use App\Models\UserKyc;
use App\Models\Media;  
use App\Models\KYCType;


class ProfileController extends BaseController
{




    public function show()
    {

      if(Auth::check())
			{
			 if(Auth::user()->role==8)
			 { 
				$system = DB::table('system')->first();
				$id= Auth::user()->id;
				$document_type=User::join('customer_kyc','customer_kyc.user_id','=','users.id')->
				join('media','media.media_id','=','customer_kyc.media_id')->
				join('kyc_type','kyc_type.kyc_type_id','=','customer_kyc.kyc_type_id')->where('users.id',$id)->select('customer_kyc.description','customer_kyc.applicant_type','kyc_type.kyc_type_name','media.media_name','media.media_id')->get();   

				$users_details = DB::table('users')
				->join('customer_details', 'users.id', '=', 'customer_details.user_id')
				->select('customer_details.*','users.email as users_email')->where('users.is_active','=',1)
				->where('customer_details.user_id','=',Auth::user()->id)->get();
				$users_add_details=DB::table('customer_address_details')->where('address_type_id','=',1)->where('user_id','=',Auth::user()->id)->where('applicant_type','=',1)->first();
				$users_add_details1=DB::table('customer_address_details')->where('address_type_id','=',1)->where('user_id','=',Auth::user()->id)->where('applicant_type','=',2)->first();
				return view('/frontend/profile', ['system' => $system,'document_type'=>$document_type,'users_details'=>$users_details,'users_add_details'=>$users_add_details,'users_add_details1'=>$users_add_details1]);
				  				  
			 }
			 else
			 {
				 return redirect()->intended('/login');
			 }
			} else
			 {
				 return redirect()->intended('/login');
			 }
         }

}

