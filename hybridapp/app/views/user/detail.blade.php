@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1 class="subheader">{{ $user->user_username }}</h1>
        <hr/>
        <a href="{{ URL::previous() }}">&larr; Go Back</a>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <h3>Email address</h3>
        <p>{{$user->user_mail}}</p>
        <hr/>
        <h3>Ticket</h3>
        @if($user->ticket != null)
            {{ HTML::linkRoute('backoffice.ticket.detail', "View this user's ticket", [$user->ticket->ticket_id], []) }}
        @else
            <p>Deze gebruiker heeft geen ticket.</p>
        @endif
        <hr/>
        <h3>Friends</h3>
        <div>

                <table width="100%">
                    <thead>
                        <tr>
                            <th width="50%">Username</th>
                            <th width="50%">E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->friends as $friend)
                        <tr>
                            <td>{{ HTML::linkRoute('backoffice.user.detail', $friend->user_username, [$friend->user_id], []) }}</td>
                            <td>{{ $friend->user_mail }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr/>
            </div>
        </div>

</div>
@stop
