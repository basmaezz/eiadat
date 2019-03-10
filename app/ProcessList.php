<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessList extends Model
{
    //
    public function Doctor()
    {
        return $this->belongsTo('App\UserWeb','doctorId','id') ;
    }


    public function Patient()
    {
        return $this->belongsTo('App\UserWeb','patientId','id') ;
    }


    public function Process()
    {
        return $this->belongsTo('App\DoctorProcess','processId','id') ;
    }
}
