<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="title">Story title</label>
            {!! Form::text('title', null, ['autofocus', 'placeholder' => 'Story title', 'class' => 'form-control input-lg']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <dl class="dl-horizontal">
            <dt>
                As a<br>
                <small class="text-muted">Who</small>
            </dt>
            <dd>
                <div class="form-group">
                    {!! Form::text('who', null, ['placeholder' => 'Persona or role', 'class' => 'form-control input-lg']) !!}
                    {!! $errors->first('who', '<span class="text-danger">:message</span>') !!}
                </div>
            </dd>

            <dt>
                I want<br>
                <small class="text-muted">What</small>
            </dt>
            <dd>
                <div class="form-group">
                    {!! Form::text('what', null, ['placeholder' => 'The action', 'class' => 'form-control input-lg']) !!}
                    {!! $errors->first('what', '<span class="text-danger">:message</span>') !!}
                </div>
            </dd>

            <dt>
                So that<br>
                <small class="text-muted">Why</small>
            </dt>
            <dd>
                <div class="form-group">
                    {!! Form::textarea('why', null, ['placeholder' => 'The reason', 'class' => 'form-control input-lg', 'rows' => 2]) !!}
                    {!! $errors->first('why', '<span class="text-danger">:message</span>') !!}
                </div>
            </dd>
        </dl>
    </div>
</div>
