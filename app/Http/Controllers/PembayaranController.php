<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use Response;
use App\Models\Pembayaran;
use App\Models\QPembayaran;
use Illuminate\Http\Request;
use App\Models\TransaksiLPC;
use App\Models\TransaksiBank;
use App\Models\Nasabah;
use Yajra\Datatables\Facades\Datatables as DT;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'idh' => 'bayar'
        ];

        return view('front.pages.bayar', $data);
    }

    public function get_datatables(Request $request)
    {
        $model = Pembayaran::select([
            'id_pembayaran',
            'id_nasabah',
            'nama',
            'besar',
            'kode',
            'keterangan'
        ])->where('id_nasabah', Auth::guard('nasabah')->user()->id_nasabah);

        return DT::of($model)->make(true);
    }

    public function cek_kode(Request $request)
    {
        $bayar = QPembayaran::where('kode', $request->kode)->first();
        return response()->json([
            'code' => 200,
            'data' => $bayar
        ]);
    }

    public function bayar(Request $request)
    {
        $pembayaran = QPembayaran::where('kode', $request->kode)->first();

        if ( $pembayaran->id_nasabah == Auth::guard('nasabah')->user()->id_nasabah ){
            return response()->json([
                'code' => 505,
            ]);
        }

        if (count($pembayaran) > 0){

            $penerima = Nasabah::find($pembayaran->id_nasabah);
            $pengirim = Nasabah::find(Auth::guard('nasabah')->user()->id_nasabah);

            TransaksiLPC::create([
                'id_nasabah_from' => $pengirim->id_nasabah,
                'id_nasabah_to' => $penerima->id_nasabah,
                'tgl_transaksi' => date('Y-m-d H:i:s'),
                'besar' => $pembayaran->besar,
                'secret' => $pembayaran->kode,
                'keterangan' => $pembayaran->keterangan,
                'status' => 1
            ]);

            $penerima->uang+=$pembayaran->besar;
            $pengirim->uang-=$pembayaran->besar;
            $pengirim->save(); $penerima->save();

            return response()->json([
                'code' => 200,
                'data' => [
                    'pengirim' => $pengirim,
                    'penerima' => $penerima,
                    'pembayaran' => $pembayaran
                ]
            ]);
        }
    }

    public function insert_ajax(Request $request)
    {
        $res = Pembayaran::create([
            'id_nasabah' => Auth::guard('nasabah')->user()->id_nasabah,
            'nama' => $request->nama,
            'besar' => $request->besar,
            'kode' => strtoupper(substr(Auth::guard('nasabah')->user()->nama, 0, 2)).strtoupper(str_random(4)),
            'keterangan' => $request->keterangan
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }

    public function delete_ajax(Request $request)
    {
        $res = Pembayaran::where('id_pembayaran', $request->id)->delete();

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }

    public function get_ajax(Request $request)
    {
        $res = Pembayaran::find($request->id);

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }

    public function update_ajax(Request $request)
    {
        $res = Pembayaran::find($request->id);
        $res->nama = $request->nama;
        $res->besar = $request->besar;
        $res->keterangan = $request->keterangan;
        $res->save();

        return response()->json([
            'code' => 200,
            'status' => 'sukses',
            'data' => $res
        ]);
    }
}
