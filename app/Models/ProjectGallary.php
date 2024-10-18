<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGallary extends Model
{
      public $timestamps=false;
		protected $table='project_gallary';
		protected $primaryKey = 'id';
		protected $fillable = ['project_id','type_id','media_id','created_date'];
}
