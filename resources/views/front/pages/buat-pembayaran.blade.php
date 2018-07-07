@extends('front.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Pembayaran</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Dashboard</li>
                    <li><b>Data Pembayaran</b></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: white; padding: 15px">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                            <i class="fa fa-plus"></i>&nbsp;
                            Tambah Data
                        </button>
                        <!-- Modal Insert -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="modelTitleId">Tambah Pembayaran</h4>
                                    </div>
                                    <form class="form-insert" id="frmAdd" method="get">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="nama">Nama Pembayaran</label>
                                                        <input class="form-control" type="text" name="nama" id="nama" placeholder="" value="" minlength="2" maxlength="200" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="besar">Nominal (Rp)</label>
                                                        <input class="form-control" type="number" name="besar" id="besar" placeholder="" value="" min="0" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="keterangan">Keterangan</label>
                                                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan bayar" value="" rows="4" required></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" id="btnBatal" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Batal</button>
                                            <button type="reset" class="btn btn-success" id="btnReset"><i class="fa fa-refresh"></i>&nbsp; Reset</button>
                                            <button type="submit" class="btn btn-primary" id="btnSimpan"><i class="fa fa-save"></i>&nbsp; Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal View -->
                        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="modelTitleId">Lihat Pembayaran</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered table-striped">
                                            <tr><td>ID</td><td id="v1"></td></tr>
                                            <tr><td>Nama Pembayaran</td><td id="v2"></td></tr>
                                            <tr><td>Besar</td><td id="v3"></td></tr>
                                            <tr><td>Kode Pembayaran</td><td id="v5"></td></tr>
                                            <tr><td>Keterangan</td><td id="v4"></td></tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Update -->
                        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="modelTitleId">Ubah Data Pembayaran</h4>
                                    </div>
                                    <form class="form-insert" id="frmUpdate" method="get">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="nama">ID Pembayaran</label>
                                                        <input class="form-control" type="text" name="id" id="idUpd" placeholder="" value="" minlength="1" maxlength="100" required readonly>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="nama">Kode Pembayaran</label>
                                                        <input class="form-control" type="text" name="kode" id="kodeUpd" placeholder="" value="" minlength="1" maxlength="100" required readonly>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="nama">Nama Pembayaran</label>
                                                        <input class="form-control" type="text" name="nama" id="namaUpd" placeholder="Masukkan nama pembayaran" value="" minlength="2" maxlength="200" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="besar">Besar (Rp)</label>
                                                        <input class="form-control" type="number" name="besar" id="besarUpd" placeholder="Masukkan besar pembayaran" value="" min="0" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="keterangan">Keterangan</label>
                                                        <textarea class="form-control" rows="4" name="keterangan" id="keteranganUpd" placeholder="Masukkan keterangan pembayaran" value=""></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" id="btnBatalUpd" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Batal</button>
                                            <button type="submit" class="btn btn-primary" id="btnSimpanUpd"><i class="fa fa-save"></i>&nbsp; Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: white; padding: 20px">
                        <h2 class="card-title">Data Pembayaran</h2>
                        <br>
                        <div class="card-text">
                            <table class="table table-bordered table-datatable">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>NAMA PEMBAYARAN</td>
                                        <td>BESAR</td>
                                        <td>KODE</td>
                                        <td width="150">AKSI</td>
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
    </div>
@endsection

@section('script')

    <style>
        .dataTables_processing {
            background-color: whitesmoke;
            font-weight: bold;
        }
        .form-control + .error {
            margin-top: 5px;
            font-style: italic;
            color: red;
            font-weight: 300;
        }
        .form-group {
            margin-bottom: 10px;
        }
    </style>

    <script>
        let btnView, btnUpdate, btnDelete;
        let DT;

        btnView = function(id){
            return '<div class="btn-group"><button class="btn-view btn btn-sm btn-warning" data-id="'+id+'">'
                    +'<i class="fa fa-eye" aria-hidden="true"></i>';
                    +'</button>';
        };
        btnUpdate = function(id){
            return '<button class="btn-update btn-info btn btn-sm" data-id="'+id+'">'
                    +'<i class="fa fa-edit" aria-hidden="true"></i>';
                    +'</button>';
        }
        btnDelete = function(id){
            return '<button class="btn-delete btn btn-danger btn-sm" data-id="'+id+'">'
                    +'<i class="fa fa-trash" aria-hidden="true"></i>';
                    +'</button></div>';
        }

        function submitFormAdd() {
            let data = $('#frmAdd').serializeArray();
            $.ajax({
                type: "post",
                url: "/api/v1/insert/pembayaran",
                data: data,
                dataType: "json",
                success: function ( res ) {
                    if (res.code == 200){
                        $('#btnReset').click()
                        $('#btnBatal').click()
                        DT.draw()
                        swal('Informasi', 'Sukses menambah data Pembayaran', 'success');
                    } else {
                        alert('Gagal memasukkan data Pembayaran baru')
                    }
                }
            });
        }

        function submitFormUpdate() {
            let data = $('#frmUpdate').serializeArray();
            $.ajax({
                type: "post",
                url: "/api/v1/update/pembayaran",
                data: data,
                dataType: "json",
                success: function ( res ) {
                    if (res.code == 200){
                        $('#btnBatalUpd').click()
                        DT.draw()
                        swal('Informasi', 'Sukses mengubah data Pembayaran', 'success');
                    } else {
                        alert('Gagal mengubah data Pembayaran baru')
                    }
                }
            });
        }

        $(document).on('click', '.btn-view', function(){
            let dis = $(this);
            $.ajax({
                type: "get",
                url: "/api/v1/get/pembayaran",
                data: {
                    id: dis.attr('data-id')
                },
                dataType: "json",
                success: function ( res ) {
                    if (res.code == 200){
                        $('#v1').html(res.data.id_pembayaran)
                        $('#v2').html(res.data.nama)
                        $('#v3').html(convertToRupiah(res.data.besar || 0))
                        $('#v4').html(res.data.keterangan)
                        $('#v5').html(res.data.kode)
                        $('#viewModal').modal('show')
                    } else {
                        alert('Gagal menampilkan data Pembayaran baru')
                    }
                }
            });
        })

        $(document).on('click', '.btn-update', function(){
            let dis = $(this);
            $.ajax({
                type: "get",
                url: "/api/v1/get/pembayaran",
                data: {
                    id: dis.attr('data-id')
                },
                dataType: "json",
                success: function ( res ) {
                    console.log(res)
                    if (res.code == 200){
                        $('#idUpd').val(res.data.id_pembayaran)
                        $('#kodeUpd').val(res.data.kode)
                        $('#namaUpd').val(res.data.nama)
                        $('#besarUpd').val(res.data.besar)
                        $('#keteranganUpd').val(res.data.keterangan)
                        $('#updateModal').modal('show')
                    } else {
                        alert('Gagal menampilkan data Pembayaran baru')
                    }
                }
            });
        })

        $(document).on('click', '.btn-delete', function(){
            let dis = $(this);
            swal({
                title: "Konfirmasi hapus data",
                text: "Apakah anda yakin untuk menghapus data?",
                icon: "warning",
                buttons: {
                    cancel: "Tidak, kembali",
                    ya: "Ya, hapus data"
                },
                dangerMode: true,
            }).then((ret) => {
                if (ret) {
                    $.ajax({
                        type: "post",
                        url: "/api/v1/delete/pembayaran",
                        data: {
                            id: dis.attr('data-id')
                        },
                        dataType: "json",
                        success: function ( res ) {
                            if (res.code == 200){
                                DT.draw()
                                swal('Informasi', 'Sukses menghapus data Pembayaran', 'success')
                            } else {
                                alert('Gagal menghapus data Pembayaran')
                            }
                        }
                    });
                } else {
                    return false;
                }
            });
        })

        $(function(){
            DT = $('.table-datatable').DataTable({
                rowId: 'id_table',
                pageLength: 10,
                lengthMenu: [[5, 10, 15, 25, 50, 100 -1], [5, 10, 15, 25, 50, 100, "Semua"]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/api/v1/datatable/pembayaran',
                    data: {
                        table: 'tbl_pembayaran',
                    },
                },
                columnDefs: [
                    {
                        targets: [0],
                        class: 'text-center',
                        data: "id_pembayaran",
                        searchable: false
                    },
                    {
                        targets: [1],
                        data: "nama"
                    },
                    {
                        targets: [2],
                        data: "besar",
                        render: function(data, type, full, meta){
                            return convertToRupiah(data);
                        },
                        searchable: false
                    },
                    {
                        targets: [3],
                        data: "kode",
                        // render: function(data, type, full, meta){
                        //     return data.substring(0, 10);
                        // },
                        searchable: false
                    },
                    {
                        targets: [4],
                        class: 'text-center',
                        sortable: false,
                        searchable: false,
                        render: function ( data, type, full, meta ) {
                            id = full.id_pembayaran;
                            return btnView(id) + btnUpdate(id) + btnDelete(id);
                        }
                    }
                ],
                language: {
                    "emptyTable":     "Tidak ada data yang bisa ditampilkan",
                    "info":           "Tampil _START_ s/d _END_ dari _TOTAL_ data",
                    "infoEmpty":      "Tampil 0 s/d 0 dari 0 data",
                    "infoFiltered":   "(difilter dari _MAX_ total data)",
                    "lengthMenu":     "Tampil _MENU_ data/halaman",
                    "loadingRecords": "Sedang load data...",
                    "processing":     "Sedang load data...",
                    "search":         "Pencarian :",
                    "zeroRecords":    "Pencarian tidak menemukan data",
                    "paginate": {
                        "first":      '<i class="fa fa-backward"></i>',
                        "last":       '<i class="fa fa-forward"></i>',
                        "next":       '<i class="fa fa-caret-right"></i>',
                        "previous":   '<i class="fa fa-caret-left"></i>'
                    },
                    "aria": {
                        "sortAscending":  ": urutkan data dari A-Z",
                        "sortDescending": ": urutkan data dari Z-A"
                    }
                }
            })

            $('#frmAdd').validate({
                submitHandler: function(form) {
                    submitFormAdd()
                }
            })

            $('#frmUpdate').validate({
                submitHandler: function(form) {
                    submitFormUpdate()
                }
            })
        })
    </script>
@endsection