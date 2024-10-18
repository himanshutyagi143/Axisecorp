<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $primaryKey = "blogs_id";
    protected $fillable = ['title','slug','image','content','meta_title','meta_keyword','meta_description','blog_date','author','created_by','status'];
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
}
