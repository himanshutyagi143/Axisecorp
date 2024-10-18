<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['categoryName','status','categorySlug'];

    public function blogs(){
        return $this->belongsToMany('App\Blog');
    }
}
