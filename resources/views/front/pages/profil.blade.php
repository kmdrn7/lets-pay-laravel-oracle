@extends('front.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>Dashboard</li>
                    <li><b>Profil</b></li>
                </ol>
            </div>
        </div>

        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="max-width: 600px; margin: 0 auto">
                    <div class="card-body" style="background-color: white; padding: 15px">
                        <h3 class="card-title">Ubah Profil</h3>
                        <form class="form-insert" action="{{ url('profil') }}" id="frmUpdate" method="post">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="hidden" name="id" id="idUpd" placeholder="" value="{{ $profil->id_nasabah }}" minlength="1" maxlength="100" required readonly>
                                        <input class="form-control" type="text" name="nama" id="namaUpd" placeholder="" value="{{ $profil->nama }}" minlength="2" maxlength="100" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nrp">NRP</label>
                                        <input class="form-control" type="text" name="nrp" id="nrpUpd" placeholder="" value="{{ $profil->nrp }}" minlength="10" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="tgl_lahir">Tgl Lahir</label>
                                        <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahirUpd" placeholder="" value="{{ $profil->tgl_lahir }}" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamatUpd" placeholder="" minlength="5" maxlength="150" required
                                                style="width: 100%; min-height: 100px; max-height: 200px">{{ $profil->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="email" name="email" id="emailUpd" placeholder="" value="{{ $profil->email }}" minlength="2" maxlength="100"
                                                required>
                                    </div>
                                    <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="password" id="passwordUpd" placeholder="" value="" minlength="5" maxlength="50">
                                            <span>
                                                <small>(*biarkan kosong jika tidak ingin mengganti)</small>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btnSimpanUpd">
                                    <i class="fa fa-save"></i>&nbsp; Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection