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
                <h1>TRANSAKSI PEMBELIAN</h1>   
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
<div class="modal fade" id="pemasokAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">                                  
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Pemasok</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form action="{{url('/pembelian/pemasokAdd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_pemasok">Nama Pemasok</label>
                                <input class="form-control" placeholder="Input Nama Pemasok" type="text" name="nama_pemasok">
                            </div>
                            <div class="form-group">
                                <label for="telp">Telfon Pemasok</label>
                                <input class="form-control" placeholder="Input Nomor Telfon Pemasok" type="text" name="telp">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Pemasok</label>
                                <input class="form-control" placeholder="Input Alamat Pemasok" type="text" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="descr">Keterangan</label>
                                <textarea class="form-control" id="descr" name="descr" placeholder="Keterangan Pemasok" cols="30" rows="4"></textarea>
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
                    <a class="btn btn-sm btn-warning mb-1" data-toggle="modal" data-target="#pemasokAdd">Tambah Pemasok</a>
                    <a class="btn btn-sm btn-success mb-1" href="{{ url('pembelian/index') }}">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form enctype="multipart/form-data" method="post" action="{{url('/pembelian/store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="faktur">Faktur Pembelian</label>
                                <input class="form-control" placeholder="Input Faktur Pembelian" type="text" name="faktur">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Transaksi</label>
                                <input class="form-control" placeholder="Input Tanggal" type="date" name="tgl">
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
                                <label for="harga">Harga</label>
                                <input class="form-control" placeholder="Input Total Harga" type="number" name="harga">
                            </div>       
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
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