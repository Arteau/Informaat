<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jcc\LaravelVote\CanBeVoted;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;



class Comment extends Model
{
    use CanBeVoted;


    use SoftDeletes, CascadeSoftDeletes;
    


    
    protected $vote = User::class;

    protected $fillable = [
        'title', 'body', 'user_id', 'post_id',
    ];
    protected $dates = ['deleted_at'];
    
    
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
