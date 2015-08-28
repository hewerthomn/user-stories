@extends('_layouts.default')

@section('main')
<h3>
    <a href="{{ route('projects.show', $bug->project_id) }}">
        {{ $bug->project->name }}
    </a>
</h3>
<hr>

<div class="panel panel-default-outline">
    <div class="panel-heading">
        <b class="text-muted h5">
            {{ $bug->uid }}
        </b>
        <br>
        <span class="h6">
            {{ $bug->title }}
        </span>
    </div>
    <div class="panel-body">
        @if (!empty($bug->version))
        <p>
            <b>Version</b><br>
            {{ $bug->version }}
        </p>
        @endif

        <p>
            <b>Pre-conditions</b><br>
            {!! nl2br($bug->pre_conditions) !!}
        </p>
        <p>
            <b>Steps to reproduce</b><br>
            {!! nl2br($bug->steps_to_reproduce) !!}
        </p>
        <p>
            <b>Bug description</b><br>
            {!! nl2br($bug->description) !!}
        </p>
        <p>
            <b>Desired situation</b><br>
            {!! nl2br($bug->desired_situation) !!}
        </p>


        <a href="{{ route('bugs.edit', $bug->id) }}">Edit bug report</a>
    </div>
</div>

@stop