<?php


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

Route::group(['namespace' => 'API'], function () {
    Route::get('/search/{SpecialId?}/{cityId?}/{stateId?}/{docname?}', 'SearchController@search');
     Route::resource('cities', 'CityController');
     Route::get('/citiesindex', 'CityController@index');
// http://test.com/api/search/SpecialId/cityId/stateId/docname/
    
});