<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use CommonHelper;
use DB;
use Omnipay;
use Session;
use Redirect;
use Mail;
use Mailnotification;
use App\Models\Media;
use App\Models\TempCustomer;
use App\Models\TempCustomerAddressDetails;
use App\Models\TempCustomerDetails;
use Illuminate\Support\Facades\Crypt;

// use Exception;
class GuestUserController extends Controller
{
	//
	public function guestUserPayment($tab = 0, $token = '')
	{
		$projetBlock = DB::table('unit_details')->join('project_blocks', function ($on) {
			$on->on('project_blocks.block_id', '=', 'unit_details.block_id')->where('project_blocks.status', '=', 1);
		})->where('unit_details.project_id', '=', 10)
			->where('unit_details.status', '=', 1)
			->where('unit_details.booking_status', '=', 1)
			->groupBy('unit_details.block_id')
			->select('project_blocks.block_name', 'project_blocks.block_id')->get();
		if ($token != '') {
			$id = Crypt::decrypt($token);
			$guest = DB::table('guest_user')->where('guest_user_id', '=', $id)->where('is_active', '=', 1)->first();
			return view('guest_user.paymentbyguest', ['projetBlock' => $projetBlock, 'guest' => $guest, 'tab' => $tab]);
		} else {
			return view('guest_user.paymentbyguest', ['projetBlock' => $projetBlock, 'tab' => $tab]);
		}
	}

    public function yogvillaPayment($tab = 0, $token = '')
    {
        $projetBlock = DB::table('unit_details')->join('project_blocks', function ($on) {
            $on->on('project_blocks.block_id', '=', 'unit_details.block_id')->where('project_blocks.status', '=', 1);
        })->where('unit_details.project_id', '=', 11)
            ->where('unit_details.status', '=', 1)
            ->where('unit_details.booking_status', '=', 1)
            ->groupBy('unit_details.block_id')
            ->select('unit_details.unit_name','project_blocks.block_name', 'project_blocks.block_id')->get();

        foreach ($projetBlock as $key => $v1){
            $v1->unit = substr($v1->unit_name, -2);
        }
        if ($token != '') {
            $id = Crypt::decrypt($token);
            $guest = DB::table('guest_user')->where('guest_user_id', '=', $id)->where('is_active', '=', 1)->first();
            return view('yogvillapayments.yogvilla_payment_form', ['projetBlock' => $projetBlock, 'guest' => $guest, 'tab' => $tab]);
        } else {
            return view('yogvillapayments.yogvilla_payment_form', ['projetBlock' => $projetBlock, 'tab' => $tab]);
        }
    }

	/* 	public function submitGuestPayment(Request $request){
		
		$validate=Validator::make($request->all(),[
		'first_name'=>'required',
		'last_name'=>'required',
		'email'=>'required|email',
		'phone'=>'required',
		'block_no'=>'required',
		'floor_no'=>'required',
		'unit_no'=>'required',
		'amount'=>'required',
		]);
		
		$validate->after(function($validate) use($request) {
		$orderDetails = DB::table('guest_user')->where('email','=',$request->email)->first();
			if($orderDetails){
				$validate->errors()->add('Email', 'Email is already exists..');
			}
			
		});
		
		$validate->after(function($validate) use($request) {
		
			if($request->amount<100000){
			$validate->errors()->add('Amount', 'Amount should be 100000 Rs.');
			}
			
		});
	
		$unitId=145;
		$projectId=1;
		$blockId=1;
		$floorId=0;
		
		if ($validate->fails())
		{
			
		return redirect()->back()->withErrors($validate->errors())->withInput();
		}
		$pan_card_media_id =0;
		
		$pan_card_img=$request->file('pan_card_img');
		if($pan_card_img){
		$filename=CommonHelper::saveMedia($pan_card_img,"guest/customerkyc",5,'public');
		$pan_card_media_id = Media::insertGetId(['media_name' => $filename]);
		}
		
		$passport_media_id =0;
		
		$passport_card_img=$request->file('passport_card_img');
		if($passport_card_img){
		$filename=CommonHelper::saveMedia($passport_card_img,"guest/customerkyc",5,'public');
		$passport_media_id = Media::insertGetId(['media_name' => $filename]);
		}
		
		$transectioncode =	CommonHelper::quickAlphanumericRandom(15);
		
		DB::table('guest_user')->insert(['first_name'=>$request->first_name,'last_name'=>$request->last_name,'email'=>$request->email,'phone'=>$request->phone,'unit_no'=>$request->unit_no,'amount'=>$request->amount,'txnid'=>$transectioncode,'is_active'=>0,'payment_status'=>0,'gateway'=>'','response'=>'','created_at'=>date('Y-m-d'),'passport_media_id'=>$passport_media_id,'pan_card_media_id'=>$pan_card_media_id]);
		
		return redirect('/guestpaymentnew/'.$transectioncode);
	} */

