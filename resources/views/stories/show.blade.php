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
        <b class="text-muted">
            {{ $story->uid }}
        </b>
        <span class="h6">
            {{ $story->title }}
        </span>
        <br>
        <small class="text-muted">
            {{ $story->status->name }}
        </small>
    </div>
    <div class="panel-body">
        <p>
            <b>{{ trans('app.story.who') }}</b><br>
            {{ $story->who }}
        </p>
        <p>
            <b>{{ trans('app.story.what') }}</b><br>
            {{ $story->what }}
        </p>
        <p>
            <b>{{ trans('app.story.why') }}</b><br>
            {{ $story->why }}
        </p>

        <a href="{{ route('stories.edit', $story->id) }}">
            {{ trans('app.story.edit') }}
        </a>
    </div>
</div>

<br>

<fieldset>
    <legend>
        {{ trans('app.scenario.plural') }}

        <small class="text-muted">#{{ $story->scenarios()->count()  }}</small>
        <a href="{{ route('scenarios.create', ['story_id' => $story->id]) }}" class="btn btn-xs btn-success pull-right">
            {{ trans('app.scenario.new') }}
        </a>
    </legend>

    <div class="row">
        @foreach ($story->scenarios()->orderBy('created_at', 'ASC')->get() as $i => $scenario)
        <?php $i++; ?>
        <?php $details = $scenario->details ?>
        <div class="col-md-6">
            <div class="panel panel-default-outline">
                <div class="panel-heading">
                    <b>
                        {{ trans('app.scenario.single') }}
                        {{ $i }}
                        :
                    </b>
                    {{ $scenario->title }}
                </div>
                <div class="panel-body">
                    <p>
                        <b>{{ trans('app.scenario.given') }}</b><br>
                        {{ $scenario->given }}

                        @foreach ($scenario->detailSituation('given') as $d)
                            <b>{{ trans("app.scenario.{$d->condition}") }}</b>
                            {{ $d->detail }}
                        @endforeach
                    </p>

                    <p>
                        <b>{{ trans('app.scenario.when') }}</b><br>
                        {{ $scenario->when }}

                        @foreach ($scenario->detailSituation('when') as $d)
                            <b>{{ trans("app.scenario.{$d->condition}") }}</b>
                            {{ $d->detail }}
                        @endforeach
                    </p>

                    <p>
                        <b>{{ trans('app.scenario.then') }}</b><br>
                        {{ $scenario->then }}

                        @foreach ($scenario->detailSituation('then') as $d)
                            <b>{{ trans("app.scenario.{$d->condition}") }}</b>
                            {{ $d->detail }}
                        @endforeach
                    </p>

                    <a href="{{ route('scenarios.edit', $scenario->id) }}">
                        {{ trans('app.scenario.edit') }}
                    </a>
                </div>
            </div>

        </div>
        @endforeach
    </div>

</fieldset>

@stop