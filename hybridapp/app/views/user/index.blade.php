@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        @foreach ($users as $user)
            <p>This is user {{ $user->user_username }}</p>
        @endforeach
    </div>
</div>
@stop
