@extends('front.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Transfer</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Dashboard</li>
                    <li><b>Transfer</b></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: white; padding: 15px; max-width: 400px">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Transfer</h3>
                                <form action="" id="frmAdd">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <p>
                                                <label for="nasabah">Tujuan</label>
                                                <select name="nasabah" id="nasabah" class="form-control select2">
                                                    @foreach ($nasabah as $data)
                                                        <option value="{{ $data->id_nasabah }}">{{ $data->nama }}</option>
                                                    @endforeach
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
                                                <textarea class="form-control" name="keterangan" id="keterangan" placeholder="biarkan kosong jika tidak ada keterangan lain" value="" minlength="2" maxlength="150" style="width: 100%; min-height: 100px; max-height: 200px" required>Transfer</textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <button type="submit" class="btn btn-primary" style="float: right" id="btnCek">
                                        <i class="fa fa-send"></i>&nbsp;
                                        Kirim
                                    </button>
                                </form>
                            </div>
                        </div>
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
            let dis = $(this);
            swal({
                title: "Konfirmasi transfer",
                text: "Apakah anda yakin melakukan transfer ke rekening ini?",
                icon: "warning",
                buttons: {
                    cancel: "Tidak, kembali",
                    ya: "Ya, transfer"
                },
                dangerMode: true,
            }).then((ret) => {
                if (ret) {
                    $.ajax({
                        type: "post",
                        url: "/api/v1/transfer/transfer",
                        data: data,
                        dataType: "json",
                        success: function ( res ) {
                            if (res.code == 200){
                                $('#besar').val('')
                                $('#keterangan').val('Transfer')
                                swal('Informasi', 'Berhasil melakukan transfer ke rekening yang dituju', 'success')
                            } else if (res.code == 505){
                                swal('Error', 'Gagal, sisa saldo anda tidak cukup untuk melakukan transfer', 'error')
                            } else {
                                swal('Error', 'Gagal melakukan transfer', 'error')
                            }
                        }
                    });
                } else {
                    return false;
                }
            });
        }

        $(function(){

            $('#frmAdd').validate({
                submitHandler: function(form) {
                    submitFormAdd()
                }
            })

            $('.select2').select2({
                placeholder: 'Pilih tujuan transfer',
            })
        })
    </script>
@endsection