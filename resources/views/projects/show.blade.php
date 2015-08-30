@extends('_layouts.default')

@section('main')
<h3>
    {{ $project->name }}
    <a href="{{ route('projects.edit', $project->uid) }}" class="btn-xs pull-right">
        {{ trans('app.project.edit') }}
    </a>
</h3>
<hr>

@if ($project->stories()->count() > 0)
<div class="well well-sm">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-search"></i>
            </div>
            <input autofocus type="search" placeholder="{{ trans('app.story.filter') }}" class="form-control">
            <div class="input-group-btn">
                <a href="{{ route('stories.create', ['project_id' => $project->uid]) }}" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    {{ trans('app.story.new') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endif

@if ($project->stories()->count() === 0)
<h4 class="text-primary well text-center">
    <i class="fa fa-warning"></i>
    {{ trans('app.story.empty') }}
    <br>
    <br>
    <a href="{{ route('stories.create', ['project_id' => $project->uid]) }}" class="btn btn-success">
        <i class="fa fa-plus"></i>
        {{ trans('app.story.new') }}
    </a>
</h4>
@else
<div class="row">
    @foreach ($status as $s)
        @include('projects._story', ['status' => $s])
    @endforeach
</div>
@endif

@stop