<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Calls extends Model
{
  public $timestamps = false;
  protected $table='tbl_calls';
  protected $primaryKey = 'calls_id';
}
