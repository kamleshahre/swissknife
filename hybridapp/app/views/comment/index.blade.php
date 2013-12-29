@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1 class="subheader">Comments</h1>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
                <tr>
                    <th width="30%">User</th>
                    <th width="55%">Comment</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    @if($comment->user == null)
                    <td>{{ HTML::linkRoute('backoffice.user.detail', 'deleted user', [ $comment->user_id], []) }}</td>
                    @else
                    <td>{{ HTML::linkRoute('backoffice.user.detail', $comment->user->user_username, [ $comment->user_id], []) }}</td>
                    @endif
                    <td>{{$comment->comment_body}}</td>
                    <td>
                        <ul class="inline-list">
                            <li>
                                <a href="{{route('backoffice.comment.delete', $comment->comment_id)}}">
                                    @if($comment->trashed())
                                    <i class="fa fa-check"></i>
                                    @else
                                    <i class="fa fa-ban"></i>
                                    @endif
                                </a>
                            </li>
                            <li><a href="{{route('backoffice.comment.destroy', $comment->comment_id)}}"><i  class="fa fa-trash-o"></i></a></li>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$comments->links()}}

    </div>
</div>
@stop
