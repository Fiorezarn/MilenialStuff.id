<!DOCTYPE html>
<html lang="en">

@include('adminlte.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('AdminLTE/dist') }}//img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                widtd="60">
        </div> --}}

        @include('adminlte.navbar')

        @include('adminlte.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Trending</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <p>Jumlah Product : {{ $totaltrending }}</p>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <a href="/datatrending/addtrending" class="btn btn-primary btn-sm">Add Product</a>
    <br><br>
    
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i>Success</h5>
      {{ session('pesan') }}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Produk</td>
                <td>Size</td>
                <td>Stock</td>
                <td>Harga</td>
                <td>Category</td>
                <td>Photo</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($trending as $item)
            <tr>
                <td>{{ $item->no_produk }}</td>
                <td>{{ $item->namaproduk }}</td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->stock }}</td>
                <td>IDR {{ number_format($item->harga, 0, ',', ',') }}</td>
                <td>{{ $item->category }}</td>
                <td><img src="{{ url('foto_produk/' . $item->photo) }}" width="100px"></td>
                <td>
                    <a href="datatrending/detailtrending/{{ $item->id }}" class="btn btn-sm btn-success">Detail</a>
                    <a href="datatrending/edittrending/{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id }}">
                      Delete
                    </button>
                </td>
            </tr>                
            @endforeach
        </tbody>
    
      </table>

      @foreach ($trending as $item)
      <div class="modal fade" id="delete{{ $item->id }}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{ $item->namaproduk }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Ingin Menghapus Product?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
              <a href="/datatrending/deletetrending/{{ $item->id }}" class="btn btn-outline-light">Iya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  </div>
  @endforeach
  
</div>
@include('adminlte.footer')

    @include('adminlte.script')
</body>

</html>
