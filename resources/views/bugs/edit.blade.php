@extends('_layouts.default')

@section('main')

<h3>
    {{ $title }}
    <small>{{ $bug->uid }}</small>
    {!! Form::open(['class' => 'pull-right', 'method' => 'DELETE', 'route' => ['bugs.destroy', $bug->id]]) !!}
        {!! Form::hidden('project_id', $bug->project_id) !!}
        <button type="submit" class="btn btn-link" onclick="return confirm('Confirm delete bug?');"><i class="fa fa-trash-o fa-lg text-danger"></i></button>
    {!! Form::close() !!}
</h3>
<hr>

{!! Form::model($bug, ['method' => 'PUT', 'route' => ['bugs.update', $bug->id]]) !!}

<div class="panel panel-default">
    <div class="panel-body">
        <label for="project_id">Project</label>
        <br>
        <a href="{{ route('projects.show', $bug->project_id) }}">
            {{ $bug->project->name }}
        </a>
        <input type="hidden" name="project_id" value="{{ $bug->project_id }}">
    </div>
</div>

@include('bugs._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">Save bug</button>

{!! Form::close() !!}

@stop