<?php

class UserRestController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::check())
        {
            $users = User::all();
            $users->load('roles');
            $users->load('friends');
            $users->load('photos');
            $users->load('notifications');
            $users->load('tent');
            $users->load('ticket');
            foreach($users as $user)
            {
                if($user->tent !== null){
                    $user->tent->load('location');
                }
            }
            return Response::json($users)->setCallback(Input::get('callback'));
        }
        return Response::make('You have to be logged in', 401);
    }

    public function auth()
    {
        /*
        In order to access $_POST data in Laravel, use
        Input::get("") -> even if it is a post variable!
        Docs: http://laravel.com/docs/requests
        */

        sleep(2);

        // In order to get all the data orderly
        // var_dump(Input::all());

        if (Auth::attempt(array('user_mail' => Input::get('email'), 'password' => Input::get('password'))))
        {
            $user = Auth::user()->load("friends")->load("photos")->load("notifications")->load("tent")->load('ticket');
            if($user->tent !== null){
                $user->tent->load('location');
            }
            return  Response::json($user)->setCallback(Input::get('callback'));
        }else
        {
            return Response::make('{"error" : "Oops. Authentication failed. You should try again."}', 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //$user = new User;

        //$user->name = 'John';

        //$user->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //var_dump($_POST);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user->load('roles');
        $user->load('friends');
        $user->load('photos');
        $user->load('tent');
        if($user->tent !== null){
            $user->tent->load('location');
        }
        return Response::json($user)->setCallback(Input::get('callback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}