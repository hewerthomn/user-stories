@extends('_layouts.default')

@section('main')

<fieldset>
    <legend>
        <i class="fa fa-star-o text-muted"></i>
        {{ trans('app.project.favorited') }}
    </legend>

    <div class="row">
        @foreach ($favoritedProjects as $p)
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('p/'.$p->uid) }}" class="list-group-item">
                        <span class="h6 text-primary">
                            {{ $p->name }}

                            <span class="pull-right">
                                <i class="fa fa-star-o text-warning"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</fieldset>

<br>

<fieldset>
    <legend>
        <i class="fa fa-user text-muted"></i>
        {{ trans('app.project.my') }}
    </legend>

    <div class="row">
        @foreach ($favoritedProjects as $p)
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('p/'.$p->uid) }}" class="list-group-item">
                    <span class="h6 text-primary">
                        {{ $p->name }}
                    </span>
                </a>
            </div>
        </div>
        @endforeach
        <div class="col-md-3">
            <a href="{{ route('projects.create') }}" class="btn btn-lg btn-success btn-block">
                <i class="fa fa-plus"></i>
                {{ trans('app.project.new') }}
            </a>
        </div>
    </div>
</fieldset>
@stop