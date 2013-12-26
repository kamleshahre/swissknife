@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">Tickets</h1>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="35%">Username</th>
                    <th width="45%">Status</th>
                    <th width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ HTML::linkRoute('backoffice.ticket.detail', $ticket->ticket_id, [ $ticket->ticket_id ], []) }}</td>
                    <td>{{ HTML::linkRoute('backoffice.user.detail', $ticket->user->user_username, [ $ticket->user->user_id], []) }}</td>
                    @if ($ticket->updated_at != $ticket->created_at)
                    <td>Used on {{ $ticket->updated_at }}</td>
                    @else
                    <td>Not used</td>
                    @endif
                    <td>
                        <ul class="inline-list">
                            <li><a href="#"><i  class="fa fa-pencil"></i></a></li>
                            <li><a href="#" ><i  class="fa fa-trash-o"></i></a></li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$tickets->links()}}

    </div>
</div>
@stop
