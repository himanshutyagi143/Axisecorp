<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitDetailsType extends Model
{
    protected $table = 'unit_details_type';
	protected $primaryKey = 'id';
	protected $fillable = ['label','input_type','name','status'];
	 
}

