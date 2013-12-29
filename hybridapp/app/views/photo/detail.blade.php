@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1 class="subheader">Photo: {{ $photo->photo_id }}</h1>
        <hr/>
        <a href="{{ URL::previous() }}">&larr; Go Back</a>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="large-6 columns">
        {{ HTML::image('upload/'.$photo->photo_url) }}
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h2 class="subheader">Comments</h2>
        <hr/>
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
