
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
            <h1 class="m-0">DataPaket</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Paket</li>
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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <a href="{{ route('tambah-outlet') }}" class="btn btn-primary">Tambah Paket</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>no</th>
                      <th>Nama Outlet</th>
                      <th>nama paket</th>
                      <th>Nomor Telepon</th>
                      <th>harga</th>
                      <th>aksi</th>

                    </tr>
                    </thead>
                    <tbody>
                        @php $nomor = 1
                        @endphp
                        @foreach($paket as $p)
                        <tr>
                          <td>{{$nomor++ }}  </td>
                          <td>{{ $p->outlet_id }}</td>
                          <td>{{ $p->jenis }}</td>
                          <td >{{ $p->nama_paket}}</td>
                          <td >{{ $p->harga }}</td>
                          <td>
                            <a class="text-light" href="{{ route('edit-outlet',$p->id) }}"><button class="btn btn-warning"><i class="fa fa-pencil-alt" data-toggle="tooltip" title="Edit" ></i></button></a>
                            <a class="text-light" href="{{ route('hapus-outlet',$p->id) }}"><button class="btn btn-danger"><i class="fa fa-trash-alt" data-toggle="tooltip" title="Edit" ></i></button></a>
                          </td>




                        </tr>
                       @endforeach
                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


                <!-- /.card-header -->
                <div class="card-body">

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
@include('sweetalert::alert')
@include('template.script')
</body>
</html>
