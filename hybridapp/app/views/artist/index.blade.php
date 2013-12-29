@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1 class="subheader">Artists</h1>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="15%">Name</th>
                    <th width="45%">Site</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artists as $artist)
                <tr>
                    <td>{{$artist->artist_id}}</td>
                    <td>{{ HTML::linkRoute('backoffice.artist.detail', $artist->artist_name, [ $artist->artist_id], []) }}</td>
                    <td><a href="{{$artist->artist_url}}">{{$artist->artist_url}}</a></td>
                    <td>
                        <ul class="inline-list">
                            <li><a href="{{route('backoffice.artist.edit', $artist->artist_id)}}"><i  class="fa fa-pencil"></i></a></li>
                            <li><a href="{{route('backoffice.artist.delete', $artist->artist_id)}}">
                                    @if($artist->trashed())
                                    <i class="fa fa-check"></i>
                                    @else
                                    <i class="fa fa-ban"></i>
                                    @endif
                                </a>
                            </li>
                            <li><a href="{{route('backoffice.artist.destroy', $artist->artist_id)}}"><i  class="fa fa-trash-o"></i></a></li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ HTML::linkRoute('backoffice.artist.create', 'Create new artist', [], ['class' => 'button']) }}
        
        {{$artists->links()}}
        
    </div>
</div>
@stop
