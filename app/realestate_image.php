<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class realestate_image extends Model
{
    protected $table = 'realestate_image';

    protected $fillable = [
        'id', 
        'uuid', 
        'image1', 
        'image2',
        'image3', 
        'image4', 
        'image5', 
        'image6', 
        'image7', 
        'image8', 
        'image9', 
        'image10',
        'dealer_email', 

    ];

    protected $hidden = [
        
    ];
}
