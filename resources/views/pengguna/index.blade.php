@extends('tema.template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DATA</h1>
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
				<a type="button" class="btn btn-info" href="{{url('pengguna/create')}}">Tambah</a>
			</div>
			<div class="card-body">
				@if(Session::has('success'))
					<div class="alert alert-primary">
						{{Session::get('success')}}
					</div>
				@endif
				<table class="table table-bordered">
					<th>No</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Status</th>
					<!-- <th>Foto</th> -->
					<th>Aksi</th>

					@foreach($pengguna as $index=>$user)
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->uname}}</td>
						<td>{{$user->status}}</td>
						<!-- <td>
							<img src="{{asset('public/foto_user'.$user->user_foto)}}" height="150px" alt="user_foto">
						</td> -->
						<td>
							<a href="{{url('pengguna/edit', $user->id_pengguna)}}"><i class="fa fa-edit"></i></a>

							<a href="{{url('pengguna/delete', $user->id_pengguna)}}" onclick="return confirm('Anda Yakin Menghapus?')"><i class="fa fa-trash" style="color: red"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection