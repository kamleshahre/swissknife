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
                    <th width="30%">Username</th>
                    <th width="45%">Status</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ HTML::linkRoute('backoffice.ticket.detail', $ticket->ticket_id, [ $ticket->ticket_id ], []) }}</td>
                    @if($ticket->user == null)
                        <td>{{ HTML::linkRoute('backoffice.user.detail', 'deleted user', [ $ticket->user_id], []) }}</td>
                    @else
                        <td>{{ HTML::linkRoute('backoffice.user.detail', $ticket->user->user_username, [ $ticket->user_id], []) }}</td>
                    @endif
                    @if ($ticket->deleted_at != null)
                    <td>Used on {{ $ticket->updated_at }}</td>
                    @else
                    <td>Not used</td>
                    @endif
                    <td>
                        <ul class="inline-list">
                            <li><a href="#"><i  class="fa fa-pencil"></i></a></li>
                            <li><a href="{{route('backoffice.ticket.delete', $ticket->ticket_id)}}">
                                    @if($ticket->trashed())
                                    <i class="fa fa-check"></i>
                                    @else
                                    <i class="fa fa-ban"></i>
                                    @endif
                                </a>
                            </li>
                            <li><a href="{{route('backoffice.ticket.destroy', $ticket->ticket_id)}}"><i  class="fa fa-trash-o"></i></a></li>
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
