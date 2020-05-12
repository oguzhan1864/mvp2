<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';

    function Users() {
        return $this->belongsTo('App\Users');
    }

    function Comments() {
        return $this->belongsTo('App\Comments');
    }

    function Posts() {
        return $this->belongsTo('App\Posts');
    }

}
