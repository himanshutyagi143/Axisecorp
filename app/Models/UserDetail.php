<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
  {
	protected $table= 'user_details';
	protected $primarykey= 'id';
	protected $fillable = ['user_id','first_name','last_name','email','mobile_number','landline_number',
	'father_husband_name','dob','pancard_number','father_husband_mobile','father_husband_landline','user_image','if_foreigner','country_name','maritual_status','spouse_name','if_poa','poa_holder_name',
	'organisation_name','organisation_designation','organisation_type','organisation_phone_number','organisation_extention','status','created_by'];
  }
