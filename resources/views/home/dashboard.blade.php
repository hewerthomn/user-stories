@extends('_layouts.default')

@section('main')
<h4>
    {{ $title }}

    <small class="pull-right text-right">
        <small>
            {{ date('D') }}, {{ date('d') }}, {{ date('M') }}
            <br>
            <small>{{ date('Y') }}</small>

        </small>
    </small>
</h4>
<hr>

<div class="row">
    <div class="col-xs-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-body h5 text-center">
                <br>
                {{ $totalProjects }}
                <br>
                <i class="fa fa-rocket text-danger"></i>
                <small>Projects</small>
                <br><br>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-body h5 text-center">
                <br>
                {{ $totalStories }}
                <br>
                <i class="fa fa-file-text-o text-primary"></i>
                <small>Stories</small>
                <br><br>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-body h5 text-center">
                <br>
                {{ $totalBugs }}
                <br>
                <i class="fa fa-bug text-success"></i>
                <small>Bugs</small>
                <br><br>
            </div>
        </div>
    </div>
</div>

@stop