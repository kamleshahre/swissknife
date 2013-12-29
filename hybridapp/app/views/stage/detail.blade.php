@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1 class="subheader">{{ $stage->stage_name }}</h1>
        <hr/>
        <a href="{{ URL::previous() }}">&larr; Go Back</a>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">Lineup</h2>
        {{ HTML::linkRoute('backoffice.lineup.create', 'Add performer', [$stage->stage_id], array('class' => 'button')) }}
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
            <tr>
                <th width="45%">Artist</th>
                <th width="40%">Start</th>
                <th width="15%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($stage->lineups as $lineup)
            <tr>
                <td>{{$lineup->artist->artist_name}}</td>
                <td>{{$lineup->lineup_start}}</td>
                <td>
                    <ul class="inline-list">
                        <li><a href="{{route('backoffice.lineup.edit', $lineup->lineup_id)}}"><i  class="fa fa-pencil"></i></a></li>
                        <li><a href="{{route('backoffice.lineup.delete', $lineup->lineup_id)}}">
                                @if($stage->trashed())
                                <i class="fa fa-check"></i>
                                @else
                                <i class="fa fa-ban"></i>
                                @endif
                            </a>
                        </li>
                        <li><a href="{{route('backoffice.lineup.destroy', $lineup->lineup_id)}}"><i  class="fa fa-trash-o"></i></a></li>
                    </ul>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
