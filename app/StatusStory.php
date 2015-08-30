<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusStory extends Model
{
    protected $table = 'status';

    public $timestamps = false;

    const TODO = 1;

    const DOING = 2;

    const DONE = 3;

    public function selectList()
    {
        return $this->whereType('Story')->lists('name', 'id');
    }
}
