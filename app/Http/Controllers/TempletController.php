<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Hash;
use PDF;
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
class TempletController extends Controller
{
	
   
     public function createtemplet(){
	
        return view('templet.create_templet');
        
    }
    public function store(Request $request)
    { 
		
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $name = Input::get('name');
        $type = (int)Input::get('type');
		$description = Input::get('description');		
        
		 $id=DB::table('templets')->insertGetId(
		['templet_name' => $name,'description' => $description,"type"=>$type]
		);
		DB::table('history_templets')->insertGetId(
		['templet_id'=>$id,'templet_name' => $name,'description' => $description,"type"=>$type]
		);
		
       \Session::flash('success-msg-registered', 'Successfully Added.');

        return redirect('/administrator/templets');

    }

   

    public function show()
    {
			
		  $clients = DB::table('templets')->where('status', 1)->orderBy('templet_id','desc')->select('templet_id','templet_name','type','status')->get();
		  return view('templet.templets', ['clients' => $clients]);
					  
				 
    }

    public function edit($id)
    {
        $document_type = DB::table('kyc_type')->get();
        $clients = DB::table('templets')->where('templet_id', $id)->first();
        return view('templet.edit_templet', ['client' => $clients]);
       

    }

    public function update($id,Request $request)
    {    $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $name = Input::get('name');
        $type = (int)Input::get('type');
		$description = Input::get('description');	
		
		DB::table('templets')->where('templet_id', $id)->update(
			['templet_name' => $name,'description' => $description,"type"=>$type ]
		);
		
		DB::table('history_templets')->insertGetId(
		['templet_id'=>$id,'templet_name' => $name,'description' => $description,"type"=>$type]
		);

		\Session::flash('success-msg', 'Successfully Edited');
		return redirect()->back();
    }

    public function delete($id)
    {
       DB::table('templets')->where('templet_id', '=', $id)->update(['status' => 0]);
       DB::table('history_templets')->where('templet_id', '=',$id)->update(['status' => 0]);
      \Session::flash('success_msg', 'Successfully Deleted');
        return redirect()->back();
    }
	
	/*public function templetsdetails($id)
    {
       $data=DB::table('templets')->where('templet_id', '=', $id)->first();
	   
	   If(!empty($data))
	   {   $arr=$data->description;
		   $arr=str_replace("{first_name}","..........",$arr);
		   $arr= str_replace("{last_name}","..........",$arr);
		   $arr=str_replace("{dob}",'..........',$arr);
		   $arr= str_replace("{profile_image}",'..........',$arr);
		   $arr=str_replace("{age}",'...........',$arr);
		   $arr=str_replace("{company_name}",'...........',$arr);
		   $arr=str_replace("{blank_space6}",'............',$arr);
		   $arr= str_replace("{blank_space7}",'...........',$arr);
		   $arr= str_replace("{blank_space8}",'...........',$arr);
		   $arr= str_replace("{blank_space9}",'...........',$arr);
		   $arr= str_replace("{blank_space10}",'...........',$arr);
		   //$this->templet_str_replace();
		   $data->description=$arr;
		   
		$file_name='pdf/'.time();
	    $html= view('pdfdoc.previewcertificate', ['dowload_option'=>'No','template_id'=>1,'certificate_title'=>'title','bg_img_mode'=>'','template_bg_image'=>'','certificate_content'=>$arr,'baseUrl'=>'','file_name'=>$file_name]);
	   
	  echo $html; 
       return view('frontend.templetdetails', ['data' => $data,"arr"=>$arr,'file_name'=>$file_name]);
	  }
	  return view('frontend.templetdetails', ['data' =>array(),"arr"=>array(),'file_name'=>'']);
    }*/
	public function changetempcontent($data1,$id=0)
    {       
	   If(!empty($data1))
	   {  

          if($id==0)
		  {
			  $id=Auth::user()->id;
		  }
		 
      $data = DB::table('users')->leftjoin('customer_details',function($on)
		{
			$on->on('customer_details.user_id','=','users.id')->where('customer_details.applicant_type','=',1);
		})
	  ->leftjoin('booking','booking.user_id','=','users.id')
	  ->leftjoin('unit_details', 'booking.unit_id', '=', 'unit_details.unit_id')
	  ->leftjoin('project_blocks', 'project_blocks.block_id', '=', 'unit_details.block_id')
	  ->where('users.id', '=',$id)
	  ->groupby('users.id')
	  ->select('users.email','customer_details.first_name','customer_details.last_name','unit_details.unit_name','unit_details.floor_id','project_blocks.block_name','unit_details.super_area','booking.created_at','unit_details.carpet_area','unit_details.basic_sale_price','unit_details.total_unit_cost','unit_details.unit_id','booking.booking_id','unit_details.charge_id','customer_details.landline_number','customer_details.father_husband_name','customer_details.dob','customer_details.father_husband_mobile','customer_details.if_foreigner','customer_details.spouse_name','customer_details.country_name','customer_details.maritual_status','customer_details.poa_holder_name' ,'customer_details.organisation_name' ,'customer_details.organisation_designation' ,'customer_details.organisation_type' ,'customer_details.organisation_phone_number' ,'customer_details.organisation_extention','customer_details.user_image')
	  ->first();

	  $kyc_details=DB::table('users')
	  ->join('customer_kyc','customer_kyc.user_id','=','users.id')->where('customer_kyc.applicant_type',1)->where('user_id',$id)->select('customer_kyc.*')->get();
	  $pancard_number_kyc='...............';
	  $adhar_number_kyc='................';
	  $voter_id_kyc='......................';
	  $passport_number_kyc='..............';	  
	  if(!empty($kyc_details))
	  {
		  foreach($kyc_details as $kyc_details)
		  {
			  if($kyc_details->kyc_type_id==1)
			  {
			  	 $pancard_number_kyc=$kyc_details->pan_number;
				 
			  }
			  if($kyc_details->kyc_type_id==2)
			  {
			  	 $adhar_number_kyc=$kyc_details->adhar_number;


			  }
			  if($kyc_details->kyc_type_id==3)
			  {
			  	 $voter_id_kyc=$kyc_details->voter_id;

			  }
			  if($kyc_details->kyc_type_id==4)
			  {
			  	 $passport_number_kyc=$kyc_details->passport_number.', Expiry:'.$kyc_details->passport_expiry.', Issue By:'.$kyc_details->passport_issue;
				 
			  }
		  }
	  }	  
	 
	 /* 
		7. first_applicant_signature
		 */


	  $corresspondense_address='..............';
	  $permanent_address='..............';
	  $organization_address_corress='..............';
	  $organization_address_permanent='..............';
	     
	  $address=DB::table('customer_address_details')->where('applicant_type','=',1)->where('user_id','=',$id)->get();
	  if(!empty($address))
	  {
		  foreach($address as $addre)
		  {
			  if($addre->address_type_id==1)
			  {
				 $corresspondense_address=$addre->address_line.", ".$addre->city.", ".$addre->state.", ".$addre->pin_code;
			  }
			  if($addre->address_type_id==2)
			  {
				  $permanent_address=$addre->address_line.", ".$addre->city.", ".$addre->state.", ".$addre->pin_code;
			  }
			  if($addre->address_type_id==3)
			  {
				  $organization_address_corress=$addre->address_line.", ".$addre->city.", ".$addre->state.", ".$addre->pin_code;
			  }
			  if($addre->address_type_id==4)
			  {
				  $organization_address_permanent=$addre->address_line.", ".$addre->city.", ".$addre->state.", ".$addre->pin_code;
			  }
		  }
	  }
	  
	 
	  
	  
	  $mobile_number=$data->mobile_number?? ".............";
	  $landline_number=$data->landline_number?? ".............";
	  $father_husband_name=$data->father_husband_name?? ".............";
	  $dob=$data->dob?date('d/m/Y',strtotime($data->dob)):'...........';
	  $pancard_number=$data->pancard_number?? ".............";
	  $father_husband_mobile=$data->father_husband_mobile?? ".............";
	  $if_foreigner=$data->if_foreigner?? ".............";
	  $spouse_name=$data->spouse_name?? ".............";
	  $foreigner_citizenship=$data->country_name?? ".............";
	  $maritual_status=$data->maritual_status?? ".............";
	  
	  
	       
	  
	   
	   $poa_holder_name=$data->poa_holder_name?? ".............";
	   $organisation_name=$data->organisation_name?? ".............";
	   $organisation_designation=$data->organisation_designation?? ".............";
	   $organisation_type=$data->organisation_type?? ".............";
	   $organisation_phone_number=$data->organisation_phone_number?? ".............";
	   $organisation_extention=$data->organisation_extention?? ".............";
	  
	  
	  $user_image =isset($data->user_image)?ltrim($data->user_image, '/'):'..............'; 
	 // $user_image ='http://axisecorp.stagingrelease.com/fronted/images/blueaxis_logo.png'; 
	   
	 // 'http://'.$_SERVER['HTTP_HOST'].
	  
	  
	 
	  
	  

		$email=$data->email?? ".............";
		$first_name=$data->first_name?? ".............";
		$last_name=$data->last_name?? ".............";
		$booked_unit_no=$data->unit_name?? ".............";
		$booked_floor_no=$data->floor_id?? ".............";
		$booked_tower_no=$data->block_name?? ".............";
		$carpet_area=$data->carpet_area?? ".............";
		$super_area=$data->super_area?? ".............";
		$registration_no=$id?? ".............";
		$booking_date=$data->created_at?date('d/m/Y',strtotime($data->created_at)):'...........';
		$bulding_area= ".............";
		
	   $unit_basic_price=isset($data->basic_sale_price)?$data->basic_sale_price: ".............";
	   $unit_basic_price_word=isset($data->basic_sale_price)?$this->amount_text($data->basic_sale_price): ".............";
	   $total_unit_price=isset($data->total_unit_cost)?$data->total_unit_cost: "................";
	   $total_unit_price_word=isset($data->total_unit_cost)?$this->amount_text($data->total_unit_cost): ".............";
		
	   $unit_id=isset($data->unit_id)?$data->unit_id:0;
	   $booking_id=isset($data->booking_id)?$data->booking_id:0;
	   $charge_id=isset($data->charge_id)?$data->charge_id:0;
      
	        
	   $arr=$data1;
	   $arr=str_replace("{first_name}",$first_name,$arr);
	   $arr=str_replace("{user_image}",$user_image,$arr);
	   $arr= str_replace("{last_name}",$last_name,$arr);
	   $arr= str_replace("{booked_unit_no}",$booked_unit_no,$arr);
	   $arr= str_replace("{booked_floor_no}",$booked_floor_no,$arr);
	   $arr= str_replace("{booked_tower_no}",$booked_tower_no,$arr);
	   $arr= str_replace("{carpet_area}",$carpet_area,$arr);
	   $arr= str_replace("{registration_no}",$registration_no,$arr);
	   $arr= str_replace("{booking_date}",$booking_date??'..........',$arr);
	   $arr= str_replace("{bulding_area}",$bulding_area,$arr);
	   $arr= str_replace("{super_area}",$super_area,$arr);
	   $arr= str_replace("{current_date}",date('d/m/Y',time()),$arr);
	   $arr= str_replace("{unit_basic_price}",$unit_basic_price,$arr);
	   $arr= str_replace("{unit_basic_price_word}",$unit_basic_price_word,$arr);
	   $arr= str_replace("{total_unit_price}",$total_unit_price,$arr);
	   $arr= str_replace("{total_unit_price_word}",$total_unit_price_word,$arr);
	   
	   //kyc_details_start of first applicant
	   $arr=str_replace("{pancard_number_kyc}",$pancard_number_kyc,$arr);
	   $arr=str_replace("{adhar_number_kyc}",$adhar_number_kyc,$arr);
	   $arr= str_replace("{voter_id_kyc}",$voter_id_kyc,$arr);
	   $arr= str_replace("{passport_number_kyc}",$passport_number_kyc,$arr);
	   //kyc detail end
	    $arr= str_replace("{email}",$email,$arr);
	    $arr= str_replace("{mobile_number}",$mobile_number,$arr);
	    $arr= str_replace("{landline_number}",$landline_number,$arr);
	    $arr= str_replace("{father_husband_name}",$father_husband_name,$arr);
	    $arr= str_replace("{dob}",$dob,$arr);
	    $arr= str_replace("{pancard_number}",$pancard_number,$arr);
	    $arr= str_replace("{father_husband_mobile}",$father_husband_mobile,$arr);
	    $arr= str_replace("{if_foreigner}",$if_foreigner,$arr);
	    $arr= str_replace("{spouse_name}",$spouse_name,$arr);
	    $arr= str_replace("{foreigner_citizenship}",$foreigner_citizenship,$arr);
	    $arr= str_replace("{maritual_status}",$maritual_status,$arr);
	   
	    $arr= str_replace("{poa_holder_name}",$poa_holder_name,$arr);
	    $arr= str_replace("{organisation_name}",$organisation_name,$arr);
	    $arr= str_replace("{organisation_designation}",$organisation_designation,$arr);
	    $arr= str_replace("{organisation_type}",$organisation_type,$arr);
	    $arr= str_replace("{organisation_phone_number}",$organisation_phone_number,$arr);
	    $arr= str_replace("{organisation_extention}",$organisation_extention,$arr);
	         
	   
	   
	   
	   
	  $arr= str_replace("{user_corresspondense_address}",$corresspondense_address,$arr);
	  $arr= str_replace("{user_permanent_address}",$permanent_address,$arr);
	  $arr= str_replace("{organization_address_corress}",$organization_address_corress,$arr);
	  $arr= str_replace("{organization_address_permanent}",$permanent_address,$arr);
	   
	 
	   
	   
	   
	   $data = DB::table('unit_details')
	  ->join('charge_component', 'charge_component.charge_id', '=','unit_details.charge_id')
	   ->where('unit_details.charge_id','=',$charge_id)
	   ->where('unit_details.unit_id','=',$unit_id)
	   ->orderby('charge_component_id')
	  ->select('charge_component_price')
	  ->get();
	  // echo "<pre>"; print_r($data); exit;charge_component_price
	   
	   $one_month_maintenance=isset($data[0])?$data[0]->charge_component_price:'...............';
	   $one_month_maintenance_word=isset($data[0]->charge_component_price)?$this->amount_text($data[0]->charge_component_price): "...........";
	    $association_formation_charges=isset($data[1]->charge_component_price)?$data[1]->charge_component_price: '........';
	   $association_formation_charges_word=isset($data[1]->charge_component_price)?$this->amount_text($data[1]->charge_component_price):"...........";
	    $IFMS=isset($data[2]->charge_component_price)?$data[2]->charge_component_price: '...............';
	   $IFMS_word=isset($data[2]->charge_component_price)?$this->amount_text($data[2]->charge_component_price):"...........";
	   
	   $arr= str_replace("{one_month_maintenance}",$one_month_maintenance,$arr);
	   $arr= str_replace("{one_month_maintenance_word}",$one_month_maintenance_word,$arr);
	   $arr= str_replace("{association_formation_charges}",$association_formation_charges,$arr);
	   $arr= str_replace("{association_formation_charges_word}",$association_formation_charges_word,$arr);
	   $arr= str_replace("{IFMS}",$IFMS,$arr);
	   $arr= str_replace("{IFMS_word}",$IFMS_word,$arr);
	   
	   
	   $data = DB::table('user_plan_component')
	  ->where('user_plan_component.booking_id','=',$booking_id)
	  ->orderby('user_plan_component_id')
	  ->select('calulated_value')
	  ->get();
	
	   
	   $first_payment=isset($data[0]->calulated_value)?$data[0]->calulated_value:'............';
	   $first_payment_word=isset($data[0]->calulated_value)?$this->amount_text($data[0]->calulated_value):'............';
	   $other_remain_payment=0;
	   for($i=1;$i<count($data);$i++)
	   {
		  $other_remain_payment=(ISSET($data[$i]->calulated_value)?$data[$i]->calulated_value:0)+$other_remain_payment;
	   }
		 $other_remain_payment_word=$this->amount_text($other_remain_payment);
		  
		  
		  
	   $arr= str_replace("{first_payment}",$first_payment,$arr);
	   $arr= str_replace("{first_payment_word}",$first_payment_word,$arr);
	   $arr= str_replace("{other_remain_payment}",$other_remain_payment,$arr);
	   $arr= str_replace("{other_remain_payment_word}",$other_remain_payment_word??'............',$arr);
		  
		  
		  
		  
		  
		   $data = DB::table('users')->leftjoin('customer_details',function($on)
		{
			$on->on('customer_details.user_id','=','users.id')->where('customer_details.applicant_type','=',2);
		})
	  ->leftjoin('booking','booking.user_id','=','users.id')
	  ->leftjoin('unit_details', 'booking.unit_id', '=', 'unit_details.unit_id')
	  ->leftjoin('project_blocks', 'project_blocks.block_id', '=', 'unit_details.block_id')
	  ->where('users.id', '=',$id)
	  ->groupby('users.id')
	  ->select('users.email','customer_details.first_name','customer_details.last_name','customer_details.landline_number','customer_details.father_husband_name','customer_details.dob','customer_details.father_husband_mobile','customer_details.if_foreigner','customer_details.spouse_name','customer_details.country_name','customer_details.maritual_status','customer_details.poa_holder_name' ,'customer_details.organisation_name' ,'customer_details.organisation_designation' ,'customer_details.organisation_type' ,'customer_details.organisation_phone_number' ,'customer_details.organisation_extention','customer_details.user_image')
	  ->first();

	  	  $kyc_details=DB::table('users')
	  ->join('customer_kyc','customer_kyc.user_id','=','users.id')->where('customer_kyc.applicant_type',2)->where('user_id',$id)->select('customer_kyc.*')->get();
	  $pancard_number_kyc='...........';
	  $adhar_number_kyc='.............';
	  $voter_id_kyc='.................';
	  $passport_number_kyc='..........';
	  if(!empty($kyc_details))
	  {
		  foreach($kyc_details as $kyc_details)
		  {
			  if($kyc_details->kyc_type_id==1)
			  {
			  	 $pancard_number_kyc=$kyc_details->pan_number;
				 
			  }
			  if($kyc_details->kyc_type_id==2)
			  {
			  	 $adhar_number_kyc=$kyc_details->adhar_number;


			  }
			  if($kyc_details->kyc_type_id==3)
			  {
			  	 $voter_id_kyc=$kyc_details->voter_id;

			  }
			  if($kyc_details->kyc_type_id==4)
			  {
			  	 $passport_number_kyc=$kyc_details->passport_number.', Expiry:'.$kyc_details->passport_expiry.', Issue By:'.$kyc_details->passport_issue;
				 
			  }
		  }
		 // echo $pancard_number_kyc.' '.$adhar_number_kyc.' '.$voter_id_kyc.' '.$passport_number_kyc;exit();
	  }	
		  
		  
		    
	  $mobile_number=$data->mobile_number?? ".............";
	  $landline_number=$data->landline_number?? ".............";
	  $father_husband_name=$data->father_husband_name?? ".............";
	  
	  
	  $dob=$data->dob?date('d/m/Y',strtotime($data->dob)):'...........';
	  $pancard_number=$data->pancard_number?? ".............";
	  $father_husband_mobile=$data->father_husband_mobile?? ".............";
	  
	  
	  $if_foreigner=$data->if_foreigner?? ".............";
	  $spouse_name=$data->spouse_name?? ".............";
	  $foreigner_citizenship=$data->country_name?? ".............";
	  $maritual_status=$data->maritual_status?? ".............";
	  
	  
	   $poa_holder_name=$data->poa_holder_name?? ".............";
	   $organisation_name=$data->organisation_name?? ".............";
	   $organisation_designation=$data->organisation_designation?? ".............";
	   //kyc_details_start of second applicant
	   $arr=str_replace("{pancard_number_kyc1}",$pancard_number_kyc,$arr);
	   $arr=str_replace("{adhar_number_kyc1}",$adhar_number_kyc,$arr);
	   $arr= str_replace("{voter_id_kyc1}",$voter_id_kyc,$arr);
	   $arr= str_replace("{passport_number_kyc1}",$passport_number_kyc,$arr);
	   //kyc detail end	of second applicant   
	   
	   $organisation_type=$data->organisation_type?? ".............";
	   $organisation_phone_number=$data->organisation_phone_number?? ".............";
	   $organisation_extention=$data->organisation_extention?? ".............";
	   
	   
	    $user_image =isset($data->user_image)?ltrim($data->user_image, '/'):'..............'; 
	    // $user_image ='http://axisecorp.stagingrelease.com/fronted/images/blueaxis_logo.png'; 
	   
	   
	    $email=$data->email?? ".............";
		$first_name=$data->first_name?? ".............";
		$last_name=$data->last_name?? ".............";
		
		
	  
      
		  
		  
	   $arr=str_replace("{first_name1}",$first_name,$arr);
	   $arr=str_replace("{user_image1}",$user_image,$arr);
	   $arr= str_replace("{last_name1}",$last_name,$arr);
	   
	   
	    $arr= str_replace("{email1}",$email,$arr);
	    $arr= str_replace("{mobile_number1}",$mobile_number,$arr);
	    $arr= str_replace("{landline_number1}",$landline_number,$arr);
		
	    $arr= str_replace("{father_husband_name1}",$father_husband_name,$arr);
	    $arr= str_replace("{dob1}",$dob,$arr);
	    $arr= str_replace("{pancard_number1}",$pancard_number,$arr);
	    $arr= str_replace("{father_husband_mobile1}",$father_husband_mobile,$arr);
		
	    $arr= str_replace("{if_foreigner1}",$if_foreigner,$arr);
	    $arr= str_replace("{spouse_name1}",$spouse_name,$arr);
	    $arr= str_replace("{foreigner_citizenship1}",$foreigner_citizenship,$arr);
		
	    $arr= str_replace("{maritual_status1}",$maritual_status,$arr);
	   
	    $arr= str_replace("{poa_holder_name1}",$poa_holder_name,$arr);
	    $arr= str_replace("{organisation_name1}",$organisation_name,$arr);
		
	    $arr= str_replace("{organisation_designation1}",$organisation_designation,$arr);
	    $arr= str_replace("{organisation_type1}",$organisation_type,$arr);
	    $arr= str_replace("{organisation_phone_number1}",$organisation_phone_number,$arr);
	    $arr= str_replace("{organisation_extention1}",$organisation_extention,$arr);
	         
	   
	  $corresspondense_address='..............';
	  $permanent_address='..............';
	  $organization_address_corress='..............';
	  $organization_address_permanent='..............';
	     
	  $address=DB::table('customer_address_details')->where('applicant_type','=',2)->where('user_id','=',$id)->get();
	  if(!empty($address))
	  {
		  foreach($address as $addre)
		  {
			  if($addre->address_type_id==1)
			  {
				 $corresspondense_address=$addre->address_line.", ".$addre->city.", ".$addre->state.", ".$addre->pin_code;
			  }
			  if($addre->address_type_id==2)
			  {
				  $permanent_address=$addre->address_line.", ".$addre->city.", ".$addre->state.", ".$addre->pin_code;
			  }
			  if($addre->address_type_id==3)
			  {
				  $organization_address_corress=$addre->address_line.", ".$addre->city.", ".$addre->state.", ".$addre->pin_code;
			  }
			  if($addre->address_type_id==4)
			  {
				  $organization_address_permanent=$addre->address_line.", ".$addre->city.", ".$addre->state.", ".$addre->pin_code;
			  }
		  }
	  }
	  
	  $arr= str_replace("{user_corresspondense_address1}",$corresspondense_address,$arr);
	  $arr= str_replace("{user_permanent_address1}",$permanent_address,$arr);
	  $arr= str_replace("{organization_address_corress1}",$organization_address_corress,$arr);
	  $arr= str_replace("{organization_address_permanent1}",$permanent_address,$arr);
	  
	  
		  
	   return $arr;
	  }
	    return $data1;
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	 
    }
	
	public  function amount_text($amount){
				   $number = $amount;
				   $no = round($number);
				   $point = round($number - $no, 2) * 100;
				   $hundred = null;
				   $digits_1 = strlen($no);
				   $i = 0;
				   $str = array();
				   $words = array('0' => '', '1' => 'one', '2' => 'two',
					'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
					'7' => 'seven', '8' => 'eight', '9' => 'nine',
					'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
					'13' => 'thirteen', '14' => 'fourteen',
					'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
					'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
					'30' => 'thirty', '40' => 'fourty', '50' => 'fifty',
					'60' => 'sixty', '70' => 'seventy',
					'80' => 'eighty', '90' => 'ninety');
				   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
				   while ($i < $digits_1) {
					 $divider = ($i == 2) ? 10 : 100;
					 $number = floor($no % $divider);
					 $no = floor($no / $divider);
					 $i += ($divider == 10) ? 1 : 2;
					 if ($number) {
						$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
						$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
						$str [] = ($number < 21) ? $words[$number] .
							" " . $digits[$counter] . $plural . " " . $hundred
							:
							$words[floor($number / 10) * 10]
							. " " . $words[$number % 10] . " "
							. $digits[$counter] . $plural . " " . $hundred;
					 } else $str[] = null;
				  }
				  $str = array_reverse($str);
				  $result = implode('', $str);
				  
				  /* $points = ($point) ?
					"." . $words[$point / 10] . " " . 
						  $words[$point = $point % 10] : '';
						echo $points; exit;   */
				  return ucfirst($result); 
	}
	
