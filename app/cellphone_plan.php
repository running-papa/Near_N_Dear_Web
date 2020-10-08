<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cellphone_plan extends Model
{
    protected $table = 'cellphone_plan';

    protected $fillable = [
        'id', 
        'uuid', 
        'public',
        'subject',
        'description',
        'more',
        'call_text_type',
        'call_text',
        'data_type',
        'data',
        'features',
        'processing_fee',
        'price',
        'total_price',
    ];

    protected $hidden = [
        
    ];
}
