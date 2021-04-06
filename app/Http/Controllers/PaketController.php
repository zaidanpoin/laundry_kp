<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;

use App\Outlet;
class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();


        $outlet = Outlet::all();

        return view('paket.datapaket',compact('paket','outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $paket = new Paket;

      $paket->outlet_id = $request->outlet_id;
        $paket->jenis = $request->jenis;
        $paket->harga = $request->harga;
        $paket->nama_paket = $request->nama_paket;
        $finish = $paket->save();

        if($finish){
            return redirect('datapaket')->with('success', 'Data Berhasil ditambahkan');
        }else{
            return redirect('datapaket')->with('errors', 'data gagal!');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();




         Paket::where(['id'=>$id])->update(['outlet_id'=>$data['outlet_id'],'jenis'=>$data['jenis'],'harga'=>$data['harga'],'nama_paket'=>$data['nama_paket']]);

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::find($id);

        $berhasil = $paket->delete();

        if($berhasil){
            return redirect('datapaket')->with('toast_error', 'Data Berhasil dihapus!');
        }else{
            return redirect('datapaket')->with('error', 'data gagal dihapus!');
        }

    }
}
