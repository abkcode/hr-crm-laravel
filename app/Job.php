<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'experience', 'location',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
