<?php

class CommentRestController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comment = Comment::all();
        $comment->load('user');
        $comment->load('photo');
        $comment->load('parent');
        $comment->load('children');
        return Response::json($comment)->setCallback(Input::get('callback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::check())
        {
            $comment = new Comment();
            $comment->user_id = Auth::user()->user_id;
            $comment->comment_body = Input::get('body');
            $comment->comment_parrent = Input::get('parrent');
            $comment->photo_id = Input::get('photo');
            $comment->save();
            $comment->load('photo')->load('user');
            return  Response::json($comment)->setCallback(Input::get('callback'));
        }
        return Response::make('You have to be logged in', 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        $comment->load('user');
        $comment->load('photo');
        $comment->load('parent');
        $comment->load('children');
        return Response::json($comment)->setCallback(Input::get('callback'));
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