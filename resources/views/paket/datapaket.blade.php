
<!DOCTYPE html>
<html lang="en">
<head>
@include('template2.head')
</head>
<body>
	@include('template2.logo')
			<!-- End Logo Header -->

			<!-- Navbar Header -->
	@include('template2.navbar')
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		@include('template2.sidebar')
		<!-- End Sidebar -->

        {{-- konten --}}
		{{-- @include('template2.konten') --}}
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">


            </div>
            <div class="row">



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Paket</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Outlet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/paket/store" method="POST" >

                                            {{ csrf_field() }}




                                            <label for="exampleInputPassword1">Jenis Paket</label>
                                            <input type="input" class="form-control" id="exampleInputPassword1" name="jenis" placeholder="Jenis Paket">

                                            @if($errors->has('jenis'))
                                            <div class="text-danger">
                                                    {{ $errors->first('jenis')}}
                                            </div>
                                            @endif


                                                    <label for="exampleInputPassword1">Jenis Paket</label>
                                                    <input type="input" class="form-control" id="exampleInputPassword1" name="jenis" placeholder="Jenis Paket">

                                                    @if($errors->has('jenis'))
                                                    <div class="text-danger">
                                                            {{ $errors->first('jenis')}}
                                                    </div>
                                                    @endif

                                                    <br>


                                                    <label for="exampleInputPassword1">Nama Paket</label>
                                                    <input type="input" class="form-control" id="exampleInputPassword1" name="nama_paket" placeholder="Nama Paket">

                                                    @if($errors->has('nama_paket'))
                                                    <div class="text-danger">
                                                            {{ $errors->first('nama_paket')}}
                                                    </div>
                                                    @endif

                                                    <br>


                                                    <label for="exampleInputPassword1">Harga</label>
                                                    <input type="number" name="harga" class="form-control" placeholder="Harga" autocomplete="off">
                                                    @if($errors->has('harga'))
                                                                        <div class="text-danger">
                                                                                {{ $errors->first('harga')}}
                                                                        </div>
                                                                @endif



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                                    </div>
                                </div>
                                </div>


                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No  </th>
                                            <th>Outlet</th>
                                            <th>Jenis Paket</th>
                                            <th>Nama Paket</th>

                                            <th>Harga</th>

                                            <th >Action</th>
                                        </tr>
                                    </thead>


                                            <tbody>
                                                @php $nomor = 1
                                                @endphp

                                                @foreach($paket as $p)
                                                <tr>
                                                <td>{{$nomor++ }}  </td>
                                                <td>{{ $p->Outlet->nama }}</td>
                                                <td>{{ $p->jenis }}</td>
                                                <td >{{ $p->nama_paket}}</td>
                                                <td >Rp.{{ number_format($p->harga )}}</td>
                                                <td>
                                                    <a class="text-light" data-toggle="modal" data-target="#Modal2-{{ $p->id }}"  href="" ><button class="btn btn-warning"><i class="fa fa-pencil-alt" data-toggle="tooltip" title="Edit" ></i></button></a>
                                                    <a class="text-light" href="{{ route('hapus-paket',$p->id) }}"><button class="btn btn-danger"><i class="fa fa-trash-alt" data-toggle="tooltip" title="Edit" ></i></button></a>
                                                </td>




                                                </tr>
                                            @endforeach
                                            </tbody>
                                             </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <!-- Modal2 -->
       @foreach ($paket as  $p)
       <div class="modal fade" id="Modal2-{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             </div>
             <div class="modal-body">
                <form action="/update-paket/{{ $p->id }}" method="POST" >

                    {{ csrf_field() }}



                        <label for="exampleInputPassword1">Outlet</label>
                        <select class="form-control" id=""name="outlet_id">
                            :@foreach ($outlet as $d)

                            <option value="{{ $d->id }}" {{ $d->id == $p->outlet_id ? 'selected ': '' }}>{{ $d->nama }}</option>
                            @endforeach
                        </select>

                        <br>


                            <label for="exampleInputPassword1">Jenis Paket</label>
                            <input type="input" class="form-control" id="exampleInputPassword1" value="{{ $p->jenis }}" name="jenis" placeholder="Jenis Paket">

                            @if($errors->has('jenis'))
                            <div class="text-danger">
                                    {{ $errors->first('jenis')}}
                            </div>
                            @endif

                            <br>


                            <label for="exampleInputPassword1">Nama Paket</label>
                            <input type="input" class="form-control" id="exampleInputPassword1" value="{{ $p->nama_paket }}" name="nama_paket" placeholder="Nama Paket">

                            @if($errors->has('nama_paket'))
                            <div class="text-danger">
                                    {{ $errors->first('nama_paket')}}
                            </div>
                            @endif

                            <br>


                            <label for="exampleInputPassword1">Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ $p->harga }}" placeholder="Harga" autocomplete="off">
                            @if($errors->has('harga'))
                                                <div class="text-danger">
                                                        {{ $errors->first('harga')}}
                                                </div>
                                        @endif



</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
                                 </div>

                             </div>
                             </div>
                         </div>
       @endforeach


                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">

            </nav>
            <div class="copyright ml-auto">
                2020, made with <i class="fa fa-heart heart text-danger"></i> by Zaidaan</a>
            </div>
        </div>
    </footer>
</div>
<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>


	<!--   Core JS Files   -->
	@include('template2.script')
</body>
</html>




