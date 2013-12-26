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
                    <th width="30%">Username</th>
                    <th width="45%">E-mail</th>
                    <th width="15%">Actions</th>
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
                            <li>
                                <a href="{{route('backoffice.user.delete', $user->user_id)}}">
                                    @if($user->trashed())
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-ban"></i>
                                    @endif
                                </a>
                            </li>
                            <li><a href="{{route('backoffice.user.destroy', $user->user_id)}}"><i  class="fa fa-trash-o"></i></a></li>
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
