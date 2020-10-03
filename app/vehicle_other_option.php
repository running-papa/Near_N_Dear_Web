<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle_other_option extends Model
{
    protected $table = 'vehicle_other_option';

    protected $fillable = [
        'id', 
        'uuid', 
        'super_vision_board',
        'bucket_sheet',
        'air_dam',
        'bumpergard',
        'chrome_wheel',
        'four_wheel_drive',
        'rear_spoiler', 
        'cruise_control', 
        'loop_carrier', 
        'other',
        'dealer_email', 
        

    ];

    protected $hidden = [
        
    ];
}
