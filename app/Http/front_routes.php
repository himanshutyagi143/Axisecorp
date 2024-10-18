<?php
 //Route::namespace('Front')->group(function () {
Route::get('/', 'FrontendController@show');
//Route::get('/login', 'LoginController@show');
/*Route::get('/aboutus', 'ContactController@aboutus');*/
Route::get('/gallery', 'ContactController@gallery');
Route::get('/axisblues', 'ContactController@axisblues');
Route::get('/axisbluesold', 'ContactController@axisbluesold');
Route::get('/yogvillasold', 'ContactController@yogvillasold');
Route::get('/yogvillas', 'ContactController@yogVillas');
Route::get('/turboin', 'ContactController@turboIn');
//Route::get('/kncj', 'ContactController@kncj');
Route::get('/lakecity', 'ContactController@lakeCity');
//Route::get('/contact',  'ContactController@show');

Route::post('/request-call-back',  'ContactController@requestCallBack');
Route::post('/mailer-contact',  'ContactController@mailercontact');
Route::get('/aerovalley', 'ContactController@aeroValley');
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
Route::get('/remaxad', function () {
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

Route::get('/paymentReceipt',function(){
	return view('guest_user.payment_status');
});


Route::get('/yogvilla-payment/{tab?}/{token?}', 'GuestUserController@yogvillaPayment');
Route::post('/submitYogvillaPayment', 'GuestUserController@submitYogvillaPayment');
Route::get('/verifyYogUnit/{token}', 'GuestUserController@verifyYogUnit');
Route::get('/verify_otp_yog_booking/{token}', 'GuestUserController@verifyOtpForYogBooking');
Route::get('/payForYogBooking/{token}', 'GuestUserController@payForYogBooking');
Route::post('/postverifyOtpForYogbooking', 'GuestUserController@postverifyOtpForYogbooking');





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

//blogs
// Route::get('/blogs/{slug?}','FrontendController@blogs');
// Route::get('/blogs/category/{slug}','FrontendController@categoryBlogs');
// Route::get('/blogs/tag/{slug}','FrontendController@tagBlogs');
// Route::post('/blogs/search','FrontendController@blogsearch');
// Route::get('/blog/tweet/{id}','FrontendController@tweet');
// Route::get('/blog/fbPost/{id}','FrontendController@fbPost');

//news
// Route::get('/news/{slug?}','FrontendController@news');
// Route::get('/news/category/{slug}','FrontendController@categoryNews');
// Route::get('/news/tag/{slug}','FrontendController@tagNews');
// Route::post('/news/search','FrontendController@newsSearch');
// Route::get('/news/tweet/{id}','FrontendController@tweetNews');
// Route::get('/news/fbPost/{id}','FrontendController@fbPostNews');


Route::get('/axisblues/videodetail/construction_dec20','FrontendController@getVideoDetails_construction_dec20');
Route::get('/axisblues/videodetail/construction_oct20','FrontendController@getVideoDetails_construction_oct20');
Route::get('/axisblues/videodetail/construction_july20','FrontendController@getVideoDetails_construction_july20');
Route::get('/axisblues/videodetail/construction_feb20','FrontendController@getVideoDetails_construction_feb20');
Route::get('/axisblues/videodetail/construction_jan20','FrontendController@getVideoDetails_construction_jan20');
Route::get('/axisblues/videodetail/construction_dec19','FrontendController@getVideoDetails_construction_dec19');

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

Route::get('/disclaimer',function(){
	return view('frontend.disclaimer');
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

Route::get('/faq',function(){
	return view('frontend.faq');
});

/* Route::get('/contact',  function(){
	//$system = DB::table('system')->first();
	return view('frontend.contact', ['system'=>$system]);
}); */

// Route::post('/contact',  function(){
// 	$email=Input::get('email');
// 	$subject=Input::get('subject');
// 	\Session::flash('success-msg', 'Thanks For Contacting us');
// 	return Redirect()->back();
// });

// Route::get('/axisblues', function(){
// 	return view('frontend.axisbluesnew');
// });

// Route::get('/yogvillas', function(){
// 	return view('frontend.yogvillasnew');
// });

// Route::get('/about',function(){
// 	return view('frontend.corporate.about');
// });

// Route::get('/corporate',function(){
// 	return view('frontend.corporate.corporate');
// });

// Route::get('/team',function(){
// 	return view('frontend.corporate.team');
// });

// Route::get('/vision',function(){
// 	return view('frontend.corporate.vision');
// });

Route::get('/404',function(){
	return view('frontend.404');
});


/*Routes define for Campaing */
	/*routes for yogvillas*/
	Route::get('campaigns/yogvilla','CampaignsController@yogvillaCampaing');
	Route::post('campaigns/submitenquiry','CampaignsController@saveEnquiryDetails');
	Route::post('campaigns/downloadPriceList','CampaignsController@downloadPriceList');
	Route::get('/sendsms','CampaignsController@sendOtp');
	Route::post('/campaigns/verifyOtp','CampaignsController@verifyOtp');
	/*end routes for yogvillas*/
/*End Routes for Campaing*/






/* ===== Routes Define For New Aixs Ecorp ===== */
	/*
	 * Routes define for menus links
	 *
	*/
	Route::get('/','PagesController@home');
	

	Route::get('/about-us','PagesController@about');
	Route::get('/our-team','PagesController@team');
	Route::get('/our-associate','PagesController@associate');
	Route::get('/our-vision','PagesController@vision');
	Route::get('/corporate-philosophy','PagesController@corporate');

	/* Created a Route for channel partner registration on axisecorp.com */
    Route::get('/channel-partner-register','PagesController@channelPartnerRegisterPage');


	Route::get('/about',function(){
		return Redirect('about-us');
	});
	Route::get('/team',function(){
		return Redirect('our-team');
	});
	Route::get('/vision',function(){
		return Redirect('our-vision');
	});
	Route::get('/corporate',function(){
		return Redirect('corporate-philosophy');
	});



	Route::get('/contact','PagesController@contactus');
	Route::get('/newsletter','PagesController@newsletter');
	Route::get('/axisblues','PagesController@axisblues');
	Route::get('/villas-in-goa','PagesController@yogvillas');
	Route::get('/kncj','PagesController@kncj');
	Route::get('/lakecity','PagesController@lakecity');
	Route::get('/lakecityplaza','PagesController@lakecityplaza');

	//new added rout for kncj
	Route::get('/kncz','PagesController@kncz');
	Route::get('/kncj',function(){
		return Redirect('kncz',301);
	});

    //new added rout for kncj
    Route::get('/villas-in-goa','PagesController@yogvillas');
    Route::get('/yogvillas',function(){
        return Redirect('villas-in-goa',301);
		
    });

	/*
	 * Routes define for footer links
	 *
	*/
	Route::get('/career','PagesController@career');
	Route::get('/disclaimer','PagesController@disclaimer');
	Route::get('/privacy-policy','PagesController@privacy');
	Route::get('/terms-and-condition','PagesController@termsandcondition');


	/*
	 * Routes define for blogs
	 *
	*/
	Route::get('/blogs/{slug?}','ContentController@blogs');
	Route::get('pagination/fetch_data', 'ContentController@fetch_blog_data');
	// Route::get('/blogs/category/{slug}','ContentController@categoryBlogs');
	Route::get('/blogs/tag/{slug}','ContentController@tagBlogs');
	// Route::post('/blogs/search','ContentController@blogsearch');
	// Route::get('/blog/tweet/{id}','ContentController@tweet');
	// Route::get('/blog/fbPost/{id}','ContentController@fbPost');
	/*
	 * Routes define for news
	 *
	*/
	Route::get('/news/{slug?}','ContentController@news');
	Route::get('pagination/fetch_data_news', 'ContentController@fetch_news_data');
	// Route::get('/news/category/{slug}','ContentController@categoryNews');
	Route::get('/news/tag/{slug}','ContentController@tagNews');
	// Route::post('/news/search','ContentController@newsSearch');
	// Route::get('/news/tweet/{id}','ContentController@tweetNews');
	// Route::get('/news/fbPost/{id}','ContentController@fbPostNews');
	

	Route::post('/homePageLatestNews','ContentController@homePageLatestNews');
	Route::post('/contactus',  'ContactController@contact');
	Route::post('/jobaplly','ContentController@applyJob');
	Route::get('/getarchives','ContentController@getArchive');
	Route::post('/verifyOtp','ContactController@verifyOtp');
	Route::get('/getJobs','ContentController@getJobs');

	/* Ads Routes*/
    /* yogvillas campaign form based direct landing page. */
	Route::get('/axis-yogvillas-one',function(){
		return  view('new_frontend.ads.yogvillas.yogvillas_wcp');
	});

	/* yogvillas campaign form based redirect to thank you page. */
	Route::get('/thank-you',function(){
		return view('new_frontend.ads.yogvillas.thank_you');
	})->name('thank-you');

    /* yogvillas campaign landing page for channel partners. */
    Route::get('axis-yogvillas-two',function(){
        return  view('new_frontend.ads.yogvillas.yogvillas');
    });

    /* yogvillas campaign without form only Tap To Call landing page. */
	Route::get('/axis-yogvillas-three',function(){
		return  view('new_frontend.ads.yogvillas.yogvillas_new_wcp');
	});

	/* yogvillas . */
	Route::get('/axis-yogvillas-four',function(){
		return  view('new_frontend.ads.yogvillas.yogvillas_campaign_four');
	});

	/* yogvillas campaign five for cp 19/05/2021 */
	Route::get('/axisyogvillas-cp',function(){
		return  view('new_frontend.ads.yogvillas.yogvillas_campaign_five');
	});

	/*Route for get lead data from emailer to send selldo */
	Route::get('/submit-emailer','FrontendController@sendLeadEmailToSelldo');
	/* yogvillas campaign form based redirect to thank you page. */
	Route::get('/thank-you-lakecityplaza',function(){
		return view('new_frontend.ads.lakecityplaza.thank_you_lakecity_plaza');
	})->name('thank-you-lakecityplaza');

	/*Route for unsubscribe link in emailer*/
	Route::get('/unsubscribe-emailer','FrontendController@emailerUnsubscribeLink');

	/*Route for subscribe link in emailer*/
	Route::get('/subscribe-website', function(){
		return view('new_frontend.ads.subscribe.subscribe-website');
	});

	Route::post('/add-subscriber','FrontendController@addSubscriber');

    /* yogvillas landing page  16/07/2021 */
    Route::get('/axisyogvillas/villas',function(){
        return  view('new_frontend.ads.yogvillas.yogvillas_landingpage_six');
    });

    /* axislakecity landing page  23/07/2021 */
    Route::get('/axislakecity/plots',function(){
        return  view('new_frontend.ads.lakecity.lakecity_landingpage_one');
    });

    /* yogvillas landing page  26/07/2021 */
    Route::get('axis-yogvillas-seven',function(){
        return  view('new_frontend.ads.yogvillas.yogvillas_landingpage_seven');
    });

	  /* daboli landing page  07/10/2021 */
    Route::get('/newproject/dapoli',function(){
        return  view('new_frontend.ads.newprojects.dapoli_landingpage_one');
    });
	
    /* Save the data in database for channel partner register page */
    Route::post('/saveChannelPartner',  'PagesController@storeChannelPartner');

	/* axisbluesavenue landing page  26/07/2022 */
    Route::get('/axisbluesavenue',function(){
       // return  view('new_frontend.ads.lakecity.lakecity_landingpage_one');
        return  view('new_frontend.ads.axisbluesavenue.axisbluesavenue');
    });

	Route::post('/avenuecontactus',  'ContactController@contactusavenue');
	
	Route::get('/sucesss',function(){
		return view('new_frontend.ads.axisbluesavenue.thank_you');
	})->name('thank-you');
	
	
   Route::get('/mail-test/{mail}','ContactController@mailTest');
   
/*Route::get('/kncj',function(){
    return Redirect('kncz');
});

Route::get('/kncz','PagesController@kncj');*/