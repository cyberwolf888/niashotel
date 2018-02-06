<?php

namespace App\Http\Controllers\Backend;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.laporan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function result(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $start_date = date('Y/m/d', strtotime($request->start_date));
        $end_date = date('Y/m/d', strtotime($request->end_date));
        $transaction = DB::select('SELECT co.tgl AS tgl_checkout, co.keterangan, co.tax, co.service, co.subtotal, co.diskon, co.total,
                                    ci.tamu_id, ci.tgl AS tgl_checkin, ci.status,
                                    td.kamar_id, td.jumlah_tamu, td.total AS harga, td.extra_bed,
                                    t.nama, t.alamat, t.hp, t.email, t.no_identitas, t.jenis_kelamin  
                            FROM checkout AS co
                            JOIN checkin AS ci ON ci.id = co.checkin_id
                            JOIN transaksi_detail AS td ON td.checkin_id = ci.id
                            JOIN tamu AS t ON t.id = ci.tamu_id
                            WHERE ci.tgl >= "'.$start_date.'" AND ci.tgl <= "'.$end_date.'"');



        return view('backend.laporan.result',[
            'model'=>$transaction,
            'start_date'=>$start_date,
            'end_date'=>$end_date
        ]);
    }

}
