<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentVerifications extends Model
{
  protected $table='payment_verification_notes';
  protected $primaryKey = 'payment_verification_notes_id';
  protected $fillable = ['payment_verification_notes_id','payment_details_id','notes'];
}