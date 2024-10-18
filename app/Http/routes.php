<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Models\Media;
use App\User;
use App\Jobs\SendReminderEmail;
use App\Helpers\CommonHelper;

$settings=DB::table('system')->first();
 \View::share('settings', $settings);


	require __DIR__.'/front_routes.php';

	Route::get('/invite_user/{token}','userlinkController@showForm');
	Route::post('/create_user_url', 'userlinkController@store');
	Route::post('/generate-pdf-link','TempletController@generatePdfLink');
	Route::get('/kyc_update_form/{link}', 'CustomerDetailController@kyc_update_form');
	Route::post('/uploadkycdoc', 'CustomerDetailController@uploadkycdoc');
	Route::post('/crm/getmediaurl', 'CustomerDetailController@getmediaurl');


	//Omnipay Routes...
	Route::group(['prefix'=>'payment'],function () {
		Route::get('/{orderId}', 'OmnipayController@payment');
		Route::post('/returnPayment', 'OmnipayController@returnPayment');
		Route::get('/cancelPayment/{txnid}', 'OmnipayController@cancelPayment');
		Route::get('/callbackPayment', 'OmnipayController@callbackPayment');		
	});

	Route::get('/invite_vendor/{id?}','CompanyController@invite_vendor');
	Route::Post('/invite_vendor/{id?}','CompanyController@save_vendor');
	
	Route::Post('/paymentGuest/returnPayment','GuestUserController@returnPayment');
	Route::Post('/paymentGuest/cancelPayment/{txnid}','GuestUserController@cancelPayment');
	Route::get('/guestpaymentnew/{txnid}','GuestUserController@guestpaymentnew');
	//frontend
	//Route::post('/login', 'LoginController@login');
	//Route::get('/logout', 'LoginController@logout');
	
	Route::get('/vendor_register', 'LoginController@vendor_register');
	Route::get('/user_login', 'LoginController@user_login');
	Route::get('/mail', 'LoginController@sent_mail');
	
	
	//For unit booking at the time of registration...
	Route::post('/unitBookSubmit', 'frontend\unitBookingController@unitBookSubmit');
	
	
	//For getting details via pincode...
	Route::get('/getpincodedetails', 'CustomerController@getpincodedetails');
	
	Route::get('/register/email_verify/{confirmationCode}', [
		'as' => 'confirmation_path',
		'uses' => 'CustomerController@email_verify'
	]);
	
	//For getting unit images in modal...
	Route::get('/getunitimages', 'CustomerController@getunitimages');
	
	
	Route::get('/register/verify/{confirmationCode}', [
		'as' => 'confirmation_path',
		'uses' => 'CustomerController@confirm'
	]);

	// Password reset link request routes...
	Route::get('password/email', 'Auth\PasswordController@getEmail');
	Route::post('password/email', 'Auth\PasswordController@postEmail');

	// Password reset routes...
	Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('password/reset', 'Auth\PasswordController@postReset');
	
  
	//For Book Now...
	Route::get('/booknow', 'frontend\unitBookingController@booknow');
	Route::post('/booknowsubmit', 'frontend\unitBookingController@booknowsubmit');


	Route::get('/templets/details/{id?}', 'TempletController@templetsdetails');
	Route::get('/templets/detail/{id?}', 'TempletController@admintempletsdetails'); 
	
	
	Route::get('/getfrontendPaymentPlan/{user_id}/{unit_id}', 'BlockInviteController@getfrontendPaymentPlan'); 
	Route::get('/getInvitePaymentPlan/{company_id}/{unit_id}', 'BlockInviteController@getInvitePaymentPlan'); 
	Route::post('/getInvitePaymentsummary','BlockInviteController@getInvitePaymentsummary'); 

	//payment desc by himanshu
	Route::get('/paymentdesc/{id}/{token}', 'UserPaymentController@paymentdesc');
	Route::get('/customer_payment/{token}/{id}', 'UserPaymentController@paymentsubmit');
	Route::get('/verify_payment_otp/{token}/{id}', 'UserPaymentController@verifyPaymentOtp');
	Route::post('/postverifyOtpForpayments/{id}', 'UserPaymentController@postverifyOtpForpayments');
	Route::get('/payForpayment/{token}/{id}', 'UserPaymentController@payForpayment');
	Route::get('/paymentprintaspdf/{booking_id}', 'UserPaymentController@printaspdf');

	
	
	
	//Redirect to CRM Site and Partner Site Login routes...
	Route::post('/userlogin', 'LoginController@userLogin'); 
	Route::post('/partnerlogin', 'LoginController@partnerLogin'); 
	
	
	//User Assign Documents(Templates)
	Route::get('/templets/generate/{id?}', 'TempletController@templetsgenerate'); 
	Route::post('/templates/generatesubmit/{id?}', 'TempletController@templetsGenerateSubmit'); 
	
	Route::get('/download/{id}', function ($id) {
	 $filepath=Media::where('media_id',$id)->first();
	
	   if($filepath)
	  {   
		  $filepa = public_path('').$filepath->media_name;
		   return Response::download($filepa);
	 }
	 else
	 {
		 return back();
	 } 
	});
	

	 Route::get('/preview_booking', function () {
        return view('booking.preview_booking');
    });
	
	
	 Route::get('/getUserTreeForParentId/{id}','CustomerController@getUserTreeForParentId');
	
	
	Route::get('/use_one_time', function () {
	$user_detail_id=DB::table('user_details')->join('users as usersss','usersss.id','=','user_details.user_id')->where('usersss.role','=',8)->get();


	foreach($user_detail_id as $user_detailid)
	{ 
	   $data=DB::table('customer_details')->where('customer_details.user_id','=',$user_detailid->user_id)->get();
		if(empty($data))
		{
			   DB::table('customer_details')->insertGetId(['user_id'=>$user_detailid->user_id,'first_name'=>$user_detailid->first_name,'last_name'=>$user_detailid->last_name,'phone'=>$user_detailid->mobile_number??"1234567891",'applicant_type'=>$user_detailid->applicant_type,'created_by'=>$user_detailid->created_by]);
		}
	}

	echo "success"; exit;
	});
	
	Route::get('/edit_task_details', function () {
        return view('tasks.edit_task_details');
    });

  Route::get('/job', function () {

    $job = (new SendReminderEmail('Manoj Chauhan Test'))
        ->onQueue('emails')
        //->delay(10)
        ->onConnection('database')
    ;
    dispatch($job);
  });

  /**
   *@desc To clear cache
   *@request
   */
  Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return 'cache cleared!';
  });

  /**
   *@desc To clear view
   *@request
   */
  Route::get('/clear-view', function () {
    Artisan::call('view:clear');
    return 'view cleared!';
  });

  /**
   *@desc To clear config
   *@request
   */
  Route::get('/clear-config', function () {
    Artisan::call('config:clear');
    return 'config cleared!';
  });

  /**
   *@desc To clear config
   *@request
   */
  Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return 'config cleared and cached!';
  });

Route::get('/down', function(){
    Artisan::call('down');
    return Artisan::output();
});
