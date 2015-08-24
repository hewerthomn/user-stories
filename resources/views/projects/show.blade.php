@extends('_layouts.default')

@section('main')
<h1>
    {{ $project->name }}

    <a class="btn btn-link" href="{{ $project->url }}">{{ $project->url }}</a>

    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-link pull-right">Edit project</a>
</h1>
<small class="text-muted">
    {{ $project->about }}
</small>

<hr>

<div class="row">
    <div class="col-md-6">
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
                <a href="{{ route('projects.show', ['id' => $project->id, 'story_id' => $s->id]) }}" class="list-group-item">
                    <small class="text-muted">
                        {{ $s->uid }}
                    </small>
                    <span class="text-primary">
                        {{ $s->title }}
                    </span>
                </a>
                @endforeach
            </div>

        </fieldset>
    </div>
    @if (isset($story))
    <div class="col-md-6">
        <div class="panel panel-default-outline">
            <div class="panel-heading h4">
                <span class="text-muted">
                    {{ $story->uid }}
                </span>
                <span>
                    {{ $story->title }}
                </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <b>As a</b>
                    </div>
                    <div class="col-md-10">
                        {{ $story->who }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 text-right">
                        <b>I want</b>
                    </div>
                    <div class="col-md-10">
                        {{ $story->what }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 text-right">
                        <b>So that</b>
                    </div>
                    <div class="col-md-10">
                        {{ $story->why }}
                    </div>
                </div>

                <a href="{{ route('stories.edit', $story->id) }}">Edit story</a>
            </div>
        </div>

        <br>

        <fieldset>
            <legend>
                Scenarios

                <a href="{{ route('scenarios.create', ['story_id' => $story->id]) }}" class="btn btn-xs btn-success pull-right">Add scenario</a>
            </legend>
            @foreach ($story->scenarios as $i => $scenario)
            <?php $i++; ?>
            <div class="panel panel-default-outline">
                <div class="panel-heading h5">
                    <b>Scenario {{ $i }}:</b>
                    {{ $scenario->title }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2 text-right">
                            <b>Given</b>
                        </div>
                        <div class="col-md-10">
                            {{ $scenario->given }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 text-right">
                            <b>When</b>
                        </div>
                        <div class="col-md-10">
                            {{ $scenario->when }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 text-right">
                            <b>Then</b>
                        </div>
                        <div class="col-md-10">
                            {{ $scenario->then }}
                        </div>
                    </div>

                    <a href="{{ route('scenarios.edit', $scenario->id) }}">Edit scenario</a>
                </div>
            </div>
            @endforeach

        </fieldset>
    </div>
    @endif
</div>

@stop