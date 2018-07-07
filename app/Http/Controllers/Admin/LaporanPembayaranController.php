<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Facades\Datatables as DT;
use App\Http\Controllers\Controller;
use App\Models\QPembayaran;
use Illuminate\Http\Request;
use Response;

class LaporanPembayaranController extends Controller
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

        return view('admin.pages.laporan.pembayaran', $data);
    }

    public function datatables(Request $request)
    {
        $model = QPembayaran::select([
            'id_pembayaran',
            'nama_nasabah',
            'nama',
            'besar',
            'keterangan',
        ]);

        return DT::of($model)->make(true);
    }
}
