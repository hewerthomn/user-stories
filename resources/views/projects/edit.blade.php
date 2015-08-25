@extends('_layouts.default')

@section('main')

<h1>{{ $title }}</h1>
<hr>

{!! Form::model($project, ['method' => 'PUT', 'route' => ['projects.update', $project->id]]) !!}

@include('projects._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">Save project</button>

{!! Form::close() !!}

@stop