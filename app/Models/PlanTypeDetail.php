<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanTypeDetail extends Model
{
    protected $table = 'plan_type_details';
	protected $primaryKey = 'plan_type_detail_id';
	protected $fillable = ['payment_plan_id','plan_type','project_id','company_id','user_id','block_id','floor_id','unit_id','is_active'];
}
