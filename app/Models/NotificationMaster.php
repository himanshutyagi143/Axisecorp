<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class NotificationMaster extends Model
{
    //
	 
	protected $table = 'notification_master';
	protected $primaryKey = 'notification_id';
	protected $fillable = ['notification_id','notification_name','subject','notification_content','is_active'];
}
