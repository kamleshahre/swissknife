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
    Route::resource('/user','UserController',array('only' => array('index', 'show')));
    Route::get('/user/{id}/friends/','UserController@showfriends');
    Route::get('/user/{id}/friend/{friendid}','UserController@showfriend');
    ///Photo routes
    Route::resource('/photo','PhotoController',array('only' => array('index', 'show')));
    Route::get('/photo/user/{id}','PhotoController@showuser');
    Route::get('/photo/stage/{id}','PhotoController@showstage');
    Route::get('/photo/tag/{id}','PhotoController@showtag');
    ///Tag routes
    Route::resource('/tag','TagController',array('only' => array('index', 'show')));
    Route::get('/tag/photo/{id}','TagController@showphoto');
    ///Location routes
    Route::resource('/location','LocationController',array('only' => array('index', 'show')));
    ///Parkingspot routes
    Route::resource('/parkingspot','ParkingspotController',array('only' => array('index', 'show')));
    ///Stage routes
    Route::resource('/stage','StageController',array('only' => array('index', 'show')));
    ///Lineup routes
    Route::resource('/lineup','LineupController',array('only' => array('index', 'show')));
    Route::get('/lineup/stage/{id}','LineupController@showstage');
    ///Artist routes
    Route::resource('/artist','ArtistController',array('only' => array('index', 'show')));
    ///Notification routes
    Route::resource('/notification','NotificationController',array('only' => array('index', 'show')));
    ///Comment routes
    Route::resource('/comment','CommentController',array('only' => array('index', 'show')));
    ///Ticket routes
    Route::resource('/ticket','TicketController',array('only' => array('index', 'show')));
});