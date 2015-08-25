<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScenarioDetail extends Model
{
    protected $table = 'scenario_details';

    protected $fillable = ['scenario_id', 'situation', 'condition', 'detail'];
}
