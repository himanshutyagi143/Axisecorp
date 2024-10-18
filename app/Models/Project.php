<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $table='project';
	protected $primaryKey = 'project_id';
	protected $fillable = ['created_by','image','project_name','description','project_type_id','location','builder','architect','long_description','amenities','start_date','end_date','specifications','status'];
	public function projectType()
    {
        return $this->hasOne('App\Models\ProjectType','project_type_id');
    }
}

