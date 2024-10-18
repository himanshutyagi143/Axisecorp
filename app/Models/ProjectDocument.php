<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDocument extends Model
{
        public $timestamps=false;
		protected $table='project_documents';
		protected $primaryKey = 'id';
		protected $fillable = ['project_id','document_type_id','media_id','created_date','description'];
}
