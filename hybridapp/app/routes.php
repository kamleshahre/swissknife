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

/*
| Empty route should automatically redirect to the backoffice
| (visiting: _host_/public/ takes you to _host_/public/backoffice)
*/

Route::get('/', [
        function (){
            if (Auth::Guest()){
                return Redirect::route('backoffice.user.login');
            }else{
                return View::make('home');
            }
        }
    ]);
    
/*
| Backoffice routes
| visiting _host/public/backoffice
*/

Route::group(array('prefix' => 'backoffice'), function()
{
    //Home Route
    Route::get('/', [
        'as'   => 'backoffice.index',
        function (){
            if (Auth::Guest()){
                return Redirect::route('backoffice.user.login');
            }else{
                return View::make('home');
            }
        }
    ]);

    //User Routes
    Route::get('/login', [
        'as'   => 'backoffice.user.login',
        function () {
            return View::make('user.login');
        }
    ]);

    Route::post('/login', [
        'as'   => 'backoffice.user.auth',
        'uses' => 'UserController@auth'
    ])->before('guest');

    Route::get('/logout', [
        'as'   => 'backoffice.user.logout',
        function () {
            Auth::logout();
            return Redirect::route('backoffice.index');
        }
    ])->before('auth');

    Route::get('/users', [
        'as'   => 'backoffice.user.index',
        'uses' => 'UserController@index'
    ]);

    Route::get('/user/{id}', [
        'as'   => 'backoffice.user.detail',
        'uses' => 'UserController@show'
    ]);

    Route::get('/user/delete/{id}', [
    'as'   => 'backoffice.user.delete',
    'uses' => 'UserController@delete'
    ]);

    Route::get('/user/destroy/{id}', [
        'as'   => 'backoffice.user.destroy',
        'uses' => 'UserController@destroy'
    ]);

    //Ticket Routes
    Route::get('/tickets', [
        'as'   => 'backoffice.ticket.index',
        'uses' => 'TicketController@index'
    ]);

    Route::get('/ticket/{id}', [
        'as'   => 'backoffice.ticket.detail',
        'uses' => 'TicketController@show'
    ]);

    Route::get('/ticket/delete/{id}', [
        'as'   => 'backoffice.ticket.delete',
        'uses' => 'TicketController@delete'
    ]);

    Route::get('/ticket/destroy/{id}', [
        'as'   => 'backoffice.ticket.destroy',
        'uses' => 'TicketController@destroy'
    ]);

    //Artist Routes
    Route::get('/artists', [
        'as'   => 'backoffice.artist.index',
        'uses' => 'ArtistController@index'
    ]);

    Route::get('/artist/{id}', [
        'as'   => 'backoffice.artist.detail',
        'uses' => 'ArtistController@show'
    ]);

    Route::post('/artist/edit/{id}', [
        'as'   => 'backoffice.artist.update',
        'uses' => 'ArtistController@update'
    ]);

    Route::get('/artist/edit/{id}', [
        'as'   => 'backoffice.artist.edit',
        'uses' => 'ArtistController@edit'
    ]);

    Route::get('/artist/delete/{id}', [
        'as'   => 'backoffice.artist.delete',
        'uses' => 'ArtistController@delete'
    ]);

    Route::get('/artist/destroy/{id}', [
        'as'   => 'backoffice.artist.destroy',
        'uses' => 'ArtistController@destroy'
    ]);

    Route::get('/create/artist', [
        'as'   => 'backoffice.artist.create',
        'uses' => 'ArtistController@create'
    ]);

    Route::post('/create/artist', [
        'as'   => 'backoffice.artist.store',
        'uses' => 'ArtistController@store'
    ]);

    //Stages Routes
    Route::get('/stages', [
        'as'   => 'backoffice.stage.index',
        'uses' => 'StageController@index'
    ]);

    Route::get('/stage/{id}', [
        'as'   => 'backoffice.stage.detail',
        'uses' => 'StageController@show'
    ]);

    Route::get('/create/stage', [
        'as'   => 'backoffice.stage.create',
        'uses' => 'StageController@create'
    ]);
    
    Route::post('/create/stage', [
        'as'   => 'backoffice.stage.store',
        'uses' => 'StageController@store'
    ]);
    
    Route::post('/stage/edit/{id}', [
        'as'   => 'backoffice.stage.update',
        'uses' => 'StageController@update'
    ]);

    Route::get('/stage/edit/{id}', [
        'as'   => 'backoffice.stage.edit',
        'uses' => 'StageController@edit'
    ]);

    Route::get('/stage/delete/{id}', [
        'as'   => 'backoffice.stage.delete',
        'uses' => 'StageController@delete'
    ]);
    
    Route::get('/stage/destroy/{id}', [
        'as'   => 'backoffice.stage.destroy',
        'uses' => 'StageController@destroy'
    ]);

    //Lineup Routes


    Route::get('/create/lineup/{id}', [
        'as'   => 'backoffice.lineup.create',
        'uses' => 'LineupController@create'
    ]);

    Route::post('/create/lineup/{id}', [
        'as'   => 'backoffice.lineup.store',
        'uses' => 'LineupController@store'
    ]);

    Route::get('/lineup/delete/{id}', [
        'as'   => 'backoffice.lineup.delete',
        'uses' => 'LineupController@delete'
    ]);

    Route::get('/lineup/destroy/{id}', [
        'as'   => 'backoffice.lineup.destroy',
        'uses' => 'LineupController@destroy'
    ]);

    Route::post('/lineup/edit/{id}', [
        'as'   => 'backoffice.lineup.update',
        'uses' => 'LineupController@update'
    ]);

    Route::get('/lineup/edit/{id}', [
        'as'   => 'backoffice.lineup.edit',
        'uses' => 'LineupController@edit'
    ]);

    //Photo Routes
    Route::get('/photos', [
        'as'   => 'backoffice.photo.index',
        'uses' => 'PhotoController@index'
    ]);

    Route::get('/photo/{id}', [
        'as'   => 'backoffice.photo.detail',
        'uses' => 'PhotoController@show'
    ]);

    Route::get('/photo/delete/{id}', [
        'as'   => 'backoffice.photo.delete',
        'uses' => 'PhotoController@delete'
    ]);

    Route::get('/photo/destroy/{id}', [
        'as'   => 'backoffice.photo.destroy',
        'uses' => 'PhotoController@destroy'
    ]);

    //Comment Routes
    Route::get('/comments', [
        'as'   => 'backoffice.comment.index',
        'uses' => 'CommentController@index'
    ]);

    Route::get('/comment/delete/{id}', [
        'as'   => 'backoffice.comment.delete',
        'uses' => 'CommentController@delete'
    ]);

    Route::get('/comment/destroy/{id}', [
        'as'   => 'backoffice.comment.destroy',
        'uses' => 'CommentController@destroy'
    ]);

});

