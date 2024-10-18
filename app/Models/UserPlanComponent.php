<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPlanComponent extends Model
{
    protected $table = 'user_plan_component';
	protected $primaryKey = 'user_plan_component_id';
	protected $fillable = ['user_id','booking_id','payment_plan_id','plan_component_id','component_name','calulated_value','gst_calulated_value','gst','due_amt','other_charges','due_date','demand_raised','sequence','status','is_active','created_at', 'updated_at'];
}
