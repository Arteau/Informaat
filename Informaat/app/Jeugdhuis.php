<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeugdhuis extends Model
{

    protected $fillable = [
        'name', 'village', 'zipcode', 'points',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
