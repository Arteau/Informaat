<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
