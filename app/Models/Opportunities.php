<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opportunities extends Model
{
  public $timestamps = false;
  protected $table='tbl_opportunities';
  protected $primaryKey = 'opportunities_id';
}
