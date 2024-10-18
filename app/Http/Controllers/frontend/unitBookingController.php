<?php

namespace App\Http\Controllers\frontend;

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
use App\Models\UserKyc;
use App\Models\Media;   
use App\Models\AssignProject;   
use App\Models\ProjectBlocks;   
use App\Models\BlockFloors;   
use App\Models\FloorUnit;   
use App\Models\UnitDetails;   
use App\Models\VendorInvite;   
use App\Models\PaymentPlan;   
use App\Models\PlanComponent; 
use App\Models\UserPlanComponent;
use App\Models\PaymentDetails;
use App\Models\VendorProject;
use DateTime;

class unitBookingController extends Controller
{
	//Unit Booking at the time of registration...
	public function unitBookSubmit(Request $request){
		$formData = $request->all();
		$total_temp = count($formData['templet_id']);
		$getUnitDetails = UnitDetails::where('unit_id', '=', $formData['unit_id'])->first();
		$validator = Validator::make($formData, [
		'first_name' 	=> 'required',
		'last_name' 	=> 'required',
		'phone'         => 'required',
		'password'      => 'required',
		'address'       => 'required',
		'city'          => 'required',
		'state'         => 'required',
		'zip'           => 'required',
		'image'         => 'required',
		'payment_plan_id'=>'required']);
		
		if(!$validator->fails()){
			
			$confirmationCode = $formData['confirmation_code'];
			$getUserData = DB::table('users')->where('confirmation_code', '=', $confirmationCode)->first();
			if(isset($getUserData)){
				$destinationPath = public_path('assets/img');
			
				if ($request->hasFile('image')) {
					$file      =$request->file('image');	
					$extension = $file->getClientOriginalExtension();
					$name      = uniqid() . '_doc.' . $extension;
					$file->move($destinationPath, $name);
					$filename  = '/assets/img/' . $name;
					$userData['image'] = $filename;
				}
				
				$userData['first_name'] = $formData['first_name'];
				$userData['last_name']  = $formData['last_name'];
				$userData['password']   = trim($formData['password']); 
				$userData['password']   = Hash::make($formData['password']); 
				$userData['phone']      = $formData['phone'];
				$userData['address']    = $formData['address'];
				$userData['city']       = $formData['city'];
				$userData['state']      = $formData['state'];
				$userData['zip']        = $formData['zip'];
				$userData['confirmed']  = 1;
				$userData['confirmation_code']  = null;
				$userData['updated_at'] = date('y-m-d');
				
				$updateUserData = DB::table('users')->where('id', '=', $getUserData->id)->update($userData);
				if(isset($updateUserData)){
					$getUserID = $getUserData->id;
					if(isset($getUserID)){
						
						//For inserting Assing Template...
						if(isset($total_temp)){
							for($i = 0; $i<$total_temp; $i++){
								$templet_id = $formData['templet_id'][$i];
								$history_templets_id = DB::table('history_templets')->where('templet_id', '=', $templet_id)->max('id');
								
								if(isset($history_templets_id)){
									$userAssignTemplate['user_id'] = $getUserID;
									$userAssignTemplate['history_templets_id'] = $history_templets_id;
									$userAssignTemplate['templet_html'] = $formData['templet_html'][$i];
									$userAssignTemplate['status'] = 1;
									$insertUserAssignTemplet = DB::table('user_assign_templet')->insert($userAssignTemplate);					
								}
							}
						}
						
						$floor_unit= DB::table('floor_unit')->where('id','=',$formData['unit_id'])->first();
						$bookingDetails['project_id']            = isset($floor_unit->project_id)?$floor_unit->project_id:0;
						$bookingDetails['block_id']            = isset($floor_unit->block_id)?$floor_unit->block_id:0;
						$bookingDetails['user_id'] = $getUserID;
						$bookingDetails['unit_id'] = $formData['unit_id'];
						$bookingDetails['booking_status'] = 2;
						$bookingDetails['payment_plan_id']  = $formData['payment_plan_id'];
						$bookingDetails['created_at'] = date('Y-m-d');
						$bookingDetails['created_by'] = 0;
						$getBookingId = DB::table('booking')->insertGetId($bookingDetails);
						
						
						if(isset($getBookingId)){
							$getplanComponents = PlanComponent::where('payment_plan_id', '=', $formData['payment_plan_id'])->get();
							$count = count($getplanComponents);
							
							foreach($getplanComponents as $key => $planComponent){
								// For Amount...
								if($planComponent->component_type == 1){
									$percentage = $planComponent->component_value ;
									$total_unit_cost = $getUnitDetails->total_unit_cost;
									$total_unit_cost =  (int)preg_replace('#[^0-9]+#', '', $total_unit_cost);
									$calculated_value = ($total_unit_cost * $percentage)/100;
								}
								else{
									$calculated_value = $planComponent->component_value ;
								}
								
								$user_plan_component['booking_id']        = $getBookingId;
								$user_plan_component['payment_plan_id']   = $formData['payment_plan_id'];
								$user_plan_component['plan_component_id'] = $planComponent->plan_component_id;
								$user_plan_component['component_name']    = $planComponent->component_name;
								$user_plan_component['calulated_value']   = $calculated_value;
								$user_plan_component['status']            = 0;
								$user_plan_component['is_active']         = 1;
								$user_plan_component['created_at']        = date('y-m-d');
								
								if($key == 0){
									
									$net_amount = $calculated_value;
									// For Due Date...
									$period_type = $planComponent->period_type;
									$period_value = $planComponent->period_value;
									
									if($period_type == 0){
										$user_plan_component['due_date'] = date("Y-m-d", strtotime("+".$period_value." month"));
									}
									if($period_type == 2){
										$user_plan_component['due_date'] = $period_value;
									}
									if($period_type == ""){
										$user_plan_component['due_date'] = null;
									}
							
									$getUserPlanComponentId = UserPlanComponent::insertGetId($user_plan_component);
								}
								else{
									$period_type = $planComponent->period_type;
									$period_value = $planComponent->period_value;
									
									if($period_type == 0){
										$user_plan_component['due_date'] = date("Y-m-d", strtotime("+".$period_value." month"));
									}
									if($period_type == 1){
										$userPlanComponent = UserPlanComponent::where('booking_id', '=', $getBookingId)->get();
										$countUserPlanComponent = count($userPlanComponent);
										$index = $countUserPlanComponent - 1;
										$last_due_date = $userPlanComponent[$index ]['due_date'];
										$user_plan_component['due_date'] = date("Y-m-d", strtotime("$last_due_date +".$period_value." month"));
									}
									if($period_type == 2){
										$user_plan_component['due_date'] = $period_value;
									}
									if($period_type == ""){
										$user_plan_component['due_date'] = null;
									}
									 
									$insertUserPlanComponent = UserPlanComponent::insert($user_plan_component);
								}
								
							}
							if(isset($getUserPlanComponentId)){
								$payment_details['booking_id']             = $getBookingId;
								$payment_details['user_plan_component_id'] = $getUserPlanComponentId;
								$payment_details['net_amount']             = $net_amount;
								$payment_details['txnid']                  = uniqid();
								$payment_details['payment_type']           = 1;
								$payment_details['payment_status']         = 1;
								$payment_details['is_active']              = 1;
								$payment_details['created_at']             = date('y-m-d');
								
								$insertPaymentDetails = PaymentDetails::insert($payment_details);
								if(isset($insertPaymentDetails)){
									$updateUserPlanComponent = UserPlanComponent::where('user_plan_component_id', '=', $getUserPlanComponentId)->update(['status' => 1, 'updated_at' => date('y-m-d')]);
									$updateFloorUnit = FloorUnit::where('id', '=', $formData['unit_id'])->update(['booking_status' => 2, 'updated_at' => date('y-m-d')]);
									if (Auth::attempt(['email' => $formData['email'], 'password' =>$formData['password'],'confirmed' => 1]))
									{
										return redirect()->intended('/profile');
									}
									else{
										\Session::flash('success-msg', 'Invalid Credentials');
										return redirect('/login');

									}
								}
							}
						}	
					}
				}
			}
		}
		else{
			return redirect()->back()->with('errors', $validator->errors());
		}
	}
	
	
	public function bookunits()
	{
		return view('frontend.profile.bookunits');
	}
	
	
	
	
	
