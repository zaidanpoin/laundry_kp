
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
            <h1 class="m-0">Edit outlet</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Outlet</li>
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
                <h3 class="card-title">Edit outlet</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{ route('update-outlet',$data->id) }}" method="POST" >

                {{ csrf_field() }}
                <div class="card-body">
                     <div class="col-md-12">

                      <div class="form-group">
                        <label for="exampleInputPassword1">Nama Outlet</label>
                        <input type="input" class="form-control" id="exampleInputPassword1" value="{{ $data->nama }}" name="nama" placeholder="Nama outlet">

                        @if($errors->has('nama'))
                        <div class="text-danger">
                                {{ $errors->first('nama')}}
                        </div>
                        @endif


                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">alamat</label>
                        <input type="input" class="form-control" value="{{ $data->alamat }}" id="exampleInputPassword1" name="alamat" placeholder="Nama outlet">

                        @if($errors->has('alamat'))
                        <div class="text-danger">
                                {{ $errors->first('alamat')}}
                        </div>
                        @endif

                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Nomor</label>
                        <input type="number" name="nomor" class="form-control" value="{{ $data->tlp }}" placeholder="nomor" autocomplete="off">
                        @if($errors->has('nomor'))
											<div class="text-danger">
													{{ $errors->first('nomor')}}
											</div>
									@endif
                      </div>





                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('dataoutlet') }}" class="btn btn-warning">Kembali</a>
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
