<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="title"><b>{{ trans('app.story.title') }}</b></label>
            {!! Form::text('title', null, ['autofocus', 'placeholder' => trans('app.story.title'), 'class' => 'form-control input-lg']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="who"><b>{{ trans('app.story.who') }}</b></label>
            {!! Form::textarea('who', null, ['placeholder' => trans('app.story.whoPlaceholder'), 'class' => 'form-control input-lg', 'rows' => 2]) !!}
            {!! $errors->first('who', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="what"><b>{{ trans('app.story.what') }}</b></label>
            {!! Form::textarea('what', null, ['placeholder' => trans('app.story.whatPlaceholder'), 'class' => 'form-control input-lg', 'rows' => 2]) !!}
            {!! $errors->first('what', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="why"><b>{{ trans('app.story.why') }}</b></label>
            {!! Form::textarea('why', null, ['placeholder' => trans('app.story.whyPlaceholder'), 'class' => 'form-control input-lg', 'rows' => 2]) !!}
            {!! $errors->first('why', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="status_id">{{ trans('app.story.status') }}</label>
            {!! Form::select('status_id', $status, empty($story) ? App\StatusStory::TODO : null, ['class' => 'form-control']) !!}
            {!! $errors->first('status_id', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>
