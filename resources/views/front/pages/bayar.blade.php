@extends('front.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Bayar</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Dashboard</li>
                    <li><b>Bayar</b></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: white; padding: 15px">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="" id="frmAdd">
                                    <div class="form-group">
                                        <label for="kode">Kode Pembayaran</label>
                                        <input type="text" name="kode" id="kode" class="form-control" placeholder="Masukkan kode pembayaran" minlength="6" maxlength="6" required autocomplete="off">
                                    </div>
                                    <!-- Button trigger modal -->
                                    <button type="submit" class="btn btn-primary" style="width: 100%" id="btnCek">
                                        <i class="fa fa-search"></i>&nbsp;
                                        <b>Cek Kode</b>
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <label for="table">Detail Pembayaran</label>
                                <table class="table table-bordered table-datatable">
                                    <thead>
                                        <tr>
                                            <td width="200">PENERIMA</td>
                                            <td id="penerimaBayar"></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA PEMBAYARAN</td>
                                            <td id="namaBayar"></td>
                                        </tr>
                                        <tr>
                                            <td>BESAR</td>
                                            <td id="besarBayar"></td>
                                        </tr>
                                        <tr>
                                            <td>KETERANGAN</td>
                                            <td id="ketBayar"></td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success btn-lg" style="float: right" id="btnBayar">
                                    <i class="fa fa-money"></i>&nbsp;
                                    <b>Bayar</b>
                                </button>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <style>
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

        function submitFormAdd() {
            let data = $('#frmAdd').serializeArray();
            $.ajax({
                type: "post",
                url: "/api/v1/bayar/cek-kode",
                data: data,
                dataType: "json",
                success: function ( res ) {
                    if (res.code == 200){
                        if (res.data != null){
                            $('#penerimaBayar').html(res.data.nama_nasabah)
                            $('#namaBayar').html(res.data.nama)
                            $('#besarBayar').html(res.data.besar)
                            $('#ketBayar').html(res.data.keterangan)
                            $('#btnBayar').show()
                        } else {
                            swal('Informasi', 'Kode pembayaran yang anda masukkan tidak ada di dalam sistem', 'error')
                            $('#kode').focus()
                        }
                    } else {
                        swal('Error', 'Gagal mengambil informasi Pembayaran', 'error')
                    }
                }
            });
        }

        $(function(){

            $('#btnBayar').hide()

            $('#frmAdd').validate({
                submitHandler: function(form) {
                    submitFormAdd()
                }
            })

            $(document).on('click', '#btnBayar', function(){
                if ( $('#kode').val() != '' ){
                    let dis = $(this);
                    swal({
                        title: "Konfirmasi pembayaran",
                        text: "Apakah anda yakin melakukan pembayaran dengan kode ini?",
                        icon: "warning",
                        buttons: {
                            cancel: "Tidak, kembali",
                            ya: "Ya, bayar"
                        },
                        dangerMode: true,
                    }).then((ret) => {
                        if (ret) {
                            $.ajax({
                                type: "post",
                                url: "/api/v1/bayar/bayar",
                                data: {
                                    kode: $('#kode').val()
                                },
                                dataType: "json",
                                success: function ( res ) {
                                    if (res.code == 200){
                                        swal('Informasi', 'Sukses melakukan pembayaran', 'success')
                                        $('#kode').val('')
                                        $('#penerimaBayar').html('')
                                        $('#namaBayar').html('')
                                        $('#besarBayar').html('')
                                        $('#ketBayar').html('')
                                        $('#btnBayar').hide()
                                    } else if (res.code == 505) {
                                        swal('Error', 'Tidak bisa melakukan pembayaran terhadap rekening milik sendiri', 'error')
                                    } else {
                                        swal('Error', 'Gagal melakukan pembayaran', 'error')
                                    }
                                }
                            });
                        } else {
                            return false;
                        }
                    });
                } else {
                    swal('Error', 'Masukkan kode bayar terlebih dahulu', 'error')
                }
            })
        })
    </script>
@endsection