<?php

class TentRestController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tents = Tent::all();
        $tents->load('user');
        $tents->load('location');
        return Response::json($tents)->setCallback(Input::get('callback'));
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
            $user = Auth::user()->load('tent');

            $tent = $user->tent;
            if($tent == null){
                $tent = new Tent();
                $location = new Location();
                $location->location_lat = Input::get('lat');
                $location->location_long = Input::get('long');
                $location->save();
                $tent['location_id'] = $location->location_id;
                $tent['user_id'] = $user->user_id;
                $tent['tent_description'] = $user->username .'\'s tent';
                $tent->save();
            }else{
                $tent->load('location');
                $location = $tent->location;
                $location->location_lat = Input::get('lat');
                $location->location_long = Input::get('long');
                $location->save();
            }
            $user = Auth::user()->load("friends")->load("photos")->load("notifications")->load("tent")->load('ticket');
            if($user->tent !== null){
                $user->tent->load('location');
            }
            return  Response::json($user)->setCallback(Input::get('callback'));
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
        $tent = Tent::find($id);
        $tent->load('user');
        $tent->load('location');
        return Response::json($tent)->setCallback(Input::get('callback'));
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