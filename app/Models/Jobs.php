<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table='tbl_job_posts';
	protected $primaryKey = 'id';
	protected $fillable = ['title','position','vacancies','status','description','total_applied'];
}
