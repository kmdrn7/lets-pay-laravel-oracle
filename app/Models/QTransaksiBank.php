<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QTransaksiBank extends Model
{
    protected $table = 'q_transaksi_bank';
    protected $primaryKey = 'id_transaksi_bank';

    public $incrementing = false;

    protected $fillable = [
        'id_nasabah',
        'kode_transaksi',
        'tgl_transaksi',
        'besar',
        'keterangan',
    ];

    public function view()
    {
        $this->setTable('q_transaksi_bank');
        return $this->get();
    }
}
