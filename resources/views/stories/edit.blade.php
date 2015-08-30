@extends('_layouts.default')

@section('main')

<h3>
    {{ $title }}

    {!! Form::open(['class' => 'pull-right', 'method' => 'DELETE', 'route' => ['stories.destroy', $story->uid]]) !!}
        {!! Form::hidden('project_id', $story->project_id) !!}
        <button type="submit" class="btn btn-link" onclick="return confirm('{{ trans('messages.story.confirmDelete') }}');">
            <i class="fa fa-trash-o fa-lg text-danger"></i>
        </button>
    {!! Form::close() !!}
</h3>
<hr>

{!! Form::model($story, ['method' => 'PUT', 'route' => ['stories.update', $story->uid]]) !!}

@include('stories._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">
    {{ trans('app.story.save') }}
</button>

{!! Form::close() !!}

@stop