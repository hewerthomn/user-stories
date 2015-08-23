@extends('_layouts.default')

@section('main')

<h1>{{ $title }}</h1>
<hr>

{!! Form::open(['route' => 'stories.store']) !!}

@if (isset($project))
<div class="form-group well well-sm">
    <label for="project_id">Project</label>
    <h2>
        <small>#{{ $project->id }}</small>
        <a href="{{ route('projects.show', $project->id) }}">
            {{ $project->name }}
        </a>
        <input type="hidden" name="project_id" value="{{ $project->id }}">
    </h2>
</div>
@else
<div class="form-group">
    <label for="project_id">Project</label>
    {!! Form::select('project_id', $projects, Request::has('project_id') ? Request::input('project_id') : null, ['class' => 'form-control input-lg']) !!}
    {!! $errors->first('project_id', '<span class="text-danger">:message</span>') !!}
</div>
@endif
<hr>

@include('stories._form')

<hr>
<div class="well well-sm">
    <button type="submit" class="btn btn-lg btn-primary">Add new story</button>
</div>

{!! Form::close() !!}

@stop