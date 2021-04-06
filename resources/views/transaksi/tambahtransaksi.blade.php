
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
@include('template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('template.navbar');
  @include('template.sidebar');
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Transaksi</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{ route('store-transaksi') }}" method="POST" >

                {{ csrf_field() }}
                <div class="card-body">
                     <div class="col-md-12">





                      <div class="form-group">
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


                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah</label>
                        <input type="number" name="qty"  class="form-control" placeholder="jumlah" autocomplete="off">
                        @if($errors->has('qty'))
											<div class="text-danger">
													{{ $errors->first('qty')}}
											</div>
									@endif
                      </div>


                      <div class="form-group">
                        <label for="exampleInputPassword1">Keterangan</label>
                        <input type="input" class="form-control"  name="keterangan" placeholder="Keterangan">

                        @if($errors->has('keterangan'))
                        <div class="text-danger">
                                {{ $errors->first('keterangan')}}
                        </div>
                        @endif

                      </div>


                      <div class="form-group">
                        <label for="exampleInputPassword1">Member</label>
                        <select class="form-control" id="member" name="member">
                            :@foreach ($Member as $p)
                            <option value="{{ $p->id }}">{{ $p->name}}</option>
                            @endforeach
                        </select>

                        @if($errors->has('keterangan'))
                        <div class="text-danger">
                                {{ $errors->first('keterangan')}}
                        </div>
                        @endif

                      </div>



                      <div class="form-group">
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







                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('data-transaksi') }}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->




          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    @include('template.footer')
    <!-- Default to the left -->

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@include('template.script')
</body>
</html>
