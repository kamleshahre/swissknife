@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">Stages</h1>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table width="100%">
            <thead>
                <tr>
                    <th width="30%">Photo</th>
                    <th width="60%">User</th>
                    <th width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                <tr>
                    <td><img src="{{$photo->photo_url}}" class="thumbnail"  alt=""/></td>
                    <td>{{ HTML::linkRoute('backoffice.user.detail', $photo->user->user_username, [ $photo->user->user_id], []) }}</td>
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
        {{$photos->links()}}

    </div>
</div>
@stop
