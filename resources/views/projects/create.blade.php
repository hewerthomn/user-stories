@extends('_layouts.default')

@section('main')

<h3>{{ $title }}</h3>
<hr>

{!! Form::open(['route' => 'projects.store']) !!}

@include('projects._form')

<button type="submit" class="btn btn-block btn-lg btn-primary">
    {{ trans('app.project.create') }}
</button>

{!! Form::close() !!}

@stop