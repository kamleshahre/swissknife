@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1 class="subheader">Ticket van {{ $ticket->user->user_username }}</h1>
        <hr/>
        <a href="{{ URL::previous() }}">&larr; Go Back</a>
        <hr/>
        <h3>Key body</h3>
        <hr/>
        <code>{{$ticket->ticket_body}}</code>
        <hr/>
        <h3>Key status</h3>
        <hr/>
        @if ($ticket->deleted_at != null)
        <p>Used on {{ $ticket->updated_at }}</p>
        @else
        <p>Not used</p>
        @endif
        <hr/>
    </div>
</div>
<div class="row">
</div>
@stop
