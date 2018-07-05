@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Transaksi</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Transaksi</li>
                    <li><b>Buat Transaksi</b></li>
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
            <div class="col-md-5 animated" id="transaksi-column">
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
                                <div class="form-group col-md-12">
                                    <p>
                                        <label for="nasabah">Nasabah</label>
                                        <select class="form-control select2" name="nasabah" id="nasabah" required>
                                            <option value="">-- Pilih Nasabah --</option>
                                            @foreach($nasabah as $data)
                                                <option value="{{ $data->id_nasabah }}">{{ $data->nama }}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                </div>
                                <div class="form-group col-md-12">
                                    <p>
                                        <label for="nasabah">Jenis Transaksi</label>
                                        <select class="form-control select2" name="transaksi" id="transaksi" required>
                                            <option value="">-- Pilih Jenis --</option>
                                            <option value="1">Kredit</option>
                                            <option value="2">Debet</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="form-group col-md-12">
                                    <p>
                                        <label for="besar">Nominal (Rp)</label>
                                        <input class="form-control" type="number" name="besar" id="besar" placeholder="" value="" required>
                                    </p>
                                </div>
                                <div class="form-group col-md-12">
                                    <p>
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="keterangan" placeholde="biarkan kosong jika tidak ada keterangan lain" value="" minlength="2" maxlength="150" style="width: 100%; min-height: 100px; max-height: 200px"></textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button id="btnSimpan" class="btn btn-primary float-right">Simpan</button>
                                    <button type="reset" class="btn btn-warning float-left btnBatal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7" id="detail-column">
                <div class="card">
                    <div class="card-body" style="background-color: white; padding: 15px">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="5" class="text-center">Data Nasabah</th>
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
                                    <th colspan="5" class="text-center">Transaksi Terakhir</th>
                                </tr>
                                <tr>
                                    <td>ID</td>
                                    <td>Jenis</td>
                                    <td>Tgl</td>
                                    <td>Nominal</td>
                                    <td>Aksi</td>
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
            });

            $('.select2').select2({
                    placeholder: "Pilih data",
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
                url: "/admin/api/v1/insert/transaksi-bank",
                data: data,
                dataType: "json",
                success: function ( res ) {
                    $('#nasabah').trigger('change')
                    $('#transaksi').select2('val', '')
                    $('#keterangan').val('')
                    $('#besar').val('')
                    $('#loading').modal('hide')
                    if (res.code == 200){
                        swal('Informasi', 'Transaksi sukses disimpan', 'success');
                    } else {
                        if (res.code == 505){
                            swal('Informasi', 'Saldo tidak cukup untuk dilakukan penarikan', 'error');
                        } else {
                            swal('Informasi', 'Terjadi error saat melakukan transaksi', 'error');
                        }
                    }
                }
            });
        }

        $(document).on('change', '#nasabah', function(){
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
                    $('.recent-transaction').remove()
                    $.each(res.transaksi, (idx, el) => {
                        let elm
                        elm = '<tr class="recent-transaction">'
                            elm += '<td>'
                            elm += el.id_transaksi_bank
                            elm += '</td>'
                            elm += '<td>'
                            elm += el.kode_transaksi==1?'Kredit':'Debet'
                            elm += '</td>'
                            elm += '<td>'
                            elm += el.tgl_transaksi.substring(0,10)
                            elm += '</td>'
                            elm += '<td>'
                            elm += convertToRupiah(el.besar)
                            elm += '</td>'
                            elm += '<td>'
                            elm += '<button class="btn btn-danger btn-hapus-transaksi" data-nasabah-id="'+el.id_nasabah+'" data-id="'+el.id_transaksi_bank+'"><i class="fa fa-remove"></i>&nbsp; Hapus</button>'
                            elm += '</td>'
                        elm += '</tr>'
                        $('#table-body').append(elm)
                    })
                }
            });
        })

         $(document).on('click', '.btn-hapus-transaksi', function(){
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
                        url: "/admin/api/v1/delete/transaksi-bank",
                        data: {
                            id: dis.attr('data-id'),
                            nasabah: dis.attr('data-nasabah-id')
                        },
                        dataType: "json",
                        success: function ( res ) {
                            if (res.code == 200){
                                $('#nasabah').trigger('change')
                                $('#loading').modal('hide')
                                swal('Informasi', 'Sukses menghapus data transaksi', 'success');
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

        $(document).on('click', '#btnBaru', function(){
            $('.btnBatal').show()
            $('#detail-column').show('200')
            $('#transaksi-column').show('200')
        })

        $(document).on('click', '.btnBatal', function(){
            $('.btnBatal').hide('200')
            $('#detail-column').hide('200')
            $('#transaksi-column').hide('200')
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