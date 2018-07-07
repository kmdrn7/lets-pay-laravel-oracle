<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'tbl_pembayaran';
    protected $primaryKey = 'id_pembayaran';

    public $incrementing = false;

    protected $fillable = [
        'id_nasabah',
        'nama',
        'besar',
        'kode',
        'keterangan',
    ];
}
