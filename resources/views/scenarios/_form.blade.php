<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="project_id">
                {{ trans('app.project.single') }}
            </label>
            <br>
            <a href="{{ route('projects.show', $story->project->uid) }}">
                {{ $story->project->name }}
            </a>
        </div>
        <div class="form-group">
            <label for="story_id">
                {{ trans('app.story.single') }}
            </label><br>
            <a href="{{ route('stories.show', ['id' => $story->uid]) }}">
                {{ $story->title }}
            </a>
            {!! Form::hidden('story_id', $story->id) !!}
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="title">{{ trans('app.scenario.title') }}</label>
            {!! Form::text('title', null, ['autofocus', 'placeholder' => trans('app.scenario.title'), 'class' => 'form-control input-lg']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <label for="given"><b>
                    {{ trans('app.scenario.given') }}
                </b></label>

                <div class="btn-group btn-group-xs pull-right">
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="given" data-condition="and">+ {{ trans('app.scenario.and') }}</button>
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="given" data-condition="or">+ {{ trans('app.scenario.or') }}</button>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::textarea('given', null, ['placeholder' => trans('app.scenario.given'), 'class' => 'form-control', 'rows' => 2]) !!}
                    {!! $errors->first('given', '<span class="text-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    <div id="container-given">
                        @if (isset($scenario))
                            @foreach ($scenario->detailSituation('given') as $detail)
                                <div class="conditional" data-i="{{ $detail->id }}" data-situation="given">
                                    <input type="hidden" name="details[{{ $detail->id }}][condition]" value="{{ $detail->condition }}">
                                    <input type="hidden" name="details[{{ $detail->id }}][situation]" value="{{ $detail->situation }}">
                                    <div class="input-group">
                                        <label class="given-{{ $detail->id }}"><b>{{ $detail->condition }}</b></label>
                                        <input type="text" class="form-control" name="details[{{ $detail->id }}][detail]" value="{{ $detail->detail }}" required>
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-xs btn-default text-danger btn-remove-conditional">
                                                <i class="fa fa-trash-o text-danger"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <label for="when"><b>
                    {{ trans('app.scenario.when') }}
                </b></label>

                <div class="btn-group btn-group-xs pull-right">
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="when" data-condition="and">+ {{ trans('app.scenario.and') }}</button>
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="when" data-condition="or">+ {{ trans('app.scenario.or') }}</button>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::textarea('when', null, ['placeholder' => trans('app.scenario.when'), 'class' => 'form-control', 'rows' => 2]) !!}
                    {!! $errors->first('when', '<span class="text-danger">:message</span>') !!}
                </div>

                <div id="container-when">
                    @if (isset($scenario))
                        @foreach ($scenario->detailSituation('when') as $detail)
                            <div class="conditional" data-i="{{ $detail->id }}" data-situation="when">
                                <input type="hidden" name="details[{{ $detail->id }}][condition]" value="{{ $detail->condition }}">
                                <input type="hidden" name="details[{{ $detail->id }}][situation]" value="{{ $detail->situation }}">
                                <div class="form-group-group">
                                    <label class="when-{{ $detail->id }}"><b>{{ $detail->condition }}</b></label>
                                    <input type="text" class="form-control" name="details[{{ $detail->id }}][detail]" value="{{ $detail->detail }}" required>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-xs btn-default btn-remove-conditional"><i class="fa fa-trash-o text-danger"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <label for="then"><b>
                    {{ trans('app.scenario.then') }}
                </b></label>

                <div class="btn-group btn-group-xs pull-right">
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="then" data-condition="and">+ {{ trans('app.scenario.and') }}</button>
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="then" data-condition="or">+ {{ trans('app.scenario.or') }}</button>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::textarea('then', null, ['placeholder' => trans('app.scenario.then'), 'class' => 'form-control', 'rows' => 2]) !!}
                    {!! $errors->first('then', '<span class="text-danger">:message</span>') !!}
                </div>

                <div id="container-then">
                    @if (isset($scenario))
                        @foreach ($scenario->detailSituation('then') as $detail)
                            <div class="conditional" data-i="{{ $detail->id }}" data-situation="then">
                                <input type="hidden" name="details[{{ $detail->id }}][condition]" value="{{ $detail->condition }}">
                                <input type="hidden" name="details[{{ $detail->id }}][situation]" value="{{ $detail->situation }}">
                                <label class="then-{{ $detail->id }}"><b>{{ $detail->condition }}</b></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="details[{{ $detail->id }}][detail]" value="{{ $detail->detail }}" required>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-xsm btn-default text-danger btn-remove-conditional"><i class="fa fa-trash-o text-danger"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>