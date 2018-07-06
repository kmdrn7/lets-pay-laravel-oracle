<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Facades\Datatables as DT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Response;

class LaporanAdminController extends Controller
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

        return view('admin.pages.laporan.admin', $data);
    }

    public function datatables(Request $request)
    {
        $model = Admin::select([
            'id_admin',
            'nama',
            'email',
            'created_at',
        ]);

        return DT::of($model)->make(true);
    }
}
