<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QTransaksiLPC extends Model
{
    protected $table = 'q_transaksi_lpc';
    protected $primaryKey = 'id_transaksi_lpc';

    public $incrementing = false;

    protected $fillable = [
        'id_transaksi_lpc',
        'id_nasabah_from',
        'id_nasabah_to',
        'besar',
        'keterangan',
    ];

    public function view()
    {
        $this->setTable('q_transaksi_lpc');
        return $this->get();
    }
}
