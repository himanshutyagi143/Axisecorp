<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Input;
use Session;
use View;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
class AuthController extends Controller
{
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogout(Request $request){
        \Auth::logout();
        Session::flush();
		$reqrestdata=$request->segment(1);
		
		if($reqrestdata=='administrator')
		{
          return redirect('/administrator/auth/login');
		}
		else
	    {	
		 return redirect('/admin/login');
		}
    }

    public function getLogin(){

        if(\Auth::check()&&\Auth::user()->role!=8){
			
			
            if(\Auth::user()->role==1)
            {

              return redirect('/administrator/project');
            }
				  
            $check_type = DB::table('users')->where('id','=',\Auth::user()->id)->first();
		
            if($check_type)
            {
                  if($check_type->company_type_id==1)
                  {

                      return redirect('/administrator/project');
                  }
                  else
                  {

                       return redirect('/admin/project');

                  }
            }
            else
            {
                   return redirect('/admin/project');

            }
        }
        return view('login');
    }

    public function postLogin(){  //echo "Fsdgf";exit;

        $email = Input::get('email');
        $password = Input::get('password');
        $role = Input::get('role');
        $type = Input::get('type');
        

        $v = Validator::make(['email'=>$email,'password'=>$password,'role'=>$role],['email'=>'required|email','password'=>'required']);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput(Input::all());
        }else{
            if(\Auth::attempt(['email'=>$email,'password'=>$password,'confirmed'=>1,'is_active'=>1])){
				
				if(\Auth::user()->role==0)
                  {
				      \Auth::logout();
				    	Session::flush();
					  return redirect('/administrator/auth/login')->with('error_msg','Invalid credentials');  
					  //return redirect('/administrator/auth/login'); 
				  }
				  
				 if(\Auth::user()->role==1)
                  {
				      if($type!="administrator")
						 {
							 \Auth::logout();
							  Session::flush();
							  Session::flash('error_msg','Invalid credentials');
                              return redirect()->back(); 
							 //return redirect('/administrator/auth/login'); 
						 }
					  return redirect('/administrator');
				  }
				  
				  $check_type = DB::table('users')->where('id','=',\Auth::user()->id)->first();
				  
		
				  if($check_type)
				  {
					  if($check_type->company_type_id==1)
					  {
                         if($type!="administrator")
						 {
							 \Auth::logout();
							  Session::flush();
							  Session::flash('error_msg','Invalid credentials');
                              return redirect()->back();
							 // return redirect('/administrator/auth/login'); 
							 
						 }
						 
					      return redirect('/administrator');
					  }
					  else
					  {
						  if($type!="admin")
						 {
							 \Auth::logout();
							  Session::flush();
							  Session::flash('error_msg','Invalid credentials');
                              return redirect()->back(); 
							   //return redirect('/admin/login'); 
						 }
					       return redirect('/admin');
						  
					  }
				  }
				  else
					  {
						  
					      \Auth::logout();
							 Session::flush();
							Session::flash('error_msg','Invalid credentials');
                            return redirect()->back();
							   //return redirect('/admin/login'); 
						  
					  }
					   
					 return redirect('/project');  
					  
					  
            }else{
                Session::flash('error_msg','Invalid credentials');
                return redirect()->back();
            }
        }

    }
}
