@extends('_layouts.default')

@section('main')

<h3>{{ $title }}</h3>
<hr>

{!! Form::open(['route' => 'stories.store']) !!}

@include('stories._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">
    {{ trans('app.story.create') }}
</button>

{!! Form::close() !!}

@stop