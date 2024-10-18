<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
class ProjectBlocks extends Model
{
	//use SoftDeletes; 
    protected $table = 'project_blocks';
	protected $primaryKey = 'block_id';
	protected $fillable = ['project_id','block_type_id','block_name','total_floor'];
	//protected $dates = ['deleted_at'];
}
