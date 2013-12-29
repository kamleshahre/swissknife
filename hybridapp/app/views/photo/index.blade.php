@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">Photo's</h1>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="30%">Photo</th>
                    <th width="45%">User</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                <tr>
                    <td>{{ HTML::linkRoute('backoffice.photo.detail', $photo->photo_id, [ $photo->photo_id], []) }}</td>
                    <td>{{ HTML::image('upload/'.$photo->photo_url, 'thumbnail', array('class' => 'thumbnail')) }}</td>
                    <td>{{ HTML::linkRoute('backoffice.user.detail', $photo->user->user_username, [ $photo->user->user_id], []) }}</td>
                    <td>
                        <ul class="inline-list">
                            <li>
                                <a href="{{route('backoffice.photo.delete', $photo->photo_id)}}">
                                    @if($photo->trashed())
                                    <i class="fa fa-check"></i>
                                    @else
                                    <i class="fa fa-ban"></i>
                                    @endif
                                </a>
                            </li>
                            <li><a href="{{route('backoffice.photo.destroy', $photo->photo_id)}}"><i  class="fa fa-trash-o"></i></a></li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$photos->links()}}
    </div>
</div>
@stop