	public function booknow(){
		$getProjectId1 = AssignProject::where('role_id', '=', 2)->where('company_type_id', '=', 1)->first();
		$getProjectId =VendorProject::where('assign_project_id', '=',$getProjectId1->id)->first();
		$getBlockData = ProjectBlocks::where('project_id', '=', $getProjectId->project_id)->get();
		
		foreach($getBlockData as $blockData){	
			$blockData->blockName = ProjectBlocks::where('block_id', '=', $blockData->block_id)->first()->block_name;
			$blockData->BlockFloors = BlockFloors::where('block_id', '=', $blockData->block_id)->get();
			foreach($blockData->BlockFloors as $floorDa){
				$floorDa->unit=FloorUnit::where('block_id', '=', $floorDa->block_id)->where('floor_id', '=', $floorDa->floor_id)->where('status', '=', 1)->get();
				foreach($floorDa->unit as $unit_details){
					$unit_details->unit_details = UnitDetails::where("unit_id", '=', $unit_details->id)->where('status', "=", 1)->first();
					$unit_details->unit_details->total_unit_cost = (int)preg_replace('#[^0-9]+#', '', $unit_details->unit_details->total_unit_cost);
					
				}
			}
		}
		$paymentPlanData = PaymentPlan::where('is_active', '=', 1)->get();
		$assign_templet = DB::table('templets')->where('type', '=', 2)->where('status', '=', 1)->get();
		$key_value = count($assign_templet) - 1;
		return view('frontend.booknow')->with(['getBlockData' => $getBlockData, 'paymentPlanData' => $paymentPlanData, 'assign_templet' => $assign_templet, 'key_value' => $key_value]);
	}
	
	
	public function booknowsubmit(Request $request){
		$formData = $request->all();
		//dd($formData);
		$formData = $request->all();
		$total_temp = count($formData['templet_id']);
		$getUnitDetails = UnitDetails::where('unit_id', '=', $formData['unit_id'])->first();
		$validator = Validator::make($formData, [
		'first_name' 	=> 'required',
		'last_name' 	=> 'required',
		'phone'         => 'required',
		'password'      => 'required',
		'address'       => 'required',
		'city'          => 'required',
		'state'         => 'required',
		'zip'           => 'required',
		'image'         => 'required',
		'payment_plan_id'=>'required']);
		
		if(!$validator->fails()){
			$destinationPath = public_path('assets/img');
			
			if ($request->hasFile('image')) {
				$file      =$request->file('image');	
				$extension = $file->getClientOriginalExtension();
				$name      = uniqid() . '_doc.' . $extension;
				$file->move($destinationPath, $name);
				$filename  = '/assets/img/' . $name;
				$userData['image'] = $filename;
			}
			
			$userData['first_name'] = $formData['first_name'];
			$userData['last_name']  = $formData['last_name'];
			$userData['email']      = $formData['email'];
			$userData['password']   = trim($formData['password']); 
			$userData['password']   = Hash::make($formData['password']); 
			$userData['phone']      = $formData['phone'];
			$userData['address']    = $formData['address'];
			$userData['city']       = $formData['city'];
			$userData['state']      = $formData['state'];
			$userData['zip']        = $formData['zip'];
			$userData['role']       = 8;
			$userData['confirmed']  = 1;
			$userData['confirmation_code']  = str_random(30);
			$userData['created_at'] = date('y-m-d h:i:s');
			
			$getUserID = DB::table('users')->insertGetId($userData);
			
			if(isset($getUserID)){
				//For inserting Assing Template...
				if(isset($total_temp)){
					for($i = 0; $i<$total_temp; $i++){
						$templet_id = $formData['templet_id'][$i];
						$history_templets_id = DB::table('history_templets')->where('templet_id', '=', $templet_id)->max('id');
						
						if(isset($history_templets_id)){
							$userAssignTemplate['user_id'] = $getUserID;
							$userAssignTemplate['history_templets_id'] = $history_templets_id;
							$userAssignTemplate['templet_html'] = $formData['templet_html'][$i];
							$userAssignTemplate['status'] = 1;
							$insertUserAssignTemplet = DB::table('user_assign_templet')->insert($userAssignTemplate);					
						}
					}
				}
				
				
				$floor_unit= DB::table('floor_unit')->where('id','=',$formData['unit_id'])->first();
				$bookingDetails['project_id']            = isset($floor_unit->project_id)?$floor_unit->project_id:0;
				$bookingDetails['block_id']            = isset($floor_unit->block_id)?$floor_unit->block_id:0;
				$bookingDetails['user_id'] = $getUserID;
				$bookingDetails['unit_id'] = $formData['unit_id'];
				$bookingDetails['booking_status'] = 2;
				$bookingDetails['payment_plan_id']  = $formData['payment_plan_id'];
				$bookingDetails['created_at'] = date('Y-m-d');
				$bookingDetails['created_by'] = 0;
				$getBookingId = DB::table('booking')->insertGetId($bookingDetails);
				
				
				if(isset($getBookingId)){
					$getplanComponents = PlanComponent::where('payment_plan_id', '=', $formData['payment_plan_id'])->get();
					$count = count($getplanComponents);
					
					foreach($getplanComponents as $key => $planComponent){
						// For Amount...
						if($planComponent->component_type == 1){
							$percentage = $planComponent->component_value ;
							$total_unit_cost = $getUnitDetails->total_unit_cost;
							$total_unit_cost =  (int)preg_replace('#[^0-9]+#', '', $total_unit_cost);
							$calculated_value = ($total_unit_cost * $percentage)/100;
						}
						else{
							$calculated_value = $planComponent->component_value ;
						}
						
						$user_plan_component['booking_id']        = $getBookingId;
						$user_plan_component['payment_plan_id']   = $formData['payment_plan_id'];
						$user_plan_component['plan_component_id'] = $planComponent->plan_component_id;
						$user_plan_component['component_name']    = $planComponent->component_name;
						$user_plan_component['calulated_value']   = $calculated_value;
						$user_plan_component['status']            = 0;
						$user_plan_component['is_active']         = 1;
						$user_plan_component['created_at']        = date('y-m-d');
						
						if($key == 0){
							
							$net_amount = $calculated_value;
							// For Due Date...
							$period_type = $planComponent->period_type;
							$period_value = $planComponent->period_value;
							
							if($period_type == 0){
								$user_plan_component['due_date'] = date("Y-m-d", strtotime("+".$period_value." month"));
							}
							if($period_type == 2){
								$user_plan_component['due_date'] = $period_value;
							}
					
							$getUserPlanComponentId = UserPlanComponent::insertGetId($user_plan_component);
						}
						else{
							$period_type = $planComponent->period_type;
							$period_value = $planComponent->period_value;
							
							if($period_type == 0){
								$user_plan_component['due_date'] = date("Y-m-d", strtotime("+".$period_value." month"));
							}
							if($period_type == 1){
								$userPlanComponent = UserPlanComponent::where('booking_id', '=', $getBookingId)->get();
								$countUserPlanComponent = count($userPlanComponent);
								$index = $countUserPlanComponent - 1;
								$last_due_date = $userPlanComponent[$index ]['due_date'];
								$user_plan_component['due_date'] = date("Y-m-d", strtotime("$last_due_date +".$period_value." month"));
							}
							if($period_type == 2){
								$user_plan_component['due_date'] = $period_value;
							}
							 
							$insertUserPlanComponent = UserPlanComponent::insert($user_plan_component);
						}
						
					}
					if(isset($getUserPlanComponentId)){
						$payment_details['booking_id']             = $getBookingId;
						$payment_details['user_plan_component_id'] = $getUserPlanComponentId;
						$payment_details['net_amount']             = $net_amount;
						$payment_details['txnid']                  = uniqid();
						$payment_details['payment_type']           = 1;
						$payment_details['payment_status']         = 1;
						$payment_details['is_active']              = 1;
						$payment_details['created_at']             = date('y-m-d h:i:s');
						
						$insertPaymentDetails = PaymentDetails::insert($payment_details);
						if(isset($insertPaymentDetails)){
							$updateUserPlanComponent = UserPlanComponent::where('user_plan_component_id', '=', $getUserPlanComponentId)->update(['status' => 1, 'updated_at' => date('y-m-d')]);
							$updateFloorUnit = FloorUnit::where('id', '=', $formData['unit_id'])->update(['booking_status' => 2, 'updated_at' => date('y-m-d h:i:s')]);
							if (Auth::attempt(['email' => $formData['email'], 'password' =>$formData['password'],'confirmed' => 1]))
							{
								return redirect()->intended('/profile');
							}
							else{
								\Session::flash('success-msg', 'Invalid Credentials');
								return redirect('/login');

							}
						}
					}
				}	
			}
		}
		else{
			return redirect()->back()->with('errors', $validator->errors());
		}
	}


	
}
