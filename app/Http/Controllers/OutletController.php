<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Outlet::all();
        return view('outlet.dataoutlet',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlet.tambahoutlet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Data wajib diisi !!!',

        ];
        $this->validate($request,[

            'nama' =>'required',
            'alamat' =>'required',
            'nomor' => 'required',


        ],$messages);

        $data = new Outlet;
        $data->nama = ($request->nama) ;
        $data->alamat = ( $request->alamat);
        $data->tlp = ($request->nomor) ;
        $success = $data->save();

        if($success){
            return redirect('/outlet')->with('success', 'Data Berhasil dimasukan!');
        }else{
            return redirect('/outlet')->with('errors', 'data gagal!');
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


        $data = Outlet::find($id);


        return view('outlet.editoutlet',compact('data'));
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
        $messages = [
            'required' => 'Data wajib diisi !!!',

        ];
        $this->validate($request,[

            'nama' =>'required',
            'alamat' =>'required',
            'nomor' => 'required',


        ],$messages);

        $data = Outlet::find($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tlp = $request->nomor;
        $success =  $data->save();

        if($success){
            return redirect('/outlet')->with('success', 'Data Berhasil diupdate!');
        }else{
            return redirect('/outlet')->with('error', 'data gagal di update!');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Outlet::find($id);

       $success = $hapus->delete();

        if($success){
            return redirect('/outlet')->with('toast_error', 'Data Berhasil dihapus!');
        }else{
            return redirect('/outlet')->with('error', 'data gagal dihapus!');
        }


    }
}
