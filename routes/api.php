<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('update', 'AuthController@update');
    Route::get('user-profile', 'AuthController@userProfile');
    Route::post('getRealestate', 'RealestateController@show');
});

//부동산매물
Route::post('/realestate_create', 'RealestateController@create'); //부동산 빌딩
Route::post('/realestate_images', 'RealestateController@create_images'); //부동산 이미지
Route::post('/realestate_option', 'RealestateController@create_option'); //부동산 옵션

Route::post('/realestate_getBuilding', 'RealestateController@getBuilding'); //부동산 edit
Route::post('/realestate_getImage', 'RealestateController@getImage'); //부동산 edit
Route::post('/realestate_getOption', 'RealestateController@getOption'); //부동산 edit

Route::post('/realestate_delete', 'RealestateController@delete'); //부동산 delete

//차량 매물
Route::post('/getVehicle', 'VehicleController@show');
Route::get('/getMaker', 'VehicleController@getMaker'); //제조사 
Route::post('/getSeries', 'VehicleController@getSeries'); //시리즈

Route::post('/vehicle_create', 'VehicleController@create'); //차량 빌딩
Route::post('/vehicle_images', 'VehicleController@create_images'); //차량 이미지
Route::post('/vehicle_option', 'VehicleController@create_option'); //차량옵션

Route::post('/vehicle_getBuilding', 'VehicleController@getBuilding'); //부동산 edit
Route::post('/vehicle_getImage', 'VehicleController@getImage'); //부동산 edit
Route::post('/vehicle_getOption', 'VehicleController@getOption'); //부동산 edit


Route::post('/vehicle_delete', 'VehicleController@delete'); //차량 delete

