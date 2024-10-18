<?php
 Route::get('/', 'AdminController@dashboard');
    Route::get('/administrator', 'AdminController@show');
    Route::get('/admin', 'AdminController@show');
    Route::get('/create_admin', 'AdminController@createAdmin');
    Route::get('/edit_admin/{id}', 'AdminController@edit');
    Route::get('/delete_admin/{id}', 'AdminController@delete');
    Route::post('/create_admin', 'AdminController@store');
    Route::post('/edit_admin/{id}', 'AdminController@update');
    Route::get('/unit_payment_list/{id?}', 'AdminController@unit_payment_list');

    Route::get('/myprofiles', 'AccountController@myProfile');
    Route::get('/myaccounts', 'AccountController@myAccount');
	
	
    //CompanyAdminController Routes
    Route::get('/company/admin', 'CompanyAdminController@show');
    Route::get('/company/create_admin', 'CompanyAdminController@createAdmin');
    Route::get('/company/edit_admin/{id}', 'CompanyAdminController@edit');
    Route::get('/company/delete_admin/{id}', 'CompanyAdminController@delete');
    Route::post('/company/create_admin', 'CompanyAdminController@store');
    Route::post('/company/edit_admin/{id}', 'CompanyAdminController@update');
    Route::get('/company/getadminlist/{admintype}', 'CompanyAdminController@getadminlist');
    Route::get('/company/getinvitedpartnerslist', 'CompanyAdminController@getinvitedpartnerslist');
    Route::get('/company/view_detail/{id}', 'CompanyAdminController@viewPartnerDetails');
    Route::get('/activatecompany/{id}/{id1}/{id2}','CompanyAdminController@activatecompany');
	

    //Category Routes
    Route::get('/categories', 'CategoryController@show');
    Route::get('/create_category', 'CategoryController@createCategory');
    Route::get('/edit_category/{id}', 'CategoryController@edit');
    Route::get('/delete_category/{id}', 'CategoryController@delete');
    Route::post('/categories', 'CategoryController@store');
    Route::post('/edit_category/{id}', 'CategoryController@update');


    //Subcategories Routes

    Route::get('/subcategories', 'SubCategoryController@show');
    Route::get('/edit_subcategory/{id}', 'SubCategoryController@edit');
    Route::get('/create_subcategory', 'SubCategoryController@dropDown');
    Route::get('/delete_subcategory/{id}', 'SubCategoryController@delete');

    Route::post('/subcategories', 'SubCategoryController@store');
    Route::post('/edit_subcategory/{id}', 'SubCategoryController@update');

    // Manage Block Type Route
    Route::get('/manageblock', 'ManageBlockTypeController@show');
    Route::get('/create_manageBlockType', 'ManageBlockTypeController@createCategory');
    Route::get('/edit_manageBlockType/{id}', 'ManageBlockTypeController@edit');
    Route::post('/manageblock', 'ManageBlockTypeController@store');
    Route::get('/delete_manageBlock/{id}', 'ManageBlockTypeController@delete');
    Route::post('/edit_manageBlockType/{id}', 'ManageBlockTypeController@update');
    Route::post('/blockTypeStatusUpdate', 'ManageBlockTypeController@blockTypeStatusUpdate');
     
    // Manage Project Type
    Route::get('/manageprojecttype', 'manageProjectTypeController@show');
    Route::get('/create_manageprojectType', 'manageProjectTypeController@createproject');
    Route::post('/manageprojecttype', 'manageProjectTypeController@store');
    Route::get('/edit_manageprojectType/{project_type_id}', 'manageProjectTypeController@edit');
    Route::post('/edit_manageprojectType/{project_type_id}', 'manageProjectTypeController@update');
    Route::get('/delete_manageprojectType/{project_type_id}', 'manageProjectTypeController@delete');
    Route::post('/projectTypeStatusUpdate', 'manageProjectTypeController@projectTypeStatusUpdate');
      
      
    // Manage Documente Type Route
    Route::get('/managedocumentetype', 'managedocumentetypeController@index');
    Route::get('/create_managedocumenteType','managedocumentetypeController@createdocument');
    Route::post('/managedocumentetype', 'managedocumentetypeController@store');
    Route::get('/delete_managedocumenteType/{document_type_id}', 'managedocumentetypeController@delete');
    Route::get('/edit_managedocumenteType/{documentt_type_id}', 'managedocumentetypeController@edit');
    Route::post('/edit_managedocumenteType/{document_type_id}', 'managedocumentetypeController@update');
    Route::post('/documentTypeStatusUpdate', 'managedocumentetypeController@documentTypeStatusUpdate');
    
    // Manage Status Type Route
    Route::get('/Statustype', 'StatustypeController@show');
    Route::post('/Statustype', 'StatustypeController@store');
    Route::get('/create_status','StatustypeController@createstatus');
    Route::get ('/edit_Status/{id}', 'StatustypeController@edit');
    Route::post('/edit_Status/{id}', 'StatustypeController@update');
    Route::get('/delete_Statustype/{id}', 'StatustypeController@delete');
    Route::post('/StatusTypeUpdate', 'StatustypeController@StatusTypeUpdate');
      
      // Events Route
    Route::get('/show_events', 'AddEventController@show');
    Route::get('/create_event', 'AddEventController@createEvents');
    Route::post('/create_event', 'AddEventController@store');
    Route::post('/delete_event', 'AddEventController@delete_event');
    Route::get('/edit_event/{id}', 'AddEventController@edit');
    Route::post('/editeventdata/{id}', 'AddEventController@update');
    Route::get('/active_event/{id}', 'AddEventController@active');
    Route::get('/inactive_event/{id}', 'AddEventController@inactive');
    Route::get('/add_EventProgram/{id}', 'AddEventController@eventsPrograms');
    Route::post('/add_EventProgram/{id}', 'AddEventController@programStore');
    Route::post('eventTypeStatusUpdate','AddEventController@eventTypeStatusUpdate');

    //User or Employee Routes
    Route::get('/users', 'UsersController@show');
    Route::get('/create_user', 'UsersController@createEmployee');
    Route::get('/user_edit/{id}', 'UsersController@edit');
    Route::get('/delete_user/{id}', 'UsersController@delete');
    Route::post('/create_user', 'UsersController@store');
    Route::post('/edit_user/{id}', 'UsersController@update');
    Route::post('/clientTypeStatusUpdate','UsersController@employeeTypeStatusUpdate');
    Route::get('/viewAssignCustomer/{id}', 'UsersController@viewAssignCustomer');
    Route::get('/viewAssignVendor/{id}', 'UsersController@viewAssignVendor');
    Route::get('/removecustomer/{user_id}/{customer_id}', 'UsersController@removecustomer');
    Route::get('/removevendor/{user_id}/{company_id}', 'UsersController@removevendor');
    Route::get('/employee_profile/{id}/{option?}', 'UsersController@employeeProfileDetails');
    Route::post('/employee_profile/imageupdate/{id}', 'UsersController@imageUpdate');
    Route::get('/getuserlist/{user_type}', 'UsersController@getuserlist');
    //Route::get('/getadminuserlist/{user_type}/{team_type}', 'UsersController@getadminuserlist');
    Route::get('/getadminuserlist/{team_type}', 'UsersController@getadminuserlist');
    Route::post('/changeuserstatus', 'UsersController@changeuserstatus');
    Route::post('/updateusersdetails', 'UsersController@updateusersdetails');
    Route::post('/searchCustomerName', 'UsersController@searchCustomerName');
    Route::post('/assigncustomers', 'UsersController@assigncustomers');
    Route::post('/searchVendorName', 'UsersController@searchVendorName');
    Route::post('/assignvendors', 'UsersController@assignvendors');
	
	
	
	
	
	
   // Route::get('/PaymentSubmit/{$token}', 'UserPaymentController@paymentsubmit');
	
	
	
	
	
	
	
	
	
	
	
	
      //invite user link
    Route::get('/generate_invite_user_link','userlinkController@create');
    Route::post('/generate_invite_user_link','userlinkController@index');
    Route::get('/edit_user_invite/{id}','userlinkController@edit');
    Route::post('/edit_user_invite/{id}','userlinkController@update');
	
	//TempletController Routes
    Route::get('/templets', 'TempletController@show');
    Route::get('/create_templet', 'TempletController@createtemplet');
    Route::get('/edit_templet/{id}', 'TempletController@edit');
    Route::get('/delete_templet/{id}', 'TempletController@delete');
    Route::post('/create_templet', 'TempletController@store');
    Route::post('/edit_templet/{id}', 'TempletController@update');

   
   
	
	
	
	 //CustomerController Routes
    Route::get('/crm/customers', 'CustomerController@show');
    Route::post('/getcustomers/{customer_type}', 'CustomerController@getcustomers');
    //Route::get('/customerlist', 'CustomerController@customerList');
    Route::get('/customer_detail/{id}', 'CustomerController@customer_detail');
    Route::get('/temp_customer_detail/{id}', 'CustomerController@temp_customer_detail');
    Route::get('/new_customer_detail/{id}', 'CustomerController@new_customer_detail');
    Route::get('/generateInvoicecustomer/{id}/{userid}','CustomerController@generateInvoicecustomer');	
    Route::get('/customerpropertydetails/{id?}', 'CustomerController@customerpropertydetails'); 
    Route::get('/customerpropertydetailsview/{id?}', 'CustomerController@customerpropertydetailsview');	
    Route::get('/create_customer', 'CustomerController@createCustomer');
    Route::get('/edit_customer/{id}', 'CustomerController@edit');
    Route::post('/edit_customer/{id}', 'CustomerController@update');
    Route::post('/edit_second_customer/{id}', 'CustomerController@updateSecond');
    Route::get('/delete_customer/{id}', 'CustomerController@delete');
    Route::post('/create_customer', 'CustomerController@store');
    Route::get('/delete-kyc-media/{id}/{type}', 'CustomerController@kycMediaDelete');
	Route::post('/crm/getCrmCustomerDetail', 'CustomerController@getCrmCustomerDetail');
	Route::post('/crm/getPropertyDetails', 'CustomerController@getPropertyDetails');
	Route::post('/crm/getCoapplicantDetail', 'CustomerController@getCoapplicantDetail');
	Route::post('/crm/getpincodedetails', 'CustomerController@getpincodedetails');
	Route::post('/crm/updateUserDetailFinal', 'CustomerController@updateUserDetailFinal');
	Route::get('/crm/invite_customer/{leads_id?}', 'CustomerController@inviteNewcustomer');
	Route::post('/getTempCustomers', 'CustomerController@getTempCustomers');
	Route::post('/getCustomerListDetail/{status}', 'CustomerController@getCustomerListDetail');
	
	
	
	
	
	
	
	
	//CustomerDetailController
	Route::get('/crm/getproject', 'CustomerDetailController@getprojectdata');
	Route::post('/crm/getprojectBlocks', 'CustomerDetailController@getprojectBlocks');
	Route::post('/crm/getprojectBlockUnits', 'CustomerDetailController@getprojectBlockUnits');
	Route::post('/crm/genratecustomerLink', 'CustomerDetailController@genratecustomerLink');
	Route::post('/crm/getmediaurl', 'CustomerDetailController@getmediaurl');
	Route::post('/sendKycLinkToCustomer', 'CustomerDetailController@sendKycLinkToCustomer');
	Route::post('/customertoRelationship', 'CustomerDetailController@assigncustomertoRelationship');
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    //ajax
	
	
	
    Route::post('/create_second_applicant', 'CustomerController@create_second_applicant');
    Route::post('/edit_customer/{id}', 'CustomerController@update');
    Route::post('/deletecustomerdoc', 'CustomerController@deletecustomerdoc');
    Route::post('/customerTypeStatusUpdate','CustomerController@customerTypeStatusUpdate');
    Route::post('/customers_approval','CustomerController@customersApproval');
    Route::get('/customertempletsgenerate/{id?}', 'CustomerController@customertempletsgenerate'); 
    Route::post('customertempletsgeneratesubmit/{id?}', 'CustomerController@customertempletsgeneratesubmit');
    Route::post('/edit_customer_detail', 'CustomerController@edit_customer_detail');
    Route::post('/imageupdate','CustomerController@ImageUpdate');

    //AssignTempletController Routes
    Route::get('/assign_user_templet/{id?}', 'AssignTempletController@assignUserTemplet');
    Route::get('/assign_templet/{id?}', 'AssignTempletController@show');
    Route::get('/create_assign_templet/{id?}', 'AssignTempletController@createAssignTemplet');
    Route::get('/edit_assign_templet/{id?}', 'AssignTempletController@edit');
    Route::get('/delete_assign_templet/{id?}', 'AssignTempletController@delete');
    Route::post('/create_assign_templet/{id?}', 'AssignTempletController@store');
    // Route::post('/assign_user_templet/{id?}', 'AssignTempletController@saveassignUserTemplet');
    Route::post('/edit_assign_templet/{id?}', 'AssignTempletController@update');
    Route::post('/change_user_temp/{id}', 'AssignTempletController@saveassignUserTemplet');
	
    //Reports Routes
    Route::get('/reports', 'ReportController@report');
    Route::get('/calendar', 'CalendarController@calendar');
    //Route::get('/crm/{user_id}', 'CalendarController@crm');

    Route::get('/projectblocklist/{id1}/{id}', 'ReportController@projectBlockList');
    Route::get('/projectfloorlist/{id}/{id1}', 'ReportController@projectFloorList');
    Route::get('/projectunitlist/{id}/{fid}/{id1}', 'ReportController@projectUnitList');
    Route::get('/updateinvent', 'ReportController@updateinvent');
	


    //Activity Routes Added by Abhishek  ActivityController
    Route::get('/activities/{id?}', 'ActivityController@activityList');
    Route::get('/task_details/{id}', 'ActivityController@taskDetails');
    Route::get('/create_new_activity', 'ActivityController@createActivity');
    Route::get('/edit_task/{id}', 'ActivityController@editTasks');
    Route::post('create_activity', 'ActivityController@savecreateActivity');
    Route::post('edit_task/{id}', 'ActivityController@updateTask');
    Route::get('/delete/{id}/{type}', 'ActivityController@delete');
    Route::get('/changestatus/{id}', 'ActivityController@changestatus');
    Route::post('/orderchange', 'ActivityController@orderchange');
    Route::post('/task_order_change', 'ActivityController@taskorderchange');
    Route::post('/meeting_order_change', 'ActivityController@meetingorderchange');
	Route::get('/meeting_details/{id}','ActivityController@meetingdetails');
	Route::post('/meeting_attendee_attendto','ActivityController@meetingAttendeeAttendto');
	Route::post('/update_meeting_assinee','ActivityController@updateMeetingAssinee');
	Route::post('/update_meeting','ActivityController@updatemeeting');
	Route::post('/onchangestatus','ActivityController@onchangestatus');
    Route::get('/tododata', 'ActivityController@tododata');
    Route::get('/meetingdata', 'ActivityController@meetingdata');
    Route::get('/taskdata', 'ActivityController@taskdata');
	Route::post('/task_attendee_attendto','ActivityController@taskAttendeeAttendto');
	Route::post('/update_task_assinee','ActivityController@updateTaskAssinee');
	Route::post('/update_task_details','ActivityController@updatetaskdetails');
	Route::post('/addtaskcomment','ActivityController@addtaskcomment');
	Route::post('/completetaskstaus','ActivityController@completetaskstaus');
	Route::post('/updatetaskstaus','ActivityController@updatetaskstaus');
	Route::get('/getactivitysearchdata','ActivityController@getactivitysearchdata');
	
	Route::get('/re_send_email/{id}','CompanyAdminController@reSendEmail');
	Route::post('/meeting_accept','ActivityController@meetingAccept');
	Route::post('/change_password','AccountController@changePassword');
	 
    //CompanyController Routes
    Route::get('/tree/{id?}', 'CompanyController@tree');
    Route::post('/create_company', 'CompanyController@store');
    Route::get('/create_company', 'CompanyController@createClient');
    Route::get('/edit_company/{id}', 'CompanyController@edit');
    Route::get('/delete_company/{id}', 'CompanyController@delete');
    Route::post('/edit_company/{id}', 'CompanyController@update');
    Route::get('/generateCompanyCode', 'CompanyController@generateCompanyCode');

    Route::get('/company_list/{type}', 'CompanyController@companyTypeWiseList');
	
	 //VenderInviteController Routes
    
    Route::get('/vendor_invite/{id?}', 'VenderInviteController@show');
    Route::get('/create_vendor_invite', 'VenderInviteController@createClient');
    Route::get('/edit_vendor_invite/{id}', 'VenderInviteController@edit');
    Route::get('/delete_vendor_invite/{id}', 'VenderInviteController@delete');
    Route::post('/create_vendor_invite', 'VenderInviteController@store');

    Route::post('/edit_vendor_invite/{id}', 'VenderInviteController@update');

    //BlockInviteController Routes
    Route::get('/blocklisttype/{id}/{id1}', 'BlockInviteController@blocklisttype');
    Route::get('/block_invite/{id?}', 'BlockInviteController@show');
    Route::get('/create_block_invite/{id}', 'BlockInviteController@createClient');
    Route::get('/edit_block_invite/{id}', 'BlockInviteController@edit');
    Route::get('/delete_block_invite/{id}', 'BlockInviteController@delete');
    Route::post('/create_block_invite/{id?}', 'BlockInviteController@store');
    Route::post('/edit_block_invite/{id}', 'BlockInviteController@update');



    //BookingController Routes
    Route::get('/booking/{id}', 'BookingController@createBooking');
    Route::post('/save_booking/{id}', 'BookingController@saveBooking');
    Route::post('/savesummary_booking/{id}', 'BookingController@savesummaryBooking');


    Route::post('/savecustomernewbooking/{id}', 'BookingController@savecustomernewbooking');

    Route::get('/customer_booking/{id}', 'BookingController@customerBooking');
    Route::get('/customerTypeStatusUpdate','BookingController@customerTypeStatusUpdate');
    // 
    Route::get('/booking_registered_customer/{id}', 'BookingController@bookingRegisteredCustomer');
    Route::post('/booking_summary_detail/{id}', 'BookingController@booking_summary_detail');
    Route::post('/save_booking_registerd/{id}', 'BookingController@saveBookingRegisterd');


    // new routes
    Route::post('/bookingFirstApplicant/{id}', 'BookingController@bookingFirstApplicant');
    Route::post('/bookingSecondApplicant/{id}', 'BookingController@bookingSecondApplicant');
    Route::get('/preview/booking/{id}/{uid}', 'BookingController@preview_booking');
    Route::get('/second/applicant/{id}/{uid}', 'BookingController@addSecondApplicant');

    Route::post('/uploadfile','ProjectController@uploadfile');
    Route::post('/getfile','ProjectController@getfile');
    Route::post('/deleteimagefile','ProjectController@deleteimagefile');

    //system
    Route::get('/system', 'SystemController@show');
    Route::post('/system', 'SystemController@store');

    //coupons
    Route::get('/coupons', 'CouponController@show');
    Route::get('/create_coupon', 'CouponController@createCoupon');
    Route::post('/create_coupon', 'CouponController@store');
    Route::get('/delete_coupon/{id}', 'CouponController@delete');

    //seo
    Route::get('/seo', 'SeoController@show');
    Route::post('/seo', 'SeoController@store');

    //Blocks
    Route::any('/blocklist/{id?}', 'blockController@blocklist');
    Route::any('/add_blocks/{id}', 'blockController@add_blocks');
    Route::any('/block_submit', 'blockController@block_submit');
    Route::post('/updateBlocks', 'blockController@block_setPosition');
    
    Route::any('/block_units/{project_id}/{block_id}', 'blockController@block_units');
    Route::get('/edit_block/{project_id}/{block_id}', 'blockController@edit_block');
    Route::Post('/edit_block_submit', 'blockController@edit_block_submit');
    Route::get('/delete_block/{project_id}/{block_id}', 'blockController@delete_block');
    Route::post('/addFloor', 'blockController@addFloor');
    Route::get('/unit_delete/{unit_id}', 'blockController@unit_delete');
    Route::get('/changeBlockBookingStatus', 'blockController@changeBlockBookingStatus');
    Route::get('/unitNameGenerate', 'blockController@unitNameGenerate');
    Route::post('/generate_unit_name', 'blockController@generate_unit_name');
    Route::get('/getblockunitdata', 'blockController@getblockunitdata');
    Route::get('/getblockunitdetails', 'blockController@getblockunitdetails');
    Route::get('/getLibraryImages', 'blockController@getLibraryImages');
    Route::post('/addunitdetails', 'blockController@addunitdetails');
    Route::post('/uploadUnitMedia', 'blockController@uploadUnitMedia');
    Route::post('/updateallunitmedia', 'blockController@updateallunitmedia');



    //Units
    Route::get('/add_unit', 'blockController@add_unit');
    Route::post('/add_unit_submit', 'blockController@add_unit_submit');
    Route::post('/edit_unit_detail', 'blockController@edit_unit_detail');
    Route::get('/getimage', 'blockController@getimage');
    //Route::get('/getunitimages', 'blockController@getunitimages');
    Route::post('/changeUnitImage', 'blockController@changeUnitImage');
    Route::get('/deleteUnitImage', 'blockController@deleteUnitImage');
    Route::post('/changebookingstatus', 'blockController@changebookingstatus');
    Route::post('/uploadImages', 'blockController@uploadImages');
    Route::get('/getunitmedia', 'blockController@getunitmedia');
    Route::post('/addunitmedia', 'blockController@addunitmedia');
    Route::post('/updateunitmedia', 'blockController@updateunitmedia');


    //Inventory	
    Route::get('/block_inventory/{project_id}/{block_id}', 'blockController@block_inventory');
    Route::get('/getInventoryDetails', 'blockController@getInventoryDetails');
    Route::get('/blockinventory/villa/{project_id}/{block_id}', 'blockController@block_inventory_villa');
    Route::get('/getVillaDetails', 'blockController@getVillaDetails');

    //Unit Details Type
    Route::any('/unitdetailstype', 'unitDetailsTypeController@unitdetailstype');
    Route::any('/addunitdetailstype', 'unitDetailsTypeController@addunitdetailstype');
    Route::Post('/unit_details_type_submit', 'unitDetailsTypeController@unit_details_type_submit');
    Route::get('/edit_unit_details_type/{id}', 'unitDetailsTypeController@edit_unit_details_type');
    Route::post('/update_unit_details_type', 'unitDetailsTypeController@update_unit_details_type');
    Route::get('/delete_unit_details_type/{id}', 'unitDetailsTypeController@delete_unit_details_type');
    Route::post('/statusUpdate', 'unitDetailsTypeController@statusUpdate');
    Route::get('/assign_project_unit_type/{project_id}', 'unitDetailsTypeController@assignProjectUnitType');
    Route::get('/assign_project_unit_list/{project_id}', 'unitDetailsTypeController@assignProjectUnitTypeList');
    Route::get('/change_project_unit_type/{project_id}/{unit}', 'unitDetailsTypeController@changeProjectUnitType');
    Route::POST('/change_project_unit_type_content', 'unitDetailsTypeController@changeProjectUnitTypeContent');
    Route::POST('/change_project_unit_type_value', 'unitDetailsTypeController@changeProjectUnitTypeValue');

    //Media Library
    Route::get('/media_library', 'mediaLibraryController@media_library');
    Route::get('/add_media/{media_library_id}', 'mediaLibraryController@add_media');
    Route::post('/mediaLibrarySubmit', 'mediaLibraryController@mediaLibrarySubmit');
    Route::post('/uploadMedia', 'mediaLibraryController@uploadMedia');
    Route::get('/delete_media/{media_id}', 'mediaLibraryController@delete_media');
    Route::post('/editmediaLibrary', 'mediaLibraryController@editmediaLibrary');
    Route::post('/libraryStatusUpdate', 'mediaLibraryController@libraryStatusUpdate');
    Route::get('/delete_library/{media_library_id}', 'mediaLibraryController@delete_library');
    Route::get('/getProjectList', 'mediaLibraryController@getProjectList');
    Route::post('/replacemediafile', 'mediaLibraryController@replacemediafile');
    
    //payment gateway
    Route::get('/payment_gateway', 'PaymentPlanController@payment_gateway');
    Route::post('/paymentGatewayStatusChange', 'PaymentPlanController@paymentGatewayStatusChange');
    
    

    //Payment Plans 
    Route::get('/payment_plans', 'PaymentPlanController@payment_plans');
    Route::get('/create_paymentplan', 'PaymentPlanController@create_paymentplan');
    Route::post('/add_paymentplan', 'PaymentPlanController@add_paymentplan');
    Route::get('/edit_paymentplan/{payment_plan_id}', 'PaymentPlanController@edit_paymentplan');
    //Route::get('/getplanComponentData', 'PaymentPlanController@getplanComponentData');
    Route::post('/update_paymentplan', 'PaymentPlanController@update_paymentplan');
    Route::post('/paymentPlanStatusUpdate', 'PaymentPlanController@paymentPlanStatusUpdate');
    Route::get('/delete_paymentplan/{payment_plan_id}', 'PaymentPlanController@delete_paymentplan');



    // Payment blan changes


    Route::get('/project_block_list/{id}', 'PaymentPlanController@projectBlockList');
    Route::get('/project_floor_list/{id}', 'PaymentPlanController@projectFloorList');
    Route::get('/project_unit_list/{id}/{fid}', 'PaymentPlanController@projectUnitList');
    Route::get('/company_customer/{id?}', 'PaymentPlanController@companyCustomer');
    Route::get('/vendor_list', 'PaymentPlanController@vendorList');






    //Other Charges

    Route::get('/othercharges', 'otherChargesController@othercharges');
    Route::get('/create_othercharges', 'otherChargesController@create_othercharges');
    Route::post('/add_othercharges', 'otherChargesController@add_othercharges');
    Route::post('/chargeStatusUpdate', 'otherChargesController@chargeStatusUpdate');
    Route::get('/delete_charge/{charge_id}', 'otherChargesController@delete_charge');
    Route::get('/edit_othercharges/{charge_id}', 'otherChargesController@edit_othercharges');
    Route::get('/get_other_charge_api/{id}', 'otherChargesController@getOtherChargeApi');

    //Project
    Route::get('/project', 'ProjectController@show');
    Route::post('/create_project', 'ProjectController@store');
    Route::get('/create_project', 'ProjectController@dropDown');
    Route::get('/edit_project/{id}', 'ProjectController@edit');
    Route::post('/edit_project/{id}', 'ProjectController@update');
    Route::get('/delete_project/{id}', 'ProjectController@deleted');
    Route::post('/deleteprojectdoc', 'ProjectController@deleteprojectdoc');

    Route::get('/auth/logout', 'Auth\AuthController@getLogout');


    // plan component 
    Route::get('/getAdminPaymentPlanComponent/{user_id}/{unit_id}','BlockInviteController@getAdminPaymentPlanComponent');


    //Admin Omnipay
    Route::get('/omnipay/payment', 'OmnipayController@payment');
    Route::post('/omnipay/returnPayment', 'BookingController@returnPayment');
    Route::get('/omnipay/cancelPayment', 'BookingController@cancelPayment');
    Route::get('/omnipay/callbackPayment', 'BookingController@callbackPayment');


    //Invitation Link Omnipay Routes...
    Route::post('/omnipay/return', 'BlockInviteController@returnPayment');
    Route::get('/omnipay/cancel', 'BlockInviteController@cancelPayment');

    //Leads
    Route::get('/crm/leads', 'LeadsController@index');
    //Route::post("/getLeadData/{action}", "LeadsController@getLeadData");
    Route::get('/leads/list', 'LeadsController@listLead');
    Route::post('/leads/saved_leads', 'LeadsController@createLead');
    Route::get('/edit_lead/{id}', 'LeadsController@editLead');
    Route::post('/leads/update', 'LeadsController@updateLead');
    //Route::post('/leads/delete', 'LeadsController@deleteLead');
    Route::post('/exportleads', 'LeadsController@exportleads');
    Route::post('/exportgroupleads', 'LeadsController@exportgroupleads');
    Route::get('/downloadsample', 'LeadsController@downloadsample');
	
    Route::post('/importleads', 'LeadsController@importleads');
    Route::post('/leads/update_lead_source', 'LeadsController@updateLeadSource');
    Route::post('/leads/update_lead_status', 'LeadsController@updateLeadStatus');
    Route::get('/importleadsview', 'LeadsController@importleadview');
    Route::get('/getEvents', function(){
      return response()->json(CommonHelper::getEvents());
    });
    Route::get('/leads/leads_details/{leads_id}', 'LeadsController@leadsDetails');
    Route::post('/leads/imageupdate/{id}', 'LeadsController@leadImageUpdate');
     Route::post('/leads/send_mail', 'LeadsController@sent_mail');
    Route::get('/leads/leads_list', 'LeadsController@leadsList');
    Route::get('/leads/get-reminders/{leads_id}', 'LeadsController@getAllReminders');
    Route::get('/visits/{leads_id}', 'LeadsController@getAllVistis');
     Route::get('/lead/emails/{leads_id}', 'LeadsController@getAllEmails');
    Route::post('/leads/get-reminder/{reminder_id}', 'LeadsController@getReminder');
    Route::post('/leads/countleadselment', 'LeadsController@countleadselment');
    Route::post('/leads/save-reminder', 'LeadsController@saveReminder');
    Route::post('/leads/save-comment', 'LeadsController@saveComment');
    Route::get('/get_activity/{id}','LeadsController@getActivityData');
	 //newlead ravi	
    Route::get('/newleadlist', 'LeadsController@newleadlist');
    //Route::get('/getleaddata', 'LeadsController@getleaddata');
    Route::get('/getmeetingdata/{leads_id}', 'LeadsController@getmeetingdata');
    Route::get('/getcalldata/{leads_id}', 'LeadsController@getcalldata');
    Route::post('/leads/edit_call/{id}', 'LeadsController@edit_call');
    Route::post('/leads/edit_meeting/{id}', 'LeadsController@edit_meeting');
    Route::post('/leads/delete_meeting/{leads_id}/{id}', 'LeadsController@delete_meeting');
    Route::post('/leads/delete_call/{leads_id}/{id}', 'LeadsController@delete_call');
     Route::post('/leads/delete_visit/{leads_id}/{id}', 'LeadsController@deleteSiteVisit');
    Route::post('/leads/save-meeting', 'LeadsController@saveMeeting');
    Route::post('leads/save_call', 'LeadsController@saveCalls');
    Route::post('leads/save_visit', 'LeadsController@saveVisit');
    Route::post('/leads/edit_visit/{id}', 'LeadsController@editVisit');
    Route::get('/leads/converted/{leads_id}','LeadsController@converted_lead');
    Route::post('/leads/create_converted_firstuser', 'CustomerController@create_converted_firstuser');
    
    Route::post('/leads/update_call', 'LeadsController@updateCalls');
    Route::post('/leads/delete_lead', 'LeadsController@delete_lead');
    Route::post('/leads/get-groups', 'LeadsController@getGroups');
    Route::post('/leads/update-group-name', 'LeadsController@updateGroupName');
    Route::post('/leads/leads-to-groups', 'LeadsController@leadsToGroups');
    Route::post('/leads/get-users', 'LeadsController@getUsers');
    Route::post('/leads/assing-users-group', 'LeadsController@assingUsersGroup');
    Route::post('/leads/unassing-users-group', 'LeadsController@unassingUsersGroup');


	//leaves
    Route::get('/leave_management', 'leavemanagementController@index');
    Route::post('/pending_approvalList', 'leavemanagementController@pending_approvalList');
    Route::post('/my_leaveList', 'leavemanagementController@my_leaveList');
    Route::post('/all_leaveList', 'leavemanagementController@all_leaveList');
	
	//tickets
    Route::resource('crm/tickets', 'TicketController');
    Route::post('/validateTicketFile', 'TicketController@validateProjectFile');
    Route::post('/uploadTicketFile', 'TicketController@uploadTicketFile');
    Route::post('/getnewticket/{id}', 'TicketController@getnewticket');
    Route::post('/ticketreply', 'TicketController@ticketreply');
    Route::post('/getpendingtkt/{id}', 'TicketController@getnewticket');
    Route::post('/getresolvedticket/{id}', 'TicketController@getnewticket');
    Route::post('/getcloseticket/{id}', 'TicketController@getnewticket');
    Route::post('/getarchivedticket/{id}', 'TicketController@getnewticket');
    Route::post('/getwaitingonticket/{id}', 'TicketController@getnewticket');
    Route::get('/tickets/tickets_details/{ticket_code}', 'TicketController@ticketsDetails');
    Route::get('/tickets/tickets_details/{ticket_code}', 'TicketController@ticketsDetails');



    Route::post('/leads/edit_reminder/{reminder_id}', 'LeadsController@editReminder');
    Route::post('/leads/delete_reminder/{leads_id}/{reminder_id}', 'LeadsController@deleteReminder');
    Route::post('/leads/change-lead-status', 'LeadsController@changeLeadStatus');

	
	
    //CRM
    Route::get('/customerlist', 'CrmController@customerlist');
    Route::get('/getprojectblocklist/{projectId}', 'CrmController@getprojectblocklist');
    Route::get('/getprojectfloorlist/{blockId}', 'CrmController@getprojectfloorlist');
    Route::get('/getprojectunitlist/{blockId}/{floorId}', 'CrmController@getprojectunitlist');
    Route::get('/getCustomerDetails', 'CrmController@getCustomerDetails');
    Route::get('/crm/searchcustomer/{search?}','CrmController@searchCustomer');
    Route::post('/updateinventsearch','CrmController@updateInventSearch');
    Route::get('/crm/{user_id}/{search?}', 'CrmController@crm');
    Route::post('/save_as_notes', 'CrmController@saveAsNotes');
    Route::post('/save_as_ticket', 'CrmController@saveAsTicket');
    Route::get('/ticket_activities/{user_id}', 'CrmController@ticketActivities');
    Route::post('/getticketreply', 'CrmController@getticketreply');
    Route::get('/email_esclate', 'CrmController@email_esclate');
    Route::post('/crm/get-lead-info', 'CustomerController@getLeadInfo');
    //orders
    Route::get('/orders', 'OrdersController@show');
    Route::post('/order/change-verification-status', 'OrdersController@update');
    Route::get('/orders/{id}', 'OrdersController@delete');
    Route::get('/orders/order_details/{order_id?}', 'OrdersController@details');
    Route::post('/orders/get-all-orders/{is_verified?}', 'OrdersController@getAllOrders');
    Route::get('/orders/get-customer-detail/{user_id}', 'OrdersController@getCustomerDetail');
    Route::get('/orders/get-booking-detail/{booking_id}', 'OrdersController@getBookingDetail');
