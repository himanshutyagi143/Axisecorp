<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     protected $table='booking';
	public $timestamps = false;
	protected $primaryKey = ['booking_id'];
	protected $fillable = ['project_id','block_id','unit_id','user_id','booking_amount','booking_status','created_by','is_active'];
}
