<?php

class TicketController extends \BaseController {
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
            $tickets = Ticket::withTrashed()->paginate(10);
            foreach($tickets as $ticket)
            {
                $ticket->load('user')->withTrashed();
            }
            $this->layout->content = View::make('ticket.index')->with('tickets',$tickets);
        }else{
            return Redirect::route('backoffice.user.login');
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
            if (Auth::check()){
            $ticket = new Ticket();
            $user = User::find($id);
            $ticket->user_id = $user->user_id;
            $ticket->ticket_body = sha1($user->user_username);
            $ticket->save();
            return Redirect::back();
            }

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
            $ticket = Ticket::withTrashed()->find($id);
            $ticket->load('user');
            $this->layout->content = View::make('ticket.detail')->with('ticket',$ticket);
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
            $ticket = Ticket::withTrashed()->find($id);
            if($ticket->trashed()){
                $ticket->restore();
            }else{
                $ticket->delete();
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
    public function delete($id)
    {
        if (Auth::check())
        {
            $ticket = Ticket::withTrashed()->find($id);
            $ticket->forceDelete();
            return Redirect::back();

        }else{
            return Redirect::route('backoffice.user.login');
        }
    }
}