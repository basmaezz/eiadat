<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rochta extends Model
{

    protected $with = ['details'];
    protected $withCount = ['details'];
    protected $table="rochtas";


    public function patient() {
        return $this->belongsTo('App\UserWeb', 'patientId', 'id');
    }

    public function doctor() {
        return $this->belongsTo('App\UserWeb', 'doctorId', 'id');
    }

    public function details(){
        return $this->hasMany('App\rochta_detail','rochtaId','id');
    }

}
