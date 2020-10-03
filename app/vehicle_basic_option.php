<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle_basic_option extends Model
{
    protected $table = 'vehicle_basic_option';

    protected $fillable = [
        'id', 
        'uuid', 
        'power_handle', 
        'power_window', 
        'air_conditioner',
        'full_auto_air_conditioner',
        'tinting',
        'sunroof', 
        'panorama_sunroof', 
        'aluminium_wheel', 
        'ecm_room_mirror', 
        'woodgrain', 
        'metalgrain',
        'remote_starting_device', 
        'smart_key', 
        'leather_seat',
        'electric_sheet', 
        'memory_sheet', 
        'heated_sheet', 
        'gout_sheet', 
        'black_box', 
        'high_pass', 
        'other', 
        'dealer_email', 

    ];

    protected $hidden = [
        
    ];
}
