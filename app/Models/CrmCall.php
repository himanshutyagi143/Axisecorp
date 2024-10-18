<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmCall extends Model
{
    protected $table = 'crm_calls';
	protected $primaryKey = 'crm_calls_id';
	protected $fillable = ['date_entered','created_by','related_to_cust_id','call_type','notes','status'];
}
