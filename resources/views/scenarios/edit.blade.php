@extends('_layouts.default')

@section('main')

<h1>
    {{ $title }}

    {!! Form::open(['class' => 'pull-right', 'method' => 'DELETE', 'route' => ['scenarios.destroy', $scenario->id]]) !!}
        <button type="submit" class="btn btn-link" onclick="return confirm('Confirm delete scenario?');">
            <span class="text-danger">Delete scenario</span>
        </button>
    {!! Form::close() !!}
</h1>
<hr>

{!! Form::model($scenario, ['method' => 'PUT', 'route' => ['scenarios.update', $scenario->id]]) !!}

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <label for="story_id">Story</label>
                <h3>
                    <small>{{ $scenario->story->uid }}</small>

                    <a href="{{ route('projects.show', ['id' => $scenario->story->project->id, 'story_id' => $scenario->story->id]) }}">
                        {{ $scenario->story->title }}
                    </a>
                    {!! Form::hidden('story_id', $scenario->story->id) !!}
                </h3>
                <p>
                    <b>As a</b>
                    <span>{{ $scenario->story->who }}</span>
                    <br>
                    <b>I want</b>
                    <span>{{ $scenario->story->what }}</span>
                    <br>
                    <b>So then</b>
                    <span>{{ $scenario->story->why }}</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
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
</div>

@include('scenarios._form')


<button type="submit" class="btn btn-lg btn-block btn-primary">Save scenario</button>

{!! Form::close() !!}

@stop

@section('scripts')

@include('scenarios._templates')
<script src="/js/scenarios/scripts.js"></script>
@stop