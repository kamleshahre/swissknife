<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


/**
 * API ROUTES
 */
Route::group(array('prefix' => 'API'), function()
{
    ///User routes
    Route::post('/user/login','UserController@auth');

    ///Photo routes

    Route::resource('/photo','PhotoController',array('only' => array('index', 'show')));
    Route::get('/photo/user/{id}','PhotoController@showuser');
    Route::get('/photo/stage/{id}','PhotoController@showstage');
    Route::get('/photo/tag/{id}','PhotoController@showtag');

    ///Tag routes
    Route::resource('/tag','TagController',array('only' => array('index', 'show')));

    ///Location routes
    Route::resource('/location','LocationController',array('only' => array('index', 'show')));

    ///Parkingspot routes
    Route::resource('/parkingspot','ParkingspotController',array('only' => array('index', 'show')));
});