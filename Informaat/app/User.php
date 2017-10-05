<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jeugdhuis()
    {
        return $this->belongsTo(Jeugdhuis::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

}
