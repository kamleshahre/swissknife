@extends('layouts.master')
@section('content')

{{ Form::open(array('action' => 'StageController@create')) }}

{{ Form::label('name', 'Name') }}
{{ Form::text('name') }}

{{ Form::label('description', 'Description') }}
{{ Form::textarea('description') }}

{{ Form::submit('Add new stage') }}

{{ Form::close() }}

@stop