/*
| api routes
| visiting _host/public/api
*/

Route::group(array('prefix' => 'api'), function()
{
    ///User routes
    Route::resource('/user','UserRestController');
    Route::post('/user/login','UserRestController@auth');
    Route::post('/user/logout','UserRestController@logout');
    Route::post('/user/create','UserRestController@create');
    ///Photo routes
    Route::resource('/photo','PhotoRestController',array('only' => array('index', 'show')));
    ///Tag routes
    Route::resource('/tag','TagRestController',array('only' => array('index', 'show')));
    ///Location routes
    Route::resource('/location','LocationRestController',array('only' => array('index', 'show')));
    ///Parkingspot routes
    Route::resource('/parkingspot','ParkingspotRestController',array('only' => array('index', 'show')));
    ///Parkingspot routes
    Route::resource('/quietplace','QuietplaceRestController',array('only' => array('index', 'show')));
    ///Stage routes
    Route::resource('/stage','StageRestController',array('only' => array('index', 'show')));
    ///Lineup routes
    Route::resource('/lineup','LineupRestController',array('only' => array('index', 'show')));
    ///Artist routes
    Route::resource('/artist','ArtistRestController',array('only' => array('index', 'show')));
    ///Notification routes
    Route::resource('/notification','NotificationRestController',array('only' => array('index', 'show')));
    ///Comment routes
    Route::resource('/comment','CommentRestController',array('only' => array('index', 'show')));
    ///Ticket routes
    Route::resource('/ticket','TicketRestController',array('only' => array('index', 'show')));
    //Ten routes
    Route::resource('/tent','TentRestController',array('only' => array('index', 'show')));
});