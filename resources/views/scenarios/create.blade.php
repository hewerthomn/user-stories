@extends('_layouts.default')

@section('main')

<h1>{{ $title }}</h1>
<hr>

{!! Form::open(['route' => 'scenarios.store']) !!}

<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <label for="story_id">Story</label>
                <h3>
                    <small>{{ $story->uid }}</small>

                    <a href="{{ route('projects.show', ['id' => $story->project->id, 'story_id' => $story->id]) }}">
                        {{ $story->title }}
                    </a>
                    {!! Form::hidden('story_id', $story->id) !!}
                </h3>
            </div>
            <div class="col-md-6">
                <label for="project_id">Project</label>
                <h3>
                    <small>#{{ $story->project->id }}</small>
                    <a href="{{ route('projects.show', $story->project->id) }}">
                        {{ $story->project->name }}
                    </a>
                </h3>
            </div>
        </div>
    </div>
</div>

@include('scenarios._form')

<hr>
<div class="well well-sm">
    <button type="submit" class="btn btn-lg btn-primary">Add new scenario</button>
</div>

{!! Form::close() !!}

@stop