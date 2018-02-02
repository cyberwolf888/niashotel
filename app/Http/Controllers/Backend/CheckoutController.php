<?php

namespace App\Http\Controllers\Backend;

use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\Kamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Checkout::orderBy('id','desc')->get();
        return view('backend.checkout.manage',['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        $model = new Checkout();
        $kamar_id= null;
        if($id!=null){
            $checkin = Checkin::find($id);
            $kamar_id = $checkin->detail->kamar_id;
        }

        return view('backend.checkout.form',['model'=>$model,'kamar_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Checkout();
        $model->checkin_id = $request->checkin_id;
        $model->user_id = \Auth::user()->id;
        $model->tgl = date('Y-m-d');
        $model->keterangan = $request->keterangan;
        $model->status = 1;
        $model->total = $request->total;
        $model->save();

        $checkin = Checkin::find($model->checkin_id);
        $checkin->status = 1;
        $checkin->save();

        $kamar = Kamar::find($checkin->detail->kamar_id);
        $kamar->status = 1;
        $kamar->save();

        return redirect()->route('backend.checkout.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Checkout::find($id);

        return view('backend.checkout.detail',['model'=>$model]);
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

    public function get_total(Request $request)
    {
        $checkin = Checkin::find($request->checkin_id);
        $tgl_checkin = Carbon::createFromFormat('Y-m-d',$checkin->tgl);
        $diff = $tgl_checkin->diffInDays(Carbon::now());
        $diff = $diff==0 ? 1 : $diff;
        $harga = $checkin->detail->total;
        return response()->json(['harga'=>$harga,'durasi'=>$diff,'total'=>$harga*$diff,'tgl_checkin'=>$tgl_checkin->format('d/m/Y'),'tamu'=>$checkin->tamu]);
    }
}
