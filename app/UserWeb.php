<?php

namespace App;

//use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserWeb extends Authenticatable {

    use Notifiable;
//    use AuthenticableTrait;
    protected $table = 'users-web';
    protected $guard = 'users-web';

    protected $fillable = ['name', 'age', 'email', 'phone', 'password','serialNo','cityId',
        'stateId','quarterId','gender'
        ];

    protected $hidden = ['password', 'remember_token'];

    public function DrDetails() {
        return $this->belongsTo('App\Doctor ', 'userId', 'id');

    }

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
        return $this->hasMany('rochta');
    }


}
