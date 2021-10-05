@extends('tema.template')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Barang Baru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Barang</h3>
                <div class="text-right">
                    <a href="{{ url('barang/index') }}" class="btn btn-sm btn-success mb-1">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form action="{{url('/barang/store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input class="form-control" placeholder="Input Nama Barang" type="text" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="merek">Merek Barang</label>
                                <input class="form-control" placeholder="Input Merek Barang" type="text" name="merek">
                            </div>
                            <div class="form-group">
                                <label for="hargajual">Harga Jual Barang</label>
                                <input class="form-control" placeholder="Input Harga Jual Barang" type="number" name="hargajual">
                            </div>
                            <div class="form-group">
                                <label for="hargabeli">Harga Beli Barang</label>
                                <input class="form-control" placeholder="Input Harga Beli Barang" type="number" name="hargabeli">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok Barang</label>
                                <input class="form-control" placeholder="Input Stok Barang" type="number" name="stok">
                            </div>
                            <div class="form-group">
                                <label for="stokmin">Stok Minimal Barang</label>
                                <input class="form-control" placeholder="Input Stok Minimal Barang" type="number" name="stokmin">
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori Barang</label>
                                <select class="form-control" id="kategori_nama" name="kategori_id" value="{{old('kategori_id')}}">
                                    <option value="">Select Kategori</option>
                                    @foreach($kategori as $k)
                                    <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="satuan_id">Satuan Barang</label>
                                <select class="form-control" id="satuan_id" name="satuan_id" value="{{old('satuan_id')}}">
                                    <option value="">Select Satuan</option>
                                    @foreach($satuan as $index=>$k)
                                    <option value="{{ $k->id_satuan }}">{{ $k->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pemasok_id">Pemasok</label>
                                <select class="form-control" id="pemasok_id" name="pemasok_id" value="{{old('pemasok_id')}}">
                                    <option value="">Select Pemasok</option>
                                    @foreach($pemasok as $index=>$k)
                                    <option value="{{ $k->id_pemasok }}">{{ $k->nama_pemasok }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Barang</label>
                                <input class="form-control" placeholder="Input Foto" type="file" name="foto">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
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
  <!-- /.content -->


@endsection