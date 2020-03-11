<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeExperience extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function getEmployementTypes() {
        return [
            1 => 'Full-time',
            2 => 'Part-time',
            3 => 'Self-employed',
            4 => 'Freelance',
            5 => 'Contract',
            6 => 'Internship',
            7 => 'Apprenticeship',
        ];
    }
}
