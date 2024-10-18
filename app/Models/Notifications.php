<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
  public $timestamps = false;
  protected $table='notifications';
  protected $primaryKey = 'notifications_id';
  protected $fillable = ['notifications_id','sender_id','type_of_notification','title_html','body_html','href','recipient_id','is_unread','is_hidden','created_time'];
}