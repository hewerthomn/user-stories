@extends('_layouts.default')

@section('main')

<h1>{{ $title }}</h1>
<hr>

{!! Form::open(['route' => 'projects.store']) !!}

@include('projects._form')

<hr>
<div class="well well-sm">
    <button type="submit" class="btn btn-primary">Create project</button>
</div>

{!! Form::close() !!}

@stop