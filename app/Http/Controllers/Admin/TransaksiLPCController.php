<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nasabah;
use App\Models\TransaksiLPC;

class TransaksiLPCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'idh' => 'lpc',
            'nasabah' => Nasabah::get()
        ];

        return view('admin.pages.transaksi.lpc', $data);
    }

    public function transaksi(Request $request)
    {
        // if ($res){
            $asal = Nasabah::find($request->nasabah_asal);
            $tujuan = Nasabah::find($request->nasabah_tujuan);
            $besar = $request->besar;

            $uang_asal = $asal->uang - $besar;
            $uang_tujuan = $tujuan->uang + $besar;

            $res = TransaksiLPC::create([
                'id_nasabah_from' => $request->nasabah_asal,
                'id_nasabah_to' => $request->nasabah_tujuan,
                'kode_transaksi' => $request->transaksi,
                'tgl_transaksi' => date('Y-m-d H:i:s'),
                'besar' => $request->besar,
                'secret' => '',
                'keterangan' => $request->keterangan,
                'status' => 1
            ]);

            $asal->uang = $uang_asal;
            $tujuan->uang = $uang_tujuan;
            $asal->save(); $tujuan->save();
        // }

        $data = [
            'code' => 200,
            'res' => $res,
        ];

        return response()->json($data);
    }

    public function cek_saldo(Request $request)
    {
        $nasabah = Nasabah::find($request->id);
        $nominal = $request->nominal;

        if ( (int)$nasabah->uang - (int)$nominal >= 0 ){
            return response()->json('nais');
        } else if ( (int)$nominal == 0 ) {
            return response()->json('kurang');
        } else {
            return response()->json('kurang');
        }
    }

    public function hapus_transaksi(Request $request)
    {
        $transaksi = TransaksiLPC::find($request->id);
        $asal = Nasabah::find($transaksi->id_nasabah_from);
        $tujuan = Nasabah::find($transaksi->id_nasabah_to);

        $asal->uang = $asal->uang+$transaksi->besar;
        $tujuan->uang = $tujuan->uang-$transaksi->besar;
        $asal->save(); $tujuan->save(); $transaksi->delete();

        $data = [
            'code' => 200,
        ];

        return response()->json($data);
    }
}
