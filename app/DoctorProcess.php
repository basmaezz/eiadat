<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorProcess extends Model
{
    protected $table= "doctor_processes";
    protected $fillable = [
        'name',
        'doctorId'
    ];
}
