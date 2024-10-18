<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUnitType extends Model
{  
    public $timestamps = false;
    protected $table = 'project_unit_type';
	protected $primaryKey = 'id';
	protected $fillable = ['unit_details_type_id','project_id','name','input_type','label','values'];
}
 