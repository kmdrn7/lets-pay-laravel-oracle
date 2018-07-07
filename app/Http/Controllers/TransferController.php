<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use Response;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use App\Models\TransaksiLPC;
use App\Models\Pembayaran;
use App\Models\TransaksiBank;
use App\Models\QTransaksiLPC;
use App\Models\QTransaksiBank;
use Yajra\Datatables\Facades\Datatables as DT;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'idh' => 'transfer',
            'nasabah' => Nasabah::where('id_nasabah', '<>', Auth::guard('nasabah')->user()->id_nasabah)->get()
        ];

        return view('front.pages.transfer', $data);
    }

    public function transfer(Request $request)
    {
        $pengirim = Nasabah::where('id_nasabah', Auth::guard('nasabah')->user()->id_nasabah)->first();
        $penerima = Nasabah::where('id_nasabah', $request->nasabah)->first();

        if ( $pengirim->uang - $request->besar >= 0 ){

            TransaksiLPC::create([
                'id_nasabah_from' => $pengirim->id_nasabah,
                'id_nasabah_to' => $penerima->id_nasabah,
                'tgl_transaksi' => date('Y-m-d H:i:s'),
                'besar' => $request->besar,
                'secret' => '',
                'keterangan' => $request->keterangan,
                'status' => 1
            ]);

            // 10.000, 100.000 || 5 > 1

            $pengirim->uang-=$request->besar;
            $penerima->uang+=$request->besar;
            $pengirim->save(); $penerima->save();

            return response()->json([
                'code' => 200,
                'data' => [
                    'pengirim' => $pengirim,
                    'penerima' => $penerima,
                ]
            ]);

        } else {
            return response()->json([
                'code' => 505
            ]);
        }
    }
}
