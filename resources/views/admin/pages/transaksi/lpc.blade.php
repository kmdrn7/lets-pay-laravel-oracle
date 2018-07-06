@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Transfer</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Transfer</li>
                    <li><b>Transfer Coin</b></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: white; padding: 15px">
                        <button type="button" id="btnBaru" class="btn btn-primary">
                            <i class="fa fa-plus"></i>&nbsp;
                            Transaksi Baru
                        </button>
                        <button type="button" class="btn btn-warning btnBatal" style="display: none">
                            <i class="fa fa-close"></i>&nbsp;
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-7 animated" id="transaksi-column">
                <div class="card">
                    <form action="" id="frmAdd">
                        <div class="card-body" style="background-color: white; padding: 15px; padding: 30px;">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <p>
                                        <label for="tgl_transaksi">Tanggal Transaksi</label>
                                        <input class="form-control" type="date" name="tgl_transaksi" id="tgl_transaksi" placeholder="" value="{{ date('Y-m-d') }}" required>
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p>
                                        <label for="nasabah">Asal</label>
                                        <select class="form-control select2" name="nasabah_asal" id="nasabah_asal" required>
                                            <option value="">-- Pilih Nasabah --</option>
                                            @foreach($nasabah as $data)
                                                <option value="{{ $data->id_nasabah }}">{{ $data->nama }}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                </div>
                                <div class="form-group col-md-6">
                                    <p>
                                        <label for="nasabah">Tujuan</label>
                                        <select class="form-control select2" name="nasabah_tujuan" id="nasabah_tujuan" required>
                                            <option value="">-- Pilih Nasabah --</option>
                                            @foreach($nasabah as $data)
                                                <option value="{{ $data->id_nasabah }}">{{ $data->nama }}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                </div>
                                <div class="form-group col-md-12">
                                    <p>
                                        <label for="besar">Nominal (Rp)</label>
                                        <input class="form-control" type="number" name="besar" min="0" id="besar" placeholder="" value="" required>
                                    </p>
                                </div>
                                <div class="form-group col-md-12">
                                    <p>
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="isikan keterangan transaksi" value="" minlength="2" maxlength="150" style="width: 100%; min-height: 100px; max-height: 200px" required></textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="reset" class="btn btn-warning float-left btnBatal"><i class="fa fa-close" aria-hidden="true"></i>&nbsp; Tutup</button>
                                    <button id="btnSimpan" class="btn btn-primary float-right"><i class="fa fa-save"></i>&nbsp; Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5" id="detail-column">
                <div class="card">
                    <div class="card-body" style="background-color: white; padding: 15px">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="5" class="text-center">Nasabah Asal</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr>
                                    <td width="100" class="text-center">Nama</td>
                                    <td colspan="4" id="tb-nama"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">NRP</td>
                                    <td colspan="4" id="tb-nrp"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">Saldo</td>
                                    <td colspan="4" id="tb-saldo"></td>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-center">Nasabah Tujuan</th>
                                </tr>
                                <tr>
                                    <td width="100" class="text-center">Nama</td>
                                    <td colspan="4" id="tb-nama-tujuan"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">NRP</td>
                                    <td colspan="4" id="tb-nrp-tujuan"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">Saldo</td>
                                    <td colspan="4" id="tb-saldo-tujuan"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4>Loading</h4>
                </div>
                <div class="modal-body">
                    Sedang memproses...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            })

            $('#nasabah_asal').select2({
                    placeholder: "Pilih data",
                    allowClear: true,
                    placeholder: "Pilih Nasabah Asal"
            })

            $('#nasabah_tujuan').select2({
                    placeholder: "Pilih data",
                    allowClear: true,
                    placeholder: "Pilih Nasabah Tujuan"
            })

            $('#frmAdd').validate({
                submitHandler: function(form) {
                    submitFormAdd()
                }
            })

            $('#detail-column').hide()
            $('#transaksi-column').hide()
        })

        function submitFormAdd(){
            let data = $('#frmAdd').serializeArray();
            $('#loading').modal('show')
            $.ajax({
                type: "post",
                url: "/admin/api/v1/lpc/cek-saldo",
                data: {
                    id: $('#nasabah_asal').val(),
                    nominal: $('#besar').val()
                },
                dataType: "json",
                success: function ( res ) {
                    if ( res == 'nais' ){
                        $.ajax({
                            type: "post",
                            url: "/admin/api/v1/insert/transaksi-lpc",
                            data: data,
                            dataType: "json",
                            success: function ( res ) {
                                $('#nasabah_asal').trigger('change')
                                $('#nasabah_tujuan').trigger('change')
                                $('#keterangan').val('')
                                $('#besar').val('')
                                $('#loading').modal('hide')
                                if (res.code == 200){
                                    swal('Informasi', 'Transfer berhasil disimpan', 'success');
                                } else {
                                    if (res.code == 505){
                                        swal('Informasi', 'Saldo tidak cukup untuk dilakukan penarikan', 'error');
                                    } else {
                                        swal('Informasi', 'Terjadi error saat melakukan transfer', 'error');
                                    }
                                }
                            }
                        })
                    } else if (res == 'kurang') {
                        $('#loading').modal('hide')
                        swal('Error', 'Saldo tidak cukup untuk dilakukan transaksi', 'error')
                    }
                }
            })
        }

        $(document).on('change', '#nasabah_asal', function(){
            if ( $(this).val() == $('#nasabah_tujuan').val() ){
                $('#nasabah_asal').val(null).trigger('change')
                swal('Kesalahan', 'Tidak bisa mengirim ke rekening yang sama', 'error')
            } else if ( $(this).val() != '' || $(this).val() != null ){
                $.ajax({
                    type: "post",
                    url: "/admin/api/v1/transaksi/nasabah",
                    data: {
                        id: $(this).val()
                    },
                    dataType: "json",
                    success: function ( res ) {
                        $('#tb-nama').html(res.nasabah.nama)
                        $('#tb-nrp').html(res.nasabah.nrp)
                        $('#tb-saldo').html(convertToRupiah(res.nasabah.uang||0))
                    }
                });
            }
        })

        $(document).on('change', '#nasabah_tujuan', function(){
            if ( $(this).val() == $('#nasabah_asal').val() ){
                $('#nasabah_tujuan').val(null).trigger('change')
                swal('Kesalahan', 'Tidak bisa mengirim ke rekening yang sama', 'error')
            } else if ( $(this).val() != '' || $(this).val() != null ) {
                $.ajax({
                    type: "post",
                    url: "/admin/api/v1/transaksi/nasabah",
                    data: {
                        id: $(this).val()
                    },
                    dataType: "json",
                    success: function ( res ) {
                        $('#tb-nama-tujuan').html(res.nasabah.nama)
                        $('#tb-nrp-tujuan').html(res.nasabah.nrp)
                        $('#tb-saldo-tujuan').html(convertToRupiah(res.nasabah.uang||0))
                    }
                });
            }
        })

        $(document).on('click', '#btnBaru', function(){
            $('.btnBatal').show()
            $('#detail-column').show('200')
            $('#transaksi-column').show('200')
        })

        $(document).on('click', '.btnBatal', function(){
            $('.btnBatal').hide('200')
            $('#detail-column').hide('200')
            $('#transaksi-column').hide('200')
            $('#tb-nama-tujuan').html('')
            $('#tb-nrp-tujuan').html('')
            $('#tb-saldo-tujuan').html('')
            $('#tb-nama').html('')
            $('#tb-nrp').html('')
            $('#tb-saldo').html('')
        })
    </script>

    <style>
        .kode-transaksi-wrapper {
            margin-top: 20px;
        }
        .iradio_square-blue {
            margin-right: 10px;
        }
        .form-group {
            margin-bottom: 10px!important;
            font-weight: 200
        }
        .form-control + .error {
            margin-top: 5px;
            font-style: italic;
            color: red;
            font-weight: 300;
        }
    </style>
@endsection