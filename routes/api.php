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


Route::post('/realestate_create', 'RealestateController@create'); //부동산 빌딩
Route::post('/realestate_image', 'RealestateController@create_image'); //부동산 옵션
Route::post('/realestate_option', 'RealestateController@create_option'); //부동산 옵션