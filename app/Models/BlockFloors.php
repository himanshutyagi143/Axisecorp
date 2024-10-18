<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockFloors extends Model
{
    public $timestamps = false;
    protected $table = 'block_floors';
	protected $primaryKey = 'id';
	protected $fillable = ['project_id','block_type_id','floor_id','no_of_unit','created_at'];
}
