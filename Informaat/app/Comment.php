<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jcc\LaravelVote\CanBeVoted;


class Comment extends Model
{
    use CanBeVoted;
    protected $vote = User::class;

    protected $fillable = [
        'title', 'body', 'user_id', 'post_id',
    ];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
