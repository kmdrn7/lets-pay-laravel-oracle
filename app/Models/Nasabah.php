<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nasabah extends Authenticatable
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

    public static function totalUang()
    {
        $uang = 0;
        $nasabah = Nasabah::get();
        foreach ($nasabah as $data) {
            $uang+=$data->uang;
        }
        return 'Rp '.number_format($uang, 0, ',', '.');
    }

    public function getAuthPassword()
    {
        return $this->password_u;
    }
}
