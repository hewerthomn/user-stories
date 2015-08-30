@extends('_layouts.default')

@section('main')
<h3>
    <a href="{{ route('projects.show', $story->project->uid) }}" class="text-primary">
        {{ $story->project->name }}
    </a>
</h3>
<hr>

<div class="row">
    <div class="col-md-6">

        <div class="panel panel-default-outline">
            <div class="panel-heading">
                <div class="pull-left">
                    <span class="h6">
                        {{ $story->title }}
                    </span>
                    <br>
                    <small title="Status{{ trans('app.story.status') }}" class="text-muted">
                        {{ trans('app.status.'.$story->status_id) }}
                    </small>
                </div>
                <div class="pull-right">
                    <a href="{{ route('stories.edit', $story->uid) }}">
                        {{ trans('app.story.edit') }}
                    </a>
                </div>
                <br class="clearfix">
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
            </div>
        </div>

        <fieldset>
            <legend>
                {{ trans('app.scenario.plural') }}

                <small class="text-muted pull-right">
                    <small>
                        {{ $story->scenarios()->count()  }}
                        {{ trans('app.scenario.plural') }}
                    </small>
                </small>
            </legend>

            <div class="well well-sm">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </div>
                    <input autofocus type="search" class="form-control" placeholder="{{ trans('app.scenario.filter') }}">
                    <div class="input-group-btn">
                        <a href="{{ route('scenarios.create', ['story_id' => $story->uid]) }}" class="btn btn-success">
                            {{ trans('app.scenario.new') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach ($story->scenarios()->orderBy('created_at', 'ASC')->get() as $i => $scenario)
                <?php $i++; ?>
                <?php $details = $scenario->details ?>
                    <div class="panel panel-default-outline">
                        <div class="panel-heading" role="tab" id="scenario-{{ $i }}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $i }}" aria-expanded="true" aria-controls="scenario-{{ $i }}">
                                    <small class="text-muted">
                                        {{ trans('app.scenario.single').' '.$i }}
                                    </small>
                                    <br>
                                    {{ $scenario->title }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-{{ $i }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="scenario-{{ $i }}">
                            <div class="panel-body">
                                <?php $params = ['id' => $scenario->id, 'story_id' => $scenario->story->uid] ?>
                                <a href="{{ route('scenarios.edit', $params) }}" class="pull-right">
                                    {{ trans('app.scenario.edit') }}
                                </a>

                                <?php $situations = ['given', 'when', 'then'] ?>
                                @foreach ($situations as $situation)
                                    <p>
                                        <b>{{ trans("app.scenario.{$situation}") }}</b><br>
                                        {{ $scenario->{$situation} }}

                                        @foreach ($scenario->detailSituation($situation) as $d)
                                            <b>{{ trans("app.scenario.{$d->condition}") }}</b>
                                            {{ $d->detail }}
                                        @endforeach
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </fieldset>
    </div>

    <div class="col-md-6">

    </div>
</div>

@stop