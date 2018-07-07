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
            'transaksi_bank' => QTransaksiBank::where('id_nasabah', Auth::guard('nasabah')->user()->id_nasabah)->get(),
            'transaksi_lpc' => QTransaksiLPC::where('id_nasabah_from', Auth::guard('nasabah')->user()->id_nasabah)->orWhere('id_nasabah_to', Auth::guard('nasabah')->user()->id_nasabah)->get(),
            'saldo' => Auth::guard('nasabah')->user()->uang,
            'pby' => count(Pembayaran::where('id_nasabah', Auth::guard('nasabah')->user()->id_nasabah)->get()),
            'idh' => 'dashboard'
        ];

        return view('front.pages.dashboard', $data);
    }

    public function dt_bank(Request $request)
    {
        $model = QTransaksiBank::select([
            'id_transaksi_bank',
            'nama',
            'nrp',
            'kode_transaksi',
            'besar',
            'tgl_transaksi',
            'keterangan',
        ])->where('id_nasabah', Auth::guard('nasabah')->user()->id_nasabah);

        return DT::of($model)->make(true);
    }

    public function dt_lpc(Request $request)
    {
        $model = QTransaksiLPC::select([
            'id_transaksi_lpc',
            'nasabah_from',
            'nasabah_to',
            'tgl_transaksi',
            'besar',
            'keterangan',
            'status',
        ])->where('id_nasabah_from', Auth::guard('nasabah')->user()->id_nasabah)
        ->orWhere('id_nasabah_to', Auth::guard('nasabah')->user()->id_nasabah);

        return DT::of($model)->make(true);
    }

    public function profil()
    {
        $data = [
            'idh' => 'profil',
            'profil' => Nasabah::find(Auth::user()->id_nasabah)
        ];

        return view('front.pages.profil', $data);
    }

    public function post_profil(Request $request)
    {
        Nasabah::where('id_nasabah', $request->id)->update([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        if ($request->password){
            Nasabah::where('id_nasabah', $request->id)->update([
                'password_u' => Hash::make($request->password),
            ]);
        }

        return redirect('/profil');
    }

    public function buat_pembayaran()
    {
        $data = [
            'idh' => 'buat-pembayaran',
        ];

        return view('front.pages.buat-pembayaran', $data);
    }

    public function histori_transaksi()
    {
        $data = [
            'idh' => 'histori-transaksi',
        ];

        return view('front.pages.histori-transaksi', $data);
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
