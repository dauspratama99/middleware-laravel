@extends('tema.template')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Ubah Data Pelanggan</h1>
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
                <h3 class="card-title">Ubah Data Pelanggan</h3>
                <div class="text-right">
                    <a href="{{ url('pelanggan/index') }}" class="btn btn-sm btn-success mb-1">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form action="{{url('/pelanggan/update', $pelanggan->id_pelanggan)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="pelanggan">Nama Pelanggan</label>
                                <input class="form-control" placeholder="Input Nama Pelanggan" type="text" name="pelanggan" value='{{$pelanggan->pelanggan}}'>
                            </div>
                            <div class="form-group">
                                <label for="jenkel">Jenis Kelamin</label>
                                <select class="form-control" id="jenkel" name="jenkel" value="{{old('jenkel')}}">
                                    <option value="">Select Jenis Kelamin</option>
                                    <option value="P" {{$pelanggan->jenkel == 'P' ? 'selected':''}}>Perempuan</option>
                                    <option value="L" {{$pelanggan->jenkel == 'L' ? 'selected':''}}>Laki-laki</option>
                                    <option value="N" {{$pelanggan->jenkel == 'N' ? 'selected':''}}>Non Binary</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nohp">Telfon/HP Pelanggan</label>
                                <input class="form-control" placeholder="Input Nomor Telefon/HP" type="text" name="nohp" value='{{$pelanggan->nohp}}'>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Pelanggan</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Pelanggan" cols="30" rows="4">{{$pelanggan->alamat}}</textarea>
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