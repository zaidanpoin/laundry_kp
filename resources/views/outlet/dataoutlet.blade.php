
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
                                <h4 class="card-title">Data Outlet</h4>
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
                                        <form action="{{ route('store-outlet') }}" method="POST" >

                                            {{ csrf_field() }}



                                                    <label for="exampleInputPassword1">Nama Outlet</label>
                                                    <input type="input" class="form-control" id="exampleInputPassword1" name="nama" placeholder="Nama outlet">

                                                    @if($errors->has('nama'))
                                                    <div class="text-danger">
                                                            {{ $errors->first('nama')}}
                                                    </div>
                                                    @endif





                                                    <label for="exampleInputPassword1">alamat</label>
                                                    <input type="input" class="form-control" id="exampleInputPassword1" name="alamat" placeholder="Alamat outlet">

                                                    @if($errors->has('alamat'))
                                                    <div class="text-danger">
                                                            {{ $errors->first('alamat')}}
                                                    </div>
                                                    @endif




                                                    <label for="exampleInputPassword1">Nomor</label>
                                                    <input type="number" name="nomor" class="form-control" placeholder="nomor" autocomplete="off">
                                                    @if($errors->has('nomor'))
                                                                        <div class="text-danger">
                                                                                {{ $errors->first('nomor')}}
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
                                            <th>Nama Outlet</th>
                                            <th>Alamat Outlet</th>
                                            <th>Nomor Tlp</th>
                                            <th>Manage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $nomor = 1


                                        @endphp
                                            @foreach($data as $p)
                                            <tr>


                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->alamat }}</td>
                                            <td>0{{ $p->tlp }}</td>
                                            <td> <a class="text-light" href="{{ route('admin-outlet',$p->id) }}"><button class="btn btn-success">Manage Akun</button></a></td>
                                            <td>
                                                <a class="text-light" data-toggle="modal" data-target="#Modal2-{{ $p->id }}"><button class="btn btn-warning"><i class="fa fa-pencil-alt" data-toggle="tooltip" title="Edit" ></i></button></a>
                                                <a class="text-light" href="{{ route('hapus-outlet',$p->id) }}"><button class="btn btn-danger"><i class="fa fa-trash-alt" data-toggle="tooltip" title="Hapus" ></i></button></a>
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
    @foreach ($data as  $p)
    <div class="modal fade" id="Modal2-{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Outlet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('update-outlet',$p->id) }}" method="POST" >

                {{ csrf_field() }}



                        <label for="exampleInputPassword1">Nama Outlet</label>
                        <input type="input" value="{{ $p->nama }}" class="form-control" id="exampleInputPassword1" name="nama" placeholder="Nama outlet">

                        @if($errors->has('nama'))
                        <div class="text-danger">
                                {{ $errors->first('nama')}}
                        </div>
                        @endif





                        <label for="exampleInputPassword1">alamat</label>
                        <input type="input" class="form-control" id="exampleInputPassword1" value="{{ $p->alamat }}" name="alamat" placeholder="Alamat outlet">

                        @if($errors->has('alamat'))
                        <div class="text-danger">
                                {{ $errors->first('alamat')}}
                        </div>
                        @endif




                        <label for="exampleInputPassword1">Nomor</label>
                        <input type="number" name="nomor" class="form-control" value="{{ $p->tlp }}" placeholder="nomor" autocomplete="off">
                        @if($errors->has('nomor'))
                                            <div class="text-danger">
                                                    {{ $errors->first('nomor')}}
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

