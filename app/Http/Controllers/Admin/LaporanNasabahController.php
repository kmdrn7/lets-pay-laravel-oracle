<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Facades\Datatables as DT;
use App\Http\Controllers\Controller;
use App\Models\TransaksiBank;
use Illuminate\Http\Request;
use App\Models\Nasabah;
use Response;

class LaporanNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'idh' => 'laporan',
            'nasabah' => Nasabah::get()
        ];

        return view('admin.pages.laporan.nasabah', $data);
    }

    public function datatables(Request $request)
    {
        $model = Nasabah::select([
            'id_nasabah',
            'nama',
            'nrp',
            'tgl_lahir',
            'alamat',
            'uang',
            'email'
        ]);

        return DT::of($model)->make(true);
    }

    public function get_nasabah_info(Request $request)
    {
        $id = $request->id;

        $data = [
            'nasabah' => Nasabah::find($id),
            'transaksi' => TransaksiBank::where('id_nasabah', $id)->get()
        ];

        return response()->json($data);
    }

    public function transaksi(Request $request)
    {
        $res = TransaksiBank::create([
            'id_nasabah' => $request->nasabah,
            'kode_transaksi' => $request->transaksi,
            'tgl_transaksi' => date('Y-m-d'),
            'besar' => $request->besar,
            'keterangan' => $request->keterangan
        ]);

        if ($res){
            $nasabah = Nasabah::find($request->nasabah);
            if ($request->transaksi == 1){
                $uang = $nasabah->uang+$request->besar;
            } else {
                $uang = $nasabah->uang-$request->besar;
            }
            $nasabah->uang = $uang;
            $nasabah->save();
        }

        $data = [
            'code' => 200,
            'res' => $res,
        ];

        return response()->json($data);
    }

    public function hapus_transaksi(Request $request)
    {
        $trans = TransaksiBank::find($request->id);
        $nasabah = Nasabah::find($request->nasabah);
        if ($trans->kode_transaksi == 1){
            $uang = $nasabah->uang-$trans->besar;
        } else {
            $uang = $nasabah->uang+$trans->besar;
        }
        $nasabah->uang = $uang;
        $nasabah->save();
        $trans->delete();

        $data = [
            'code' => 200,
            'res' => $nasabah,
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiBank  $transaksiBank
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiBank $transaksiBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiBank  $transaksiBank
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiBank $transaksiBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiBank  $transaksiBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiBank $transaksiBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiBank  $transaksiBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiBank $transaksiBank)
    {
        //
    }
}
