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