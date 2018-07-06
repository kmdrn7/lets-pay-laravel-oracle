<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Facades\Datatables as DT;
use App\Http\Controllers\Controller;
use App\Models\QTransaksiLPC;
use Illuminate\Http\Request;
use Response;

class LaporanTransaksiLPCController extends Controller
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
        ];

        return view('admin.pages.laporan.transaksi-lpc', $data);
    }

    public function datatables(Request $request)
    {
        $model = QTransaksiLPC::select([
            'id_transaksi_lpc',
            'nasabah_from',
            'nasabah_to',
            'tgl_transaksi',
            'besar',
            'keterangan',
            'status',
        ]);

        return DT::of($model)->make(true);
    }
}
