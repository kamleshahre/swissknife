<?php

class UserController extends \BaseController {
    protected $layout = 'layouts.master';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if (Auth::check())
        {
            $users = User::withTrashed()->paginate(10);
            $this->layout->content = View::make('user.index')->with('users',$users);
        }else{
            return Redirect::route('backoffice.user.login');
        }
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
                'password'   => Input::get('password'),
                'deleted_at' => null, // Extra voorwaarde
            ];

            if (Auth::attempt($credentials)) {
                $user = Auth::user()->load('roles');
                $roles = $user->roles;
                $authorized = false;
                foreach($roles as $role){
                    if($role->role_id == 1 || $role->role_id == 2){$authorized = true;}
                }
                if($authorized){
                    return Redirect::route('backoffice.index');
                }else{
                    return Redirect::route('backoffice.user.login')
                        ->withInput()             // Vul het formulier opnieuw in met de Input.
                        ->with('auth-error-message', 'U heeft niet de juiste bevoegdheden om in te loggen.');
                }

            } else {

                return Redirect::route('backoffice.user.login')
                    ->withInput()             // Vul het formulier opnieuw in met de Input.
                    ->with('auth-error-message', 'U heeft een onjuiste gebruikersnaam of een onjuist wachtwoord ingevoerd.');
            }
        } else {

            return Redirect::route('backoffice.user.login') // Zie: $ php artisan routes
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
        if (Auth::check())
        {
            $user = User::find($id);
            $user->load('roles');
            $user->load('friends');
            $user->load('photos');
            $this->layout->content = View::make('user.detail')->with('user',$user);
        }else{
            return Redirect::route('backoffice.user.login');
        }
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
        if (Auth::check())
        {
            $user = User::withTrashed()->find($id);
            if($user->trashed()){
                $user->restore();
            }else{
                $user->delete();
            }
            return Redirect::back();

        }else{
            return Redirect::route('backoffice.user.login');
        }
	}

}