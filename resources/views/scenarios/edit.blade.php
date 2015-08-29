@extends('_layouts.default')

@section('main')

<h3>
    {{ $title }}

    {!! Form::open(['class' => 'pull-right', 'method' => 'DELETE', 'route' => ['scenarios.destroy', $scenario->id]]) !!}
        <button type="submit" class="btn btn-link" onclick="return confirm('{{ trans('messages.scenario.confirmDelete') }}');">
            <i class="fa fa-trash-o text-danger"></i>
        </button>
    {!! Form::close() !!}
</h3>
<hr>

{!! Form::model($scenario, ['method' => 'PUT', 'route' => ['scenarios.update', $scenario->id]]) !!}
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="project_id">
                {{ trans('app.project.single') }}
            </label>
            <br>
            <a href="{{ route('projects.show', $scenario->story->project->id) }}">
                {{ $scenario->story->project->name }}
            </a>
        </div>

        <div class="form-group">
            <label for="story_id">
                {{ trans('app.story.single') }}
            </label>
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

<button type="submit" class="btn btn-lg btn-block btn-primary">
    {{ trans('app.scenario.save') }}
</button>

{!! Form::close() !!}

@stop

@section('scripts')
@include('scenarios._templates')

<script src="/js/scenarios/scripts.js"></script>
<script>
    var lang = {
        confirm: '{{ trans('app.confirm') }}',
        and: '{{ trans('app.scenario.and') }}',
        or: '{{ trans('app.scenario.or') }}',
        given: '{{ trans('app.scenario.given') }}',
        when: '{{ trans('app.scenario.when') }}',
        then: '{{ trans('app.scenario.then') }}',
    };
    new app().init(lang);
</script>
@stop