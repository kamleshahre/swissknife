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
            $stages = Stage::withTrashed()->paginate(10);
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
                return Redirect::to('create/stage')
                        ->withErrors($validator)
                        ->withInput(Input::except('password'));
            }else{
                // STORE
                // create new stage
                $stage = new Stage;
                // fill in stage name + description
                $stage['stage_name'] = Input::get('name');
                $stage['stage_description'] = Input::get('description');
                // get location
                $location = new Location;
                $stage['location_id'] = 1;
                // save stage
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
            $stage->load('lineups');
            $stage->load('photos');
            foreach($stage->lineups as $lineup){
                $lineup->load("artist");
            }
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