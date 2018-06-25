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
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: white; padding: 15px">
                        <a href="{{ url('admin/nasabah/add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: white; padding: 20px">
                        <table class="table table-bordered table-datatable">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>NAMA</td>
                                    <td>NRP</td>
                                    <td>TGL LAHIR</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nasabah as $data)
                                    <tr>
                                        <td>{{ $data->id_nasabah }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->nrp }}</td>
                                        <td>{{ $data->tgl_lahir }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection