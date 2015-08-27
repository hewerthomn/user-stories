@extends('_layouts.default')

@section('main')
<h3>
    <a href="{{ route('projects.show', $story->project_id) }}">
        {{ $story->project->name }}
    </a>
</h3>
<hr>

<div class="panel panel-default-outline">
    <div class="panel-heading">
        <b class="text-muted h5">
            {{ $story->uid }}
        </b>
        <br>
        <span class="h6">
            {{ $story->title }}
        </span>
    </div>
    <div class="panel-body">
        <p>
            <b>As a</b><br>
            {{ $story->who }}
        </p>
        <p>
            <b>I want</b><br>
            {{ $story->what }}
        </p>
        <p>
            <b>So that</b><br>
            {{ $story->why }}
        </p>

        <a href="{{ route('stories.edit', $story->id) }}">Edit story</a>
    </div>
</div>

<br>

<fieldset>
    <legend>
        Scenarios
        <small class="text-muted">#{{ $story->scenarios()->count()  }}</small>
        <a href="{{ route('scenarios.create', ['story_id' => $story->id]) }}" class="btn btn-xs btn-success pull-right">Add scenario</a>
    </legend>

    <div class="row">
        @foreach ($story->scenarios()->orderBy('created_at', 'ASC')->get() as $i => $scenario)
        <?php $i++; ?>
        <?php $details = $scenario->details ?>
        <div class="col-md-6">
            <div class="panel panel-default-outline">
                <div class="panel-heading">
                    <b>Scenario {{ $i }}:</b>
                    {{ $scenario->title }}
                </div>
                <div class="panel-body">
                    <p>
                        <b>Given</b><br>
                        {{ $scenario->given }}

                        @foreach ($scenario->detailSituation('given') as $d)
                            <b>{{ ucfirst($d->condition) }}</b>
                            {{ $d->detail }}
                        @endforeach
                    </p>

                    <p>
                        <b>When</b><br>
                        {{ $scenario->when }}

                        @foreach ($scenario->detailSituation('when') as $d)
                            <b>{{ ucfirst($d->condition) }}</b>
                            {{ $d->detail }}
                        @endforeach
                    </p>

                    <p>
                        <b>Then</b><br>
                        {{ $scenario->then }}

                        @foreach ($scenario->detailSituation('then') as $d)
                            <b>{{ ucfirst($d->condition) }}</b>
                            {{ $d->detail }}
                        @endforeach
                    </p>

                    <a href="{{ route('scenarios.edit', $scenario->id) }}">Edit scenario</a>
                </div>
            </div>

        </div>
        @endforeach
    </div>

</fieldset>

@stop