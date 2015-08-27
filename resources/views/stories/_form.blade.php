<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="title"><b>Story title</b></label>
            {!! Form::text('title', null, ['autofocus', 'placeholder' => 'Story title', 'class' => 'form-control input-lg']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="who"><b>Who</b></label>
            {!! Form::textarea('who', null, ['placeholder' => 'Persona or role', 'class' => 'form-control input-lg', 'rows' => 2]) !!}
            {!! $errors->first('who', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="what"><b>What</b></label>
            {!! Form::textarea('what', null, ['placeholder' => 'The action', 'class' => 'form-control input-lg', 'rows' => 2]) !!}
            {!! $errors->first('what', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group">
            <label for="why"><b>Why</b></label>
            {!! Form::textarea('why', null, ['placeholder' => 'The reason', 'class' => 'form-control input-lg', 'rows' => 2]) !!}
            {!! $errors->first('why', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>
