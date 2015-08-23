@extends('_layouts.default')

@section('main')

<h1>{{ $title }}</h1>
<hr>

{!! Form::model($project, ['method' => 'PUT', 'route' => ['projects.update', $project->id]]) !!}

@include('projects._form')

<hr>
<div class="well well-sm">
    <button type="submit" class="btn btn-primary">Save project</button>
</div>

{!! Form::close() !!}

@stop