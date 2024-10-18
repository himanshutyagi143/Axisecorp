<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanComponent extends Model
{

    protected $table = 'plan_component';
	protected $primaryKey = 'plan_component_id';
	protected $fillable = ['payment_plan_id','component_name', 'component_value', 'component_type', 'is_active','created_at', 'updated_at'];
}
