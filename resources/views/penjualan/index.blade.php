@extends('tema.template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DATA TRANSAKSI PENJUALAN</h1>
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
				<a type="button" class="btn btn-info" href="{{url('penjualan/create')}}">Tambah</a>
			</div>
			<div class="card-body">
				@if(Session::has('success'))
					<div class="alert alert-primary">
						{{Session::get('success')}}
					</div>
				@endif
				<table class="table table-bordered">
					<th>No</th>
					<th>Faktur Penjualan</th>
					<th>Tanggal</th>
					<th>Pelanggan</th>
					<th>Harga</th>
					<th>Bayar</th>
					<th>Kembali</th>
					<th>Status</th>
					<th>Keterangan</th>
					<th>Aksi</th>

					@foreach($data as $index=>$b)
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$b->faktur}}</td>
						<td>{{$b->tgl}}</td>
						<td>{{$b->pelanggan}}</td>
						<td>{{$b->tharga}}</td>
						<td>{{$b->tbayar}}</td>
						<td>{{$b->tkembali}}</td>
						<td>{{$b->status}}</td>
						<td>{{$b->descr}}</td>
						<td>
							<a href="{{url('penjualan/rinci', $b->faktur)}}"><button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Detail</button></a>

							<a href="{{url('pengembalian/returAdd', $b->faktur)}}"><button class="btn btn-warning">Retur</button></a>
							
							<a href="{{url('penjualan/delete', $b->faktur)}}" onclick="return confirm('Anda Yakin Menghapus?')"><i class="fa fa-trash" style="color: red"></i></a>
						
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection