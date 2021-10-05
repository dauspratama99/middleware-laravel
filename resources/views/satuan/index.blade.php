@extends('tema.template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DATA SATUAN</h1>
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
				<a type="button" class="btn btn-info" href="{{url('satuan/create')}}">Tambah</a>
			</div>
			<div class="card-body">
				@if(Session::has('success'))
					<div class="alert alert-primary">
						{{Session::get('success')}}
					</div>
				@endif
				<table class="table table-bordered">
					<th>No</th>
					<th>Nama Satuan</th>
					<th>Aksi</th>

					@foreach($satuan as $index=>$s)
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$s->nama_satuan}}</td>
						<td>
							<a href="{{url('satuan/edit', $s->id_satuan)}}"><i class="fa fa-edit"></i></a>

							<a href="{{url('satuan/delete', $s->id_satuan)}}" onclick="return confirm('Anda Yakin Menghapus?')"><i class="fa fa-trash" style="color: red"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection