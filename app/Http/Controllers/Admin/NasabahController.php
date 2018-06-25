<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Response;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables as DT;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'idh' => 'nasabah'
        ];

        return view('admin.pages.nasabah.index', $data);
    }

    public function get_datatables(Request $request)
    {
        $model = Nasabah::select([
            'id_nasabah',
            'nama',
            'nrp',
            'tgl_lahir'
        ]);

        return DT::of($model)->make(true);
    }

    public function insert_ajax(Request $request)
    {
        $res = Nasabah::create([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'uang' => 0,
            'password_u' => Hash::make($request->password)
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }

    public function delete_ajax(Request $request)
    {
        $res = Nasabah::where('id_nasabah', $request->id)->delete();

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }

    public function get_ajax(Request $request)
    {
        $res = Nasabah::find($request->id);

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }

    public function update_ajax(Request $request)
    {
        $res = Nasabah::find($request->id);
        $res->nama = $request->nama;
        $res->nrp = $request->nrp;
        $res->tgl_lahir = $request->tgl_lahir;
        $res->alamat = $request->alamat;
        $res->uang = $request->uang;
        $res->email = $request->email;
        if ($request->password){
            $res->password_u = Hash::make($request->password);
        }
        $res->save();

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }
}
