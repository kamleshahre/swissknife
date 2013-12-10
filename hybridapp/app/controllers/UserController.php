<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if (Auth::check())
        {
            echo 'logged in';
        }
        $users = User::all();
        $users->load('roles');
        $users->load('friends');
        $users->load('photos');
        $users->load('notifications');
        return Response::json($users)->setCallback(Input::get('callback'));
	}

    public function auth()
    {
        var_dump($_POST);
        if (Auth::attempt(array('user_mail' => $_POST['email'], 'password' => $_POST['password'])))
        {
            echo 'logged in';
        }else
        {
            echo 'try again';
        }


    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        var_dump($_POST);
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