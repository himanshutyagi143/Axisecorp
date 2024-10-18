<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{

    protected $table = 'payment_plan';
	protected $primaryKey = 'payment_plan_id';
	protected $fillable = ['plan_name','is_active','created_at', 'updated_at'];
}
