<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drugs extends Model
{
    protected $table= "drugs";
    protected $fillable = [
        'id',
        'name',
        'usages',
        'doctorId'
    ];

//    public function doctors(){
//        return $this->hasMany('App\Doctors');
//    }

      public function rochta(){
          return $this->hasMany('rochta_detail','drugId');
      }
}
