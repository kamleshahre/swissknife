@extends('layouts.master')
@section('content')
<div class="panel">
    <h1 class="subheader">Meld je aan</h1>
    @if(Session::has('auth-error-message'))
    <div class="alert-box radius" data-alert>
        {{ Session::get('auth-error-message') }}
        <a href="#" class="close">&times;</a>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert-box alert radius" data-alert>
        <ul class="no-bullet">
            @foreach ($errors->all('<li>:message</li>' . PHP_EOL) as $message)
            {{ $message }}
            @endforeach
        </ul>
        <a href="#" class="close">&times;</a>
    </div>
    @endif
    {{ Form::open(['route' => 'backoffice.user.auth']), PHP_EOL }}
    {{ Form::label('email', Lang::get('validation.attributes.email') . ':', [
    'class'       => ($errors->has('email') || Session::has('auth-error-message') ? 'error' : '' ),
    ]), PHP_EOL }}
    {{ Form::email('email', '', [
    'placeholder' => Lang::get('validation.attributes.email'),
    'class'       => ($errors->has('email') || Session::has('auth-error-message') ? 'error' : '' ),
    ]), PHP_EOL }}
    @if ($errors->has('email'))
    {{ $errors->first('email', '<small class="error">:message</small>') }}
    @endif

    {{ Form::label('password', Lang::get('validation.attributes.password') . ':', [
    'class'       => ($errors->has('password') || Session::has('auth-error-message') ? 'error' : '' ),
    ]), PHP_EOL }}
    {{ Form::password('password', [
    'placeholder' => Lang::get('validation.attributes.password'),
    'class'       => ($errors->has('password') || Session::has('auth-error-message') ? 'error' : '' ),
    ]), PHP_EOL }}
    @if ($errors->has('password'))
    {{ $errors->first('password', '<small class="error">:message</small>') }}
    @endif

    {{ Form::submit('Aanmelden', ['class' => 'button radius']), PHP_EOL }}
    {{ Form::close(), PHP_EOL }}
</div>
@stop
