@extends('_layouts.default')

@section('main')
<h1>
    {{ $title }}
    <a href="{{ route('projects.create') }}" class="btn btn-xs btn-success">Create new</a>
</h1>
<br>

@if ($projects->count() === 0)
<h3 class="text-center text-warning">
    None project to show.
</h3>
@endif

<ul class="list-group">
    @foreach ($projects as $p)
    <li class="list-group-item">
        <h3>
            <small>#{{ $p->id }}</small>
            <a href="{{ route('projects.show', $p->id) }}">{{ $p->name }}</a>
            <a href="{{ url($p->url) }}" class="btn btn-xs btn-link">{{ $p->url }}</a>
            <br>
            <small><small>{{ $p->about }}</small></small>
        </h3>
    </li>
    @endforeach
</ul>

@stop