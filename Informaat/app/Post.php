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
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function scopeSearchByKey($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","%$keyword%")
                    ->orWhere("tag1", "LIKE", "%$keyword%")
                    ->orWhere("tag2", "LIKE", "%$keyword%")
                    ->orWhere("tag3", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

   
}
