<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="title">Short description</label>
            {!! Form::textarea('title', null, ['autofocus', 'class' => 'form-control', 'placeholder' => 'Short description', 'rows' => 2]) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="version">Version <small class="text-muted">(Optional)</small></label>
            {!! Form::textarea('version', null, ['class' => 'form-control', 'placeholder' => 'Version (optional)', 'rows' => 2]) !!}
            {!! $errors->first('version', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="pre_conditions">Pré-conditions</label>
            {!! Form::textarea('pre_conditions', null, ['class' => 'form-control', 'placeholder' => 'Pre-conditions', 'rows' => 2]) !!}
            {!! $errors->first('pre_conditions', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="steps_to_reproduce">Steps to reproduce</label>
            {!! Form::textarea('steps_to_reproduce', null, ['class' => 'form-control', 'placeholder' => 'Steps to reproduce', 'rows' => 2]) !!}
            {!! $errors->first('steps_to_reproduce', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 3]) !!}
            {!! $errors->first('description', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="desired_situation">Desired situation</label>
            {!! Form::textarea('desired_situation', null, ['class' => 'form-control', 'placeholder' => 'Desired situation', 'rows' => 3]) !!}
            {!! $errors->first('desired_situation', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>