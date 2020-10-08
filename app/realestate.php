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
        'price_type',
        'subject',
        'description',
        'view',
        'move_in_date',
        'dealer_email',
    ];

    protected $hidden = [
        'id',
    ];
}
