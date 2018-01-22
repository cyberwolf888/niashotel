<?php

namespace App\Http\Controllers\Backend;
use Image;
use File;
use App\Models\Foto;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Type::all();
        return view('backend.type.manage',['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Type();
        return view('backend.type.form',['model'=>$model]);
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
            'name' => 'required|unique:type|max:255',
            'fasilitas' => 'required',
            'status' => 'required',
        ]);

        $model = new Type();
        $model->name = $request->name;
        $model->fasilitas = $request->fasilitas;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.type.manage');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Type::find($id);
        return view('backend.type.detail',['model'=>$model,'update'=>true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Type::find($id);
        return view('backend.type.form',['model'=>$model,'update'=>true]);
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
            'name' => 'required|max:255',
            'fasilitas' => 'required',
            'status' => 'required',
        ]);

        $model = Type::find($id);
        $model->name = $request->name;
        $model->fasilitas = $request->fasilitas;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.type.manage');
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


    public function manage_gallery($id)
    {
        $model = Foto::where('type_id',$id)->get();
        return view('backend.type.manage_gallery',[
            'id' => $id,
            'model'=>$model
        ]);

    }

    public function create_gallery($id)
    {
        $model = new Foto();

        return view('backend.type.form_images',[
            'id'=>$id,
            'model'=>$model
        ]);
    }

    public function store_gallery(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);
        $model = new Foto();
        $path = base_path('assets/img/foto/'.$id.'/');
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $file = Image::make($request->file('image'))->resize(360, 459)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        $model->type_id = $id;
        $model->foto = $file->basename;
        $model->keterangan = $request->keterangan;
        $model->save();
        return redirect()->route('backend.type.gallery.manage',$id)->with('success', 'New Image!');
    }

    public function destroy_gallery($id)
    {
        $model = Foto::findOrFail($id);
        $type_id = $model->type_id;
        $path = base_path('assets/img/foto/'.$type_id.'/');
        if(is_file($path.$model->image)){
            unlink($path.$model->image);
            unlink($path.'thumb_'.$model->image);
        }
        $model->delete();
        return redirect()->route('backend.type.gallery.manage',$type_id);
    }
}
