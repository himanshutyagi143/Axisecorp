<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{
    //
		public $timestamps=false;
		protected $table='customer_details';
		protected $primaryKey = 'customer_detail_id';
		protected $fillable = ['user_id','customer_code','first_name','last_name','email','phone','landline_number','father_husband_name','dob','father_husband_mobile','father_husband_landline','user_image','if_foreigner','country_name','maritual_status','spouse_name','if_poa','poa_holder_name','organisation_name','organisation_designation','organisation_type','organisation_phone_number','organisation_extention','applicant_type','status','created_by','sales_representative','sales_representative_phone'];
}
