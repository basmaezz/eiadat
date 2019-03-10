<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorRadiation extends Model
{

    protected $table= "doctor_radiations";
    protected $fillable = [
        'name',
        'doctorId'
    ];
}
