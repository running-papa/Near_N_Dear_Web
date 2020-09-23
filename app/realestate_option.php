<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class realestate_option extends Model
{
    protected $table = 'realestate_option';

    protected $fillable = [
        'id', 
        'uuid', 
        'pet', // ( 펫 여부)
        'internet', // ( 인터넷공짜?)
        'snow_removal', // ( 제설 해야됨? )
        'laundry', // ( 세탁기 )
        'dryer',// ( 건조기 )
        'heating', // ( 난방기? )
        'cooling', // ( 냉각? )
        'refrigerator', // ( 냉장고)
        'dishwasher', // ( 식기 세척기 )
        'oven', // ( 오븐) 
        'full_fumiture', //  (가구완비)
        'Amenities', // ( 운동장, 사우나? )
        'transit_friendly', //  ( 교통편리 )
        'storage', // ( 개인창고 )
        'elevator', // ( 엘리베이터 ) 
        'dealer_email',
        'other', 



    ];

    protected $hidden = [
        
    ];
}
