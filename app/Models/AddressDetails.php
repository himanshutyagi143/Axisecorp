<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressDetails extends Model
{
    protected $table='user_address_details';
	protected $primaryKey = 'id';
	protected $fillable = ['phone'];
}
