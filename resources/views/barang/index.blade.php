@extends('tema.template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DATA BARANG</h1>
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
				<a type="button" class="btn btn-info" href="{{url('barang/create')}}">Tambah</a>
			</div>
			<div class="card-body">
				@if(Session::has('success'))
					<div class="alert alert-primary">
						{{Session::get('success')}}
					</div>
				@endif
				<table class="table table-bordered">
					<th>No</th>
					<th>Nama Barang</th>
					<th>Merek</th>
					<th>Jual</th>
					<th>Beli</th>
					<th>Stok</th>
					<th>Stok Min</th>
					<th>Pemasok</th>
					<th>Kategori</th>
					<th>Satuan</th>
					<th>Foto</th>
					<th>Aksi</th>

					@foreach($data as $index=>$b)
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$b->nama}}</td>
						<td>{{$b->merek}}</td>
						<td>{{$b->hargajual}}</td>
						<td>{{$b->hargabeli}}</td>
						<td>{{$b->stok}}</td>
						<td>{{$b->stokmin}}</td>
						<td>{{$b->nama_pemasok}}</td>
						<td>{{$b->nama_kategori}}</td>
						<td>{{$b->nama_satuan}}</td>
						<td>
							<img src="{{ asset('foto/foto_barang/'.$b->foto) }}" height="100px" width="100px">
						</td>
						<td>
							<a href="{{url('barang/read', $b->id)}}"><i class="fa fa-eye" style="color: chocolate"></i></a>
							<a href="{{url('barang/edit', $b->id)}}"><i class="fa fa-edit"></i></a>
							<a href="{{url('barang/delete', $b->id)}}" onclick="return confirm('Anda Yakin Menghapus?')"><i class="fa fa-trash" style="color: red"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection