<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cellphone_addons extends Model
{
    protected $table = 'cellphone_add_ons';

    protected $fillable = [
        'id', 
        'uuid', 
        'public',
        'type',
        'subject',
        'description',
        'more',
        'price',
    ];

    protected $hidden = [
        
    ];
}
