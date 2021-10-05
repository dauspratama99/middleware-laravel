@extends('tema.template')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>TRANSAKSI PENJUALAN</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="pelangganAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">                                  
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form action="{{url('/penjualan/pelangganAdd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="pelanggan">Nama Pelanggan</label>
                                <input class="form-control" placeholder="Input Nama Pelanggan" type="text" name="pelanggan">
                            </div>
                            <div class="form-group">
                                <label for="jenkel">Jenis Kelamin</label>
                                <select class="form-control" id="jenkel" name="jenkel" value="{{old('jenkel')}}">
                                    <option value="">Select Jenis Kelamin</option>
                                    <option value="P">Perempuan</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="N">Non Binary</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nohp">Telfon/HP Pelanggan</label>
                                <input class="form-control" placeholder="Input Nomor Telefon/HP" type="text" name="nohp">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Pelanggan</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Pelanggan" cols="30" rows="4"></textarea>
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
    </div>
</div>
</div>
<!-- /Modal -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Baru</h3>
                <div class="text-right">
                    <a class="btn btn-sm btn-warning mb-1" data-toggle="modal" data-target="#pelangganAdd">Tambah Pelanggan</a>
                    <a href="{{ url('penjualan/index') }}" class="btn btn-sm btn-success mb-1">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form enctype="multipart/form-data" method="post" action="{{url('/penjualan/store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="faktur">Faktur Penjualan (hanya angka)</label>
                                <input class="form-control" placeholder="Input Faktur Penjualan" type="text" name="faktur">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Transaksi</label>
                                <input class="form-control" placeholder="Input Tanggal" type="date" name="tgl">
                            </div>
                            <div class="form-group">
                                <label for="pelanggan_id">Pelanggan</label>
                                <select class="form-control" id="pelanggan_id" name="pelanggan_id" value="{{old('pelanggan_id')}}">
                                    <option value="">Select Pelanggan</option>
                                    @foreach($pelanggan as $index=>$k)
                                    <option value="{{ $k->id_pelanggan }}">{{ $k->pelanggan }}</option>
                                    @endforeach
                                </select>                            
                            </div>                            
                            <div class="text">
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