	function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        100000             => 'lakh',
        10000000          => 'crore'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . $this->convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . $this->convert_number_to_words($remainder);
            }
            break;
        case $number < 100000:
            $thousands   = ((int) ($number / 1000));
            $remainder = $number % 1000;

            $thousands = $this->convert_number_to_words($thousands);

            $string .= $thousands . ' ' . $dictionary[1000];
            if ($remainder) {
                $string .= $separator . $this->convert_number_to_words($remainder);
            }
            break;
        case $number < 10000000:
            $lakhs   = ((int) ($number / 100000));
            $remainder = $number % 100000;

            $lakhs = $this->convert_number_to_words($lakhs);

            $string = $lakhs . ' ' . $dictionary[100000];
            if ($remainder) {
                $string .= $separator . $this->convert_number_to_words($remainder);
            }
            break;
        case $number < 1000000000:
            $crores   = ((int) ($number / 10000000));
            $remainder = $number % 10000000;

            $crores = $this->convert_number_to_words($crores);

            $string = $crores . ' ' . $dictionary[10000000];
            if ($remainder) {
                $string .= $separator . $this->convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= $this->convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}
	
	public function documantation()
    { 
	  $id= Auth::user()->id;

	
	 $data = DB::table('history_templets')->join('user_assign_templet', 'history_templets.id', '=', 'user_assign_templet.history_templets_id')
	 ->where('user_assign_templet.user_id', '=', $id)
	 ->where('user_assign_templet.status', '=', 1)
	 ->get();
	 //echo "<pre>"; print_r($data); die;
	if(!empty($data))
	{
		foreach($data as $data1)
		{
		  $originalDate = $data1->created_at;

		  $data1->created_at = "  ".date("d-m-Y", strtotime($originalDate));

		}
	}
	
	return view('frontend.profile.download_doc',['data' => $data]);
	}
	
	
	
	
	
	public function templet_str_replace($userdata,$arr)
	{
		   $arr=str_replace("{first_name}",$userdata['first_name'],$arr);
		   $arr= str_replace("{last_name}",$userdata['last_name'],$arr);
		   $arr=str_replace("{dob}",$userdata['dob'],$arr);
		   $arr=str_replace("{age}",$userdata['age'],$arr);
		   $arr= str_replace("{profile_image}",$userdata['profile_image'],$arr);
		   $arr=str_replace("{company_name}",$userdata['company_name'],$arr);
	       return $arr;
	    
	}
	
	
	
	public function templetsgenerate($id = 0){
		//$data = DB::table('user_assign_templet')->where('id', '=', $id)->first();
		$assign_template = DB::table('history_templets')->join('user_assign_templet', 'history_templets.id', '=', 'user_assign_templet.history_templets_id')
														->where('user_assign_templet.id', '=', $id)
														->select('user_assign_templet.*', 'history_templets.templet_name as templet_name')
														->first();
		
		//echo "<pre>"; print_r($assign_template); die;
		
		$assign_template->templet_html=$this->changetempcontent($assign_template->templet_html);
		
		return view('frontend.profile.user_assign_document')->with(['assign_template' => $assign_template]);
	}
	
	
	public function templetsGenerateSubmit(Request $request, $id = 0){
		$document_template_data = $request->all();
		if(isset($document_template_data)){
			$data = DB::table('user_assign_templet')->where('id', '=', $id)->first();
			if(isset($data)){
				$user_assign_templet['templet_html'] = $document_template_data['templet_html'];
				$user_assign_templet['generate'] = 1;
				//$user_assign_templet['count'] = $data->count + 1;
				$user_assign_templet['updated_at'] = date('Y-m-d');
				
				$update = DB::table('user_assign_templet')->where('id', '=', $id)->update($user_assign_templet);
				return redirect('/user/documantation');
			}
		}
		//echo "<pre>"; print_r($data); die;
		
	}
	
	public function templetsdownload($id = 0)
	{
		
		$data = DB::table('history_templets')->join('user_assign_templet', 'history_templets.id', '=', 'user_assign_templet.history_templets_id')
														->where('user_assign_templet.id', '=', $id)
														->select('user_assign_templet.*', 'history_templets.templet_name as templet_name')
														->first();
    $application_no='';
			//echo "<pre>"; print_r($data); die;
    $duplicate='';
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
				
				$dowload_option='Yes';
				$file_name='pdf/'.time();
				
				$user_assign_templet['count'] = $data->count + 1;
				$user_assign_templet['generate']='0';
				$user_assign_templet['updated_at'] = date('Y-m-d');
				$update_user_assign_templet = DB::table('user_assign_templet')->where('id', '=', $id)->update($user_assign_templet);
				
				 
				
				 $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('frontend.adminpletdetailview', ['data' =>$this->changetempcontent($data->templet_html),'file_name'=>$file_name,'duplicate'=>$duplicate,'application_no'=>$application_no]);

                 return $pdf->download('Document.pdf');

				 
				  $datavalue= $this->changetempcontent($data->templet_html); 
				  return view('frontend.adminpletdetailview', ['data' =>$datavalue,'application_no'=>$application_no,'file_name'=>$file_name]);
				
	}
	
	
	
	public function templetsdetails($id)
    {  
	   $data = DB::table('history_templets')->join('user_assign_templet', 'history_templets.id', '=', 'user_assign_templet.history_templets_id')
														->where('user_assign_templet.id', '=', $id)
														->select('user_assign_templet.*', 'history_templets.templet_name as templet_name')
														->first();
		
														
	   if(!empty($data))
	   { 
		if($data->count > 0){
			$duplicate = 'Duplicate Copy';
		}
		else{
			$duplicate = '';
		}
		$file_name='pdf/'.time();
	    $html= view('pdfdoc.previewcertificate', ['dowload_option'=>'No','certificate_title'=>$data->templet_name,'bg_img_mode'=>'','template_bg_image'=>'','certificate_content'=>$data->templet_html,'baseUrl'=>'','file_name'=>$file_name, 'duplicate' => $duplicate]);
	   
	  echo $html; 
       return view('frontend.templetdetails', ['data' => $data,'file_name'=>$file_name]);
	  }
	  return view('frontend.templetdetails', ['data' =>array(),'file_name'=>'']);
    }
	
	public function admintempletsdetails($id)
    {
	    $data = DB::table('history_templets')->where('history_templets.templet_id','=',$id)->orderBy('history_templets.id','DESC')->first();
		if(!empty($data))
		{
		$file_name='pdf/'.time();
	    $pdf = PDF::loadView('frontend.adminpletdetailview', ['data' =>$data->description,'file_name'=>$file_name]);
        return $pdf->download('Document.pdf');
	  
	    return view('frontend.adminpletdetailview', ['data' =>$data->description,'file_name'=>$file_name]);
	  
	  
	  
       return view('frontend.adminpletdetailview', ['data' =>$data->description,'file_name'=>$file_name]);
	  }
	  return view('frontend.adminpletdetailview', ['data' =>array(),'file_name'=>'']);
    }
    public function generatePdfLink(Request $request)
    {
    	$user_id=$request->input('id');
    	DB::table('user_assign_templet')->where('user_id',$user_id)->where('status','=','1')->update(['generate'=>'1']);
    }
	
}
