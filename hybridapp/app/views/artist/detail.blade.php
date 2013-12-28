@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">{{ $stage->stage_name }}</h1><a href="{{ URL::previous() }}">Go Back</a>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <p>Placeholder tekst</p>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">Lineup</h2>
        {{ HTML::linkRoute('backoffice.lineup.create', 'add to lineup', [$stage->stage_id], array('class' => 'button')) }}
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
            <tr>
                <th width="45%">Artist</th>
                <th width="45%">Start</th>
                <th width="10%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($stage->lineups as $lineup)
            <tr>
                <td>{{$lineup->artist->artist_name}}</td>
                <td>{{$lineup->lineup_start}}</td>
                <td>
                    <ul class="inline-list">
                        <li><a href="#"><i  class="fa fa-pencil"></i></a></li>
                        <li><a href="#" ><i  class="fa fa-trash-o"></i></a></li>
                    </ul>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">Photo's</h2>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <ul class="small-block-grid-3">
            @foreach ($stage->photos as $photo)
            <li><img src="{{$photo->photo_url}}" alt=""/></li>
            @endforeach
        </ul>
    </div>
</div>

@stop
