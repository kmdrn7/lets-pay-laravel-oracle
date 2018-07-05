@extends('front.layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article id="profil">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" style="border-radius: 8px; padding: 20px; border: 1px solid black">
                                <div class="card-body">
                                    <h3 class="card-title">Ubah Profil</h3>
                                    <form class="form-insert" action="{{ url('profil') }}" id="frmUpdate" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="nama">Nama Lengkap</label>
                                                        <input type="hidden" name="id" id="idUpd" placeholder="" value="{{ $profil->id_nasabah }}" minlength="1" maxlength="100" required readonly>
                                                        <input class="form-control" type="text" name="nama" id="namaUpd" placeholder="" value="{{ $profil->nama }}" minlength="2" maxlength="100" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="nrp">NRP</label>
                                                        <input class="form-control" type="text" name="nrp" id="nrpUpd" placeholder="" value="{{ $profil->nrp }}" minlength="10" maxlength="10" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="tgl_lahir">Tgl Lahir</label>
                                                        <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahirUpd" placeholder="" value="{{ $profil->tgl_lahir }}" required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <p>
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" name="alamat" id="alamatUpd" placeholder="" minlength="5" maxlength="150" required
                                                            style="width: 100%; min-height: 100px; max-height: 200px">{{ $profil->alamat }}</textarea>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="email">Email</label>
                                                        <input class="form-control" type="email" name="email" id="emailUpd" placeholder="" value="{{ $profil->email }}" minlength="2" maxlength="100"
                                                            required>
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>
                                                        <label for="password">Password</label>
                                                        <input class="form-control" type="password" name="password" id="passwordUpd" placeholder="" value="" minlength="5" maxlength="50">
                                                        <span>
                                                            <small>(*biarkan kosong jika tidak ingin mengganti)</small>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" id="btnBatalUpd" data-dismiss="modal">
                                                <i class="fa fa-close"></i>&nbsp; Batal
                                            </button>
                                            <button type="submit" class="btn btn-primary" id="btnSimpanUpd">
                                                <i class="fa fa-save"></i>&nbsp; Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection