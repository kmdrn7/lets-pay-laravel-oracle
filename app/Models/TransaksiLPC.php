<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiLPC extends Model
{
    protected $table = 'tbl_transaksi_lpc';
    protected $primaryKey = 'id_transaksi_lpc';

    public $incrementing = false;

    protected $fillable = [
        'id_nasabah_from',
        'id_nasabah_to',
        'tgl_transaksi',
        'besar',
        'secret',
        'keterangan',
        'status'
    ];

    public function view()
    {
        $this->setTable('q_transaksi_lpc');
        return $this->get();
    }
}
