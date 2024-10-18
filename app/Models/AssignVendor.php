<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignVendor extends Model
{
    public $timestamps = false;
    protected $table = 'assign_vendor';
	protected $primaryKey = 'id';
	protected $fillable = ['user_id','company_id'];
}
