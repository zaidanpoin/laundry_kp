<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Member ;
use App\Outlet ;
use App\Transaksi ;
use App\Detailtransaksi;
class BerandaController extends Controller
{
    public function index(){

        $now = Carbon::now();
        $dt = date($now->subDays(10)->diffForHumans());
        $kmren = date(Carbon::now());


         $member = Member::whereBetween('tgl',[$dt,$kmren])->count();

         $data = Member::all()->count();
         $transaksi = Transaksi::all()->count();

         $crt = 

         $daily = Transaksi::where('outlet_id',auth()->user()->id_outlet);   
            $hitungdaily = $daily->sum('total');
         $outlet = Outlet::all();
  
        $nama_outlet = Outlet::find(auth()->user()->id_outlet);

         return view('halamandepan.halaman',compact('member','nama_outlet','outlet','hitungdaily','transaksi','data'));
        ;


    }
}
