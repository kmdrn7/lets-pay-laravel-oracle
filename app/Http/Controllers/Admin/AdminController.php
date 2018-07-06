<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Response;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables as DT;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'idh' => 'admin'
        ];

        return view('admin.pages.admin.index', $data);
    }

    public function get_datatables(Request $request)
    {
        $model = Admin::select([
            'id_admin',
            'nama',
            'email',
            'created_at'
        ]);

        return DT::of($model)->make(true);
    }

    public function insert_ajax(Request $request)
    {
        $res = Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password_a' => Hash::make($request->password)
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }

    public function delete_ajax(Request $request)
    {
        $res = Admin::where('id_admin', $request->id)->delete();

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }

    public function get_ajax(Request $request)
    {
        $res = Admin::find($request->id);

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }

    public function update_ajax(Request $request)
    {
        $res = Admin::find($request->id);
        $res->nama = $request->nama;
        $res->email = $request->email;
        if ($request->password){
            $res->password_a = Hash::make($request->password);
        }
        $res->save();

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }
}
