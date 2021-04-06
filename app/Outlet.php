<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = 'outlet';
    protected $primarykey = 'id';
    protected $fillable =['id','nama','alamat','tlp',];



    public function Transaksi()
    {
        return $this->hasOne('App\Transaksi');
    }

    public function Member()
    {
        return $this->hasOne('App\Member');
    }


    public function Paket()
    {
        return $this->hasOne('App\Paket');
    }




}
