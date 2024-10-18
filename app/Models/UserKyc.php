<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserKyc extends Model
{
     public $timestamps=false;
		protected $table='user_kyc';
		protected $primaryKey = 'user_kyc_id';
		protected $fillable = ['user_id','kyc_type_id','media_id','created_date','description'];
}
