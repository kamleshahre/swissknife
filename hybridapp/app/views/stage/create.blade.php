@extends('layouts.master')
@section('content')

<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1>Stages</h1>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">Create a new stage</h2>
        <hr/>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">

{{ Form::open(array('action' => 'StageController@create')) }}

{{ Form::label('name', 'Name') }}
{{ Form::text('name') }}

{{ Form::label('description', 'Description') }}
{{ Form::textarea('description') }}

<hr/>

{{ Form::submit('Add new stage', ['class' => 'button']) }}

{{ Form::close() }}

    </div>
</div>

@stop