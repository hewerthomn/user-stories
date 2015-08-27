@extends('_layouts.default')

@section('main')

<h3>{{ $title }}</h3>
<hr>

{!! Form::open(['route' => 'scenarios.store']) !!}
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="project_id">Project</label><br>
            <a href="{{ route('projects.show', $story->project->id) }}">
                {{ $story->project->name }}
            </a>
        </div>
        <div class="form-group">
            <label for="story_id">Story</label><br>
            <b class="text-muted">{{ $story->uid }}</b>
            <a href="{{ route('stories.show', ['id' => $story->id]) }}">
                {{ $story->title }}
            </a>
            {!! Form::hidden('story_id', $story->id) !!}
        </div>
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