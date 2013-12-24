@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">Ticket van {{ $ticket->user->user_username }}</h1><a href="{{ URL::previous() }}">Go Back</a>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <p>Placeholder tekst</p>
    </div>
</div>
@stop
