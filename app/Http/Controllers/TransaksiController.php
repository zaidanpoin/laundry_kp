<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Outlet;
use App\Member;
use Carbon\Carbon;
use App\Detailtransaksi;
use App\paket;
use Illuminate\Support\Str;
use PDF;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Transaksi::where('outlet_id',auth()->user()->id_outlet)->get();

        $detail = Detailtransaksi::all();
        $haraga = Detailtransaksi::where('transaksi_id',60);
        $dt     = Carbon::now();
        $Member = Member::all();
        $paket = Paket::all();

        $outlet = Outlet::all();

        $total = $haraga->sum('subtotal');

        return view('transaksi.datatransaksi',['data'=>$data,'detail'=>$detail],compact('total','outlet','Member','dt','paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $dt->addDays(2)
        $dt     = Carbon::now();
        $Member = Member::all();
        $paket = Paket::all();


        // $detail = Detailtransaksi::all();
        return view('transaksi.tambahtransaksi',compact('Member','dt','paket' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         $dt  = Carbon::now();
        $kode = Str::random(10);


        // $cek_pesanan = Transaksi::where('users_id', auth()->user()->id)->where('status','baru')->first();

        // $cek_pesanan = Transaksi::where('member_id', auth()->user()->id)->where('status','baru')->first();

        $cek_jumlah = $request->qty;

        $haha = $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
        ];
        $this->validate($request,[

            'nama_paket' =>'required',
            'qty'=>'required',
            'member'=>'required'


        ],$messages);

        if($cek_jumlah == null){


            return  redirect('transaksi')->with('warning','abam');

        }else{




        // if(!empty($cek_pesanan)){

        // }

        $transaksi = new Transaksi;
        $transaksi->outlet_id = auth()->user()->id_outlet;
        $transaksi->kode_invoice = 'INV' ."00". $kode;
        $transaksi->member_id = $request->member;
        $transaksi->tgl =  Carbon::now();
        $transaksi->tgl_bayar =  Carbon::now();
        $transaksi->batas_waktu =  $dt->addDays(2);
        $transaksi->biaya_tambahan = null;
        $transaksi->diskon = null;

        $transaksi->status = 'baru';
        $transaksi->status_bayar = $request->status_bayar;
        $transaksi->users_id = auth()->user()->id;
        $transaksi->user = auth()->user()->name;
        $transaksi->save();

        $paket = Member::find($request->member);
        $paket->status = "pesan";
        $paket->update();

        // $invoice  = Transaksi::where('users_id', auth()->user()->id)->where('status','baru')->first();
        $invoice  = Transaksi::where('member_id', $request->member)->where('status','baru')->first();

        $cari_harga = Paket::find($request->nama_paket);

        $detail = new Detailtransaksi;
        $detail->paket_id = $request->nama_paket;
        $detail->transaksi_id = $invoice->id;
        $jumlah = $detail->qty = $request->qty;
        $detail->keterangan = $request->keterangan;
        $detail->subtotal = $cari_harga->harga * $request->qty;

        $detail->save();




        return Redirect('transaksi');
    }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function detail($id)
    {

        $data = transaksi::find($id);
        $haraga = Detailtransaksi::where('transaksi_id',$id);
        $paket = paket::all();
        $Member = Member::all();

        if($haraga->sum('subtotal') > 20000)
        $diskon =  $haraga->sum('subtotal')*0.1;

        else if($haraga->sum('subtotal') > 50000){
            $diskon =  $haraga->sum('subtotal')*0.3;
        }




        $cari_disc = $haraga->sum('subtotal');

        $total =  $haraga->sum('subtotal')-$diskon;

        $outlet = Outlet::all();

        return view('transaksi.detailtransaksi',compact('data','total','Member','cari_disc','outlet','paket'));

    }


    public function storedetail(Request $request,$id)
    {
        $cari_harga = Paket::find($request->nama_paket);




        $cek_pesanan_detail = Detailtransaksi::where('paket_id',$request->nama_paket);



            $detail = new Detailtransaksi;
            $detail->paket_id = $request->nama_paket;
            $detail->transaksi_id = $id;
            $jumlah = $detail->qty = $request->qty;
            $detail->keterangan = $request->keterangan;
            $detail->subtotal = $cari_harga->harga * $request->qty;

            $detail->save();
            return redirect()->back();









    }




    public function cekpesan()
    {
        if(auth()->user()->status == null)


        return redirect('/beranda')->with('warning','tidak ada transaksi');


        else
        $data = transaksi::where('member_id',auth()->user()->id)->first();
        $haraga = Detailtransaksi::where('transaksi_id',$data->id);
        $total1 = $haraga->sum('subtotal');
        $total = $total1 ;
        $paket = paket::all();
        $Member = Member::all();
        return view('transaksi.detailtransaksi',compact('data','total','paket','Member'));


    }


    public function status(Request $request, $id)
    {
        $data = transaksi::find($id);

        $data->status = "proses";
        $data->tgl_proses = Carbon::now();
        $success = $data->update();


        if($success){
            return redirect('transaksi')->with('success', 'Data Status Telah Diubah!');
        }else{
            return redirect('transaksi')->with('errors', 'data gagal!');
        }
    }



    public function selesai(Request $request, $id)
    {
        $data = transaksi::find($id);

        $data->status = "selesai";
        $data->tgl_selesai = Carbon::now();
        $success = $data->update();


        if($success){
            return redirect('transaksi')->with('success', 'Data Status Telah Diubah!');
        }else{
            return redirect('transaksi')->with('errors', 'data gagal!');
        }
    }


    public function pick($id){
        $haraga = Detailtransaksi::where('transaksi_id',$id);
         $total = $haraga->sum('subtotal');

        $data = transaksi::find($id);
        $data->total = $total;
        $data->status = "diambil";
        $success = $data->update();

        $member =  Member::find($data->member_id);

        $member->status = null;
        $member->update();



        if($success){
            return redirect('transaksi')->with('success', 'Data Status Telah Diubah!');
        }else{
            return redirect('transaksi')->with('errors', 'data gagal!');
        }

    }

    public function cetak($id){

        $haraga = Detailtransaksi::where('transaksi_id',$id);
        $total1 = $haraga->sum('subtotal');
        $total = $total1 ;
        $data = transaksi::find($id);
        $tanggal =Carbon::now()->isoFormat('D MMMM Y');
        $pdf = PDF::loadview('invoice',['data'=>$data,'tanggal'=>$tanggal,'total'=>$total]);

        return $pdf->stream();




    }


    public function updatedetail(Request $request, $id)
    {
    //     $detail = Detailtransaksi::find($id);
    //     $detail->qty = $request->qty;
    //     $detail->update();
    //     if($success){
    //         return redirect('transaksi')->with('success', 'Data Berhasil di update!');
    //     }else{
    //         return redirect('transaksi')->with('errors', 'data gagal!');
    //     }
    if($request->isMethod('post')){
        $data = $request->all();


        $paket = paket::find($data['nama_paket']);


        $angka = $data['qty'] * $paket->harga ;

        Detailtransaksi::where(['id'=>$id])->update(['qty'=>$data['qty'],'subtotal'=>$angka]);

        return redirect()->back();
    }
    }




    public function update(Request $request, $id)
    {
        //
    }


    public function bayar($id)
    {


        $data = Transaksi::find($id);



        $data->status_bayar ='Sudah Bayar';


        $data->update();





        return redirect()->back();

    }



    public function destroy($id)
    {
        $data = Transaksi::find($id);
        $berhasil = $data->delete();


        $member = Member::find($data->member_id);
        $member->status = '';
        $member->update();

        if($berhasil){
            return redirect('transaksi')->with('toast_error', 'Data Berhasil dihapus!');
        }else{
            return redirect('transaksi')->with('error', 'data gagal dihapus!');
        }



    }

}
