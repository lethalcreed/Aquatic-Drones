<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/weather/forecast', 'Api\SetSailApiController@forecast')->name('api.weather.forecast');
Route::post('/weather/timeframe', 'Api\SetSailApiController@timeFrame')->name('api.weather.timeframe');

Route::post('/routes/create', 'RoutesController@createRoute')->name('api.routes.create');
Route::post('/routes/update', 'RoutesController@updateRoute')->name('api.routes.update');
Route::get('/routes/get/{id}', 'RoutesController@getRoute');
Route::get('/routes/delete/{id}', 'RoutesController@deleteRoute');

Route::post('/drones/log', 'DronesControllers@log')->name('api.drones.log');