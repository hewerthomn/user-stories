<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function bugs()
    {
        return $this->hasMany(Bug::class);
    }

    public function findByUid($uid)
    {
        return $this->whereUid($uid)->firstOrFail();
    }

    public function selectList()
    {
        return $this->where('owner_id', '=', Auth::user()->id)
                    ->lists('name', 'uid');
    }
}
