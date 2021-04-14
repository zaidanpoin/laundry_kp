
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

                @if ($data->status == 'baru')



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Data</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#Modal1">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>






                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                            <form action="{{ route('store-detail',$data->id) }}" method="POST" >


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



                        @endif
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title" style="text-transform: uppercase">status pesanan : {{ $data->kode_invoice }}</div>
                                        </div>
                                        <div class="card-body">
                                            <ol class="activity-feed">
                                                @if($data->status == 'baru')

                                                <li class="feed-item feed-item-danger">
                                                    <time class="date" datetime="9-18">{{ $data->tgl }}</time>
                                                    <span class="text">Pembayaran Anda <a href="#">"Telah Dikonfirmasi"</a></span>
                                                </li>

                                                <li class="feed-item feed-item-info">
                                                    <time class="date" datetime="9-23">{{  $data->tgl }}</time>
                                                    <span  class="text">Kode Invoice : <a style="text-transform: uppercase">{{ $data->kode_invoice }}</a></span>
                                                </li>

                                                <li class="feed-item feed-item-secondary">
                                                    <time class="date" datetime="9-25">{{ $data->tgl }}</time>
                                                    <span class="text">Pesanan Anda:<a href="#" style="text">"Belum Di Proses"</a></span>
                                                </li>





                                                @elseif ($data->status == 'proses')


                                                <li class="feed-item feed-item-danger">
                                                    <time class="date" datetime="9-18">{{ $data->tgl }}</time>
                                                    <span class="text">Pembayaran Anda <a href="#">"Telah Dikonfirmasi"</a></span>
                                                </li>

                                                <li class="feed-item feed-item-info">
                                                    <time class="date" datetime="">{{  $data->tgl }}</time>
                                                    <span class="text">Kode Invoice : <a style="text-transform : uppercase" href="single-group.php">{{ $data->kode_invoice }}</a></span>
                                                </li>

                                                <li class="feed-item feed-item-secondary">
                                                    <time class="date" datetime="9-25">{{ $data->tgl }}</time>
                                                    <span class="text">Pesanan Anda:<a href="#">"Belum Di Proses"</a></span>
                                                </li>

                                                <li class="feed-item feed-item-success">
                                                    <time class="date" datetime="9-24">{{ $data->tgl_proses }}</time>
                                                    <span class="text">Pesanan Anda <a href="#">"Sedang Diproses "</a></span>
                                                </li>

                                                <li class="feed-item feed-item-info">
                                                    <time class="date" datetime="9-23">{{ $data->tgl_proses }}</time>
                                                    <span class="text">Pesanan Anda <a href="single-group.php">"Sedang Di Cuci Estimasi 1-2 hari jam kerja"</a></span>
                                                </li>
                                                @elseif ($data->status == 'selesai')


                                                <li class="feed-item feed-item-danger">
                                                    <time class="date" datetime="9-18">Sep 18</time>
                                                    <span class="text">Pembayaran Anda <a href="#">"Telah Dikonfirmasi"</a></span>
                                                </li>


                                                <li class="feed-item feed-item-info">
                                                    <time class="date" datetime="">{{  $data->tgl }}</time>
                                                    <span class="text">Kode Invoice : <a style="text-transform : uppercase" href="single-group.php">{{ $data->kode_invoice }}</a></span>
                                                </li>

                                                <li class="feed-item feed-item-secondary">
                                                    <time class="date" datetime="9-25">{{ $data->tgl }}</time>
                                                    <span class="text">Pesanan Anda:<a href="#">"Belum Di Proses"</a></span>
                                                </li>

                                                <li class="feed-item feed-item-success">
                                                    <time class="date" datetime="9-24">{{ $data->tgl_proses }}</time>
                                                    <span class="text">Pesanan Anda <a href="#">"Sedang Diproses "</a></span>
                                                </li>

                                                <li class="feed-item feed-item-info">
                                                    <time class="date" datetime="9-23">{{ $data->tgl_proses }}</time>
                                                    <span class="text">Pesanan Anda <a href="single-group.php">"Sedang Di Cuci Estimasi 1-2 hari jam kerja"</a></span>
                                                </li>




                                                <li class="feed-item feed-item-warning">
                                                    <time class="date" datetime="9-21">{{ $data->tgl_selesai }}</time>
                                                    <span class="text">Pesanan Anda <a href="#">"Telah selesai di proses"</a></span>
                                                </li>

                                                <li class="feed-item feed-item-danger">
                                                    <time class="date" datetime="9-18">{{ $data->tgl_selesai }}</time>
                                                    <span class="text">Pesanan Anda <a href="#">"Menunggu Pick Up Customer"</a></span>
                                                </li>


                                                @elseif ($data->status == 'diambil')


                                                <li class="feed-item feed-item-danger">
                                                    <time class="date" datetime="9-18">Sep 18</time>
                                                    <span class="text">Pembayaran Anda <a href="#">"Telah Dikonfirmasi"</a></span>
                                                </li>


                                                <li class="feed-item feed-item-info">
                                                    <time class="date" datetime="">{{  $data->tgl }}</time>
                                                    <span class="text">Kode Invoice : <a style="text-transform : uppercase" href="single-group.php">{{ $data->kode_invoice }}</a></span>
                                                </li>

                                                <li class="feed-item feed-item-secondary">
                                                    <time class="date" datetime="9-25">{{ $data->tgl }}</time>
                                                    <span class="text">Pesanan Anda:<a href="#">"Belum Di Proses"</a></span>
                                                </li>

                                                <li class="feed-item feed-item-success">
                                                    <time class="date" datetime="9-24">Sep 24</time>
                                                    <span class="text">Pesanan Anda <a href="#">"Sedang Diproses "</a></span>
                                                </li>

                                                <li class="feed-item feed-item-danger">
                                                    <time class="date" datetime="9-18">Sep 18</time>
                                                    <span class="text">Pesanan Anda <a href="#">"Menunggu Pick Up Customer"</a></span>
                                                </li>




                                                <li class="feed-item feed-item-warning">
                                                    <time class="date" datetime="9-21">Sep 21</time>
                                                    <span class="text">Pesanan Anda <a href="#">"Telah selesai di proses"</a></span>
                                                </li>

                                                <li class="feed-item feed-item-danger">
                                                    <time class="date" datetime="9-18">Sep 18</time>
                                                    <span class="text">Pesanan Anda <a href="#">"Menunggu Pick Up Customer"</a></span>
                                                </li>


                                                <li class="feed-item feed-item-success">
                                                    <time class="date" datetime="9-18">Sep 18</time>
                                                    <span class="text">Pesanan Anda <a href="#">"Telah Diambil"</a></span>
                                                </li>

                                                <li class="feed-item feed-item-warning">
                                                    <time class="date" datetime="9-18">Sep 18</time>
                                                    <span class="text">Pesanan Anda <a href="#">"selesai"</a></span>
                                                </li>


                                                @endif

                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title" style="text-transform: uppercase">Data Pesanan : </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="add-row" class="display table table-striped table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>Nomor</th>
                                                        <th>Kode invoice</th>
                                                        <th>qty</th>
                                                        <th>outlet</th>
                                                        <th>detail</th>
                                                        @if ($data->proses)
                                                        <th >Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php $nomor = 1


                                                    @endphp
                                                        @foreach($data->detailtransaksi as $p)
                                                        <tr>
                                                            <td>{{ $nomor++ }}</td>
                                                            <td>{{ $p->paket->nama_paket }}</td>
                                                            <td>{{ $p->qty }}</td>
                                                            <td>{{ $p->keterengan }}</td>
                                                            <td>{{ $p->subtotal }}</td>

                                                            @if ($data->proses)
                                                            @else
                                                        <td>
                                                            <a class="text-light btn btn-warning" data-toggle="modal" data-target="#Modal2-{{ $p->id }}" href="">Edit</a>
                                                            <a class="text-light" href="{{ route('hapus-transaksi',$p->id) }}"><button class="btn btn-danger"><i class="fa fa-trash-alt" data-toggle="tooltip" title="Edit" ></i></button></a>
                                                        </td>
                                                        @endif



                                                        </tr>
                                                    @endforeach


                                                </tbody>

                                                <hr>

                                            </table>

                                        </div>

                                        <h4>Diskon% =

                                            @if($cari_disc > 20000)
                                            10%
                                            @elseif ($cari_disc > 50000)
                                            30%


                                            @endif


                                        </h4>
                                        <h1>SUBTOTAL:Rp.{{number_format($total)  }}</h1>
                                        @if($data->status_bayar == 'Sudah Bayar')
                                        <a href="/cetak-transaksi/{{ $data->id }}" class="btn btn-primary">Cetak</a>
                                        @else
                                        <a href="/bayar/{{$data->id }}" class="btn btn-primary">bayar</a>
                                        @endif
                                        <footer>



                                        </footer>

                                    </div>

                                </div>

                            </div>

      <!-- Modal2 -->
      @foreach ($data->detailtransaksi as  $p)
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
                <form action="{{ url('/update-detail/'.$p->id)}}" method="POST" >


                    {{ csrf_field() }}



                            <label for="exampleInputPassword1">Paket</label>

                            <input type="text" id="nama_paket" disabled name="nama_paket" placeholder="{{ $p->paket->nama_paket }}"  class="form-control" placeholder="paket"  autocomplete="off">
                            @if($errors->has('nama_paket'))
                            <div class="text-danger">
                                    {{ $errors->first('nama_paket')}}
                            </div>
                            @endif

                            <br>






                            <br>


                                <label for="exampleInputPassword1">Jumlah</label>
                                <input type="number" value="1" name="qty"  class="form-control" placeholder="jumlah" autocomplete="off">
                                @if($errors->has('qty'))
                                                    <div class="text-danger">
                                                            {{ $errors->first('qty')}}
                                                    </div>
                                            @endif

                                                    <br>


                                <label for="exampleInputPassword1"></label>

                                <input type="hidden" id="nama_paket" name="nama_paket" value="{{ $p->paket->id }}"  class="form-control" placeholder="paket"  autocomplete="off">
                                @if($errors->has('nama_paket'))
                                <div class="text-danger">
                                        {{ $errors->first('nama_paket')}}
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

</div>
<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>
	<!--   Core JS Files   -->
    @include('sweetalert::alert')
    @include('template2.script')
</body>
</html>

