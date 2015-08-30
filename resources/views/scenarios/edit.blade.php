@extends('_layouts.default')

@section('main')

<h3>
    {{ $title }}

    {!! Form::open(['class' => 'pull-right', 'method' => 'DELETE', 'route' => ['scenarios.destroy', $scenario->id]]) !!}
        <button type="submit" class="btn btn-link" onclick="return confirm('{{ trans('messages.scenario.confirmDelete') }}');">
            <i class="fa fa-trash-o text-danger"></i>
        </button>
    {!! Form::close() !!}
</h3>
<hr>

{!! Form::model($scenario, ['method' => 'PUT', 'route' => ['scenarios.update', $scenario->id]]) !!}

@include('scenarios._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">
    {{ trans('app.scenario.save') }}
</button>

{!! Form::close() !!}

@stop

@section('scripts')
@include('scenarios._templates')

<script src="/js/scenarios/scripts.js"></script>
<script>
    var lang = {
        confirm: '{{ trans('app.confirm') }}',
        and: '{{ trans('app.scenario.and') }}',
        or: '{{ trans('app.scenario.or') }}',
        given: '{{ trans('app.scenario.given') }}',
        when: '{{ trans('app.scenario.when') }}',
        then: '{{ trans('app.scenario.then') }}',
    };
    new app().init(lang);
</script>
@stop