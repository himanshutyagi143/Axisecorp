<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempCustomer extends Model
{
    //
	protected $table='temp_customer';
	public $timestamps = false;
	protected $fillable = ['sender_id','company_type_id','block_id','unit_id','project_id','customer_code','password','first_name','last_name','email','phone','block_type','is_active','leads_id','payment_plan_id','created_at'];
	
}
