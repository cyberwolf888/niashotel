<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tamu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Tamu::all();
        return view('backend.tamu.manage',[
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
        $model = new Tamu();
        return view('backend.tamu.form',['model'=>$model]);
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
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'hp' => 'required',
            'email' => 'required|email',
            'no_identitas' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $model = new Tamu();
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->hp = $request->hp;
        $model->email = $request->email;
        $model->no_identitas = $request->no_identitas;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->save();

        return redirect()->route('backend.tamu.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Tamu::find($id);
        return view('backend.tamu.detail',['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Tamu::find($id);
        return view('backend.tamu.form',['model'=>$model,'update'=>true]);
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
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'hp' => 'required',
            'email' => 'required|email',
            'no_identitas' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $model = Tamu::find($id);
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->hp = $request->hp;
        $model->email = $request->email;
        $model->no_identitas = $request->no_identitas;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->save();

        return redirect()->route('backend.tamu.manage');
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
