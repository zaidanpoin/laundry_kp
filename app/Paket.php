<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table= 'paket';

    protected $primarykey = 'id';

    protected $fillable = ['id','id_outlet','jenis','nama_paket','harga'];

    public function Detailtransaksi()
    {
        return $this->hasMany(Detailtransaksi::class);
    }

}
