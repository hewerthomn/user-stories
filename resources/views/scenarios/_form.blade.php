<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <label for="title">Scenario title</label>
            {!! Form::text('title', null, ['autofocus', 'placeholder' => 'Scenario title', 'class' => 'form-control input-lg']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <label for="given"><b>Given</b></label>

                <div class="btn-group btn-group-xs pull-right">
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="given" data-condition="and">+ AND</button>
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="given" data-condition="or">+ OR</button>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::textarea('given', null, ['placeholder' => 'Given', 'class' => 'form-control', 'rows' => 2]) !!}
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
                                            <button type="button" class="btn btn-xs btn-default text-danger btn-remove-conditional"><i class="fa fa-trash-o text-danger"></i></button>
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
                <label for="when"><b>When</b></label>

                <div class="btn-group btn-group-xs pull-right">
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="when" data-condition="and">+ AND</button>
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="when" data-condition="or">+ OR</button>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::textarea('when', null, ['placeholder' => 'When', 'class' => 'form-control', 'rows' => 2]) !!}
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
                <label for="then"><b>Then</b></label>

                <div class="btn-group btn-group-xs pull-right">
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="then" data-condition="and">+ AND</button>
                    <button type="button" class="btn btn-default btn-add-conditional" data-situation="then" data-condition="or">+ OR</button>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::textarea('then', null, ['placeholder' => 'Then', 'class' => 'form-control', 'rows' => 2]) !!}
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