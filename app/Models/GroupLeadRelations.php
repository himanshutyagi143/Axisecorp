<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupLeadRelations extends Model
{
  public $timestamps=false;
  protected $table='group_lead_relations';
  protected $primaryKey = 'group_lead_relations_id';

}