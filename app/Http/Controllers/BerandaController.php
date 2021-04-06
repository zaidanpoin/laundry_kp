<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Member ;
class BerandaController extends Controller
{
    public function index(){

        $now = Carbon::now();
        $dt = date($now->subDays(10)->diffForHumans());
        $kmren = date(Carbon::now());


         $member = Member::whereBetween('tgl',[$dt,$kmren])->count();

         $data = Member::all()->count();


         return view('halamandepan.halaman',compact('member','data'));
        ;


    }
}
