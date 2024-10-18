<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminders extends Model
{
  public $timestamps = false;
  protected $table='tbl_reminders';
  protected $primaryKey = 'reminder_id';
}
