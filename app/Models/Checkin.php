<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $table = "checkin";

    public function detail()
    {
        return $this->hasOne('App\Models\TransaksiDetail','checkin_id');
    }

    public function tamu()
    {
        return $this->belongsTo('App\Models\Tamu','tamu_id');
    }
}
