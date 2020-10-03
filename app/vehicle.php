<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $table = 'vehicle';

    protected $fillable = [
        'id', 
        'uuid', 
        'public', // (공개비공개)
        'transaction', // (판매완료?)
        'maker', // ( 메이커-제조사 )
        'series', // ( 차량시리즈)
        'trim',// ( 차량트림 )
        'type', // ( 차량타입 suv, 쿠페 )
        'year', // ( 연식 )
        'fuel', // ( 연료)
        'price', // ( 가격 )
        'mileage', // 주행거리
        'accident_status', // 사고유무
        'accident_details', // 사고유무
        'number', // ( 차량번호) 
        'subject', //  (제목)
        'description', // ( 자세히 )
        'view', //  ( 뷰 )
        'postal_code', // ( 거래지역 )
        'dealer_email', // 딜러
    ];

    protected $hidden = [
        
    ];
}
