<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tagName'];
    public $timestamps = false;

    public function blogs(){
        return $this->belongsToMany('App\Blog')->where('status',1);
    }
}
