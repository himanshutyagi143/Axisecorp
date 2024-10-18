<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempCustomerDetails extends Model
{
    //
	protected $table='temp_customer_details';
	protected $primaryKey = 'temp_customer_detail_id';
	public $timestamps = false;
	protected $fillable = ['temp_customer_id','customer_code','first_name','last_name','email','phone','landline_number','father_husband_name','dob','father_husband_mobile','father_husband_landline','user_image','if_foreigner','country_name','maritual_status','spouse_name','if_poa','poa_holder_name','organisation_name','organisation_designation','organisation_type','organisation_phone_number','organisation_extention','applicant_type','status','invitation_link_id','created_by','created_at','sales_representative','sales_representative_phone'];
}
