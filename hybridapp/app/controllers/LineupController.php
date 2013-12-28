<?php

class LineupController extends \BaseController {
    protected $layout = 'layouts.master';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $lineups = Lineup::all();
        $lineups->load('artist');
        $lineups->load('stage');
        return Response::json($lineups)->setCallback(Input::get('callback'));
	}

	/**
	 * Show the form for creating a new resource.
     * @param  int  $id
	 * @return Response
	 */
	public function create($id)
	{
        $stage = Stage::find($id);
        $artists = Artist::all()->lists('artist_name','artist_id');;
        $this->layout->content = View::make('lineup.create')->with('artists',$artists)->with('stage',$stage);
	}

	/**
	 * Store a newly created resource in storage.
     * @param  int  $id
	 * @return Response
	 */
	public function store($id)
	{
        // Form validation
        $rules = array(
            'artist'          =>  'required',
            'starttime'   =>  'required|date_format:Y-m-d H:i'
        );
        $validator = Validator::make(Input::all(), $rules);
        // Process validation
        if ($validator->fails()){
            return Redirect::route('backoffice.lineup.create', array($id))
                ->withErrors($validator)
                ->withInput();
        }else{
            // STORE
            // create new lineup
            $lineup = new Lineup;
            // fill in stage name + description
            $lineup['artist_id'] = Input::get('artist');
            $lineup['stage_id'] = $id;
            $lineup['lineup_start'] = Input::get('starttime');
            $lineup->save();
            Session::flash('message', 'Het aanmaken van de lineup is gelukt!');
            return Redirect::route('backoffice.stage.detail', array($id));
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
        $lineup = Lineup::find($id)->with('Artist')->with('Stage')->get();
        return Response::json($lineup)->setCallback(Input::get('callback'));
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showstage($id)
    {
        $lineups = Stage::find($id)->lineups()->with('Artist')->with('Stage')->get();
        return Response::json($lineups)->setCallback(Input::get('callback'));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $lineups = Stage::find($id)->lineups()->with('Artist')->with('Stage')->get();
            return Response::json($lineups)->setCallback(Input::get('callback'));
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