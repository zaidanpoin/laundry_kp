<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailtransaksi extends Model
{

    protected $table = 'detailtransaksi';

    protected $fillable = ['id','paket_id','transaksi_id','qty','keterangan','subtotal'];


    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }

    public function paket(){
        return $this->belongsTo(Paket::class);
    }



}
