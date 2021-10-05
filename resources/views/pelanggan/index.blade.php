@extends('tema.template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DATA PELANGGAN</h1>
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
				<a type="button" class="btn btn-info" href="{{url('pelanggan/create')}}">Tambah</a>
			</div>
			<div class="card-body">
				@if(Session::has('success'))
					<div class="alert alert-primary">
						{{Session::get('success')}}
					</div>
				@endif
				<table class="table table-bordered">
					<th>No</th>
					<th>Nama Pelanggan</th>
					<th>Jenis Kelamin</th>
					<th>Telefon Pelanggan</th>
					<th>Alamat</th>
					<th>Aksi</th>

					@foreach($pelanggan as $index=>$p)
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$p->pelanggan}}</td>
						<td>{{$p->jenkel}}</td>
						<td>{{$p->nohp}}</td>
						<td>{{$p->alamat}}</td>
						<td>
							<a href="{{url('pelanggan/edit', $p->id_pelanggan)}}"><i class="fa fa-edit"></i></a>

							<a href="{{url('pelanggan/delete', $p->id_pelanggan)}}" onclick="return confirm('Anda Yakin Menghapus?')"><i class="fa fa-trash" style="color: red"></i></a>
						</td>
					</tr>					
					@endforeach
				</table>
			</div>		
		</div>
	</div>
</div>
@endsection