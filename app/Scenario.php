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
}
