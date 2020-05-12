<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    function Users() {
        return $this->belongsTo('App\Users');
    }

    function Likes() {
        return $this->hasMany('App\Likes');
    }

    function Comments() {
        return $this->hasMany('App\Comments');
    }
}
