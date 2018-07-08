@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Nasabah</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Nasabah</li>
                    <li><b>Data Nasabah</b></li>
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
                                        <h4 class="modal-title" id="modelTitleId">Tambah Nasabah</h4>
                                    </div>
                                    <form class="form-insert" id="frmAdd" method="get">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="nama">Nama Lengkap</label>
                                                        <input class="form-control" type="text" name="nama" id="nama" placeholder="" value="" minlength="2" maxlength="100" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="nrp">NRP</label>
                                                        <input class="form-control" type="text" name="nrp" id="nrp" placeholder="" value="" minlength="10" maxlength="10" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="tgl_lahir">Tgl Lahir</label>
                                                        <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" placeholder="" value="" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="" value="" minlength="5" maxlength="150" required style="width: 100%; min-height: 100px; max-height: 200px"></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="email">Email</label>
                                                        <input class="form-control" type="email" name="email" id="email" placeholder="" value="" minlength="2" maxlength="100" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="password">Password</label>
                                                        <input class="form-control" type="password" name="password" id="password" placeholder="" value="" minlength="5" maxlength="50" required>
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
                                        <h4 class="modal-title" id="modelTitleId">Lihat Nasabah</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered table-striped">
                                            <tr><td>ID</td><td id="v1"></td></tr>
                                            <tr><td>Nama</td><td id="v2"></td></tr>
                                            <tr><td>NRP</td><td id="v3"></td></tr>
                                            <tr><td>Tgl Lahir</td><td id="v4"></td></tr>
                                            <tr><td>Alamat</td><td id="v5"></td></tr>
                                            <tr><td>Email</td><td id="v6"></td></tr>
                                            <tr><td>Saldo</td><td id="v7"></td></tr>
                                            <tr><td>Bergabung Pada</td><td id="v8"></td></tr>
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
                                        <h4 class="modal-title" id="modelTitleId">Ubah Data Nasabah</h4>
                                    </div>
                                    <form class="form-insert" id="frmUpdate" method="get">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="nama">ID Nasabah</label>
                                                        <input class="form-control" type="text" name="id" id="idUpd" placeholder="" value="" minlength="1" maxlength="100" required readonly>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="nama">Nama Lengkap</label>
                                                        <input class="form-control" type="text" name="nama" id="namaUpd" placeholder="" value="" minlength="2" maxlength="100" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="nrp">NRP</label>
                                                        <input class="form-control" type="text" name="nrp" id="nrpUpd" placeholder="" value="" minlength="10" maxlength="10" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="tgl_lahir">Tgl Lahir</label>
                                                        <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahirUpd" placeholder="" value="" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" name="alamat" id="alamatUpd" placeholder="" value="" minlength="5" maxlength="150" required style="width: 100%; min-height: 100px; max-height: 200px"></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="email">Email</label>
                                                        <input class="form-control" type="email" name="email" id="emailUpd" placeholder="" value="" minlength="2" maxlength="100" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="password">Password</label>
                                                        <input class="form-control" type="password" name="password" id="passwordUpd" placeholder="" value="" minlength="5" maxlength="50">
                                                        <span><small>(*biarkan kosong jika tidak ingin mengganti)</small></span>
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
                        <h2 class="card-title">Data Nasabah</h2>
                        <br>
                        <div class="card-text">
                            <table class="table table-bordered table-datatable">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>NAMA</td>
                                        <td>NRP</td>
                                        <td>TGL LAHIR</td>
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
                url: "/admin/api/v1/insert/nasabah",
                data: data,
                dataType: "json",
                success: function ( res ) {
                    if (res.code == 200){
                        $('#btnReset').click()
                        $('#btnBatal').click()
                        DT.draw()
                        swal('Informasi', 'Sukses menambah data Nasabah', 'success');
                    } else {
                        alert('Gagal memasukkan data Nasabah baru')
                    }
                }
            });
        }

        function submitFormUpdate() {
            let data = $('#frmUpdate').serializeArray();
            $.ajax({
                type: "post",
                url: "/admin/api/v1/update/nasabah",
                data: data,
                dataType: "json",
                success: function ( res ) {
                    if (res.code == 200){
                        $('#btnBatalUpd').click()
                        DT.draw()
                        swal('Informasi', 'Sukses mengubah data Nasabah', 'success');
                    } else {
                        alert('Gagal mengubah data Nasabah baru')
                    }
                }
            });
        }

        $(document).on('click', '.btn-view', function(){
            let dis = $(this);
            $.ajax({
                type: "get",
                url: "/admin/api/v1/get/nasabah",
                data: {
                    id: dis.attr('data-id')
                },
                dataType: "json",
                success: function ( res ) {
                    if (res.code == 200){
                        $('#v1').html(res.data.id_nasabah)
                        $('#v2').html(res.data.nama)
                        $('#v3').html(res.data.nrp)
                        $('#v4').html(res.data.tgl_lahir.substring(0,10))
                        $('#v5').html(res.data.alamat)
                        $('#v6').html(res.data.email)
                        $('#v7').html(convertToRupiah(res.data.uang||0))
                        $('#v8').html(res.data.created_at)
                        $('#viewModal').modal('show')
                    } else {
                        alert('Gagal menghapus data Nasabah baru')
                    }
                }
            });
        })

        $(document).on('click', '.btn-update', function(){
            let dis = $(this);
            $.ajax({
                type: "get",
                url: "/admin/api/v1/get/nasabah",
                data: {
                    id: dis.attr('data-id')
                },
                dataType: "json",
                success: function ( res ) {
                    console.log(res)
                    if (res.code == 200){
                        $('#idUpd').val(res.data.id_nasabah)
                        $('#namaUpd').val(res.data.nama)
                        $('#nrpUpd').val(res.data.nrp)
                        $('#tgl_lahirUpd').val(res.data.tgl_lahir.substring(0,10))
                        $('#alamatUpd').val(res.data.alamat)
                        $('#emailUpd').val(res.data.email)
                        $('#saldoUpd').val(res.data.uang||0)
                        $('#updateModal').modal('show')
                    } else {
                        alert('Gagal menghapus data Nasabah baru')
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
                        url: "/admin/api/v1/delete/nasabah",
                        data: {
                            id: dis.attr('data-id')
                        },
                        dataType: "json",
                        success: function ( res ) {
                            if (res.code == 200){
                                DT.draw()
                                swal('Informasi', 'Sukses menghapus data Nasabah', 'success');
                            } else {
                                alert('Gagal menghapus data Nasabah baru')
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
                pageLength: 5,
                lengthMenu: [[5, 10, 15, 25, 50, 100 -1], [5, 10, 15, 25, 50, 100, "Semua"]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/admin/api/v1/datatable/nasabah',
                    data: {
                        table: 'tbl_nasabah',
                    },
                },
                columnDefs: [
                    {
                        targets: [0],
                        class: 'text-center',
                        data: "id_nasabah",
                        searchable: false
                    },
                    {
                        targets: [1],
                        data: "nama"
                    },
                    {
                        targets: [2],
                        data: "nrp",
                        searchable: false
                    },
                    {
                        targets: [3],
                        data: "tgl_lahir",
                        render: function(data, type, full, meta){
                            return data.substring(0, 10);
                        },
                        searchable: false
                    },
                    {
                        targets: [4],
                        class: 'text-center',
                        sortable: false,
                        searchable: false,
                        render: function ( data, type, full, meta ) {
                            id = full.id_nasabah;
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