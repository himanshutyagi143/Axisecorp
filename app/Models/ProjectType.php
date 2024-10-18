<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectType extends Model
{   use SoftDeletes; 
    protected $table='project_type';
	protected $primaryKey = 'project_type_id';
	protected $fillable = ['project_type_name','status'];
}
