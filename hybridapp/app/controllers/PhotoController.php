<?php
class PhotoController extends \BaseController {
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
            $photos = Photo::withTrashed()->paginate(10);
            $this->layout->content = View::make('photo.index')->with('photos',$photos);
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
        if (Auth::check())
        {

            $photo = Photo::withTrashed()->find($id);
            $photo->load('user');
            $photo->load('tags');
            $photo->load('stage');
            $this->layout->content = View::make('photo.detail')->with('photo',$photo);
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
            $photo = Photo::withTrashed()->find($id);
            $photo->forceDelete();
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
            $photo = Photo::withTrashed()->find($id);
            if($photo->trashed()){
                $photo->restore();
            }else{
                $photo->delete();
            }
            return Redirect::back();

        }else{
            return Redirect::route('backoffice.user.login');
        }
    }
}