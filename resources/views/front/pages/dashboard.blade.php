@extends('front.layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <article id="dashboard">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="background-color: #2980b9; border-radius: 8px; padding: 20px;">
                            <div class="card-body">
                                <h3 class="card-title" style="color: white">Saldo</h3>
                                <p class="card-text" style="color: white; margin-top: 10px; font-size: 16px">
                                    Rp {{ number_format($saldo ,0,',','.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="background-color: #2980b9; border-radius: 8px; padding: 20px;">
                            <div class="card-body">
                                <h3 class="card-title" style="color: white">Jumlah Transaksi</h3>
                                <p class="card-text" style="color: white; margin-top: 10px; font-size: 16px">
                                    {{ count($transaksi_bank)+count($transaksi_lpc) }}x Transaksi
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="background-color: #2980b9; border-radius: 8px; padding: 20px;">
                            <div class="card-body">
                                <h3 class="card-title" style="color: white">Saldo</h3>
                                <p class="card-text" style="color: white; margin-top: 10px; font-size: 16px">
                                    Rp {{ number_format($saldo ,0,',','.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection