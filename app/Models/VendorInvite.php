<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorInvite extends Model
{
   
		protected $table='invitation_link';
		protected $primaryKey = 'id';
		protected $fillable = ['company_type_id','project_id','sender_id','customer_id','kyc_type_ids','kyc_message','name','email','created_at','updated_at','link','is_active','block_id','invite_type','subject_id','crm_call_id','block_type'];
}
