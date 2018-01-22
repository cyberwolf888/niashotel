<?php

namespace App\Http\Controllers\Backend;

use App\Models\Foto;
use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Kamar::all();
        return view('backend.kamar.manage',['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Kamar();
        return view('backend.kamar.form',[
            'model'=>$model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type_id' => 'required',
            'harga' => 'required|numeric',
            'extra_bed' => 'required|numeric',
            'no_kamar' => 'required|numeric',
            'status' => 'required',
        ]);

        $model = new Kamar();
        $model->type_id = $request->type_id;
        $model->status = $request->status;
        $model->no_kamar = $request->no_kamar;
        $model->harga = $request->harga;
        $model->extra_bed = $request->extra_bed;

        $model->save();

        return redirect()->route('backend.kamar.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Kamar::find($id);
        return view('backend.kamar.detail',[
            'model'=>$model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Kamar::find($id);
        return view('backend.kamar.form',[
            'model'=>$model,
            'update'=>true
        ]);
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
        $this->validate($request, [
            'type_id' => 'required',
            'harga' => 'required|numeric',
            'extra_bed' => 'required|numeric',
            'no_kamar' => 'required|numeric',
            'status' => 'required',
        ]);

        $model = Kamar::find($id);
        $model->type_id = $request->type_id;
        $model->status = $request->status;
        $model->no_kamar = $request->no_kamar;
        $model->harga = $request->harga;
        $model->extra_bed = $request->extra_bed;

        $model->save();

        return redirect()->route('backend.kamar.manage');
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
}
