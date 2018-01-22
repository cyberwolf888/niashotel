<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{
    /*
     * Admin
     */
    public function admin()
    {
        $model = User::where('type',User::ADMIN)->get();

        return view('backend.user.admin',[
            'model'=>$model
        ]);

    }

    public function create_admin()
    {
        $model = new User();
        return view('backend.user.form_admin',[
            'model'=>$model
        ]);
    }

    public function store_admin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('backend.user.admin.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request['password']);
        $user->isActive = $request->status == 'on' ? 1 : 0;
        $user->type = User::ADMIN;
        $user->save();

        return redirect()->route('backend.user.admin.manage')->with('success', 'Add new admin!');
    }

    public function edit_admin($id)
    {
        $model = User::findOrFail($id);

        return view('backend.user.form_admin',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update_admin(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $filter = [
            'fullname' => 'required|max:255',
            'phone' => 'required'
        ];

        if($request->email === $user->email){
            $filter['email'] = 'required|string|email|max:255';
        }else{
            $filter['email'] = 'required|string|email|max:255|unique:users';
        }

        if($request->password != null){
            $filter['password'] = 'required|string|min:6|confirmed';
            $user->password = bcrypt($request->password);
        }

        $validator = Validator::make($request->all(),$filter);

        if ($validator->fails()) {
            return redirect()
                ->route('backend.user.admin.update')
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request->fullname;
        $user->phone = $request->phone;
        $user->isActive = $request->status == 'on' ? 1 : 0;
        $user->save();

        return redirect()->route('backend.user.admin.manage')->with('success', 'Update admin!');
    }

    /*
     * Karyawan
     */
    public function karyawan()
    {
        $model = User::where('type',User::KARYAWAN)->get();

        return view('backend.user.karyawan',[
            'model'=>$model
        ]);

    }

    public function create_karyawan()
    {
        $model = new User();
        return view('backend.user.form_karyawan',[
            'model'=>$model
        ]);
    }

    public function store_karyawan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('backend.user.karyawan.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request['password']);
        $user->isActive = $request->status == 'on' ? 1 : 0;
        $user->type = User::KARYAWAN;
        $user->save();

        return redirect()->route('backend.user.karyawan.manage')->with('success', 'Add new member!');
    }

    public function edit_karyawan($id)
    {
        $model = User::findOrFail($id);

        return view('backend.user.form_karyawan',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update_karyawan(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $filter = [
            'fullname' => 'required|max:255',
            'phone' => 'required'
        ];

        if($request->email === $user->email){
            $filter['email'] = 'required|string|email|max:255';
        }else{
            $filter['email'] = 'required|string|email|max:255|unique:users';
        }

        if($request->password != null){
            $filter['password'] = 'required|string|min:6|confirmed';
            $user->password = bcrypt($request->password);
        }

        $validator = Validator::make($request->all(),$filter);

        if ($validator->fails()) {
            return redirect()
                ->route('backend.user.karyawan.update')
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request->fullname;
        $user->phone = $request->phone;
        $user->isActive = $request->status == 'on' ? 1 : 0;
        $user->save();

        return redirect()->route('backend.user.karyawan.manage')->with('success', 'Update karyawan!');
    }
}
