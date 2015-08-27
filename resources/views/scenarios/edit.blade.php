@extends('_layouts.default')

@section('main')

<h3>
    {{ $title }}

    {!! Form::open(['class' => 'pull-right', 'method' => 'DELETE', 'route' => ['scenarios.destroy', $scenario->id]]) !!}
        <button type="submit" class="btn btn-link" onclick="return confirm('Confirm delete scenario?');">
            <i class="fa fa-trash-o text-danger"></i>
        </button>
    {!! Form::close() !!}
</h3>
<hr>

{!! Form::model($scenario, ['method' => 'PUT', 'route' => ['scenarios.update', $scenario->id]]) !!}
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="project_id">Project</label>
            <br>
            <a href="{{ route('projects.show', $scenario->story->project->id) }}">
                {{ $scenario->story->project->name }}
            </a>
        </div>

        <div class="form-group">
            <label for="story_id">Story</label>
            <p>
                <b class="text-muted">{{ $scenario->story->uid }}</b>
                <a href="{{ route('stories.show', ['id' => $scenario->story->id]) }}">
                    {{ $scenario->story->title }}
                </a>
                {!! Form::hidden('story_id', $scenario->story->id) !!}
            </p>
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