<!DOCTYPE html>
<html lang="en">

@include('adminlte.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('adminlte.navbar')

        @include('adminlte.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalorder }}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalproduct }}</h3>

                <p>Total Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $userCount }}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $admin }}</h3>

                <p>Role Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="container">
          <h1>Pesanan</h1>
          <div class="row at-4">
              <div class="col">
                  <div class="table-responsive">
                      <table class="table text-center">
                          <thead>
                              <tr>
                                  <td>No</td>
                                  <td>Nama Penerima</td>
                                  <td>Nama Produk</td>
                                  <td>No Telepon</td>
                                  <td>Alamat</td>
                                  <td>Total Harga</td>
                                  <td>Action</td>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($alamat as $data)
                            <tr>
                              <td>No</td>
                              <td>{{ $data->namapenerima }}</td>
                              <td>{{ $data->namaproduk }}</td>
                              <td>{{ $data->phone }}</td>
                              <td>{{ $data->alamat }}</td>
                              <td>{{ 'IDR ' . number_format($data->totalharga, 0, ',', '.') }}</td>
                              <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                                  Delete
                                </button></td>
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

@foreach ($alamat as $data)
      <div class="modal fade" id="delete{{ $data->id }}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{ $data->namaproduk }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Ingin Menghapus Product?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
              <a href="/dashboard/delete/{{ $data->id }}" class="btn btn-outline-light">Iya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  </div>
  @endforeach

      
        @include('adminlte.footer')


    @include('adminlte.script')
</body>

</html>
