@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Laporan Transaksi Letspay Coin</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Laporan</li>
                    <li><b>Transaksi Letspay Coin</b></li>
                </ol>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Data Transaksi Letspay Coin</h4>
                    </div>
                    <div class="card-body" style="background-color: white; padding: 15px; padding: 20px;">
                        <br>
                        <table class="table DT">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Asal</th>
                                    <th>Tujuan</th>
                                    <th>Nominal</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
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
                    "url": "/admin/api/v1/get/transaksi-lpc/dt",
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
                    {
                        "targets": [6],
                        class: "text-center",
                        orderable: false,
                        searchable: false,
                        data: "id_transaksi_lpc",
                        // width: 50,
                        render: function (data, type, row, meta) {
                            return '<button class="btn btn-danger btn-sm btn-hapus" data-id="'+data+'" type="button"><i class="fa fa-trash"></i></button>'
                        }
                    },
                ],
            });

            $(document).on('click', '.btn-hapus', function(){
                let dis = $(this);
                swal({
                    title: "Konfirmasi hapus transaki",
                    text: "Apakah anda yakin untuk menghapus data?. Data transaksi akan dihapus dan saldo nasabah akan dikembalikan seperti semula",
                    icon: "warning",
                    buttons: {
                        cancel: "Tidak, kembali",
                        ya: "Ya, hapus data"
                    },
                    dangerMode: true,
                }).then((ret) => {
                    if (ret) {
                        $('#loading').modal('show')
                        $.ajax({
                            type: "post",
                            url: "/admin/api/v1/delete/transaksi-lpc",
                            data: {
                                id: dis.attr('data-id'),
                            },
                            dataType: "json",
                            success: function ( res ) {
                                if (res.code == 200){
                                    $('#loading').modal('hide')
                                    swal('Informasi', 'Sukses menghapus data transaksi', 'success');
                                    DT.draw()
                                } else {
                                    alert('Gagal menghapus data transaksi')
                                }
                            }
                        });
                    } else {
                        return false;
                    }
                });
            })
        })
    </script>
@endsection