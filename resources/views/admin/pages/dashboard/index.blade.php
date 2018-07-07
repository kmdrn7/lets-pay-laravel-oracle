@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Dashboard</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row" style="">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Nasabah</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash"></div>
                        </li>
                        <li class="text-right">
                            <i class="ti-arrow-up text-success"></i>
                            <span class="counter text-success">{{ $nasabah }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Transaksi</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash2"></div>
                        </li>
                        <li class="text-right">
                            <i class="ti-arrow-up text-purple"></i>
                            <span class="counter text-purple">{{ $jml_tr }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Dana Nasabah</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash3"></div>
                        </li>
                        <li class="text-right">
                            <i class="ti-arrow-up text-info"></i>
                            <span class="counter text-info">{{ $duit }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.row -->
        <!-- ============================================================== -->

        <!-- table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Transaksi Bank Terbaru</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>STATUS</th>
                                    <th>TANGGAL</th>
                                    <th>NOMINAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($transaksi_bank) == 0)
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada transaksi.</td>
                                    </tr>
                                @endif
                                @foreach($transaksi_bank as $data)
                                    <tr>
                                        <td>{{ $data->id_transaksi_bank }}</td>
                                        <td class="txt-oflo">{{ $data->nama }}</td>
                                        <td>{{ $data->kode_transaksi==1?'KREDIT':'DEBET' }}</td>
                                        <td class="txt-oflo">{{ $data->tgl_transaksi }}</td>
                                        <td><span class="text-success">Rp {{ number_format($data->besar, 0, ',','.') }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Transaksi LetsPlay Coin Terbaru</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>DARI</th>
                                    <th>KE</th>
                                    <th>TANGGAL</th>
                                    <th>NOMINAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($transaksi_lpc) == 0)
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada transaksi.</td>
                                    </tr>
                                @endif
                                @foreach($transaksi_lpc as $data)
                                    <tr>
                                        <td>{{ $data->id_transaksi_lpc }}</td>
                                        <td class="txt-oflo">{{ $data->nasabah_from }}</td>
                                        <td class="txt-oflo">{{ $data->nasabah_to }}</td>
                                        <td class="txt-oflo">{{ $data->tgl_transaksi }}</td>
                                        <td><span class="text-success">Rp {{ number_format($data->besar, 0, ',','.') }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection