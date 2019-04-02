<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Doctors extends Model
{
    //
     protected $table =  'doctors';
     
      public  function Special()
    {
        return $this->belongsTo('App\Cateory','specialId','id') ;

    }
    public function city_id(){
          return $this->hasOne('App\CityState','id','cityId');
    }

    public function state_id(){
        return $this->hasOne('App\CityQuarter','id','stateId');
    }


    public function special_id(){
        return $this->hasOne('App\Cateory','id','specialId');
    }


    public function title_id(){
        return $this->hasOne('App\Specialization','id','titleId');
    }
    
    
    public  function drugs(){
          return $this->hasmany('App\Drugs');
    }

    public function users(){
        return $this->belongsTo('App\UserWeb','id','userId');
    }



}
