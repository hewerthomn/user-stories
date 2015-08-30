<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bug extends Model
{
    use SoftDeletes;

    protected $table = 'bugs';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
