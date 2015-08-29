@extends('_layouts.default')

@section('main')

<h3>{{ $title }}</h3>
<hr>

{!! Form::model($project, ['method' => 'PUT', 'route' => ['projects.update', $project->id]]) !!}

@include('projects._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">
    {{ trans('app.project.save') }}
</button>

{!! Form::close() !!}

@stop