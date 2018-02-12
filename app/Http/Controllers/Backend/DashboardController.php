<?php

namespace App\Http\Controllers\Backend;

use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\Tamu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $start_date = date("Y-m-d");
        $end_date = date("Y-m-d", strtotime('-1 week', strtotime($start_date)));
        $sales = Checkout::where(DB::Raw('MONTH(tgl)'),'=',date('m'))->sum('total');
        $jumlah_checkin = Checkin::where(DB::Raw('MONTH(tgl)'),'=',date('m'))->count();
        $jumlah_tamu = Tamu::where(DB::Raw('MONTH(created_at)'),'=',date('m'))->count();

        $bulan = [1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Aug','Spt','Oct','Nov','Dec'];
        $labels='[]';
        $series='[]';
        $transaksi = \DB::select('select sum(t.total) as total_transaksi, MONTH(t.tgl) AS bulan from checkout AS t group by MONTH(t.tgl)');
        if (count($transaksi)>0){
            $series = '[';
            $labels ='[';
            foreach ($transaksi as $row){
                $series.=$row->total_transaksi.',';
                $labels.="'".$bulan[$row->bulan]."',";
            }
            $series = substr($series, 0, -1).']';
            $labels = substr($labels, 0, -1).']';
        }



        return view('backend.dashboard.index',[
            'sales'=>$sales,
            'jumlah_checkin'=>$jumlah_checkin,
            'jumlah_tamu'=>$jumlah_tamu,
            'series'=>$series,
            'labels'=>$labels
        ]);
    }
}
