<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Outlet;
use App\Member;
use Carbon\Carbon;
use App\Detailtransaksi;
use App\paket;
use App\Mail\NotifSelesai;
use App\Mail\NotifProses;
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
        $Member = Member::where('id_outlet',auth()->user()->id_outlet)->get();
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





        // if(!empty($cek_pesanan)){

        // }
        $dt = Carbon::now();
        $transaksi = new Transaksi;
        $transaksi->outlet_id = auth()->user()->id_outlet;
        $transaksi->kode_invoice = 'INV' ."00".$dt->year. $kode;
        $transaksi->member_id = $request->member;
        $transaksi->tgl =  Carbon::now();
        $transaksi->tgl_bayar =  Carbon::now();
        $transaksi->batas_waktu =  $dt->addDays(2);
        $transaksi->biaya_tambahan = null;
        $transaksi->diskon = null;

        $transaksi->status = 'baru';
        $transaksi->status_bayar = null;
        $transaksi->users_id = auth()->user()->id;
        $transaksi->user = auth()->user()->name;
        $transaksi->save();

        $update_member = Member::find($request->member);
        $update_member->status = "pesan";
        $update_member->update();

        // // $invoice  = Transaksi::where('users_id', auth()->user()->id)->where('status','baru')->first();
        // $invoice  = Transaksi::where('member_id', $request->member)->where('status','baru')->first();

        // $cari_harga = Paket::find($request->nama_paket);

        // $detail = new Detailtransaksi;
        // $detail->paket_id = $request->nama_paket;
        // $detail->transaksi_id = $invoice->id;
        // $jumlah = $detail->qty = $request->qty;
        // $detail->keterangan = $request->keterangan;
        // $detail->subtotal = $cari_harga->harga * $request->qty;

        // $detail->save();

        $cek_id  = Transaksi::where('member_id', $request->member)->where('status','baru')->first();


        return Redirect('/detail-transaksi'.'/'.$cek_id->id);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function history($id)
    {
        $data = Transaksi::where('outlet_id',auth()->user()->id_outlet);

        $detail = Detailtransaksi::all();
        $haraga = Detailtransaksi::where('transaksi_id',60);
        $dt     = Carbon::now();
        $Member = Member::where('id_outlet',auth()->user()->id_outlet)->get();
        $paket = Paket::all();

        $outlet = Outlet::all();

        $total = $haraga->sum('subtotal');

        return view('transaksi.datatransaksi',['data'=>$data,'detail'=>$detail],compact('total','outlet','Member','dt','paket'));
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

        $data = transaksi::findOrFail($id);
        $haraga = Detailtransaksi::where('transaksi_id',$id);
        $paket = paket::all();
        $Member = Member::all();
        $member = Member::find($data->member_id);
        $cari_disc = Transaksi::where('member_id',$member->id)->count();
        if($cari_disc == 3)
        $diskon =  $haraga->sum('subtotal')*0.1;

        else if($cari_disc == 5){
            $diskon =  $haraga->sum('subtotal')*0.3;

        }else if($cari_disc == 10){
            $diskon =  $haraga->sum('subtotal')*0.4;

        }else{
            $diskon = 0;
        }

        $detail_count = DetailTransaksi::where('transaksi_id',$id)->count();





        $total1 =  $haraga->sum('subtotal')-$diskon;
        $total = $total1-2500;
        $outlet = Outlet::all();

        return view('transaksi.detailtransaksi',compact('data','total','Member','detail_count','cari_disc','outlet','paket'));

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

        $member = Member::find($data->member_id);

        \Mail::to($member->email)->send(new NotifProses);
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

        $member = Member::find($data->member_id);

      \Mail::to($member->email)->send(new NotifSelesai);


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
        $data->tgl_diambil = Carbon::now();
        $success = $data->update();

        $member =  Member::find($data->member_id);

        $member->status = null;
        $member->update();



        if($success){
            return redirect('history-transaksi')->with('success', 'Data Status Telah Diubah!');
        }else{
            return redirect('history-transaksi')->with('errors', 'data gagal!');
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


        $detail = DetailTransaksi::where('transaksi_id',$id);

        $subtotal = $detail->sum('subtotal');

        $data = Transaksi::find($id);

        $member = Member::find($data->member_id);
        $cari_disc = Transaksi::where('member_id',$member->id)->count();

        $data->status_bayar ='Sudah Bayar';


        if($cari_disc == 3){

        $data->diskon  = 0.1;
        $pajak = $data->pajak = 2500;
        $diskon =  $detail->sum('subtotal')*0.1;
        $data->total = $subtotal-$diskon-$pajak;

        }else if($cari_disc == 5){
            $pajak = $data->pajak = 8000;
            $data->diskon  = 0.3;
            $diskon =  $detail->sum('subtotal')*0.3;
            $data->total = $subtotal-$diskon-$pajak;

        }else if($cari_disc == 10){
            $data->diskon  = 0.4;
            $diskon =  $detail->sum('subtotal')*0.4;
            $data->total = $subtotal-$diskon-$pajak;

        }else{
              $pajak = $data->pajak = 2500;
            $data->total = $subtotal - $pajak;
        }

        $data->update();





        return redirect()->back();

    }


    public function hapusdetail($id){

        $detail = DetailTransaksi::find($id);
        $detail->delete();

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
