<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempCustomerKyc extends Model
{
    //
	protected $table='temp_customer_kyc';
	protected $primaryKey = 'temp_customer_kyc_id';
	public $timestamps = false;
	protected $fillable = ['temp_customer_id','customer_code','kyc_type_id','description','pan_number','adhar_number','voter_id','passport_number','passport_issue','passport_expiry','media_id','applicant_type','status','created_date'];
}
