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

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#stories" aria-controls="stories" role="tab" data-toggle="tab">
            Stories
            <small class="text-muted" title="Total of stories">#{{ $project->stories()->count() }}</small>
        </a>
    </li>
    <li role="presentation">
        <a href="#bugs" aria-controls="bugs" role="tab" data-toggle="tab">
            Bugs
            <small class="text-muted" title="Total of bugs">#{{ $project->bugs()->count() }}</small>
        </a>
    </li>
    <li role="presentation">
        <a href="{{ route('stories.create', ['project_id' => $project->id]) }}">
            <i class="fa fa-plus"></i>
            Story
        </a>
    </li>
    <li role="presentation">
        <a href="{{ route('bugs.create', ['project_id' => $project->id]) }}">
            <i class="fa fa-plus"></i>
            Bug
        </a>
    </li>
</ul>

<br>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="stories">
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
    </div>
    <div role="tabpanel" class="tab-pane" id="bugs">
        @if ($project->bugs === 0)
        <h3 class="text-warning text-center">
            None bug reported
        </h3>
        @endif

        <div class="list-group">
            @foreach ($project->bugs as $bug)
            <a href="{{ route('bugs.show', ['id' => $bug->id]) }}" class="list-group-item">
                <small class="text-muted">
                    <b>{{ $bug->uid }}</b>
                </small>
                <span class="text-primary">
                    {{ $bug->title }}
                </span>
            </a>
            @endforeach
        </div>
    </div>
</div>
@stop