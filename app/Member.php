<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{

   protected $table = 'member';


    use Notifiable;


    protected $fillable = [
        'name','alamat','tgl','jk','nomor_telp', 'email','status', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    public function Transaksi()
    {
        return $this->hasOne('App\Transaksi');
    }


    public function Outlet()
    {
        return $this->belongTo('App\Outlet');
    }
}
