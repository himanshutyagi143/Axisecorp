<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignCustomer extends Model
{
    public $timestamps = false;
    protected $table = 'assign_customer';
	protected $primaryKey = 'id';
	protected $fillable = ['user_id','customer_id'];
}
