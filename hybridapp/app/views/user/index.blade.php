@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">Users</h1>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
                <tr>
                    <th width="40%">Username</th>
                    <th width="50%">E-mail</th>
                    <th width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ HTML::linkRoute('backoffice.user.detail', $user->user_username, [$user->user_id], []) }}</td>
                    <td>{{ $user->user_mail }}</td>
                    <td>
                        <ul class="inline-list">
                            <li><a href="#"><i  class="fa fa-pencil"></i></a></li>
                            <li><a href="{{route('backoffice.user.delete', $user->user_id)}}">
                                    @if($user->trashed())
                                        <i class="fa fa-check"></i>
                                    @elseif
                                        <i class="fa fa-trash-o"></i>
                                    @endif
                            </a></li>

                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>
@stop
