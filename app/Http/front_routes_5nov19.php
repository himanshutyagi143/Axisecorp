<?php
 //Route::namespace('Front')->group(function () {
Route::get('/', 'FrontendController@show');
//Route::get('/login', 'LoginController@show');
Route::get('/aboutus', 'ContactController@aboutus');
Route::get('/gallery', 'ContactController@gallery');
Route::get('/axisblues', 'ContactController@axisblues');
Route::get('/axisbluesold', 'ContactController@axisbluesold');
Route::get('/yogvillasold', 'ContactController@yogvillasold');
Route::get('/yogvillas', 'ContactController@yogVillas');
Route::get('/contact',  'ContactController@show');
Route::post('/contact',  'ContactController@contact');
Route::get('/caseorchid', function () {
	return view('frontend.caseorchid');
});
Route::get('/yogvillastest', function () {
	return view('frontend.yogvillas_old');
});

Route::get('/hiring', function () {
	return view('frontend.hiring.hiring');
});
Route::get('/yogvillaad', function () {
	return view('frontend.yogvillaad.yogvillaad');
});
Route::get('/remax-ad', function () {
	return view('frontend.remaxad.remaxad');
});
Route::post('/addyogvillasenquiry', 'YogvillasController@createEnquiryLeads');
Route::post('/schedulesitevisit', 'YogvillasController@createScheduleSiteVisit');
Route::post('/addsiteenquiry', 'YogvillasController@createWebsiteEnquiry');
Route::post('/register', 'CustomerController@store');

Route::get('/user_register', 'LoginController@user_register');

//invite block
Route::get('/invite_block/{link}','BlockInviteController@invite_block');
Route::post('/invite_block_submit/{link}','BlockInviteController@invite_block_submit');
Route::get('/getPaymentPlanComponent/{payment_plan_id}','BlockInviteController@getPaymentPlanComponent');
Route::get('/getInventoryData','BlockInviteController@getInventoryData');
Route::post('/create_invite_firstuser', 'CustomerController@create_invite_firstuser');
Route::post('/create_invite_seconduser', 'CustomerController@create_invite_seconduser');
Route::post('/unit_block_submit/{link}', 'BlockInviteController@unit_block_submit');
Route::get('/bookmyunit/{link}','BlockInviteController@bookmyunitForm');
Route::get('/getunitallimages', 'BlockInviteController@getunitimages');
Route::get('/payment_status/{booking_id}', 'BlockInviteController@paymentStatus');

Route::get('/customer_details_update/{customer_code}', 'CustomerController@customerDetailsUpdate');
Route::post('/update_customer_details', 'CustomerController@updateCustomerDetails');
Route::post('/update_secondcustomer_details', 'CustomerController@updateSecondcustomerDetails');
//Route::get('/outer_user_payment/{tab?}/{token?}', 'GuestUserController@guestUserPayment');
Route::get('/outer-user-payment/{tab?}/{token?}', 'GuestUserController@guestUserPayment');
Route::post('/submitGuestPayment', 'GuestUserController@submitGuestPayment');
Route::get('/guest_payment_status/{txn}', 'GuestUserController@guest_payment_status');
Route::post('/getBlockFloor', 'GuestUserController@getBlockFloor');
Route::post('/getBlockFloorUnit', 'GuestUserController@getBlockFloorUnit');
Route::post('/postverifyOtpForbooking', 'GuestUserController@postverifyOtpForbooking');
Route::get('/veryifyotp_for_booking/{token}', 'GuestUserController@verifyOtpForBooking');
Route::get('/veryifyUnit_for_booking/{token}', 'GuestUserController@verifyUnitForBooking');
Route::get('/payForBooking/{token}', 'GuestUserController@payForBooking');
Route::post('/resendOtp','GuestUserController@resendOtp');
Route::post('/validateFloorUnit','GuestUserController@validateFloorUnit');

Route::get('/news',function(){
	return view('frontend.news');
});
Route::get('/about',function(){
	return view('frontend.corporate.about');
});

Route::get('/corporate',function(){
	return view('frontend.corporate.corporate');
});
Route::get('/team',function(){
	return view('frontend.corporate.team');
});
Route::get('/vision',function(){
	return view('frontend.corporate.vision');
});


Route::get('/service',function(){
	return view('frontend.service');
});

//
Route::get('/blogs/{slug?}','FrontendController@blogs');
Route::get('/industries',function(){
	return view('frontend.industries');
});
Route::get('/inthenews',function(){
	return view('frontend.inthenews');
});
Route::get('/faq',function(){
	return view('frontend.faq');
});
Route::get('/our_work',function(){
	return view('frontend.our_work');
});
Route::get('/privacy-policy',function(){
	return view('frontend.privacy_policy');
});
Route::get('/sitemap',function(){
	return view('frontend.sitemap');
});
Route::get('/terms-and-condition',function(){
	return view('frontend.terms_and_condition');
});

Route::get('/dev', 'FrontendController@dev'); 


Route::get('/kycmessagepage/{slug?}',function($slug=""){
	return view('kycmessagepage')->with(['slug'=>$slug]);
});

Route::post('/getCustomerPaymentInfo','GuestUserController@getCustomerPaymentInfo');
Route::post('/sendOtpTOCustomermail','GuestUserController@sendOtpTOCustomermail');
Route::post('/verifyApplicationId','GuestUserController@verifyApplicationId');
Route::post('/verifyOtp','GuestUserController@verifyOtp');
Route::post('/existingPayment','GuestUserController@existingPayment');
Route::get('/existing_payment_status/{order_id}', 'GuestUserController@paymentStatus');

Route::get('/terms_and_condition',function(){
	return redirect('/terms-and-condition',301);
});
Route::get('/privacy_policy',function(){
	return redirect('/privacy-policy',301);
});
Route::get('/outer_user_payment',function(){
	return redirect('/outer-user-payment',301);
});
Route::get('http://www.axisecorp.com/blogs/5_reasons_why_axis_blues_is_a_smart_investment_decision',function(){
	return redirect('http://www.axisecorp.com/blogs/5-reasons-why-axis-blues-is-a-smart-investment-decision',301);
});

