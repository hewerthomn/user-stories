@extends('_layouts.default')

@section('main')
<div class="row">
    <div class="col-md-6">
        <h1>
            {{ $title }}
            <a href="{{ route('projects.create') }}" class="btn btn-xs btn-success">Create new</a>
        </h1>
    </div>
    <div class="col-md-6 form-horizontal">
        <br>
        <form method="get">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>

@if ($projects->count() === 0)
<h3 class="text-center text-warning">
    None project to show.
</h3>
@endif

<div class="list-group">
    @foreach ($projects as $p)
    <a href="{{ route('projects.show', $p->id) }}" class="list-group-item">
        <h2>
            <small>#{{ $p->id }}</small>
            <span class="text-primary">{{ $p->name }}</span>
        </h2>
    </a>
    @endforeach
</div>

@stop