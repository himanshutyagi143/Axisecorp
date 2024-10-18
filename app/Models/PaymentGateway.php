<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{

    protected $table = 'payment_gateway';
	protected $primaryKey = 'payment_gateway_id';
	protected $fillable = ['payment_gateway','is_active','created_at', 'updated_at'];
}
