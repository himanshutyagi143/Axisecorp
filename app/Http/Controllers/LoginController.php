<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Mail;
use CommonHelper;
use Redirect;


class LoginController extends BaseController
{




 public function user_login()
    {
      return view('frontend.user_login');
    }
 public function user_register()
    {   $document_type = DB::table('kyc_type')->get();
      return view('frontend.user_register',['document_type'=>$document_type]);
    }
   public function vendor_register()
    {
      return view('frontend.vendor_register');
    }
	
	
    public function show()
    {
		 if(Auth::check())
			{
			 if(Auth::user()->role==8)
			 {
				  return redirect()->intended('/profile');
			 }
			}
       
        return view('frontend.login');

    }


    /**
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
public function login()
{
   


    $email = Input::get('email');
    $password = Input::get('password');
    $v = Validator::make(['email'=>$email,'password'=>$password],['email'=>'required|email','password'=>'required']);

    if($v->fails()){
        return redirect()->back()->withErrors($v)->withInput(Input::all());}



    if (Auth::attempt(['email' => $email, 'password' => $password,'confirmed'=>1,'is_active'=>1,'role'=>8]))
    {
        return redirect()->intended('/profile');
    }
    else{
        \Session::flash('success-msg', 'Invalid Credentials');
        return redirect()->back();


    }
}

    public function logout()
    {
        Auth::logout();
        return redirect()->back();

    }
	
	
	public function sent_mail(){
		$email = 'ashish3409@gmail.com';
	  
		Mail::raw('Hello ashish', function ($message) use($email){
			$message->to($email);
		});
		echo 'Successfully Sent'; exit;
		
	}

	
	
	public function userLogin(Request $request){
		$data = $request->all();
		
		$validator = Validator::make($data, [
           
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
           return response()->json(['message' => 'failure', 'errors'=> $validator->errors()]);
        }
		
		$email = $data['email'];
		$password = $data['password'];
		if(Auth::attempt(['email'=>$email,'password'=>$password,'confirmed'=>1,'is_active'=>1])){
			$token=CommonHelper::quickAlphanumericRandom(12);
			$checktoken=DB::table('direct_login')->where('token','=',$token)->first();
			
			if($checktoken){
				$token=CommonHelper::quickAlphanumericRandom(12);
			}
			$user_id = Auth::user()->id;
			$user_type_id = Auth::user()->user_type_id;
			$role = Auth::user()->role;
			$expiry_time  = strtotime("+10 minutes");
			
			if($user_type_id == 1 && $role == 8){
				$directLoginId = DB::table('direct_login')->insertGetId(['user_id' => $user_id, 'token'=> $token, 'expiry_time'=>$expiry_time, 'is_active'=> 1]);
				
				if($directLoginId){
					if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
					$protocol = 'https://';
					}
					else{
					$protocol = 'http://';
					}
					
						Auth::logout();
						$site_url = env('customer_site');
						return response()->json(['message' => 'success', 'url'=> $protocol.$site_url.'/customerlogin/'.$token]);	

				}
			}
			else{
				Auth::logout();
				return response()->json(['message' => 'failure', 'errors'=> ['Invalid credentials for customer.']]);
			}
			
		}
		else{
			return response()->json(['message' => 'failure', 'errors'=> ['Invalid Credentials.']]);
		}
		
		
		
	}
	
	
	
	public function partnerLogin(Request $request){
		$data = $request->all();
		
		$validator = Validator::make($data, [
           
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
           return response()->json(['message' => 'failure', 'errors'=> $validator->errors()]);
        }
		
		$email = $data['email'];
		$password = $data['password'];
		if(Auth::attempt(['email'=>$email,'password'=>$password,'confirmed'=>1,'is_active'=>1])){
			$token=CommonHelper::quickAlphanumericRandom(12);
			$checktoken=DB::table('direct_login')->where('token','=',$token)->first();
			
			if($checktoken){
				$token=CommonHelper::quickAlphanumericRandom(12);
			}
			$user_id = Auth::user()->id;
			$user_type_id = Auth::user()->user_type_id;
			$role = Auth::user()->role;
			$expiry_time  = strtotime("+10 minutes");
			
			if($user_type_id == 3 || $user_type_id == 4){
				$directLoginId = DB::table('direct_login')->insertGetId(['user_id' => $user_id, 'token'=> $token, 'expiry_time'=>$expiry_time, 'is_active'=> 1]);
				
				if($directLoginId){
				if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
				$protocol = 'https://';
				}
				else{
				$protocol = 'http://';
				}
					Auth::logout();
					$site_url = env('partner_site');
					return response()->json(['message' => 'success', 'url'=> $protocol.$site_url.'/partnerlogin/'.$token]);	

				}
			}
			else{
				Auth::logout();
				return response()->json(['message' => 'failure', 'errors'=> ['Invalid credentials for channel partner.']]);
			}
			
		}
		else{
			return response()->json(['message' => 'failure', 'errors'=> ['Invalid Credentials.']]);
		}
		
		
		
	}
	
}

