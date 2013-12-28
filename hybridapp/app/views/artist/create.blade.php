@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">Edit an existing artist</h2>
        <hr/>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">

        {{ Form::open(array('action' => array('ArtistController@create'))) }}

        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', 'Name') }}

        {{ Form::label('site', 'Site') }}
        {{ Form::text('site', 'Url') }}

        {{ Form::submit('Save edited artist', ['class' => 'button']) }}

        {{ Form::close() }}

    </div>
</div>


@stop