<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{protected $table = 'payment_details';
	protected $primaryKey = 'payment_details_id';
	protected $fillable = ['booking_id','user_plan_component_id','net_amount','discount','discount_coupon','tax','txnid','payment_type','payment_status','is_active','user_id','created_at','cheque_date', 'updated_at'];
}
