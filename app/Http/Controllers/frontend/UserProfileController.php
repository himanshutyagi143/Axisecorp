<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use view;
use Validator;
use App\User;
use Auth;
use DB;
use PDF;
use Mail;
use App\Models\UserKyc;
use App\Models\PaymentDetails;
use App\Models\PaymentPlan;
use App\Models\PlanComponent;
use App\Models\UserPlanComponent;
class UserProfileController extends Controller
{
	
	
 public function accountDetails()
      {
		 $user_id= Auth::user()->id;
		 $property_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','DESC')
						   ->get();
        return view('frontend.profile.accountdetails',['property_unit' =>$property_unit]);
      }
  public function accountDetailunit(Request $request)
       {
		 
		 $property_detail_unit = $request->input('unit_id');		  
		 $user_id= Auth::user()->id;
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',$user_id)
						   ->where('unit_details.unit_id','=',$property_detail_unit)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->first();	 
         if(isset($property_detail_unit->charge_id))
		  {			 
		 $charge_id= $property_detail_unit->charge_id;
		 if($charge_id) {			  
			  $charges=DB::table('charge_component')
			           ->where('charge_id','=',$charge_id)
                       ->where('is_active','=','1')->get();   }
          else{ $charges='';}
		  
		 $unit_id= $property_detail_unit->unit_id;
		 $unitbooking_id=DB::table('booking')->select('booking_id')
		                 ->where('unit_id','=',$unit_id)
						 ->where('booking_status','=','2')
						 ->first();
		  if($unitbooking_id) {
              $booking_id=$unitbooking_id->booking_id;			  
			  $paid_payment=DB::table('user_plan_component')
			                ->where('booking_id','=',$booking_id)
							->where('status','=','1')
							->sum('calulated_value');
                
			  $due_payment=DB::table('user_plan_component')
			                ->where('booking_id','=',$booking_id)
							->where('status','=','0')
							->sum('calulated_value');			
			  }
			   else{ $paid_payment='';$due_payment='';}
		  }else{
			  $charges='';$paid_payment='';$due_payment='';
	        }	   
		
	   return response()->json(['message'=>'success','property_detail_unit' => $property_detail_unit,'charges'=>$charges,'countcharge'=>count($charges),'paid_payment'=>$paid_payment,'due_payment'=>$due_payment]);	
    }
	 		
	public function propertyDetailsunit(Request $request)
     {
	      $property_detail_unit = $request->input('unit_id');
		  $user_id= Auth::user()->id;
	      $bookingDetails = DB::table('booking')
		                    ->where('user_id', '=', $user_id)
		                    ->where('unit_id','=',$property_detail_unit)
							->where('unit_id','=',$property_detail_unit)
							->first();						
          $booking_id = isset($bookingDetails->booking_id)?$bookingDetails->booking_id:0;
		  $property_detail=DB::table('unit_details')
		                 ->join('booking','booking.unit_id','=','unit_details.unit_id')
						 ->join('project_blocks','project_blocks.block_id','=','unit_details.block_id')
			             ->where('booking.booking_id','=',$booking_id)
			             ->orderBy('unit_details.unit_id','ASC')
						 ->first(); 
          $userplan_detail= DB::table('user_plan_component')
		                   ->join('payment_plan','payment_plan.payment_plan_id','=','user_plan_component.payment_plan_id')
		                   ->where('user_plan_component.booking_id','=',$booking_id)
						   ->orderBy('payment_plan.payment_plan_id','ASC')
						   ->first(); 
	      return response()->json(['message'=>'success','property_detail' => $property_detail,'property_detail_unit' => $property_detail_unit,'userplan_detail' => $userplan_detail]);		
     }
	
