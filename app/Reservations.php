<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table="Reservations";

    public function Doctor()
   {
       return $this->belongsTo(UserWeb::class,'doctorId','id');
   }
   
   
    public function Patient()
   {
       return $this->belongsTo(UserWeb::class,'patientId','id');
   }
}
