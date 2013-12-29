<?php

class PhotoRestController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $photos = Photo::all();
        $photos->load('tags');
        $photos->load('user');
        $photos->load('stage');

        return Response::json($photos)->setCallback(Input::get('callback'));
    }
    
    /**
     * Upload the resource.
     *
     * @return Response
     */
    public function upload(){
        $file = Input::file('file');
        var_dump($file);
        $destinationPath = 'upload/';
        // Base64 encode of current date + file
        $filename = base64_encode(date("Y-m-d H:i:s") . $file);
        $file->move($destinationPath, $filename);

        $photo = new Photo();
        $photo->user_id = Auth::user()->user_id;
        $photo->photo_url = $filename;
        $photo->stage_id = null;
        $photo->load('user');
        return Response::json($photo)->setCallback(Input::get('callback'));
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
        $photo = Photo::find($id);
        $photo->load('user');
        $photo->load('tags');
        $photo->load('stage');
        return Response::json($photo)->setCallback(Input::get('callback'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showuser($id)
    {
        $photos = User::find($id)->photos()->with('Stage')->get();
        $photos->load('tags');
        return Response::json($photos)->setCallback(Input::get('callback'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showstage($id)
    {
        $photos = Stage::find($id)->photos()->with('User')->get();
        $photos->load('tags');
        return Response::json($photos)->setCallback(Input::get('callback'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showtag($id)
    {
        $photos = Tag::find($id)->photos()->with('User')->with('Stage')->get();
        return Response::json($photos)->setCallback(Input::get('callback'));
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