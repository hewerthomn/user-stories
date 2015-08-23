@extends('_layouts.default')

@section('main')

<h1>{{ $title }}</h1>
<hr>

{!! Form::model($scenario, ['method' => 'PUT', 'route' => ['scenarios.update', $scenario->id]]) !!}

<div class="form-group well well-sm">
    <div class="row">
        <div class="col-md-6">
            <label for="story_id">Story</label>
            <h3>
                <small>{{ $scenario->story->uid }}</small>

                <a href="{{ route('projects.show', ['id' => $scenario->story->project->id, 'story_id' => $scenario->story->id]) }}">
                    {{ $scenario->story->title }}
                </a>
                {!! Form::hidden('story_id', $scenario->story->id) !!}
            </h3>
        </div>
        <div class="col-md-6">
            <label for="project_id">Project</label>
            <h3>
                <small>#{{ $scenario->story->project->id }}</small>
                <a href="{{ route('projects.show', $scenario->story->project->id) }}">
                    {{ $scenario->story->project->name }}
                </a>
            </h3>
        </div>
    </div>
</div>
<hr>

@include('scenarios._form')

<hr>
<div class="well well-sm">
    <button type="submit" class="btn btn-lg btn-primary">Add new scenario</button>
</div>

{!! Form::close() !!}

@stop