<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'tbl_admin';
    protected $primaryKey = 'id_admin';

    public $incrementing = false;

    protected $fillable = [
        'nama',
        'email',
        'password_a'
    ];

    public function getAuthPassword()
    {
        return $this->password_a;
    }
}
