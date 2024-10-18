<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorProject extends Model
{
    public $timestamps = false;
    protected $table = 'vendor_project';
	protected $primaryKey = 'id';
	protected $fillable = ['assign_project_id','project_id','user_id'];
}

