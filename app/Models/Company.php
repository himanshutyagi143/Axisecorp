<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Company extends Model
{
     use SoftDeletes; 
    protected $table='company';
	protected $primaryKey = 'company_id';
	protected $fillable = ['created_by','image','company_name','description','project_type_id','location','specifications','name','email','phone','company_type_id','officeaddress','city','rera','sell_do_response'];
	protected $dates = ['deleted_at'];
}
