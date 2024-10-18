<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerKyc extends Model
{
    //
		public $timestamps=false;
		protected $table='customer_kyc';
		protected $primaryKey = 'customer_kyc_id';
		protected $fillable = ['user_id','kyc_type_id','docment_number','document_issued_location','document_expiry','kyc_issue','media_id','applicant_type','status','created_date'];
}
