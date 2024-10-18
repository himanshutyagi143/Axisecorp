<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public $timestamps = false;
	protected $table='media';
	protected $primaryKey = 'media_id';
    protected $fillable = [ 'media_name','is_active'];
}
