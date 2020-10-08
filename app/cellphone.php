<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cellphone extends Model
{
    protected $table = 'cellphone';

    protected $fillable = [
        'id', 
        'uuid', 
        'public',
        'transaction',
        'maker',
        'device_name',
        'device_storage',
        'device_color', 
        'item',
        'srp',
        'tier',
        'up_front_cost',
        'isc',
        'agreement_credit',
        'dro',
        'monthly_discount',
        'monthly_payment',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'dealer_email',
    ];

    protected $hidden = [
        
    ];
}
