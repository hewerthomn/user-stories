@extends('_layouts.default')

@section('main')

<h1>{{ $title }}</h1>
<hr>

{!! Form::open(['route' => 'projects.store']) !!}

@include('projects._form')

<button type="submit" class="btn btn-block btn-lg btn-primary">Create project</button>

{!! Form::close() !!}

@stop