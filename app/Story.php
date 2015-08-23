<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'stories';

    public function getUidAttribute($value)
    {
        return 'US ' . $this->project_id . str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scenarios()
    {
        return $this->hasMany(Scenario::class);
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
