@extends('_layouts.default')

@section('main')
<h3>
    <a href="{{ route('projects.show', $bug->project_id) }}">
        {{ $bug->project->name }}
    </a>
</h3>
<hr>

<div class="panel panel-default-outline">
    <div class="panel-heading">
        <b class="text-muted h5" title="{{ trans('app.bug.uid') }}">
            {{ $bug->uid }}
        </b>
        <br>
        <span class="h6">
            {{ $bug->title }}
        </span>
    </div>
    <div class="panel-body">
        @if (!empty($bug->version))
        <p>
            <b>{{ trans('app.bug.version') }}</b><br>
            {{ $bug->version }}
        </p>
        @endif

        <p>
            <b>{{ trans('app.bug.pre_conditions') }}</b><br>
            {!! nl2br($bug->pre_conditions) !!}
        </p>
        <p>
            <b>{{ trans('app.bug.steps_to_reproduce') }}</b><br>
            {!! nl2br($bug->steps_to_reproduce) !!}
        </p>
        <p>
            <b>{{ trans('app.bug.description') }}</b><br>
            {!! nl2br($bug->description) !!}
        </p>
        <p>
            <b>{{ trans('app.bug.desired_situation') }}</b><br>
            {!! nl2br($bug->desired_situation) !!}
        </p>

        <a href="{{ route('bugs.edit', $bug->id) }}">
            {{ trans('app.bug.edit') }}
        </a>
    </div>
</div>

@stop