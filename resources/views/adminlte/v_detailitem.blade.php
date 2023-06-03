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
            <h1 class="m-0">Detail Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <table class="table">
        <tr>
            <th width="100px">Nama Produk</th>
            <th width="30px">:</th>
            <th>{{ $product->namaproduk }}</th>
        </tr>
        <tr>
            <th width="100px">Size</th>
            <th width="30px">:</th>
            <th>{{ $product->size }}</th>
        </tr>
        <tr>
            <th width="100px">Stock</th>
            <th width="30px">:</th>
            <th>{{ $product->stock }}</th>
        </tr>
        <tr>
            <th width="100px">Harga</th>
            <th width="30px">:</th>
            <th>{{ number_format($product->harga, 0, ',', ',') }}</th>
        </tr>
        <tr>
            <th width="100px">Category</th>
            <th width="30px">:</th>
            <th>{{ $product->category }}</th>
        </tr>
        <tr>
            <th width="100px">Photo</th>
            <th width="30px">:</th>
            <th><img src="{{ url('foto_produk/' . $product->photo) }}" width="400px"></th>
        </tr>
        <tr>
            <th><a href="/dataitem" class="btn btn-success btn-sm">Back</a></th>
        </tr>
    </table>
  </div>
  
</div>
@include('adminlte.footer')

    @include('adminlte.script')
</body>

</html>
