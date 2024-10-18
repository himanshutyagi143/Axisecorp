<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
class FloorUnit extends Model
{
    //use SoftDeletes;
    protected $table = 'floor_unit';
	protected $primaryKey = 'id';
	protected $fillable = ['project_id','block_id','floor_id','unit','created_at','booking_status'];
	//protected $dates = ['deleted_at'];
}
