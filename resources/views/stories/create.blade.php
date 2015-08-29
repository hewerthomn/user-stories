@extends('_layouts.default')

@section('main')

<h3>{{ $title }}</h3>
<hr>

{!! Form::open(['route' => 'stories.store']) !!}

@if (isset($project))
<div class="panel panel-default">
    <div class="panel-body">
        <label for="project_id">
            {{ trans('app.project.single') }}
        </label><br>
        <a href="{{ route('projects.show', $project->id) }}">
            {{ $project->name }}
        </a>
        <input type="hidden" name="project_id" value="{{ $project->id }}">
    </div>
</div>
@else
<div class="form-group">
    <label for="project_id"><b>
        {{ trans('app.project.single') }}
    </b></label>
    {!! Form::select('project_id', $projects, Request::has('project_id') ? Request::input('project_id') : null, ['class' => 'form-control input-lg']) !!}
    {!! $errors->first('project_id', '<span class="text-danger">:message</span>') !!}
</div>
@endif

@include('stories._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">
    {{ trans('app.story.create') }}
</button>

{!! Form::close() !!}

@stop