<div class="col-md-4">
    <fieldset>
        <legend>{{ trans('app.status.'.$status->id) }}</legend>

        <div class="list-group">
            <?php $stories = $project->stories()->whereStatusId($status->id)->get(); ?>
            @foreach ($stories as $s)
            <a href="{{ route('stories.show', ['uid' => $s->uid]) }}" class="list-group-item">
                <span class="text-primary">
                    {{ $s->title }}
                </span>
                <br>
                <small class="text-muted">
                    {{ $s->status->name }}
                </small>
            </a>
            @endforeach
        </div>
    </fieldset>
</div>
