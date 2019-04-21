<?php

namespace App;

//use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use App\Doctors;


class UserWeb extends Authenticatable {

    protected $with = ['rochta'];
    use Notifiable;
//    use AuthenticableTrait;
    protected $table = 'users-web';
    protected $guard = 'users-web';

    protected $fillable = ['name', 'age', 'email', 'phone', 'password','serialNo','cityId',
        'stateId','quarterId','gender'
        ];

    protected $hidden = ['password', 'remember_token'];

//    public function DrDetails() {
//        return $this->hasMany('App\Doctors ', 'userId', 'id');
//
//    }


    public function drugs() {
        return $this->hasMany('App\Drugs', 'doctorId', 'id');
    }

    public function analyzes() {
        return $this->hasMany('App\DoctorAnalyzes', 'doctorId', 'id');
    }


    public function radiations() {
        return $this->hasMany('App\DoctorRadiation', 'doctorId', 'id');
    }

    public function processes() {
        return $this->hasMany('App\DoctorProcess', 'doctorId', 'id');
    }

    public function patients() {
        return $this->belongsToMany('App\UserWeb','patient_histroys','doctorId', 'patientId');
    }

    public function reservations() {
        return $this->belongsToMany('App\UserWeb','reservations','doctorId', 'patientId');
    }


    public function history(){
        return $this->hasMany('PatientHistroy');
    }

    public function rochta(){
        return $this->hasMany('\App\rochta', 'patientId', 'id');
    }

//    public function city_id(){
//        return $this->hasOne('App\CityState','cityId','id');
//    }
//
//    public function state_id(){
//        return $this->hasOne('App\CityQuarter','id','stateId');
//    }


//     public function cities(){
//         return $this->belongsToMany('App\City','Doctors','userId', 'countryId');
//
//     }


    public function cities() {
        return $this->belongsToMany('App\City','Doctors','userId', 'countryId');
    }

    public function specialization() {
        return $this->belongsToMany('App\Cateory','Doctors','specialId', 'userId');
    }
//    public function specialization() {
//        return $this->belongsTo('App\Cateory', 'specialId');
//    }

}
