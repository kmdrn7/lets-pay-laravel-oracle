@extends('front.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Histori Transaksi</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Dashboard</li>
                    <li><b>Histori Transaksi</b></li>
                </ol>
            </div>
        </div>

        <!-- table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Histori Transaksi Bank</h3>
                    <div class="table-responsive">
                        <table class="table" id="tbl-bank">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>STATUS</th>
                                    <th>TANGGAL</th>
                                    <th>NOMINAL</th>
                                    <th>KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>

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
                    <h3 class="box-title">Histori Transaksi LetsPlay Coin</h3>
                    <div class="table-responsive">
                        <table class="table" id="tbl-lpc">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>DARI</th>
                                    <th>KE</th>
                                    <th>NOMINAL</th>
                                    <th>TANGGAL</th>
                                    <th>KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <style>
        .dataTables_processing {
            background-color: whitesmoke;
            font-weight: bold;
        }
    </style>
    <script>
        let Bank, LPC;

        $(function(){
            Bank = $('#tbl-bank').DataTable({
                // scrollY: 200,
                // "sDom":"ltip",
                "lengthMenu": [[10, 30, 100, 200, -1], [10, 30, 100, 200, "All"]],
                "scrollX": true,
                "scrollY": true,
                "language": {
                    "lengthMenu": "Menampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Data masih kosong",
                    "infoFiltered": "(difilter dari total _MAX_ data)",
                            "search": "Cari :",
                },
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "/api/v1/get/transaksi-bank/dt",
                    "type": "GET",
                },
                "columnDefs": [
                    {
                        class: "text-center",
                        width: 30,
                        "targets": [0],
                        "orderable": false,
                        searchable: false,
                        data: 'id_transaksi_bank',
                    },
                    {
                        "targets": [1],
                        "orderable": true,
                        data: 'nama',
                    },
                    {
                        width: 120,
                        class: "text-center",
                        "orderable": true,
                        "targets": [2],
                        data: 'kode_transaksi',
                        render: function (data, type, row, meta) {return data==1?'Kredit':'Debet'}
                    },
                    {
                        class: "text-center",
                        "orderable": false,
                        "targets": [3],
                        data: 'besar',
                        render: function (data, type, row, meta) {return convertToRupiah(data || 0)}
                    },
                    {
                        class: "text-center",
                        "orderable": false,
                        "targets": [4],
                        data: 'tgl_transaksi',
                        render: function (data, type, row, meta) {return data}
                    },
                    {
                        class: "text-center",
                        "orderable": false,
                        "targets": [5],
                        data: 'keterangan',
                        render: function (data, type, row, meta) {return data || '-'}
                    }
                ],
            })

            LPC = $('#tbl-lpc').DataTable({
                // scrollY: 200,
                // "sDom":"ltip",
                "lengthMenu": [[10, 30, 100, 200, -1], [10, 30, 100, 200, "All"]],
                "scrollX": true,
                "scrollY": true,
                "language": {
                    "lengthMenu": "Menampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Data masih kosong",
                    "infoFiltered": "(difilter dari total _MAX_ data)",
                            "search": "Cari :",
                },
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "/api/v1/get/transaksi-lpc/dt",
                    "type": "GET",
                },
                "columnDefs": [
                    {
                        class: "text-center",
                        width: 30,
                        "targets": [0],
                        "orderable": false,
                        searchable: false,
                        data: 'id_transaksi_lpc',
                    },
                    {
                        "targets": [1],
                        "orderable": true,
                        data: 'nasabah_from',
                    },
                    {
                        "targets": [2],
                        "orderable": true,
                        data: 'nasabah_to',
                    },
                    {
                        class: "text-center",
                        "orderable": false,
                        "targets": [3],
                        data: 'besar',
                        width: 120,
                        render: function (data, type, row, meta) {return convertToRupiah(data || 0)}
                    },
                    {
                        class: "text-center",
                        "orderable": false,
                        "targets": [4],
                        width: 120,
                        data: 'tgl_transaksi',
                        render: function (data, type, row, meta) {return data}
                    },
                    {
                        class: "text-center",
                        "orderable": false,
                        "targets": [5],
                        data: 'keterangan',
                        width: 140,
                        render: function (data, type, row, meta) {return data || '-'}
                    },
                ],
            })
        })
    </script>
@endsection