<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Jeugdhuis extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name', 'village', 'zipcode', 'points',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
