@extends('tema.template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DATA TRANSAKSI PEMBELIAN</h1>
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
				<a type="button" class="btn btn-info" href="{{url('pembelian/create')}}">Tambah</a>
			</div>
			<div class="card-body">
				@if(Session::has('success'))
					<div class="alert alert-primary">
						{{Session::get('success')}}
					</div>
				@endif
				<table class="table table-bordered">
					<th>No</th>
					<th>Faktur Pembelian</th>
					<th>Tanggal</th>
					<th>Pemasok</th>
					<th>Total Harga</th>
					<th>Aksi</th>

					@foreach($data as $index=>$b)
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$b->faktur}}</td>
						<td>{{$b->tgl}}</td>
						<td>{{$b->nama_pemasok}}</td>
						<td>{{$b->harga}}</td>
						<td>
							<a href="{{url('pembelian/rinci', $b->id_pembelian)}}"><button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Detail</button></a>

							<a href="{{url('pembelian/edit', $b->id_pembelian)}}"><i class="fa fa-edit"></i></a>
							
							<a href="{{url('pembelian/delete', $b->id_pembelian)}}" onclick="return confirm('Anda Yakin Menghapus?')"><i class="fa fa-trash" style="color: red"></i></a>
						
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection