<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';

    function Users() {
        return $this->belongsTo('App\Users');
    }

    function Posts() {
        return $this->belongsTo('App\Posts');
    }

    function Likes() {
        return $this->hasMany('App\Likes');
    }
    
}
