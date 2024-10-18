<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InviteBlock extends Model
{
	protected $table = 'invite_block';
	protected $primaryKey = 'id';
	protected $fillable = ['invitation_link_id','block_id','block_type','is_active'];
}
