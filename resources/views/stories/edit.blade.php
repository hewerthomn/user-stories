@extends('_layouts.default')

@section('main')

<h3>
    {{ $title }}
    <small>{{ $story->uid }}</small>
    {!! Form::open(['class' => 'pull-right', 'method' => 'DELETE', 'route' => ['stories.destroy', $story->id]]) !!}
        {!! Form::hidden('project_id', $story->project_id) !!}
        <button type="submit" class="btn btn-link" onclick="return confirm('{{ trans('messages.story.confirmDelete') }}');">
            <i class="fa fa-trash-o fa-lg text-danger"></i>
        </button>
    {!! Form::close() !!}
</h3>
<hr>

{!! Form::model($story, ['method' => 'PUT', 'route' => ['stories.update', $story->id]]) !!}

<div class="panel panel-default">
    <div class="panel-body">
        <label for="project_id">{{ trans('app.project.single') }}</label>
        <br>
        <a href="{{ route('projects.show', $story->project_id) }}">
            {{ $story->project->name }}
        </a>
        <input type="hidden" name="project_id" value="{{ $story->project_id }}">
    </div>
</div>

@include('stories._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">
    {{ trans('app.story.save') }}
</button>

{!! Form::close() !!}

@stop