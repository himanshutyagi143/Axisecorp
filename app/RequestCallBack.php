<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCallBack extends Model
{
    protected $table = 'request_call_back';
    protected $fillable = ['name','phone','email'];
}
