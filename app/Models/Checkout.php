<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = "checkout";

    public function checkin()
    {
        return $this->belongsTo('App\Models\Checkin','checkin_id');
    }
}
