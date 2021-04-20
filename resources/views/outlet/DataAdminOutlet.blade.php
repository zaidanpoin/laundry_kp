
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
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Outlet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('store-akun',$id_admin) }}" method="POST" >

                                            {{ csrf_field() }}



                                                    <label for="exampleInputPassword1">Nama</label>
                                                    <input type="input" class="form-control" id="exampleInputPassword1" value="{{ old('nama') }}" name="name" placeholder="Nama ">
                                                    <br>
                                                    @if($errors->has('nama'))
                                                    <div class="text-danger">
                                                            {{ $errors->first('nama')}}
                                                    </div>
                                                    @endif


                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control" id="exampleInputPassword1" value="{{ old('email') }}" name="email" placeholder="Email ">
                                                    <br>
                                                    @if($errors->has('email'))
                                                    <div class="text-danger">
                                                            {{ $errors->first('email')}}
                                                    </div>
                                                    @endif



                                                    <label for="exampleInputPassword1">Level</label>
                                                    <select type="input" class="form-control" id="exampleInputPassword1" name="level" placeholder="Level">

                                                        <option value="Owner">Owner</option>

                                                        <option value="Kasir">Kasir</option>
                                                    </select>

                                                    <br>

                                                    <label for="exampleInputPassword1">Passowrd</label>
                                                    <input type="input" class="form-control" id="exampleInputPassword1" value="{{ old('password') }}" name="password" placeholder="Password ">
                                                    <br>
                                                    @if($errors->has('password'))
                                                    <div class="text-danger">
                                                            {{ $errors->first('password')}}
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
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>


                                            <th>Aksi</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $nomor = 1


                                        @endphp
                                            @foreach($Outlet as $p)
                                            <tr>

                                                    <td>{{ $nomor++ }}</td>
                                                    <td>{{ $p->name }}</td>
                                                    <td>{{ $p->email }}</td>
                                                    <td>{{ $p->level }}</td>





                                            <td>
                                                <a class="text-light" data-toggle="modal" data-target="#Modal2-{{ $p->id }}"><button class="btn btn-warning"><i class="fa fa-pencil-alt" data-toggle="tooltip" title="Edit" ></i></button></a>
                                                <a class="text-light" href="{{ route('hapus-outlet',$p->id) }}"><button class="btn btn-danger remove-user"><i class="fa fa-trash-alt" data-toggle="tooltip" title="Hapus" ></i></button></a>


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


    @foreach ($Outlet as  $p)
    <div class="modal fade" id="Modal2-{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
             <form action="/update-akun/{{ $p->id }}" method="POST" >

                 {{ csrf_field() }}






                     {{ csrf_field() }}



                     <label for="exampleInputPassword1">Nama</label>
                     <input type="input" class="form-control" id="exampleInputPassword1" value="{{ $p->name }}" name="name" placeholder="Nama ">
                     <br>
                     @if($errors->has('nama'))
                     <div class="text-danger">
                             {{ $errors->first('nama')}}
                     </div>
                     @endif


                     <label for="exampleInputPassword1">Email</label>
                     <input type="email" class="form-control" id="exampleInputPassword1" value="{{ $p->email }}" name="email" placeholder="Email ">
                     <br>
                     @if($errors->has('email'))
                     <div class="text-danger">
                             {{ $errors->first('email')}}
                     </div>
                     @endif





                     <label for="exampleInputPassword1">Level</label>
                     <select type="input" class="form-control" id="exampleInputPassword1" name="level" placeholder="Level">
                        <option value="Owner" @if($p->level == 'Owner') selected @endif>Owner</option>
                        <option value="admin" @if($p->level == 'admin') selected @endif>Admin</option>
                        <option value="kasir" @if($p->level == 'kasir') selected @endif>Kasir</option>



                     </select>

                     <br>

                     <label for="exampleInputPassword1">Password</label>
                     <input type="input" class="form-control" id="exampleInputPassword1"  name="password" placeholder="Password ">
                     <br>
                     @if($errors->has('password'))
                     <div class="text-danger">
                             {{ $errors->first('password')}}
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

