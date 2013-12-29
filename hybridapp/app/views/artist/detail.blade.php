@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1 class="subheader">{{ $artist->artist_name }}</h1>
        <h3><a>{{$artist->artist_url}}</a></h3>
        <hr/>
        <a href="{{ URL::previous() }}">&larr; Go Back</a>
        <hr/>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">Likes</h2>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
            <tr>
                <th width="40%">Username</th>
                <th width="45%">E-mail</th>
                <th width="15%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($artist->likes as $like)
            <tr>
                <td>{{ HTML::linkRoute('backoffice.user.detail', $like->user_username, [ $like->user_id], []) }}</td>
                <td>{{ $like->user_mail }}</td>
                <td>
                    <ul class="inline-list">
                        <li><a href="{{route('backoffice.user.delete', $like->user_id)}}">
                                @if($like->trashed())
                                <i class="fa fa-check"></i>
                                @else
                                <i class="fa fa-ban"></i>
                                @endif
                            </a>
                        </li>
                        <li><a href="{{route('backoffice.user.destroy', $like->user_id)}}"><i  class="fa fa-trash-o"></i></a></li>
                    </ul>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
