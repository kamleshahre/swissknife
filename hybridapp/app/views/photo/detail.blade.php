@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">Photo : {{ $photo->photo_id }}</h1><a href="{{ URL::previous() }}">Go Back</a>
    </div>
</div>
<div class="row">
    <div class="large-6 columns">
        <img src="{{$photo->photo_url}}" alt=""/>
    </div>
    <div class="large-6 columns">
        <div class="row">
            <div class="large-12 columns">
                <h2 class="subheader">Tags</h2>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                @foreach($photo->tags as $tag)
                <span class="secondary round label">{{$tag->tag_name}}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">Comments</h2>
    </div>
    <div class="large-12 columns">
        <ul class="small-block-grid-3">
            @foreach($photo->comments as $comment)
            <li>
                <article class="panel">
                    <a href="{{route('backoffice.comment.destroy', $comment->comment_id)}}" class="delete-icon"><i  class="fa fa-times"></i></a>
                    <h6>
                        comment by : {{$comment->user->user_username}}
                    </h6>
                    <p>{{$comment->comment_body}}</p>
                </article>
            </li>
            @endforeach
        </ul>

    </div>
</div>

@stop
