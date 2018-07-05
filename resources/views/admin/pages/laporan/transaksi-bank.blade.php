@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Laporan Transaksi Bank</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Laporan</li>
                    <li><b>Transaksi Bank</b></li>
                </ol>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Data Transaksi Bank</h4>
                    </div>
                    <div class="card-body" style="background-color: white; padding: 15px; padding: 20px;">
                        <br>
                        <table class="table DT">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Nominal</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Keterangan</th>
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
        let DT;

        $(function(){
            DT = $('.DT').DataTable({
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
                    "url": "/admin/api/v1/get/transaksi-bank/dt",
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
                        width: 90,
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
                        width: 50,
                        data: 'besar',
                        render: function (data, type, row, meta) {return convertToRupiah(data || 0)}
                    },
                    {
                        class: "text-center",
                        width: 50,
                        "orderable": false,
                        "targets": [4],
                        data: 'tgl_transaksi',
                        render: function (data, type, row, meta) {return data}
                    },
                    {
                        class: "text-center",
                        width: 50,
                        "orderable": false,
                        "targets": [5],
                        data: 'keterangan',
                    },
                ],
            });
        })
    </script>
@endsection