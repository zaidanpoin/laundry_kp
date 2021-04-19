<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{

   protected $table = 'member';





    protected $fillable = [
        'name','alamat','tgl','jk','nomor_telp', 'email','status','id_outlet',
    ];







    public function Transaksi()
    {
        return $this->hasOne('App\Transaksi');
    }


    public function Outlet()
    {
        return $this->belongsTo('App\Outlet');
    }
}
