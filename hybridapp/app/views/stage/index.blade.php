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
                    <th width="10%">ID</th>
                    <th width="80%">Stagename</th>
                    <th width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stages as $stage)
                <tr>
                    <td>{{$stage->stage_id}}</td>
                    <td>{{ HTML::linkRoute('backoffice.stage.detail', $stage->stage_name, [ $stage->stage_id], []) }}</td>
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
@stop
