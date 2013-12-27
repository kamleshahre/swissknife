@extends('layouts.master')
@section('content')

<!-- MORE INFO: http://culttt.com/2013/08/19/creating-forms-in-laravel-4/ -->

<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">{{ $stage->stage_name }}</h1><a href="{{ URL::previous() }}">Go Back</a>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <p>Edit stage lineup here</p>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">Lineup</h2>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
            <tr>
                <th width="50%">Artist</th>
                <th width="50%">Start</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($stage->lineups as $lineup)
            <tr>
                <td>{{ Form::text('artist_name', $lineup->artist->artist_name) }}</td>
                <td>{{ Form::text('lineup_start', $lineup->lineup_start) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <button>Add a new artist</button>
        {{ Form::button('Finish edit') }}
    </div>
</div>

@stop
