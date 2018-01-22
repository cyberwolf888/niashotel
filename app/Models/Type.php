<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "type";

    public function foto()
    {
        return $this->hasMany('App\Models\Foto','type_id');
    }
}
