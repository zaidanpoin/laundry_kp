
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
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                            <form action="{{ route('store-transaksi') }}" method="POST" >


                                {{ csrf_field() }}








                                        <label for="exampleInputPassword1">Paket</label>
                                        <select class="form-control" id="nama_paket"name="nama_paket">
                                            :@foreach ($paket as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_paket}}</option>
                                            @endforeach
                                        </select>

                                        @if($errors->has('nama_paket'))
                                        <div class="text-danger">
                                                {{ $errors->first('nama_paket')}}
                                        </div>
                                        @endif

                                        <br>


                                            <label for="exampleInputPassword1">Jumlah</label>
                                            <input type="number" name="qty"  class="form-control" placeholder="jumlah" autocomplete="off">
                                            @if($errors->has('qty'))
                                                                <div class="text-danger">
                                                                        {{ $errors->first('qty')}}
                                                                </div>
                                                        @endif

                                                                <br>

                                                            <label for="exampleInputPassword1">Keterangan</label>
                                                            <input type="input" class="form-control"  name="keterangan" placeholder="Keterangan">

                                                            @if($errors->has('keterangan'))
                                                            <div class="text-danger">
                                                                    {{ $errors->first('keterangan')}}
                                                            </div>
                                                            @endif



                                                        <br>

                                                            <label for="exampleInputPassword1">Member</label>
                                                            <select class="form-control" id="member" name="member">
                                                                :@foreach ($Member as $p)


                                                                @if ($p->status == null)
                                                                <option value="{{ $p->id }}">{{ $p->name}}</option>

                                                                @endif

                                                                @endforeach
                                                            </select>

                                                            @if($errors->has('member'))
                                                            <div class="text-danger">
                                                                    {{ $errors->first('member')}}
                                                            </div>
                                                            @endif

                                                    <label for="exampleInputPassword1">Status Bayar</label>
                                                <select class="form-control" id="status bayar" name="status bayar">

                                                                <option value="Belum dibayar">Belum dibayar</option>
                                                                <option value="Sudah Bayar">Sudah Bayar</option>

                                                            </select>

                                                            @if($errors->has('status_bayar'))
                                                            <div class="text-danger">
                                                                    {{ $errors->first('status_bayar')}}
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
                                            <th>Nomor</th>
                                            <th>Kode invoice</th>
                                            <th>member</th>
                                            <th>Status Pesanan</th>
                                            <th>Aksi Status</th>

                                            <th>detail</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $nomor = 1


                                        @endphp
                                            @foreach($data as $p)

                                            <td>{{$nomor++ }}  </td>

                                            <td style="text-transform: uppercase">{{ $p->kode_invoice }}</td>
                                            <td>{{ $p->Member->name }}</td>
                                            <td>{{ $p->status }}</td>

                                            @if ($p->status == 'baru')

                                            <td>  <a class="text-light" href="{{ route('update-status',$p->id) }}"><button class="btn btn-primary">Proses</button></a></td>

                                            @elseif ($p->status =='proses')

                                            <td>  <a class="text-light" href="{{ route('update-selesai',$p->id) }}"><button class="btn btn-primary">Selesai Proses</button></a></td>

                                            @elseif ($p->status == 'selesai')


                                            <td>  <a class="text-light" href="{{ route('update-pick',$p->id) }}"><button class="btn btn-primary">Pick up</button></a></td>

                                            @elseif($p->status == 'diambil')

                                            <td>  <a class="text-light" href="{{ route('cetak-invoice',$p->id) }}"><button class="btn btn-primary"><i class="fa fa-file" data-toggle="tooltip" title="Edit" > Cetak invoice</button></a></td>

                                            @endif
















                                            <td>
                                                <a class="text-light" href="{{ route('detail-transaksi',$p->id) }}"><button class="btn btn-success"><i class="fa fa-eye" data-toggle="tooltip" title="Edit" ></i></button></a>

                                            </td>

                                            <td>
                                                <a class="text-light" href="{{ route('edit-outlet',$p->id) }}"><button class="btn btn-warning"><i class="fa fa-pencil-alt" data-toggle="tooltip" title="Edit" ></i></button></a>
                                                <a class="text-light" href="{{ route('hapus-transaksi',$p->id) }}"><button class="btn btn-danger"><i class="fa fa-trash-alt" data-toggle="tooltip" title="Edit" ></i></button></a>
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

