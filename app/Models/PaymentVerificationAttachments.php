<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentVerificationAttachments extends Model
{
  protected $table='payment_verification_attachments';
  protected $primaryKey = 'payment_verification_attachments_id';
  protected $fillable = ['payment_verification_attachments_id','payment_details_id','attachment'];
}