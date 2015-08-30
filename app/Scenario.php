<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scenario extends Model
{
    use SoftDeletes;

    protected $table = 'scenarios';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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
