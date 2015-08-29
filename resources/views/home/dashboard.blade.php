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
    <div class="col-xs-6 col-sm-4 col-md-4">
        <div class="well text-center">
            <i class="fa fa-rocket fa-4x text-danger"></i>
            <br>
            <h3>
                {{ $totalProjects }}
                <br>
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
    <div class="col-xs-6 col-sm-4 col-md-4">
        <div class="well text-center">
            <i class="fa fa-file-text-o fa-4x text-primary"></i>
            <br>
            <h3>
                {{ $totalStories }}
                <br>
                <small>{{ trans('app.story.plural') }}</small>
            </h3>
            <div class="btn-group btn-group-justified btn-group-sm">
                <a href="{{ route('stories.create') }}" class="btn btn-success">
                    {{ trans('app.story.new') }}
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4">
        <div class="well text-center">
            <i class="fa fa-bug fa-4x text-success"></i>
            <br>
            <h3>
                {{ $totalBugs }}
                <br>
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
        <a href="{{ route('projects.show', $project->id) }}" class="list-group-item col-xs-6 col-md-6">
            <span class="text-primary h6">
                {{ $project->name }}
            </span>
        </a>
        @endforeach
    </div>
</fieldset>

@stop