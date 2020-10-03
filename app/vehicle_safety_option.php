<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle_safety_option extends Model
{
    protected $table = 'vehicle_safety_option';

    protected $fillable = [
        'id', 
        'uuid', 
        'driver_air_bag',
        'passenger_air_bag',
        'side_air_bag',
        'curtain_air_bag',
        'abs',
        'ecs',
        'esp', 
        'tcs', 
        'forward_aft_detector', 
        'rear_camera',
        'navigation', 
        'air_purifier', 
        'other', 
        'dealer_email', 
    ];

    protected $hidden = [
        
    ];
}
