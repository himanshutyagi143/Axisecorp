<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Greeting extends Model
{
  protected $table = 'greetings';
	protected $primaryKey = 'greeting_id';
	protected $fillable = ['greeting_title','greeting_subject','greeting_content','greeting_type_id','greeting_date','is_active'];
}
