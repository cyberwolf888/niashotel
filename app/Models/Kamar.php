<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = "kamar";

    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id');
    }
}
