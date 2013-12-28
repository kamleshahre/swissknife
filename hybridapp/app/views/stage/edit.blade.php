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
        <h2 class="subheader">Edit an existing stage</h2>
        <hr/>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">

{{ Form::open(array('action' => array('StageController@edit', $stage->stage_id))) }}

{{ Form::label('name', 'Name') }}
{{ Form::text('name', $stage->stage_name) }}

{{ Form::label('description', 'Description') }}
{{ Form::textarea('description', $stage->stage_description) }}

<fieldset class="gllpLatlonPicker">
    <div class="gllpMap">Map</div>
    <input type="hidden" name="lat" id="lat" class="gllpLatitude" value="{{$stage->location->location_lat}}"/>
    <input type="hidden" name="long" id="long" class="gllpLongitude" value="{{$stage->location->location_long}}"/>
    <input type="hidden" class="gllpZoom" value="10"/>
</fieldset>

<hr/>

{{ Form::submit('Save edited stage', ['class' => 'button']) }}

{{ Form::close() }}

    </div>
</div>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="../../../_js/jquery-gmaps-latlon-picker.js"></script>

@stop