<div class="form-group">
    <label for="title">Scenario title</label>
    {!! Form::text('title', null, ['autofocus', 'placeholder' => 'Scenario title', 'class' => 'form-control input-lg']) !!}
    {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
</div>

<hr>

<dl class="dl-horizontal well well-sm">
    <dt>
        Given
    </dt>
    <dd>
        <div class="form-group">
            {!! Form::text('given', null, ['placeholder' => 'Given', 'class' => 'form-control']) !!}
            {!! $errors->first('given', '<span class="text-danger">:message</span>') !!}
        </div>
    </dd>

    <dt>
        When
    </dt>
    <dd>
        <div class="form-group">
            {!! Form::text('when', null, ['placeholder' => 'When', 'class' => 'form-control']) !!}
            {!! $errors->first('when', '<span class="text-danger">:message</span>') !!}
        </div>
    </dd>

    <dt>
        Then
    </dt>
    <dd>
        <div class="form-group">
            {!! Form::text('then', null, ['placeholder' => 'Then', 'class' => 'form-control']) !!}
            {!! $errors->first('then', '<span class="text-danger">:message</span>') !!}
        </div>
    </dd>
</dl>