     public function propertyDetails()
     {
		
		 $user_id= Auth::user()->id;
		 $bookingDetails = DB::table('booking')
		                   ->where('user_id', '=', $user_id)
						   ->where('booking_status','=','2')
						   ->first();
						//echo isset($bookingDetails->booking_id)?$bookingDetails->booking_id:0; die;
         $booking_id = isset($bookingDetails->booking_id)?$bookingDetails->booking_id:0;
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','DESC')
						   ->get();	
		 $property_detail=DB::table('unit_details')
		                 ->join('booking','booking.unit_id','=','unit_details.unit_id')
						 ->join('project_blocks','project_blocks.block_id','=','unit_details.block_id')
			             ->where('booking.booking_id','=',$booking_id)
			             ->orderBy('unit_details.unit_id','ASC')
						 ->first(); 
					//echo $property_detail->id;die; 
         $userplan_detail= DB::table('user_plan_component')
		                   ->join('payment_plan','payment_plan.payment_plan_id','=','user_plan_component.payment_plan_id')
		                   ->where('user_plan_component.booking_id','=',$booking_id)
						   ->orderBy('payment_plan.payment_plan_id','ASC')
						   ->first(); 
						  // print_r($userplan_detail);exit();
        return view('frontend.profile.propertydetails',['property_detail' => $property_detail,'property_detail_unit' => $property_detail_unit,'userplan_detail' => $userplan_detail]);
    }
	  public function statement()
       {
		 $user_id= Auth::user()->id;
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();	
        return view('frontend.profile.statement',['property_detail_unit' => $property_detail_unit]);
       }
		  public function userOnlinepayment()
         {
		 $user_id= Auth::user()->id;
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();	
         return view('frontend.profile.onlinepayment',['property_detail_unit' => $property_detail_unit]);
         }
		
		 public function demandletters()
       {
		 $user_id= Auth::user()->id;
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();	
         return view('frontend.profile.demandletters',['property_detail_unit' => $property_detail_unit]);
        }
	 
	 
	 
	  public function updatecontact()
      {
		 $user_id= Auth::user()->id;
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();
         return view('frontend.profile.updatenumber',['property_detail_unit' => $property_detail_unit]);
      }
	  public function updatecontactemail(Request $request)
        {
		  $userid = $request->input('userid_user'); 
		  $typevalue =$request->input('typevalue');
		  $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();
		  if($typevalue=='1')
		    {
			  $emailmobile = $request->input('email');
			  $validator = Validator::make($request->all(), [
              'email' => 'required|email|unique:users,email,'.$userid
				]);

				if ($validator->fails()) {
					return redirect('/user/updatecontact')
						->withErrors($validator)
						->withInput();
				}
			 	$useremailupdate =User::where('id',$userid)->update(['email' =>$emailmobile]);		 
			    $subject= 'Verify email';		   
                $Code='Succesfully updated';				 
			    $data=['code'=>$Code];           		
		        $mail= Mail::send('emails.useremailchange', ['data' => $data], function ($m) use ($emailmobile,$subject) {
                $m->from('no-reply@stagingrelease.com', 'Email Updated Succesfully');
                $m->to($emailmobile)->subject($subject);
               });
              \Session::flash('success-msg-registered', 'Updated Successfully.');
               return back()->with(['property_detail_unit' => $property_detail_unit]);
		   		  
			}
	      else
		    {
			  $mobile = $request->input('mobile'); 
			  $validator = Validator::make($request->all(),[
			   'mobile'=> 'required|digits:10'
			    ]);
			    if($validator->fails()) {
					return redirect('/user/updatecontact')
						->withErrors($validator)
						->withInput();
				} 
			  $userphoneupdate =DB::table('user_details')
			                   ->where('user_id',$userid)
							   ->where('applicant_type','1')
							   ->update(['mobile_number' =>$mobile]);
						
			   \Session::flash('success-msg-registered', 'Updated Successfully.');
				return back()->with(['property_detail_unit' => $property_detail_unit]);
             //  return view('frontend.profile.updatenumber',['property_detail_unit' => $property_detail_unit]); 
              		  
			}
        }
   
    public function emailverification(Request $request)
      {
		  $userid = $request->input('userid'); 
		  $typevalue =$request->input('type');
		  $emailmobile = $request->input('email');		  
		        $subject= 'Verify email';		   
                $Code=mt_rand(1000000, 9999999);				 
			    $data=['code'=>$Code];           		
		        $mail= Mail::send('emails.useremailchange', ['data' => $data], function ($m) use ($emailmobile,$subject) {
                $m->from('no-reply@stagingrelease.com', 'Email Update Verification');
                $m->to($emailmobile)->subject($subject);
		    });
		  return response()->json(['message'=>'success','code'=>$Code,'email'=>$emailmobile]);
      }  
	 public function upcomingappointment()
      {
		 $user_id= Auth::user()->id;
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();	
         return view('frontend.profile.upcomingappointment',['property_detail_unit' => $property_detail_unit]);
    }
	 
	 
	   public function registryprocess()
    {
		 $user_id= Auth::user()->id;
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();	
         return view('frontend.profile.registryprocess',['property_detail_unit' => $property_detail_unit]);
    }
	 
	 
	 public function Raiseaquery()
      {
         return view('frontend.profile.raiseaquery');
      }
	  
