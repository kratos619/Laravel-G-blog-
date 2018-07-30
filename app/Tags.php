<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = ['tag'];
    function posts(){
        return $this-> belongsToMany('App\Post');
    }
}
