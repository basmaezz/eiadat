<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAnalyzes extends Model
{
    protected $table= "doctor_analyzes";
    protected $fillable = [
        'name',
        'doctorId'
    ];
}
