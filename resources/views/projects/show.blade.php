@extends('_layouts.default')

@section('main')
<h3>
    {{ $project->name }}

    <a class="btn btn-xs btn-link" href="{{ $project->url }}">{{ $project->url }}</a>

    <a href="{{ route('projects.edit', $project->id) }}" class="btn-xs pull-right">Edit project</a>
</h3>
<small class="text-muted">
    {{ $project->about }}
</small>

<hr>

<fieldset>
    <legend>
        Stories

        <small class="text-muted" title="Total of stories">#{{ $project->stories()->count() }}</small>
        <a href="{{ route('stories.create', ['project_id' => $project->id]) }}" class="btn btn-xs btn-success pull-right">Add story</a>
    </legend>

    @if ($project->stories === 0)
    <h3 class="text-warning text-center">
        None story to show
    </h3>
    @endif

    <div class="list-group">
        @foreach ($project->stories as $s)
        <a href="{{ route('stories.show', ['id' => $s->id]) }}" class="list-group-item">
            <small class="text-muted">
                <b>{{ $s->uid }}</b>
            </small>
            <span class="text-primary">
                {{ $s->title }}
            </span>
        </a>
        @endforeach
    </div>
</fieldset>
@stop