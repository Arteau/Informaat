<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class Jeugdhuis extends Model
{
    
    use SoftDeletes, CascadeSoftDeletes;
    
    protected $cascadeDeletes = ['users'];
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name', 'village', 'zipcode', 'points',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
