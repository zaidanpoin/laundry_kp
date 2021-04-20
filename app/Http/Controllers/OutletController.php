<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Transaksi;
use App\Member;
use App\User;
use PDF;

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
        $outlet = Outlet::all();

        return view('outlet.dataoutlet',compact('data','outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = Outlet::all();
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


    public function admin($id)
    {

        $id_admin = $id;
        $Outlet = User::where('id_outlet',$id)->get();
        $outlet = Outlet::all();
        return view('outlet.DataAdminOutlet',compact('Outlet','id_admin','outlet'));
    }



    public function adminstore(Request $request, $id)
    {

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_outlet = $id;
        $user->level = $request->level;
        $user->remember_token = \Str::random(60);
        $user->save();
        return redirect('/data-admin');
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
        if($request->isMethod('post')){
            $data = $request->all();




         Outlet::where(['id'=>$id])->update(['nama'=>$data['nama'],'alamat'=>$data['alamat'],'tlp'=>$data['nomor']]);

            return redirect()->back();
        }
    }

    public function updateakun(Request $request, $id){

        if($request->isMethod('post')){
            $data = $request->all();

            if(!empty($request->password )){

                User::where(['id'=>$id])->update(['name'=>$data['name'],'email'=>$data['email'],'level'=>$data['level'],
                'password'=>bcrypt($data['password'])]);
            }else{
                User::where(['id'=>$id])->update(['name'=>$data['name'],'email'=>$data['email'],'level'=>$data['level']]);
            }



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
        $hapus = Outlet::find($id);

       $success = $hapus->delete();

        if($success){
            return redirect('/outlet')->with('toast_error', 'Data Berhasil dihapus!');
        }else{
            return redirect('/outlet')->with('error', 'data gagal dihapus!');
        }


    }


    public function form($id){
        $outlet= Outlet::all();
        $dataoutlet = Outlet::find($id);
        return view('laporan.laporan',compact('outlet','dataoutlet'));
    }


    public function cetak($tglawal,$tglakhir,$id){

        $transaksi = Transaksi::where('outlet_id',$id)->whereBetween('tgl',[$tglawal,$tglakhir])->get();

        $pdf = PDF::loadview('laporan.laporantanggal',['transaksi'=>$transaksi]);
        $name = "laporan";
        $outlet = Outlet::find($id);
        return $pdf->stream($name."-".$outlet->nama.".pdf");;
    }
}
