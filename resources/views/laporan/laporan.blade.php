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
                                         Tambah Data
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Modal -->
                                    <div class="container">
                                        <form action="">


                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal awal</label>
                                                <input type="date" class="form-control" id="tglawal" name="tgl1" placeholder="Nama outlet">



                                              </div>

                                              <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal akhir</label>
                                                <input type="date" class="form-control" id="tglakhir" name="tgl2" placeholder="Nama outlet">



                                              </div>
                                              <div class="form-group">
                                              <a href="" onclick="this.href='/cetak-laporantgl'+'/'+document.getElementById('tglawal').value + '/'+document.getElementById('tglakhir').value + '/'+{{ $dataoutlet->id }} " class="btn btn-primary">cetak</a>
                                              </div>

                                        </form>

                                    </div>


        </div>

		<!-- Custom template | don't include it in your project! -->

		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	@include('template2.script')
</body>
</html>
