<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $table = 'scenarios';

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function details()
    {
        return $this->hasMany(ScenarioDetail::class);
    }

    public function detailSituation($situation)
    {
        return $this->details()->where('situation', '=', $situation)->get();
    }
}
