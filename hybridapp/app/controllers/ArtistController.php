<?php

class ArtistController extends \BaseController {
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
            $artists = Artist::withTrashed()->paginate(8);
            $this->layout->content = View::make('artist.index')->with('artists',$artists);
        }else{
            return Redirect::route('backoffice.user.login');
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $this->layout->content = View::make('artist.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // Form validation
        $rules = array(
            'name'          =>  'required',
            'site'          =>  'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        // Process validation
        if ($validator->fails()){
            return Redirect::route('backoffice.stage.create')
                ->withErrors($validator)
                ->withInput();
        }else{
            // STORE
            // create new stage
            $artist = new Artist;
            // fill in stage name + description
            $artist['artist_name'] = Input::get('name');
            $artist['artist_url'] = Input::get('site');
            $artist->save();
            Session::flash('message', 'Het aanmaken van een artist is gelukt!');
            return Redirect::route('backoffice.artist.index');
        }

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
            $artist = Artist::withTrashed()->find($id);
            $artist->load('likes');
            $this->layout->content = View::make('artist.detail')->with('artist',$artist);
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
        if (Auth::check())
        {
            $artist = Artist::withTrashed()->find($id);
            $this->layout->content = View::make('artist.edit')->with('artist',$artist);
        }else{
            return Redirect::route('backoffice.user.login');
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $rules = array(
            'name'          =>  'required',
            'site'          =>  'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        // Process validation
        if ($validator->fails()){
            return Redirect::route('backoffice.artist.edit')
                ->withErrors($validator)
                ->withInput();
        }else{
            // STORE
            // get stage

            $artist = Artist::find($id);
            // update name and description
            $artist['artist_name'] = Input::get('name');
            $artist['artist_url'] = Input::get('site');
            $artist->save();
            Session::flash('message', 'Het updaten van de artist is gelukt!');
            return Redirect::route('backoffice.artist.index');
        }
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
            $artist = Artist::withTrashed()->find($id);
            $artist->forceDelete();
            return Redirect::back();

        }else{
            return Redirect::route('backoffice.user.login');
        }
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        if (Auth::check())
        {
            $artist = Artist::withTrashed()->find($id);
            if($artist->trashed()){
                $artist->restore();
            }else{
                $artist->delete();
            }
            return Redirect::back();

        }else{
            return Redirect::route('backoffice.user.login');
        }
    }

}