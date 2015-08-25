@extends('_layouts.default')

@section('main')

<h1>
    {{ $title }}
    <small>{{ $story->uid }}</small>
    {!! Form::open(['class' => 'pull-right', 'method' => 'DELETE', 'route' => ['stories.destroy', $story->id]]) !!}
        {!! Form::hidden('project_id', $story->project_id) !!}
        <button type="submit" class="btn btn-link" onclick="return confirm('Confirm delete story?');"><span class="text-danger">Delete story</span></button>
    {!! Form::close() !!}
</h1>
<hr>

{!! Form::model($story, ['method' => 'PUT', 'route' => ['stories.update', $story->id]]) !!}

<div class="panel panel-default">
    <div class="panel-body">
        <label for="project_id">Project</label>
        <h2>
            <a href="{{ route('projects.show', $story->project_id) }}">
                {{ $story->project->name }}
            </a>
            <input type="hidden" name="project_id" value="{{ $story->project_id }}">
        </h2>
    </div>
</div>
<hr>

@include('stories._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">Save story</button>

{!! Form::close() !!}

@stop