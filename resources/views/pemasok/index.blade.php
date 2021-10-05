@extends('tema.template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DATA PEMASOK</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container">	
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<a type="button" class="btn btn-info" href="{{url('pemasok/create')}}">Tambah</a>
			</div>
			<div class="card-body">
				@if(Session::has('success'))
					<div class="alert alert-primary">
						{{Session::get('success')}}
					</div>
				@endif
				<table class="table table-bordered">
					<th>No</th>
					<th>Nama Pemasok</th>
					<th>Telfon Pemasok</th>
					<th>Alamat Pemasok</th>
					<th>Keterangan</th>
					<th>Aksi</th>

					@foreach($pemasok as $index=>$p)
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$p->nama_pemasok}}</td>
						<td>{{$p->telp}}</td>
						<td>{{$p->alamat}}</td>
						<td>{{$p->descr}}</td>
						<td>
							<a href="{{url('pemasok/edit', $p->id_pemasok)}}"><i class="fa fa-edit"></i></a>

							<a href="{{url('pemasok/delete', $p->id_pemasok)}}" onclick="return confirm('Anda Yakin Menghapus?')"><i class="fa fa-trash" style="color: red"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection