<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PatientHistroy extends Model
{
//    public function doctors() {
//        return $this->hasMany('App\User','id','doctorId') ;
//    }
    public function patient() {
        return $this->belongsTo('App\UserWeb', 'patientId', 'id');
    }
}
