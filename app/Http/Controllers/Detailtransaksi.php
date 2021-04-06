<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Detailtransaksi extends Controller
{
    protected $table = 'detailtransaksi';

    protected $fillable = ['id','transaksi_id','paket_id','qty','keterangan','subtotal'];

}
