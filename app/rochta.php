<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rochta extends Model
{
    protected $table="rochtas";


    public function patient() {
        return $this->belongsTo('App\UserWeb', 'patientId', 'id');
    }

    public function doctor() {
        return $this->belongsTo('App\UserWeb', 'doctorId', 'id');
    }

    public function details(){
        return $this->hasmany('App\rochta_detail','rochtaId','id');
    }

}
