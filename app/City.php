<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $with = ['states'];
    ////
    protected $table = 'cities';

    public function states()
    {
        return $this->hasMany('\App\CityState', 'cityId', 'id');
    }
}
