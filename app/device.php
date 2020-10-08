<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    protected $table = 'device';

    protected $fillable = [
        'id', 
        'maker', 
        'device',
    ];

    protected $hidden = [
        
    ];
}
