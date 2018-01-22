<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = "transaksi_detail";

    public function kamar()
    {
        return $this->belongsTo('App\Models\Kamar','kamar_id');
    }
}
