@extends('_layouts.default')

@section('main')

<h1>{{ $title }}</h1>
<hr>

<div class="panel panel-default">
    <div class="panel-body">
        <label for="project_id">Project</label>
        <h3>
            <small>#{{ $story->project->id }}</small>
            <a href="{{ route('projects.show', $story->project->id) }}">
                {{ $story->project->name }}
            </a>
        </h3>
    </div>
</div>

{!! Form::open(['route' => 'scenarios.store']) !!}
<div class="panel panel-default">
    <div class="panel-body">
        <label for="story_id">Story</label>
        <h3>
            <small>{{ $story->uid }}</small>

            <a href="{{ route('projects.show', ['id' => $story->project->id, 'story_id' => $story->id]) }}">
                {{ $story->title }}
            </a>
            {!! Form::hidden('story_id', $story->id) !!}
        </h3>
    </div>
</div>

@include('scenarios._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">Add new scenario</button>

{!! Form::close() !!}

@stop

@section('scripts')

@include('scenarios._templates')
<script src="/js/scenarios/scripts.js"></script>
@stop