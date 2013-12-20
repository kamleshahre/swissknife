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
            $users = User::all();
            $users->load('roles');
            $users->load('friends');
            $users->load('photos');
            $users->load('notifications');
            return Response::json($users)->setCallback(Input::get('callback'));
        }
        return Response::make('You have to be logged in', 401);
	}

    public function auth()
    {

        $rules = [
            'email'    => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $credentials = [
                'user_mail'      => Input::get('email'),
                'user_password'   => Input::get('password'),
                'deleted_at' => null, // Extra voorwaarde
            ];

            if (Auth::attempt($credentials)) {

                return Redirect::to('/');
            } else {

                return Redirect::route('frontoffice.user.login')
                    ->withInput()             // Vul het formulier opnieuw in met de Input.
                    ->with('auth-error-message', 'U heeft een onjuiste gebruikersnaam of een onjuist wachtwoord ingevoerd.');
            }
        } else {

            return Redirect::route('frontoffice.user.login') // Zie: $ php artisan routes
                ->withInput()             // Vul het formulier opnieuw in met de Input.
                ->withErrors($validator); // Maakt $errors in View.
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