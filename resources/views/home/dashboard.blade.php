@extends('_layouts.default')

@section('main')
<h4>
    {{ $title }}

    <small class="pull-right text-right">
        <small>
            {{ date('D') }}, {{ date('d') }}, {{ date('M') }}
            <br>
            <small>{{ date('Y') }}</small>
        </small>
    </small>
</h4>
<hr>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <div class="well well-sm text-center">
            <h3>
                {{ $totalProjects }}
                <br>
                <i class="fa fa-rocket text-danger"></i>
                <small>{{ trans('app.project.plural') }}</small>
            </h3>
            <div class="btn-group btn-group-justified btn-group-sm">
                <a href="{{ route('projects.index') }}" class="btn btn-default">
                    {{ trans('app.project.plural') }}
                </a>
                <a href="{{ route('projects.create') }}" class="btn btn-success">
                    {{ trans('app.project.new') }}
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="well well-sm text-center">
            <h3>
                {{ $totalStories }}
                <br>
                <i class="fa fa-file-text-o text-primary"></i>
                <small>{{ trans('app.story.plural') }}</small>
            </h3>
            <div class="btn-group btn-group-justified btn-group-sm">
                <a href="{{ route('stories.create') }}" class="btn btn-success">
                    {{ trans('app.story.new') }}
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="well well-sm text-center">
            <h3>
                {{ $totalBugs }}
                <br>
                <i class="fa fa-bug text-success"></i>
                <small>{{ trans('app.bug.plural') }}</small>
            </h3>
            <div class="btn-group btn-group-justified btn-group-sm">
                <a href="{{ route('bugs.create') }}" class="btn btn-success">
                    {{ trans('app.bug.new') }}
                </a>
            </div>
        </div>
    </div>
</div>

<fieldset>
    <legend>{{ trans('app.project.plural') }}</legend>

    <div class="list-group">
        @foreach ($projects as $project)
        <a href="{{ route('projects.show', $project->id) }}" class="list-group-item col-md-6">
            <span class="text-primary h6">
                {{ $project->name }}
            </span>
        </a>
        @endforeach
    </div>
</fieldset>

@stop