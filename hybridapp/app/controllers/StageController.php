<?php

class StageController extends \BaseController {
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
            $stages = Stage::withTrashed()->paginate(8);
            $this->layout->content = View::make('stage.index')->with('stages',$stages);
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
            $this->layout->content = View::make('stage.create');
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
                'description'   =>  'required'
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
                $stage = new Stage;
                // fill in stage name + description
                $stage['stage_name'] = Input::get('name');
                $stage['stage_description'] = Input::get('description');
                // get location
                $location = new Location;
                $location['location_lat'] = Input::get('lat');
                $location['location_long'] = Input::get('long');
                $location->save();
                $stage->location_id = $location->location_id;
                $stage->save();
                Session::flash('message', 'Het aanmaken van een stage is gelukt!');
                return Redirect::route('backoffice.stage.index');
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
            $stage = Stage::withTrashed()->find($id);
            $stage->load('location');
            $stage->load('lineups');
            $stage->load('photos');
            foreach($stage->lineups as $lineup){
                $lineup->load("artist");
            }
            $this->layout->content = View::make('stage.detail')->with('stage',$stage);
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
                $stage = Stage::withTrashed()->find($id);
                $stage->load('location');
                $this->layout->content = View::make('stage.edit')->with('stage',$stage);
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
	// Form validation
            $rules = array(
                'name'          =>  'required',
                'description'   =>  'required'
            );
            $validator = Validator::make(Input::all(), $rules);
            // Process validation
            if ($validator->fails()){
                return Redirect::route('backoffice.stage.edit')
                        ->withErrors($validator)
                        ->withInput();
            }else{
                // STORE
                // get stage
                
                $stage = Stage::find($id);
                $stage->load("location");
                // update name and description
                $stage['stage_name'] = Input::get('name');
                $stage['stage_description'] = Input::get('description');
                // update location
                $location = $stage->location;
                $location->location_lat = Input::get('lat');
                $location->location_long = Input::get('long');
                $location->save();
                $stage->save();
                Session::flash('message', 'Het updaten van een stage is gelukt!');
                return Redirect::route('backoffice.stage.index');
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
            $stage = Stage::withTrashed()->find($id);
            $stage->forceDelete();
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
            $stage = Stage::withTrashed()->find($id);
            if($stage->trashed()){
                $stage->restore();
            }else{
                $stage->delete();
            }
            return Redirect::back();

        }else{
            return Redirect::route('backoffice.user.login');
        }
    }
}