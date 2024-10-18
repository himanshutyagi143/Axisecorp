<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KYCType extends Model
{
        public $timestamps=false;
		protected $table='kyc_type';
		protected $primaryKey = 'user_kyc_id';
		protected $fillable = ['kyc_type_id','kyc_type_name'];
}
