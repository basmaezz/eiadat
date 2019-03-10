<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drugs extends Model
{
    protected $table= "drugs";
    protected $fillable = [
        'name',
        'doctorId'
    ];

//    public function doctors(){
//        return $this->hasMany('App\Doctors');
//    }
}
