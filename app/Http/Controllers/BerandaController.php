<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Member ;
use App\Outlet ;
class BerandaController extends Controller
{
    public function index(){

        $now = Carbon::now();
        $dt = date($now->subDays(10)->diffForHumans());
        $kmren = date(Carbon::now());


         $member = Member::whereBetween('tgl',[$dt,$kmren])->count();

         $data = Member::all()->count();

         $outlet = Outlet::all();


         return view('halamandepan.halaman',compact('member','outlet','data'));
        ;


    }
}
