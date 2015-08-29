<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="title"><b>{{ trans('app.bug.title') }}</b></label>
            {!! Form::textarea('title', null, ['autofocus', 'class' => 'form-control', 'placeholder' => trans('app.bug.title'), 'rows' => 2]) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="version"><b>{{ trans('app.bug.version') }} <small class="text-muted">({{ trans('app.optional') }})</small></b></label>
            {!! Form::textarea('version', null, ['class' => 'form-control', 'placeholder' => trans('app.bug.version').' ('.trans('app.optional').')', 'rows' => 2]) !!}
            {!! $errors->first('version', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="pre_conditions"><b>{{ trans('app.bug.pre_conditions') }}</b></label>
            {!! Form::textarea('pre_conditions', null, ['class' => 'form-control', 'placeholder' => trans('app.bug.pre_conditions'), 'rows' => 2]) !!}
            {!! $errors->first('pre_conditions', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="steps_to_reproduce"><b>{{ trans('app.bug.steps_to_reproduce') }}</b></label>
            {!! Form::textarea('steps_to_reproduce', null, ['class' => 'form-control', 'placeholder' => trans('app.bug.steps_to_reproduce'), 'rows' => 2]) !!}
            {!! $errors->first('steps_to_reproduce', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="description"><b>{{ trans('app.bug.description') }}</b></label>
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('app.bug.description'), 'rows' => 3]) !!}
            {!! $errors->first('description', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="desired_situation"><b>{{ trans('app.bug.desired_situation') }}</b></label>
            {!! Form::textarea('desired_situation', null, ['class' => 'form-control', 'placeholder' => trans('app.bug.desired_situation'), 'rows' => 3]) !!}
            {!! $errors->first('desired_situation', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>