<?php

namespace App\Http\Controllers\Backend;

use App\Models\Checkin;
use App\Models\Kamar;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Checkin::where('status','0')->orderBy('tgl','desc')->get();
        return view('backend.checkin.manage',[
            'model'=>$model
        ]);
    }

    public function all()
    {
        $model = Checkin::orderBy('tgl','desc')->get();
        return view('backend.checkin.manage',[
            'model'=>$model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Checkin();
        $_kamar = Kamar::where('status','1')->with('type')->get();
        $kamar = [];
        foreach ($_kamar as $k){
            $label = $k->no_kamar.' - '.$k->type->name;
            $kamar[$k->id] = $label;
        }
        return view('backend.checkin.form',['model'=>$model,'kamar'=>$kamar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kamar = Kamar::find($request->kamar_id);

        $model = new Checkin();
        $model->user_id = \Auth::user()->id;
        $model->tamu_id = $request->tamu_id;
        $model->tgl = date('Y-m-d');
        $model->status = 0;
        $model->save();

        $detail = new TransaksiDetail();
        $detail->checkin_id = $model->id;
        $detail->kamar_id = $request->kamar_id;
        $detail->total = $request->total;
        $detail->jumlah_tamu = $request->jumlah_tamu;
        $detail->extra_bed = $request->extra;
        $detail->save();

        $kamar->status = 0;
        $kamar->save();

        return redirect()->route('backend.checkin.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Checkin::find($id);
        return view('backend.checkin.detail',['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check_harga(Request $request)
    {
        $model = Kamar::find($request->no_kamar);
        $total = $request->extrabed == "1" ? $model->harga+$model->extra_bed : $model->harga;
        $extra = $request->extrabed == "1" ? $model->extra_bed : 0;

        return response()->json(['total'=>$total,'extra'=>$extra]);

    }
}