	public function submitGuestPayment(Request $request)
	{

		try {
			$validator = Validator::make($request->all(), [
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				'phone' => 'required',
				'block_no' => 'required',
				'floor_no' => 'required',
				// 'unit_no' => 'required',
				'amount' => 'required',
				'SalesRepresentative' => 'required',
				'SalesRepresentativePhone' => 'required',
				'term_condition' => 'required'
			]);

			$project_id = 10;

			$validator->after(function ($validator) use ($request, $project_id) {


				$block_no = $request->block_no;
				$checkBlock = DB::table('project_blocks')->where('block_id', '=', $block_no)->where('project_id', '=', $project_id)->first();
				if (!$checkBlock) {
					$validator->errors()->add('block_no', 'Block is not exists.');
				}

				$block_no = $request->block_no;
				$floor_no = $request->floor_no;
				$unit_no = $request->unit_no??'';

				if (strlen($block_no) == 1) {
					$totalblocks = '0' . $block_no;
				} else {
					$totalblocks = $block_no;
				}

				if (strlen($floor_no) == 1) {
					$totalfloor = '0' . $floor_no;
				} else {
					$totalfloor = $floor_no;
				}



				$checkBlockFloor = DB::table('block_floors')->where('block_id', '=', $block_no)->where('floor_id', '=', $floor_no)->where('project_id', '=', $project_id)->first();
				if (!$checkBlockFloor) {
					$validator->errors()->add('floor_no', 'Floor is not exists.');
				}


				$checkBlockFloorUnit = DB::table('floor_unit')->where('block_id', '=', $block_no)->where('floor_id', '=', $floor_no)->where('project_id', '=', $project_id)->where('id', '=', $unit_no)->first();

				if (!$checkBlockFloorUnit) {
					$validator->errors()->add('unit_no', 'Unit is not exists.');
				} else {
					if($request->unit_id != substr($checkBlockFloorUnit->unit,-3)){
						$validator->errors()->add('unit_no', 'Please enter a valid Unit No.');
					}

					$unit_idd = $checkBlockFloorUnit->id;

					$checkBlockFloorUnitAbailvle = DB::table('unit_details')->where('block_id', '=', $block_no)->where('floor_id', '=', $floor_no)->where('project_id', '=', $project_id)->where('booking_status', '=', 1)->where('unit_id', '=', $unit_idd)->first();
					if (!$checkBlockFloorUnitAbailvle) {
						$validator->errors()->add('unit_no', 'Unit is not available.');
					}
				}

                 if ($request->amount!=50000) {
					$validator->errors()->add('amount', 'Amount must be 50000/- Rs.');
				}
				/* if ($request->amount < 1000) {
					$validator->errors()->add('amount', 'Amount must be in between 1000 to 350000 Rs.');
				}

				if ($request->amount > 350000) {
					$validator->errors()->add('amount', 'Amount must be in between 1000 to 350000 Rs.');
				} */
			});

			$block_no = $request->block_no;
			$floor_no = $request->floor_no;
			$unit_no = $request->unit_no;

			$block_id = $request->block_no;
			$floor_id = $request->floor_no;

			$unit_no = $request->unit_no;

			if (strlen($block_no) == 1) {
				$totalblocks = '0' . $block_no;
			} else {
				$totalblocks = $block_no;
			}

			if (strlen($floor_no) == 1) {
				$totalfloor = '0' . $floor_no;
			} else {
				$totalfloor = $floor_no;
			}

			if (strlen($unit_no) == 1) {
				$totalunit = '0' . $unit_no;
			} else {
				$totalunit = $unit_no;
			}



			$payment_plan_id = 3;

			//$planData=DB::table('payment_plan')->where('project_id','=',$project_id)->where('is_active','=',1)->first();
			//$payment_plan_id=$planData->payment_plan_id;

			if ($validator->fails()) {
				return redirect()->back()
					->withErrors($validator)
					->withInput();
			}

			//////
			$pan_card_media_id = 0;

			$pan_card_img = $request->file('pan_card_img');
			if ($pan_card_img) {
				$filename = CommonHelper::saveMedia($pan_card_img, "guest/customerkyc", 5, 'public');
				$pan_card_media_id = Media::insertGetId(['media_name' => $filename]);
			}

			$passport_media_id = 0;

			$passport_card_img = $request->file('passport_card_img');
			if ($passport_card_img) {
				$filename = CommonHelper::saveMedia($passport_card_img, "guest/customerkyc", 5, 'public');
				$passport_media_id = Media::insertGetId(['media_name' => $filename]);
			}

			$otp = CommonHelper::quickRandom(6);
			$notification = DB::table('notification_master')->where('notification_id', '=', 30)->first();
			$notification_content = $notification->notification_content;
			$notification_content = str_replace('{otp}', $otp, $notification_content);
			$subject = $notification->subject;

			$to = $request->email;
			$from = 'do-not-reply@eejak.com';
			$data = [
				'msg' => $notification_content,
				'subject' => $subject,
				'from' => $from,
				'to' => $to
			];

			$mail = Mail::send('emails.blockbooking', ['data' => $data], function ($m) use ($data) {
				$m->from($data['from'], 'axisecorp');
				$m->to($data['to'])->subject($data['subject']);
				$m->setBody($data['msg'], 'text/html');
			});

			//Insert Email Data into send_email table...
			if ($mail) {

				$emailData['send_to'] = $to;
				$emailData['send_by'] = 'do-not-reply@eejak.com';
				$emailData['sender_id'] = 1;
				$emailData['subject'] = $data['subject'];
				$emailData['body'] = $data['msg'];
				$emailData['send_date'] = date('Y-m-d');
				$insertEmailDetails = DB::table('send_mail')->insert($emailData);
			}

			$amount = $request->amount;
			$gst = (12 / 100) * $amount;
			$totalAmount = (float) $amount + (float) $gst;

			$guestId = DB::table('guest_user')->insertGetId(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'phone' => $request->phone, 'unit_id' => $request->unit_no, 'amount' => $totalAmount, 'project_id' => $project_id, 'is_active' => 1, 'block_id' => $block_id, 'otp' => $otp, 'created_at' => date('Y-m-d'), 'passport_media_id' => $passport_media_id, 'pan_card_media_id' => $pan_card_media_id,'sales_representative'=>$request->SalesRepresentative,'sales_representative_phone'=>$request->SalesRepresentativePhone]);


			$token = Crypt::encrypt($guestId);
			return redirect('/veryifyUnit_for_booking/' . $token);
		} catch (Exception $e) {
			return redirect('/outer_user_payment');
		}
		/* 
		 */
	}

    public function submitYogvillaPayment(Request $request)
    {

        dd($request);
        die();
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                // 'unit_no' => 'required',
                'amount' => 'required',
                'SalesRepresentative' => 'required',
                'SalesRepresentativePhone' => 'required',
                'term_condition' => 'required'
            ]);

            $project_id = 11;

            $validator->after(function ($validator) use ($request, $project_id) {

                $unit_no = $request->unit_no??'';


                $checkBlockFloorUnit = DB::table('unit_details')->where('unit_name', '=', $unit_no)->where('project_id', '=', $project_id)->first();

                if (!$checkBlockFloorUnit) {
                    $validator->errors()->add('unit_no', 'Unit is not exists.');
                } else {
                    if($request->unit_id != substr($checkBlockFloorUnit->unit,-3)){
                        $validator->errors()->add('unit_no', 'Please enter a valid Unit No.');
                    }

                    $unit_idd = $checkBlockFloorUnit->id;

                    $checkBlockFloorUnitAbailvle = DB::table('unit_details')->where('project_id', '=', $project_id)->where('booking_status', '=', 1)->where('id', '=', $unit_idd)->first();
                    if (!$checkBlockFloorUnitAbailvle) {
                        $validator->errors()->add('unit_no', 'Unit is not available.');
                    }
                }

                if ($request->amount!=100000) {
                    $validator->errors()->add('amount', 'Amount must be 100000/- Rs.');
                }
            });

            $unit_no = $request->unit_no;

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            //////
            $pan_card_media_id = 0;

            $pan_card_img = $request->file('pan_card_img');
            if ($pan_card_img) {
                $filename = CommonHelper::saveMedia($pan_card_img, "guest/customerkyc", 5, 'public');
                $pan_card_media_id = Media::insertGetId(['media_name' => $filename]);
            }

            $passport_media_id = 0;

            $passport_card_img = $request->file('passport_card_img');
            if ($passport_card_img) {
                $filename = CommonHelper::saveMedia($passport_card_img, "guest/customerkyc", 5, 'public');
                $passport_media_id = Media::insertGetId(['media_name' => $filename]);
            }

            $otp = CommonHelper::quickRandom(6);
            $notification = DB::table('notification_master')->where('notification_id', '=', 30)->first();
            $notification_content = $notification->notification_content;
            $notification_content = str_replace('{otp}', $otp, $notification_content);
            $subject = $notification->subject;

            $to = $request->email;
            $from = 'do-not-reply@eejak.com';
            $data = [
                'msg' => $notification_content,
                'subject' => $subject,
                'from' => $from,
                'to' => $to
            ];

            $mail = Mail::send('emails.blockbooking', ['data' => $data], function ($m) use ($data) {
                $m->from($data['from'], 'axisecorp');
                $m->to($data['to'])->subject($data['subject']);
                $m->setBody($data['msg'], 'text/html');
            });

            //Insert Email Data into send_email table...
            if ($mail) {

                $emailData['send_to'] = $to;
                $emailData['send_by'] = 'do-not-reply@eejak.com';
                $emailData['sender_id'] = 1;
                $emailData['subject'] = $data['subject'];
                $emailData['body'] = $data['msg'];
                $emailData['send_date'] = date('Y-m-d');
                $insertEmailDetails = DB::table('send_mail')->insert($emailData);
            }

            $amount = $request->amount;
            $gst = (0.05) * $amount;
            $totalAmount = (float) $amount + (float) $gst;

            $guestId = DB::table('guest_user')->insertGetId(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'phone' => $request->phone, 'unit_id' => $request->unit_no, 'amount' => $totalAmount, 'project_id' => $project_id, 'is_active' => 1, 'block_id' => '', 'otp' => $otp, 'created_at' => date('Y-m-d'), 'passport_media_id' => $passport_media_id, 'pan_card_media_id' => $pan_card_media_id,'sales_representative'=>$request->SalesRepresentative,'sales_representative_phone'=>$request->SalesRepresentativePhone]);


            $token = Crypt::encrypt($guestId);
            return redirect('/verifyYogUnit/' . $token);
        } catch (Exception $e) {
            return redirect('/yogvilla-payment');
        }
    }

    public function verifyYogUnit($token)
    {
        try {
            $tempId = Crypt::decrypt($token);


            $guestUser = DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->first();

            $unitDetail = DB::table('unit_details')->where('id', '=', $guestUser->unit_id)->where('project_id', '=', $guestUser->project_id)->where('status', '=', 1)->first();
            $project = DB::table('project')->where('project_id', '=', $guestUser->project_id)->first();

            if ($guestUser) {
                return view('guest_user.verifyYogUnit', ['guestUser' => $guestUser, 'tokenencypty' => $token, 'unitDetail' => $unitDetail, 'project' => $project]);
            } else {
                return redirect('/yogvilla-payment');
            }
        } catch (Exception $e) {

            return redirect('/yogvilla-payment');
        }
    }

	public function payForBooking($guest_token)
	{
		//echo 'ddd'; exit;
		try {
			if ($guest_token) {
				$tempId = Crypt::decrypt($guest_token);
				$guestUserArray = DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->first();
				$payment_plan_id = 0;
				$unit_id = $guestUserArray->unit_id;
				$project_id = $guestUserArray->project_id;
				$block_id = $guestUserArray->block_id;

				$pan_card_media_id = $guestUserArray->pan_card_media_id;
				$passport_media_id = $guestUserArray->passport_media_id;

				$customer_code = 0;

				$unitdetailsArr = DB::table('unit_details')->where('unit_id', '=', $unit_id)->where('project_id', '=', $project_id)->where('block_id', '=', $block_id)->first();

				$customer_code = $unitdetailsArr->unit_name;


				$temp_customer_id = TempCustomer::insertGetId([
					'sender_id' => 1,
					'company_type_id' => 1,
					'block_id' => $block_id,
					'unit_id' => $unit_id,
					'project_id' => $project_id,
					'customer_code' => $customer_code,
					'first_name' => $guestUserArray->first_name,
					'last_name' => $guestUserArray->last_name,
					'email' => $guestUserArray->email,
					'phone' => $guestUserArray->phone,
					'block_type' => 0,
					'is_active' => 1,
					'booking_amount' => $guestUserArray->amount
				]);



				TempCustomerDetails::create([
					'temp_customer_id' => $temp_customer_id,
					'customer_code' => $customer_code,
					'first_name' => $guestUserArray->first_name,
					'last_name' => $guestUserArray->last_name,
					'email' => $guestUserArray->email,
					'phone' => $guestUserArray->phone,
					'sales_representative' => $guestUserArray->sales_representative??'',
					'sales_representative_phone' => $guestUserArray->sales_representative_phone??'',
					'created_by' => 1
				]);



				if ($pan_card_media_id) {

					DB::table('temp_customer_kyc')->insert([
							'temp_customer_id' => $temp_customer_id,
							'customer_code' => $customer_code,
							'kyc_type_id' => 1,
							'applicant_type' => 1,
							'status' => 1,
							'media_id' => $pan_card_media_id
						]);
				}

				if ($passport_media_id) {

					DB::table('temp_customer_kyc')->insert([
							'temp_customer_id' => $temp_customer_id,
							'customer_code' => $customer_code,
							'kyc_type_id' => 4,
							'applicant_type' => 1,
							'status' => 1,
							'media_id' => $passport_media_id
						]);
				}

				$unitDetails = DB::table('unit_details')->where('unit_id', '=', $unit_id)->first();
				$sender_id = 1;

				if ($customer_code != '0') {

					//Checking if booking already exists for this user id, payment plan id and Unit id... 
					$checkBooking = DB::table('booking')->where('unit_id', '=', $unit_id)->where('customer_code', '=', $customer_code)->first();

					if (isset($checkBooking)) {
						$getBookingId = $checkBooking->booking_id;
					} else {
						$floor_unit = DB::table('floor_unit')->where('id', '=', $unit_id)->first();
						$bookingDetails['project_id']            = isset($floor_unit->project_id) ? $floor_unit->project_id : 0;
						$bookingDetails['block_id']           	 = isset($floor_unit->block_id) ? $floor_unit->block_id : 0;
						$bookingDetails['user_id']                = 0;
						$bookingDetails['customer_code']          = $customer_code;
						$bookingDetails['unit_id']                = $unit_id;
						$bookingDetails['booking_status']         = 2;
						$bookingDetails['payment_plan_id']        = $payment_plan_id;
						$bookingDetails['created_by']             = $sender_id;
						$bookingDetails['created_at']             = date('Y-m-d');
						$getBookingId = DB::table('booking')->insertGetId($bookingDetails);
					}

					if (isset($getBookingId)) {


						$transectionString	=	CommonHelper::quickAlphanumericRandom(15);
						$transectioncode	=	'tran_' . $transectionString;
						$getUserPlanComponentId = 0;
						$order_details['user_id']                = 0;
						$order_details['customer_code']          = $customer_code;
						$order_details['booking_id']             = $getBookingId;
						$order_details['user_plan_component_id'] = $getUserPlanComponentId;
						$order_details['amount']                 = $guestUserArray->amount;
						$order_details['txnid']                  = $transectioncode;
						$order_details['sender']                 = 'Invite Block';
						$order_details['description']            = 'Unit Booking via outer.';
						$order_details['order_status']           = 0;
						$order_details['created_at']             = date('Y-m-d');

						$orderId = DB::table('orders')->insertGetId($order_details);
						DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->update(['is_active'=>2]);
						return redirect('payment/' . $orderId);
					}
				}
			} else {
				return redirect('/outer_user_payment');
			}
		} catch (Exception $e) {
			//dd($e->getMessage());
			return redirect('/outer_user_payment');
		}
	}

	public function guestpaymentnew($transectioncode)
	{

		$orderDetails = DB::table('guest_user')->where('txnid', '=', $transectioncode)->first();


		//Creating dynamic return and cancel url...
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
			$protocol = 'https';
		} else {
			$protocol = 'http';
		}
		$returnUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/paymentGuest/returnPayment';
		$cancelUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/paymentGuest/cancelPayment/' . $orderDetails->txnid;
		//dd($cancelUrl);

		if (isset($orderDetails)) {
			//Getting User Details...

			//Getting Gateway Parameters...
			$parameters = Omnipay::getParameters();


			//Creating Array for user's basic details...
			$formData = [
				'firstName' => $orderDetails->first_name,
				'lastName' => $orderDetails->last_name,
				'email' => $orderDetails->email

			];


			//CreditCard method creates a safe way to accept the user's details on payment gateway...
			$card = Omnipay::creditCard($formData);



			//Calling Payment Gateway and sending payment parameters to the gateway...
			$response = Omnipay::completePurchase(
				[
					'account_id' => $parameters['key_id'],
					'amount' => $orderDetails->amount,
					'currency' => 'INR',
					'description' => $orderDetails->description ?? 'hello this is payment',
					'card' => $card,
					'transactionId' => $orderDetails->txnid,
					'returnUrl' => $returnUrl,
					'cancelUrl' => $cancelUrl

				]
			)->send();

			//dd($response);
			//Gateway response...
			if ($response->isSuccessful()) {
				dd('payment was successful: update database');
				// payment was successful: update database
			} elseif ($response->isRedirect()) {
				// redirect to offsite payment gateway
				//dd($response->getRedirectResponse());
				return $response->getRedirectResponse();
			} else {

				print_r($orderDetails);
				dd('Somehing Went Wrong. Please Again.');
				// payment failed: display message to customer
				echo $response->getMessage();
			}
		} else {
			dd("Order Details Not found.");
		}
	}

	public function returnPayment(Request $request)
	{
		$paymentResponse = $request->all();
		$orderData = DB::table('guest_user')->where('txnid', '=', $paymentResponse['x_reference'])->first();

		$this->callBack($paymentResponse);

		if ($paymentResponse['x_result'] == 'completed') {
			return redirect('/guest_payment_status/' . $paymentResponse['x_reference']);
		} elseif ($paymentResponse['x_result'] == 'failed') {

			return redirect('/guest_payment_status/' . $paymentResponse['x_reference']);
		}
	}


	public function callBack($paymentResponse)
	{
		//Getting Payment gateway response...
		$gateway = Omnipay::getShortName();
		$jsonResponse = json_encode($paymentResponse);
		$orderData = DB::table('guest_user')->where('txnid', '=', $paymentResponse['x_reference'])->first();

		if ($paymentResponse['x_result'] == 'completed') {



			//Inserting data according to the payment gateway response...

			DB::table('guest_user')->where('txnid', '=', $paymentResponse['x_reference'])->update(['is_active' => 1, 'payment_status' => 1, 'gateway' => $gateway, 'response' => $jsonResponse]);


			if ($orderData) {
				$user_fname     = $orderData->first_name;
				$user_lname     = $orderData->last_name;
				$user_email     = $orderData->email;
				$project_name   = '';
				$block_name     = '';
				$unit_name	   	= $orderData->unit_no;
				$floor_name  	= '';
				$booking_amount	= $orderData->amount;




				//Creating dynamic return and cancel url...
				if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
					$protocol = 'https';
				} else {
					$protocol = 'http';
				}

				$uri = $protocol . '://' . $_SERVER['HTTP_HOST'];
				$unit_details_link = '<a href="' . $uri . '/guest_payment_status/' . $paymentResponse['x_reference'] . '" >here</a>';

				$userDataArray = array('first_name' => $user_fname, 'last_name' => $user_lname, 'project_name' => $project_name, 'block_name' => $block_name, 'unit_name' => $unit_name, 'floor_name' => $floor_name, 'booking_amount' => $booking_amount, 'unit_details_link' => $unit_details_link, 'receiver_mail' => $user_email);

				$is_mail_sent = Mailnotification::bookingConfirmation($userDataArray);
			}
		} elseif ($paymentResponse['x_result'] == 'failed') {

			DB::table('guest_user')->where('txnid', '=', $paymentResponse['x_reference'])->update(['is_active' => 1, 'payment_status' => 2, 'gateway' => $gateway, 'response' => $jsonResponse]);


			// Sending Email to User...
			$to = $orderData->email;
			$from = isset(Auth::user()->email) ? Auth::user()->email : 'no-reply@stagingrelease.com';
			$data = [
				'msg' => 'Payment Has Been Failed. Please Try Again.',
				'subject' => 'Booking Payment',
				'from' => $from,
				'to' => $to
			];

			$mail = Mail::send('emails.blockbooking', ['data' => $data], function ($m) use ($data) {
				$m->from($data['from'], 'Realestate Panel');
				$m->to($data['to'])->subject($data['subject']);
			});


			//Insert Email Data into send_email table...
			if ($mail) {

				$emailData['send_to'] = $to;
				$emailData['send_by'] = isset(Auth::user()->email) ? Auth::user()->email : 'no-reply@stagingrelease.com';
				$emailData['sender_id'] = isset(Auth::user()->id) ? Auth::user()->id : 0;
				$emailData['subject'] = $data['subject'];
				$emailData['body'] = $data['msg'];
				$emailData['send_date'] = date('Y-m-d');
				$insertEmailDetails = DB::table('send_mail')->insert($emailData);
			}
		}
	}


	public function cancelPayment(Request $request, $txnid = 0)
	{

		//Getting Payment gateway response...
		$paymentResponse = $request->all();
		$orderData = DB::table('guest_user')->where('txnid', '=', $paymentResponse['x_reference'])->first();

		$gateway = Omnipay::getShortName();
		$jsonResponse = json_encode($paymentResponse);


		if ($paymentResponse['fail_type'] == 'user') {


			DB::table('guest_user')->where('txnid', '=', $paymentResponse['x_reference'])->update(['is_active' => 0, 'payment_status' => 3, 'gateway' => $gateway, 'response' => $jsonResponse]);
		}

		// Sending Email to User...
		$to = $orderData->email;
		$from = isset(Auth::user()->email) ? Auth::user()->email : 'no-reply@stagingrelease.com';
		$data = [
			'msg' => 'Payment Has Been Failed. Please Try Again.',
			'subject' => 'Booking Payment',
			'from' => $from,
			'to' => $to
		];

		$mail = Mail::send('emails.blockbooking', ['data' => $data], function ($m) use ($data) {
			$m->from($data['from'], 'Realestate Panel');
			$m->to($data['to'])->subject($data['subject']);
		});


		//Insert Email Data into send_email table...
		if ($mail) {

			$emailData['send_to'] = $to;
			$emailData['send_by'] = isset(Auth::user()->email) ? Auth::user()->email : 'no-reply@stagingrelease.com';
			$emailData['sender_id'] = isset(Auth::user()->id) ? Auth::user()->id : 0;
			$emailData['subject'] = $data['subject'];
			$emailData['body'] = $data['msg'];
			$emailData['send_date'] = date('Y-m-d');
			$insertEmailDetails = DB::table('send_mail')->insert($emailData);
		}
		return redirect('/guest_payment_status/' . $orderData->txnid);
	}

	public function guest_payment_status($txnid)
	{

		$userData = DB::table('guest_user')->where('txnid', '=', $txnid)->first();


		return view('guest_user.payment_status')->with(['userData' => $userData]);
	}

	public function getBlockFloor(Request $request)
	{
		$blockid = $request->input('blockid');
		$project_id = $request->input('project_id');
		$floorData = DB::table('block_floors')->where('project_id', '=', $project_id)->where('block_id', '=', $blockid)->groupBy('floor_id')->get();
		$strFloor = '<option value="">Select Floor</option>';

		foreach ($floorData as $floor) {
			if ($floor->floor_id == 0) {
				$strFloor .= '<option value="' . $floor->floor_id . '">Ground</option>';
			} else {
				$strFloor .= '<option value="' . $floor->floor_id . '">Floor ' . $floor->floor_id . '</option>';
			}
		}

		echo $strFloor;
		exit;
	}

	public function getBlockFloorUnit(Request $request)
	{
		$blockid = $request->input('blockid');
		$project_id = $request->input('project_id');
		$floor_id = $request->input('floor_id');
		$unitData = DB::table('floor_unit')->join('unit_details', 'unit_details.unit_id', '=', 'floor_unit.id')->where('floor_unit.project_id', '=', $project_id)->where('floor_unit.block_id', '=', $blockid)->where('floor_unit.floor_id', '=', $floor_id)->where('unit_details.booking_status', '=', 1)->get();
		$strUnit = '<option value="">Select Unit</option>';
		foreach ($unitData as $unit) {
			if (strlen($unit->sequence) == 1) {
				$sequence = '0' . $unit->sequence;
			} else {
				$sequence = $unit->sequence;
			}
			$strUnit .= '<option value="' . $unit->unit_id . '">' . $sequence . '</option>';
		}

		echo $strUnit;
		exit;
	}

	public function verifyOtpForBooking($tokenencypty)
	{

		try {
			$tempId = Crypt::decrypt($tokenencypty);


			$guestUser = DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->first();

			if ($guestUser) {
				$unitDetail = DB::table('floor_unit')->where('id', '=', $guestUser->unit_id)->where('project_id', '=', $guestUser->project_id)->where('status', '=', 1)->first();
				return view('guest_user.verify_otp_for_booking', ['guestUser' => $guestUser, 'tokenencypty' => $tokenencypty, 'unitDetail' => $unitDetail]);
			} else {
				return redirect('/outer_user_payment');
			}
		} catch (Exception $e) {

			return redirect('/outer_user_payment');
		}
	}

	public function postverifyOtpForbooking(Request $request)
	{

		$validate = Validator::make($request->all(), [
			'guest_token' => 'required',
			'otp' => 'required',
		]);

		$validate->after(function ($validate) use ($request) {

			$tempId = Crypt::decrypt($request->guest_token);


			$guestUser = DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->first();

			if(!$guestUser){
				$validate->errors()->add('Invalid', 'Access Denied');
			}else if($request->otp != $guestUser->otp){
				$validate->errors()->add('otp', 'OTP mismatch.');
			}
		});

		if ($validate->fails()) {

			return redirect()->back()->withErrors($validate->errors())->withInput();
		}



		return redirect('/payForBooking/' . $request->guest_token);
		// $this->payForBooking($guestUser);
	}

	public function resendOtp(Request $request)
	{
		$guestData = DB::table('guest_user')->where('guest_user_id', '=', $request->guestId)->where('is_active','=',1)->first();
		if ($guestData) {
			$otp = CommonHelper::quickRandom(6);
			$notification = DB::table('notification_master')->where('notification_id', '=', 30)->first();
			$notification_content = $notification->notification_content;
			$notification_content = str_replace('{otp}', $otp, $notification_content);
			$subject = $notification->subject;

			$to = $guestData->email;
			$from = 'do-not-reply@eejak.com';
			$data = [
				'msg' => $notification_content,
				'subject' => $subject,
				'from' => $from,
				'to' => $to
			];

			$mail = Mail::send('emails.blockbooking', ['data' => $data], function ($m) use ($data) {
				$m->from($data['from'], 'axisecorp');
				$m->to($data['to'])->subject($data['subject']);
				$m->setBody($data['msg'], 'text/html');
			});

			//Insert Email Data into send_email table...
			if ($mail) {

				$emailData['send_to'] = $to;
				$emailData['send_by'] = 'do-not-reply@eejak.com';
				$emailData['sender_id'] = 1;
				$emailData['subject'] = $data['subject'];
				$emailData['body'] = $data['msg'];
				$emailData['send_date'] = date('Y-m-d');
				$insertEmailDetails = DB::table('send_mail')->insert($emailData);

				DB::table('guest_user')->where('guest_user_id', '=', $request->guestId)->update(['otp' => $otp]);

				return response()->json(['status' => 200]);
			}
			return response()->json(['status' => 400]);
		} else {
			return response()->json(['status' => 400]);
		}
	}

	public function verifyUnitForBooking($token)
	{
		try {
			$tempId = Crypt::decrypt($token);


			$guestUser = DB::table('guest_user')->where('guest_user_id', '=', $tempId)->where('is_active', '=', 1)->first();

			$unitDetail = DB::table('floor_unit')->where('id', '=', $guestUser->unit_id)->where('project_id', '=', $guestUser->project_id)->where('status', '=', 1)->first();
			$project = DB::table('project')->where('project_id', '=', $guestUser->project_id)->first();
			$block = DB::table('project_blocks')->where('block_id', '=', $unitDetail->block_id)->where('project_id', '=', $guestUser->project_id)->first();

			if ($guestUser) {

				return view('guest_user.verify_unit_for_booking', ['guestUser' => $guestUser, 'tokenencypty' => $token, 'unitDetail' => $unitDetail, 'project' => $project, 'block' => $block]);
			} else {
				return redirect('/outer_user_payment');
			}
		} catch (Exception $e) {

			return redirect('/outer_user_payment');
		}
	}


	public function getCustomerPaymentInfo(Request $request)
	{
		$customer = DB::table('customer_details')->where('customer_code', '=', $request->customerCode)->where('applicant_type', '=', 1)->first();
		if (!isset($customer)) {
			return response()->json(array('code' => 400));
		}
		$payment = DB::table('payment_details')->join('booking', 'booking.booking_id', '=', 'payment_details.booking_id')->join('project', 'project.project_id', '=', 'booking.project_id')->join('project_blocks', 'project_blocks.block_id', '=', 'booking.block_id')->join('floor_unit', 'floor_unit.id', '=', 'booking.unit_id')->select('project.project_name', 'project_blocks.block_name', 'floor_unit.unit', 'booking.payment_plan_id', 'booking.booking_id')->where('payment_details.user_id', '=', $customer->user_id)->first();
		$paymentPlan = DB::table('user_plan_component')->where('booking_id', '=', $payment->booking_id)->where('user_id', '=', $customer->user_id)->where('status', '=', 0)->where('is_active', '=', 1)->orderBy('sequence', 'ASC')->first();
		return response()->json(array('code' => 200, 'customer' => $customer, 'payment' => $payment, 'plan' => $paymentPlan));
	}

	public function  sendOtpTOCustomermail(Request $request)
	{

		$customer = DB::table('customer_details')->where('customer_code', '=', $request->customerCode)->where('applicant_type', '=', 1)->first();
		if (!isset($customer)) {
			return response()->json(array('code' => 400, 'message' => 'Application Id is not exist.'));
		} else {

			$otp = CommonHelper::quickRandom(6);
			$notification = DB::table('notification_master')->where('notification_id', '=', 30)->first();
			$notification_content = $notification->notification_content;
			$notification_content = str_replace('{otp}', $otp, $notification_content);
			$subject = $notification->subject;

			$to = $customer->email;
			$from = 'do-not-reply@eejak.com';
			$data = [
				'msg' => $notification_content,
				'subject' => $subject,
				'from' => $from,
				'to' => $to
			];

			$mail = Mail::send('emails.blockbooking', ['data' => $data], function ($m) use ($data) {
				$m->from($data['from'], 'axisecorp');
				$m->to($data['to'])->subject($data['subject']);
				$m->setBody($data['msg'], 'text/html');
			});

			//Insert Email Data into send_email table...
			if ($mail) {

				$emailData['send_to'] = $to;
				$emailData['send_by'] = 'do-not-reply@eejak.com';
				$emailData['sender_id'] = 1;
				$emailData['subject'] = $data['subject'];
				$emailData['body'] = $data['msg'];
				$emailData['send_date'] = date('Y-m-d');
				$insertEmailDetails = DB::table('send_mail')->insert($emailData);

				DB::table('customer_details')->where('customer_detail_id', '=', $customer->customer_detail_id)->update(['otp' => $otp]);

				return response()->json(['status' => 200]);
			}
			return response()->json(['status' => 400]);
		}
	}

	public function verifyOtp(Request $request)
	{
		$customer = DB::table('customer_details')->where('customer_code', '=', $request->customerCode)->where('applicant_type', '=', 1)->first();
		if (!isset($customer)) {
			return response()->json(array('code' => 400));
		} else {
			if ($customer->otp == trim($request->otp)) {
				return response()->json(array('code' => 200));
			} else {
				return response()->json(array('code' => 400));
			}
		}
	}

	public function  verifyApplicationId(Request $request)
	{

		$customer = DB::table('customer_details')->where('customer_code', '=', $request->customerCode)->where('applicant_type', '=', 1)->first();
		if (!isset($customer)) {
			return response()->json(array('code' => 400, 'message' => 'Application Id is not exist.'));
		} else {
			// $user = DB::table('users')->where('id','=',$customer->user_id)->first();
			// if($user->is_active != 1){
			// 	return response()->json(array('code' => 400, 'message' => 'You are not an active user.'));
			// }
			$showemail = $this->obfuscate_email($customer->email);
			return response()->json(array('code' => 200, 'message' => $showemail));
		}
	}

	function obfuscate_email($email)
	{
		$em   = explode("@", $email);
		$name = implode(array_slice($em, 0, count($em) - 1), '@');
		$len  = floor(strlen($name) / 2);

		return substr($name, 0, $len) . str_repeat('*', $len) . "@" . end($em);
	}



	public function existingPayment(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'customer_code' => 'required',
			'user_id' => 'required',
			'booking_id' => 'required',
			'user_plan_id' => 'required',
			'existingAmount' => 'required|numeric'
		]);

		$validator->after(function($validator) use($request) {
			$components = DB::table('user_plan_component')->where('booking_id','=',$request->booking_id)->where('user_id','=',$request->user_id)->where('is_active','=',1)->where('status','=',0)->orderBy('sequence','ASC')->get();
			$amount = 0;
			foreach($components as $component){
				$amount += $component->due_amt;
			}
			if($request->existingAmount > $amount){
				$validator->errors()->add('existingAmount','Amount is higher than your limit.');
			}
		});

		if($validator->fails()){
			return redirect('/outer_user_payment/1')->withErrors($validator->errors())->withInput();
		}

		$transectionString	=	CommonHelper::quickAlphanumericRandom(15);
		$transectioncode	=	$transectionString;
		$order_details['user_id']                = $request->user_id;
		$order_details['customer_code']          = $request->customer_code;
		$order_details['booking_id']             = $request->booking_id;
		$order_details['user_plan_component_id'] = $request->user_plan_id;
		$order_details['amount']                 = $request->existingAmount;
		$order_details['txnid']                  = $transectioncode;
		$order_details['sender']                 = 'Existing Payment';
		$order_details['description']            = 'Existing Payment via outer.';
		$order_details['order_status']           = 0;
		$order_details['created_at']             = date('Y-m-d');

		$orderId = DB::table('orders')->insertGetId($order_details);
		return redirect('payment/' . $orderId);
	}

	public function paymentStatus($order_id){
		$order_id = Crypt::decrypt($order_id);
		$userData    = "";
		$unitData    = "";
		$orderData = DB::table('orders')->where('order_id', '=', $order_id)->first();
		if ($orderData) {
			$orderData->payment_date = CommonHelper::display_date($orderData->created_at);
		}

		$payment = DB::table('payment_details')->join('user_plan_component','user_plan_component.user_plan_component_id','=','payment_details.user_plan_component_id')->select('payment_details.net_amount','user_plan_component.component_name')->where('payment_details.txnid','=',$orderData->txnid)->get();

		$bookingData = DB::table('booking')->where('booking_id', '=', $orderData->booking_id)->first();

		$userData = DB::table('users')->join('customer_details', 'customer_details.user_id', '=', 'users.id')
			->leftjoin('customer_address_details as ca', function ($on) {
				$on->on('ca.user_id', '=', 'users.id')->where('ca.address_type_id', '=', 5)->where('ca.applicant_type', '=', 1);
			})
			->where('users.id', '=', $bookingData->user_id)->where('users.role', '=', 8)
			->where('customer_details.applicant_type', '=', 1)

			->select(
				'users.email as user_email',
				'customer_details.*',
				DB::raw('CONCAT(ca.address_line, ", ", ca.city, ", ", ca.state, ", ", ca.pin_code) AS correspondence_address')
			)
			->first();


		$unitData = DB::table('booking')->leftjoin('unit_details', 'unit_details.unit_id', '=', 'booking.unit_id')
			->leftjoin('project', 'project.project_id', '=', 'booking.project_id')
			->leftjoin('project_blocks', 'project_blocks.block_id', '=', 'booking.block_id')
			->where('booking.is_active', '=', 1)
			->where('booking.booking_id', '=', $bookingData->booking_id)
			->select('booking.booking_id', 'booking.unit_id', 'booking.user_id', 'booking.project_id', 'booking.block_id', 'unit_details.unit_name', 'unit_details.type', 'unit_details.floor_id', 'project.project_name', 'project_blocks.block_name', 'project_blocks.block_type_id')
			->first();

			if (isset($unitData)) {
				$floordetails = CommonHelper::getUnitFloor($unitData->unit_name, $unitData->block_type_id, $unitData->block_id);
				if ($floordetails) {
					$unitData->floor      = $floordetails['floor'];
					$unitData->blockValue = $floordetails['blockValue'];
					$unitData->unit_no    = $floordetails['unit_no'];
				} else {
					$unitData->floor      = "";
					$unitData->blockValue = "";
					$unitData->unit_no    = "";
				}
			}
		return view('guest_user.existing_payment_status')->with(['userData' => $userData, 'unitData' => $unitData, 'orderData' => $orderData,'payment'=>$payment]);
	}
	
	public function validateFloorUnit(Request $request){
		$blockid 	=	$request->blockid;
		$unit_id	=	$request->unit_id;
		$floor_id	=	$request->floor_id;
		$project_id	=	$request->project_id;

		if(strlen(trim($unit_id))!=3){
			return response()->json(array('code' => 401, 'message' => 'Unit is not exists.'));
		}
		$unitfloor1	=	substr($unit_id,0,1);
		$unitno	=	substr($unit_id,1,3);
		
		
		$unit_sequece=(int)$unitno; 
		if($unitfloor1!=$floor_id){
			return response()->json(array('code' => 402, 'message' => 'Unit is not exists.'));
		}
		
		$unitDetail=DB::table('floor_unit')->where('project_id','=',$project_id)->where('block_id','=',$blockid)->where('floor_id','=',$floor_id)->where('sequence','=',$unit_sequece)->where('status','=',1)->first();
		if(!$unitDetail){
			return response()->json(array('code' => 403, 'message' => 'Unit is not exists.'));
		}else{
			$unitBookingDetails=DB::table('unit_details')->where('project_id','=',$project_id)->where('unit_id','=',$unitDetail->id)->where('block_id','=',$blockid)->where('status','=',1)->first();
			//echo "$unit_sequece , $blockid ,$project_id";
			//echo '<pre>'; print_r($unitDetail->id); exit;
			//echo '<pre>'; print_r($unitBookingDetails); exit;
			//echo $unitBookingDetails->booking_status; exit;
			if($unitBookingDetails->booking_status!=1){
				return response()->json(array('code' => 404, 'message' => 'Unit is not available.'));
			}else{
			return response()->json(array('code' => 200, 'unit_no' => $unitDetail->id));
			}
		}
		
	}
}
