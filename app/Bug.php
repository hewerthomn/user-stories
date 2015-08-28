<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $table = 'bugs';

    public function getUidAttribute($value)
    {
        return 'B' . $this->project_id . str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
