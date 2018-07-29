<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    function posts(){
        return $this-> belongsToMany('App\Post');
    }
}
