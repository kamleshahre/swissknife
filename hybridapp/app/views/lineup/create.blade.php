@extends('layouts.master')
@section('content')

<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1>Lineup's</h1>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">Create a new lineup</h2><a href="{{ URL::previous() }}">Go Back</a>
        <hr/>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">

        {{ Form::open(array('action' => array('LineupController@create',  $stage->stage_id))) }}

        {{ Form::label('artist', 'Artist') }}
        {{ Form::select('artist', $artists , Input::old('artist')) }}

        {{ Form::label('starttime', 'Start time') }}
        {{ Form::text('starttime') }}

        {{ Form::submit('Save lineup', ['class' => 'button']) }}

        {{ Form::close() }}

    </div>
    {{ HTML::script("./_js/datepicker/jquery.simple-dtpicker.js") }}
    <script type="text/javascript">
        $(function(){
            $('*[name=starttime]').appendDtpicker({
                "futureOnly": true,
                "todayButton": false,
                "closeOnSelected": true,
                "minuteInterval": 15
            });
        });
    </script>
</div>
@stop