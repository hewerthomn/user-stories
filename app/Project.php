<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

}
