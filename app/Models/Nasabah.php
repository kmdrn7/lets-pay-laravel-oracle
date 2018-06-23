<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = 'tbl_nasabah';
    protected $primaryKey = 'id_nasabah';

    public $incrementing = false;

    protected $fillable = [
        'nama',
        'nrp',
        'tgl_lahir',
        'alamat',
        'email',
        'uang',
        'password_u'
    ];
}
