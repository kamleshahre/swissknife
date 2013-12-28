<?php

class CommentController extends \BaseController {
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
            $comments = Comment::withTrashed()->paginate(10);
            $this->layout->content = View::make('comment.index')->with('comments',$comments);
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
        $comment = Comment::withTrashed()->find($id);
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
	public function delete($id)
	{
        if (Auth::check())
        {
            $comment = Comment::withTrashed()->find($id);
            if($comment->trashed()){
                $comment->restore();
            }else{
                $comment->delete();
            }
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
    public function destroy($id)
    {
        if (Auth::check())
        {
            $comment = Comment::withTrashed()->find($id);
            $comment->forceDelete();
            return Redirect::back();

        }else{
            return Redirect::route('backoffice.user.login');
        }
    }

}