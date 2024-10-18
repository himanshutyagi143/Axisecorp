<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectBlocks extends Model
{
    public $timestamps = false;
    protected $table = 'project_blocks';
	protected $primaryKey = 'block_id';
	protected $fillable = [''project_id','block_type_id','total_floor','block_name','created_at'];
}
