<?php
		Route::get('/profile','ProfileController@show');
		 Route::group(['namespace' =>'frontend'],function () {

	   //property detail
	     Route::get('/property/details','UserProfileController@propertyDetails');
		 Route::post('/property/details/{unit_id}','UserProfileController@propertyDetailsunit');
		 Route::get('/payment/currentinstallment/{unit_id}','UserProfileController@getCurrentInstallment');

        //endproperty detail
       //account detail
		Route::get('/account/details','UserProfileController@accountDetails');
		Route::post('/account/details/{unit_id}','UserProfileController@accountDetailunit');
	   //end account detail
		 
		 Route::get('/user/construction','UserProfileController@userConstruction');
		 Route::get('/user/demandletters','UserProfileController@demandletters');
		 Route::get('/user/onlinepayment','UserProfileController@userOnlinepayment');
		 
		 Route::get('/user/paymentschedule','UserProfileController@Paymentschedule');
		 Route::get('/user/generateInvoice/{id}','UserProfileController@generateInvoice');
		 Route::delete('user/{id}', 'UserProfileController@deletedoc');
		// Route::delete('url/{url}', 'UrlController@destroy');
		 Route::get('/user/query','UserProfileController@Raiseaquery');
		 Route::post('/user/querymail','UserProfileController@mailuserquery');
		 Route::get('/user/updatecontact','UserProfileController@updatecontact');
		 Route::post('/user/updatecontactemail','UserProfileController@updatecontactemail');
		 Route::post('/user/emailverification','UserProfileController@emailverification');
		 
		 
		 Route::get('/user/registry','UserProfileController@registryprocess');	 
		 Route::get('/user/statement','UserProfileController@statement');
		 Route::get('/user/appointment','UserProfileController@upcomingappointment');
		
		
		
		 //Book Units After User Login...
		 Route::get('/user/bookunits','unitBookingController@bookunits');
		
		 
		 
		 });
		Route::get('/user/documantation','TempletController@documantation');
		 
		//User Assign Document (template) download
		 Route::get(' /templets/download/{id}', 'TempletController@templetsdownload');  