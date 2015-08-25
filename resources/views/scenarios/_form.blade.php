<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="title">Scenario title</label>
            {!! Form::text('title', null, ['autofocus', 'placeholder' => 'Scenario title', 'class' => 'form-control input-lg']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <dl class="dl-horizontal">
            <dt>
                Given

                <div id="container-given-labels">

                    @if (isset($scenario))
                        @foreach ($scenario->detailSituation('given') as $detail)
                        <div class="given-{{ $detail->id }}"><br>{{ $detail->condition }}</div>
                        @endforeach
                    @endif
                </div>
            </dt>
            <dd>
                <div class="form-group">
                    <div class="input-group">
                        {!! Form::text('given', null, ['placeholder' => 'Given', 'class' => 'form-control']) !!}
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-success btn-add-conditional" data-situation="given" data-condition="and">
                                + AND
                            </button>
                            <button type="button" class="btn btn-success btn-add-conditional" data-situation="given" data-condition="or">
                                + OR
                            </button>
                        </div>
                    </div>
                    {!! $errors->first('given', '<span class="text-danger">:message</span>') !!}

                    <div id="container-given">

                        @if (isset($scenario))
                            @foreach ($scenario->detailSituation('given') as $detail)
                                <div class="conditional" data-i="{{ $detail->id }}">
                                    <input type="hidden" name="details[{{ $detail->id }}][condition]" value="{{ $detail->condition }}">
                                    <input type="hidden" name="details[{{ $detail->id }}][situation]" value="{{ $detail->situation }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="details[{{ $detail->id }}][detail]" value="{{ $detail->detail }}" required>
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-default text-danger btn-remove-conditional">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </dd>

            <hr>

            <dt>
                When
            </dt>
            <dd>
                <div class="form-group">
                    <div class="input-group">
                        {!! Form::text('when', null, ['placeholder' => 'When', 'class' => 'form-control']) !!}
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-success btn-add-conditional" data-situation="when" data-condition="and">
                                + AND
                            </button>
                            <button type="button" class="btn btn-success btn-add-conditional" data-situation="when" data-condition="or">
                                + OR
                            </button>
                        </div>
                    </div>
                    {!! $errors->first('when', '<span class="text-danger">:message</span>') !!}
                </div>
            </dd>

            <hr>

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
    </div>
</div>