	 public function mailuserquery(Request $request)
	   {
		  // $propertyunit = $request->input('propertyunit');
		   $querytype = $request->input('querytype'); 
		   $message = $request->input('message'); 
           $useremail=$request->input('useremail'); 
           $user_id= Auth::user()->id;	
		   $user_fname=Auth::user()->first_name;
		   $user_lname=Auth::user()->last_name;
           $subject= $querytype;		   
           $datetime=date("Y-m-d");			   
		   $data=[/* 'propertyunit'=>$propertyunit, */'querytype'=>$querytype,'message'=>$message,'useremail'=>$useremail,'user_fname'=>$user_fname,'user_lname'=>$user_lname]; 
		   $user ='no-reply@stagingrelease.com';            		
		    $mail= Mail::send('emails.userquery', ['data' => $data], function ($m) use ($user,$subject) {
             $m->from('no-reply@stagingrelease.com', 'Customer Raised a Query!');
             $m->to($user)->subject($subject);
           });
   
		    if($mail){
					//Inserting Email details into send_email table...
					$emailData['send_to']   = "no-reply@stagingrelease.com";
					$emailData['send_by']   = $useremail;
					$emailData['subject']   = $subject;
					$emailData['body']      = view('emails.userquery', ['data' => $data])->render();
					$emailData['send_date'] = date('Y-m-d');
					$insertEmailDetails = DB::table('send_mail')->insert($emailData);
					//print_r($emailData); die;
					\Session::flash('success-msg-registered', 'Your Query is Successfully Submited.');
					return redirect()->back();
				}
				else{
					\Session::flash('success-msg-registered', 'Email not sent.');
					return redirect()->back();
				}
		   
       \Session::flash('success-msg-registered', 'Your Query is Successfully Submited.');
        return redirect()->back();	   
	   }	
	   
	 public function Paymentschedule()
       {   
	       
		   $property_detail=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();
						   
						   
			
           $user_id= Auth::user()->id;	
  		   $bookingDetails = DB::table('booking')->where('user_id', '=', $user_id)->first();
           $booking_id = isset($bookingDetails->booking_id)?$bookingDetails->booking_id:0;
		   		   
		   $payment_plan=DB::table('user_plan_component')
		                 ->join('booking','booking.booking_id','=','user_plan_component.booking_id')
			             ->where('booking.user_id','=',Auth::user()->id)
			             ->orderBy('user_plan_component.user_plan_component_id','ASC')
						 ->get(); 
						 
						 
		   $payment_detail=DB::table('payment_details')
		                 ->join('booking','booking.booking_id','=','payment_details.booking_id')
			             ->where('payment_details.booking_id','=',$booking_id)
			             ->orderBy('payment_details.payment_details_id','ASC')
						 ->get();  
        
			$customer_details = DB::table('users')->leftjoin('customer_details', 'customer_details.user_id','=','users.id')->where('customer_details.applicant_type','=', 1)->where('users.id','=',$user_id)->first();
			
         return view('frontend.profile.paymentschedule',['property_detail' => $property_detail,'customer_details'=>$customer_details]);
     }
	
    public function userConstruction()
    {
		 $user_id= Auth::user()->id;
		 $property_detail_unit=DB::table('unit_details')
		                   ->join('booking','booking.unit_id','=','unit_details.unit_id')
						   ->where('booking.user_id','=',Auth::user()->id)
			               ->orderBy('unit_details.unit_id','ASC')
						   ->get();
        return view('frontend.profile.construction',['property_detail_unit' => $property_detail_unit]);
    }
	
