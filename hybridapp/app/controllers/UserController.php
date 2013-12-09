<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::all();
        for($i = 0; $i<count($users); $i++)
        {
            $users[$i]->clear();
        }
        return Response::json($users)->setCallback(Input::get('callback'));
	}

    public function auth()
    {
        //View::make('user.index', array('mail' => $_POST['mail'],'password' => $_POST['password']));
        return $_POST['mail'].' '.$_POST['password'];
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
		//
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
        return Response::json($user)->setCallback(Input::get('callback'));
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showfriends($id)
    {
        $friends = User::find($id)->friends;
        return Response::json($friends)->setCallback(Input::get('callback'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $friendid
     * @return Response
     */
    public function showfriend($id, $friendid)
    {
        $friend = User::find($id)->friends()->where('user_friend_id', '=', $friendid)->first();
        return Response::json($friend)->setCallback(Input::get('callback'));
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