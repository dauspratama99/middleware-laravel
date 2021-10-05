@extends('tema.template')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form User Baru</h1>
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
                <h3 class="card-title">Tambah User Baru</h3>
                <div class="text-right">
                    <a href="{{ url('pengguna/index') }}" class="btn btn-sm btn-success mb-1">Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form action="{{url('/pengguna/store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input class="form-control" placeholder="Input Nama" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="uname">Username</label>
                                <input required class="form-control" placeholder="Input username" type="text" name="uname">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required class="form-control" placeholder="Input password" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="status">Status User</label>
                                <select class="form-control" id="status" name="status" value="{{old('status')}}">
                                    <option value="">Select Status</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">Karyawan</option>
                                    <option value="Pemilik">Pemilik</option>
                                </select>
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