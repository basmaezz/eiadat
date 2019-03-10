<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table =  'menus';

    public function childs() {
        return $this->hasMany('App\Menu','parentId','id') ;
    }
}
