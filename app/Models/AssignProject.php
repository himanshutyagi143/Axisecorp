<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignProject extends Model
{
    protected $table='assign_project';
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $fillable = ['project_id','user_id','role_id','parent_id','company_type_id','company_id'];
}
