<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockType extends Model
{
	public $timestamps = false;
    protected $table = 'block_type';
	protected $primaryKey = 'id';
	protected $fillable = ['block_name','status','created_at'];
}
