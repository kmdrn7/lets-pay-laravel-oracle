@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Laporan Administrator</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Laporan</li>
                    <li><b>Administrator</b></li>
                </ol>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Data Administrator</h4>
                    </div>
                    <div class="card-body" style="background-color: white; padding: 15px; padding: 20px;">
                        <br>
                        <table class="table DT">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tgl Bergabung</th>
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
                    "url": "/admin/api/v1/get/admin/dt",
                    "type": "GET",
                    "data": function(d){
                        d.cari = $('#cari').val();
                    }
                },
                "columnDefs": [
                    {
                        class: "text-center",
                        width: 30,
                        "targets": [0],
                        "orderable": false,
                        data: 'id_admin',
                    },
                    {
                        "targets": [1],
                        width: 90,
                        "orderable": true,
                        data: 'nama',
                    },
                    {
                        width: 120,
                        class: "text-center",
                        "orderable": true,
                        "targets": [2],
                        data: 'email',
                    },
                    {
                        class: "text-center",
                        "orderable": false,
                        "targets": [3],
                        width: 50,
                        data: 'created_at',
                        // render: function (data, type, row, meta) {return data.substring(0,10) || ''}
                    },
                ],
            });

            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    let cari = $('#cari').val();
                    let nasabah = data[1] || '';
                    if (
                        nasabah.toUpperCase().includes(cari.toUpperCase())
                    ) { return true; }
                    return false;
                }
            );

            $('#cari').keyup(function(){
                DT.draw()
            })
        })
    </script>
@endsection