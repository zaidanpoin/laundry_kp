
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

            <div class="row">



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Data</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                            <form action="{{ route('store-member') }}" method="POST" >


                                {{ csrf_field() }}









                                                            <label for="exampleInputPassword1">Nama</label>
                                                            <input type="text" name="name" class="form-control">


<br>

                                                            <label for="exampleInputPassword1">Email</label>
                                                            <input type="text" name="email" class="form-control">





                                                            <br>

                                                            <label for="exampleInputPassword1">Nomor Telpon</label>
                                                            <input type="number" name="tlp" class="form-control">


                                                            <br>
                                                            <label for="exampleInputPassword1">Alamat</label>
                                                            <textarea type="text" name="alamat" class="form-control">

                                                            </textarea>



<br>
                                                            <label for="exampleInputPassword1">Jenkel</label>
                                                            <select type="text" name="jk" class="form-control">
                                                                <option value="pr">perempuan</option>
                                                                <option value="lk">laki laki</option>
                                                            </select>





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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Jk</th>
                                            <th></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ( $Member as $p )
                                        <tr>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->email }}</td>
                                        </tr>
                                        @empty

                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
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

