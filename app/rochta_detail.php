<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Drugs;

class rochta_detail extends Model
{
    protected $table="rochta_details";
    protected $guarded = ['id'];

    protected $fillablse = ['patientId', 'doctorId', 'usages', 'notes', 'drugId' ];



    public function rochta()
    {
        return $this->belongsTo(rochta::class,'rochtaId','id');
    }

    public function drug()
    {
        return $this->hasOne(\App\Drugs::class,'id','drugId');
    }
}
