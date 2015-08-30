<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="name">
                {{ trans('app.project.name') }}
            </label>
            {!! Form::text('name', null, ['autofocus', 'placeholder' => trans('app.project.name'), 'class' => 'form-control']) !!}
            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>