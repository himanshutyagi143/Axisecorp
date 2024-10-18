<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitDetails extends Model
{
    protected $table = 'unit_details';
	protected $primaryKey = 'id';
	protected $fillable = ['unit_id','project_id','block_id','floor_id','unit_name','unit_size','total_unit_cost','booking_amount','unit_image_1','unit_image_2','status'];
}
