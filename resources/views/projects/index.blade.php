@extends('_layouts.default')

@section('main')
<h3>
    {{ $title }}
    <a href="{{ route('projects.create') }}" class="btn btn-xs btn-success">Create new</a>
</h3>
<br>

@if ($projects->count() === 0)
<h4 class="text-center text-warning">
    None project to show.
</h4>
@endif

<ul class="list-group">
    @foreach ($projects as $p)
    <li class="list-group-item">
        <h4>
            <small>#{{ $p->id }}</small>
            <a href="{{ route('projects.show', $p->id) }}">{{ $p->name }}</a>
            <a href="{{ url($p->url) }}" class="btn btn-xs btn-link">{{ $p->url }}</a>
            <br>
            <small><small>{{ $p->about }}</small></small>
        </h4>
    </li>
    @endforeach
</ul>
@stop