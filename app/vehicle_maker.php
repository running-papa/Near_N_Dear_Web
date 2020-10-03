<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle_maker extends Model
{
    protected $table = 'vehicle_maker';

    protected $fillable = [
        'id', 
        'maker', 
        'series', 
    ];

    protected $hidden = [
        
    ];
}
