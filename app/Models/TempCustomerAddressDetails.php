<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempCustomerAddressDetails extends Model
{
    //
	protected $table='temp_customer_address_details';
	public $timestamps = false;
	protected $fillable = ['temp_customer_id','customer_code','address_type_id','applicant_type','address_line','pin_code','city','state','created_at'];
}
