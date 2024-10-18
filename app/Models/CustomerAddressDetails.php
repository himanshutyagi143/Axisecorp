<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddressDetails extends Model
{
	public $timestamps=false;
	protected $table='customer_address_details';
	protected $fillable = ['user_id','address_type_id','applicant_type','address_line','pin_code','city','state'];
}
