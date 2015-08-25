<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Project name</label>
                    {!! Form::text('name', null, ['autofocus', 'placeholder' => 'Project name', 'class' => 'form-control']) !!}
                    {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="url">URL</label>
                    {!! Form::url('url', null, ['placeholder' => 'URL', 'class' => 'form-control']) !!}
                    {!! $errors->first('url', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="about">About the project</label>
            {!! Form::textarea('about', null, ['placeholder' => 'About the project', 'class' => 'form-control', 'rows' => 4]) !!}
            {!! $errors->first('about', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>