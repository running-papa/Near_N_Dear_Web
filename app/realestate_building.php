<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class realestate_building extends Model
{
    protected $table = 'realestate_building';

    protected $fillable = [
        'id', 
        'uuid', 
        'building_type', // ( 건물 형태 아파트?)
        'building_name', //(건물이름)
        'building_size', //(건물 크기)
        'beds', // (방갯수)
        'baths',// ( 욕실갯수)
        'floor', //(층)
        'built_in', // ( 지어진 날짜)
        'parking_spaces', // ( 주차 몇대 )
        'dealer_email',
    ];

    protected $hidden = [
        
    ];
}
