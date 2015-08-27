@extends('_layouts.default')

@section('main')

<h3>{{ $title }}</h3>
<hr>

<div class="text-center">

    <span title="Powered by Gravatar">
        <a href="https://gravatar.com" target="_blank">
            <img alt="image" class="gravatar img-circle" src="{{ Gravatar::src(Auth::user()->email) }}">
        </a>
    </span>

    <h5 class="text-primary">
        {{ Auth::user()->name }}
        <br>
        <small>{{ Auth::user()->email }}</small>
    </h5>

</div>

@stop