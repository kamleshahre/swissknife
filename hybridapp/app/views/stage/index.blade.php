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
                    <th width="75%">Stagename</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stages as $stage)
                <tr>
                    <td>{{$stage->stage_id}}</td>
                    <td>{{ HTML::linkRoute('backoffice.stage.detail', $stage->stage_name, [ $stage->stage_id], []) }}</td>
                    <td>
                        <ul class="inline-list">
                            <li><a href="{{route('backoffice.stage.edit', $stage->stage_id)}}"><i  class="fa fa-pencil"></i></a></li>
                            <li><a href="{{route('backoffice.stage.delete', $stage->stage_id)}}">
                                    @if($stage->trashed())
                                    <i class="fa fa-check"></i>
                                    @else
                                    <i class="fa fa-ban"></i>
                                    @endif
                                </a>
                            </li>
                            <li><a href="{{route('backoffice.stage.destroy', $stage->stage_id)}}"><i  class="fa fa-trash-o"></i></a></li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ HTML::linkRoute('backoffice.stage.create', 'Create new stage', [], ['class' => 'button']) }}
        
        {{$stages->links()}}
        
    </div>
</div>
@stop
