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

<fieldset class="gllpLatlonPicker">
    <div class="gllpMap">Map</div>
    <input type="hidden" name="lat" id="lat" class="gllpLatitude" value="51.0500"/>
    <input type="hidden" name="long" id="long" class="gllpLongitude" value="3.7333"/>
    <input type="hidden" class="gllpZoom" value="10"/>
</fieldset>

<hr/>

{{ Form::submit('Save new stage', ['class' => 'button']) }}

{{ Form::close() }}

    </div>
</div>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="../../_js/jquery-gmaps-latlon-picker.js"></script>

@stop