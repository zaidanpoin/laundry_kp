<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable =['id','outlet_id','member_id','kode_invoice','tgl','tgl_bayar','batas_waktu','biaya_tambahan','diskon',
    'status','users_id','status_bayar','user','opsi_bayar','total','tgl_proses','tgl_selesai','pajak'];



    public function Outlet()
    {
        return $this->belongsTo('App\Outlet');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function Member()
    {
        return $this->belongsTo(Member::class);
    }

    public function Detailtransaksi()
    {
        return $this->hasMany(Detailtransaksi::class);
    }
}

