<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class realestate extends Model
{
    protected $table = 'realestate';

    protected $fillable = [
        'id', 
        'uuid', 
        'public',
        'transaction',
        'street_number',
        'street_name',
        'city',
        'province',
        'country',
        'postal_code',
        'price',
        'subject',
        'description',
        'view',
        'dealer_email',
    ];

    protected $hidden = [
        'id',
    ];
}
