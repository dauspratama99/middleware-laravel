@extends('tema.template')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Pemasok Baru</h1>
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
                <h3 class="card-title">Tambah Pemasok</h3>
                <div class="text-right">
                    <a href="{{ url('pemasok/index') }}" class="btn btn-sm btn-success mb-1">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form action="{{url('/pemasok/store')}}" method="post" enctype="multipart/form-data">
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