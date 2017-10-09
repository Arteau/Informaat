<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jcc\LaravelVote\CanBeVoted;

class Post extends Model
{
    use CanBeVoted;
    protected $vote = User::class; 

    protected $fillable = [
        'title', 'topic', 'body', 'tag1', 'tag2', 'tag3', 'user_id',
    ];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
