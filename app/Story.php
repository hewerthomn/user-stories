<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes;

    protected $table = 'stories';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scenarios()
    {
        return $this->hasMany(Scenario::class);
    }

    public function status()
    {
        return $this->belongsTo(StatusStory::class);
    }

    public function findByUid($uid)
    {
        return $this->whereUid($uid)->firstOrFail();
    }

    public function link($link)
    {
        switch($link)
        {
            case 'project':
                $params = ['id' => $this->project_id, 'story_id' => $this->id];
                return ['projects.show', $paras];
        }
    }
}
