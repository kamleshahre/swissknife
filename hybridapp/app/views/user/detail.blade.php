@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">{{ $user->user_username }}</h1><a href="{{ URL::previous() }}">Go Back</a>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <p>Placeholder tekst</p>
        @if($user->ticket != null)
            {{ HTML::linkRoute('backoffice.ticket.detail', "Ticket", [$user->ticket->ticket_id], []) }}
        @else
            <p>Deze gebruiker heeft geen ticket</p>
        @endif

    </div>
</div>
@stop
