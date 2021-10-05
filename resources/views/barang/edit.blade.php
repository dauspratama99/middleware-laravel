@extends('tema.template')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Ubah Data Barang</h1>
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
                <h3 class="card-title">Ubah Data Barang</h3>
                <div class="text-right">
                    <a href="{{ url('barang/index') }}" class="btn btn-sm btn-success mb-1">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form action="{{url('/barang/update', $barang->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input class="form-control" placeholder="Input Nama Barang" type="text" name="nama" value='{{$barang->nama}}'>
                            </div>
                            <div class="form-group">
                                <label for="merek">Merek Barang</label>
                                <input class="form-control" placeholder="Input Merek Barang" type="text" name="merek" value='{{$barang->merek}}'>
                            </div>
                            <div class="form-group">
                                <label for="hargajual">Harga Jual Barang</label>
                                <input class="form-control" placeholder="Input Harga Jual Barang" type="number" name="hargajual" value='{{$barang->hargajual}}'>
                            </div>
                            <div class="form-group">
                                <label for="hargabeli">Harga Beli Barang</label>
                                <input class="form-control" placeholder="Input Harga Beli Barang" type="number" name="hargabeli" value='{{$barang->hargabeli}}'>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok Barang</label>
                                <input class="form-control" placeholder="Input Stok Barang" type="number" name="stok" value='{{$barang->stok}}'>
                            </div>
                            <div class="form-group">
                                <label for="stokmin">Stok Minimal Barang</label>
                                <input class="form-control" placeholder="Input Stok Minimal Barang" type="number" name="stokmin" value='{{$barang->stokmin}}'>
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori Barang</label>
                                <select class="form-control" id="kategori_nama" name="kategori_id" value="{{old('kategori_id')}}" >
                                    <option disabled value="">Select Kategori</option>
                                    @foreach($kategori as $k)
                                    <option {{$k->id_kategori == $barang->kategori_id ? 'selected':''}} value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="satuan_id">Satuan Barang</label>
                                <select class="form-control" id="satuan_id" name="satuan_id" value="{{old('satuan_id')}}">
                                    <option disabled value="">Select Satuan</option>
                                    @foreach($satuan as $index=>$k)
                                    <option {{$k->id_satuan == $barang->satuan_id ? 'selected':''}} value="{{ $k->id_satuan }}">{{ $k->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pemasok_id">Pemasok</label>
                                <select class="form-control" id="pemasok_id" name="pemasok_id" value="{{old('pemasok_id')}}">
                                    <option disabled value="">Select Pemasok</option>
                                    @foreach($pemasok as $index=>$k)
                                    <option {{$k->id_pemasok == $barang->pemasok_id ? 'selected':''}} value="{{ $k->id_pemasok }}">{{ $k->nama_pemasok }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Barang</label>
                                <div>
                                    <img src="{{ asset('foto/foto_barang/'.$barang->foto) }}" height="100px" width="100px">
                                </div>                                
                                <div class="row">
                                    <input type="hidden" class="form-control" name="foto" value="{{$barang->foto}}" readonly>
                                    <input class="form-control" placeholder="Input Foto" type="file" name="foto" value='{{$barang->foto}}'>
                                </div>
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