	public function deletedoc($id) 
      { 
		$imagelist=UserKyc::where("media_id","=",$id)->delete();
	    return Response()->json(["data" => 'success']);	
     }
	 
	   
    public function generateInvoice($id)
       {
		  $user_id= Auth::user()->id;
          		  
  		  $bookingDetails = DB::table('booking')->where('user_id', '=', $user_id)->first();
          $booking_id = $bookingDetails->booking_id;
		  $userDetails = DB::table('users')
		  ->join('user_details','user_details.user_id','=','users.id')
		  ->join('user_address_details','user_address_details.user_id','=','users.id')
		  ->where('user_details.applicant_type',1)->where('user_address_details.address_type_id',1)->where('users.id',$user_id)->select('users.email','user_details.first_name','user_details.last_name','user_details.mobile_number','user_address_details.*')->first();

		  
		
		  
		  $company_detail_check=DB::table('booking')
		                 ->join('assign_project','assign_project.user_id','=','booking.created_by')
						 ->join('company','company.company_id','=','assign_project.company_id')
						  ->join('company_type','company_type.company_type_id','=','assign_project.company_type_id')
			             ->where('booking.booking_id','=',$booking_id)
			             ->orderBy('company.company_id','ASC')
						 ->first(); 
				
		   if (Empty($company_detail_check)) {
			   
					 $company_detail= DB::table('assign_project')
		                 ->join('company','company.company_id','=','assign_project.company_id')
						 ->join('company_type','company_type.company_type_id','=','assign_project.company_type_id')
		                 ->where('assign_project.role_id','2')
						 ->where('assign_project.company_id','1')
			             ->orderBy('company.company_type_id','ASC')
						 ->first();
		          }	
          else{
			    $company_detail=$company_detail_check;
		  }	  
				 
		  $property_detail=DB::table('unit_details')
		                 ->join('booking','booking.unit_id','=','unit_details.unit_id')
						 ->join('project_blocks','project_blocks.block_id','=','unit_details.block_id')
			             ->where('booking.booking_id','=',$booking_id)
			             ->orderBy('unit_details.unit_id','ASC')
						 ->first();
         $userplan_detail= DB::table('user_plan_component')
		                   ->join('payment_plan','payment_plan.payment_plan_id','=','user_plan_component.payment_plan_id')
		                   ->where('user_plan_component.booking_id','=',$booking_id)
						   ->orderBy('payment_plan.payment_plan_id','ASC')
						   ->first(); 		  
	
		  		   
	   $data=DB::table('payment_details')->where('txnid', '=', $id)->first();
	  $duplicate = '';
	 if(!empty($data))
	   { 
		if($data->count > 0){
			$duplicate = 1;
		}
		}
		
		if($data->is_download==1)
		{
			if($data->count>=$data->is_download){
				return back()->with('success', 'Your are already downloaded.');
			}
		}
		elseif($data->is_download==2)
		{
			 return back()->with('success', ' Download not allowed.');
		}
		
		
		$user_assign_templet=array();
		$user_assign_templet['count'] = $data->count + 1;
		$user_assign_templet['generate']=1;
		$update_user_assign_templet = DB::table('payment_details')->where('txnid', '=',$id)->update($user_assign_templet);
	  
	   $pdf = PDF::loadView('invoice.invoice',['property_detail'=>$property_detail,'data'=>$data,'userplan_detail'=>$userplan_detail,'userDetails'=>$userDetails,'company_detail'=>$company_detail,'duplicate'=>$duplicate]);
        return $pdf->download('Document.pdf');
	  
      //return view('invoice.orders', ['data' => $data,"arr"=>$arr,'file_name'=>$file_name]);
     
    }
	 
	   
    public function create()
    {
         return view('frontend.profile.unit_booked');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) 
      {
		 
      //$resp = Url::destroy($id);
     // return Response::json($resp);
     }
	public function getCurrentInstallment($unit_id){
     	
		
		$getpaymentschedule = UserPlanComponent::leftjoin('booking', 'booking.booking_id','=','user_plan_component.booking_id')->where('booking.unit_id','=',$unit_id)->where('booking.user_id','=',Auth::user()->id)->select('user_plan_component.*')->get();
		
		foreach($getpaymentschedule as $a){
			if(isset($a->due_date)){
				$a->due_date = date('d/m/Y', strtotime($a->due_date));
			}
		}
		
		
		
		$getpaymentdetails = DB::table('payment_details')->leftjoin('booking', 'booking.booking_id','=','payment_details.booking_id')->where('booking.unit_id','=',$unit_id)->where('booking.user_id','=',Auth::user()->id)->select('payment_details.*')->get();
		
		foreach($getpaymentdetails as $a){
			$a->created_at = date('d/m/Y', strtotime($a->created_at));
		}
		
		
     	return response([ 'getpaymentdetails'=> $getpaymentdetails, 'getpaymentschedule' => $getpaymentschedule]);
     }  
 
}
