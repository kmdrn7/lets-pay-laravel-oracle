<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiBank extends Model
{
    protected $table = 'tbl_transaksi_bank';
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
