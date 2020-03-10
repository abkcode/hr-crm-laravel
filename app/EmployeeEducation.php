<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEducation extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
