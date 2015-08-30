@extends('_layouts.default')

@section('main')

<h3>{{ $title }}</h3>
<hr>

{!! Form::open(['route' => 'scenarios.store']) !!}

@include('scenarios._form')

<button type="submit" class="btn btn-lg btn-block btn-primary">
    {{ trans('app.scenario.create') }}
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