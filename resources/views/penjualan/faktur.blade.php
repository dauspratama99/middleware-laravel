@extends('tema.template')
@section('content')
<section class="content-header">

</section>
<section>
<div class="container">	
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				@if(Session::has('success'))
					<div class="alert alert-primary">
						{{Session::get('success')}}
					</div>
				@endif
				<div class="card-header">
					<h3 class="card-title">Transaksi Penjualan</h3>
				</div>
				<div class="card-body">
					<div class="card-header">
						<table>
							<tr>
								<td>No Faktur</td>
								<td>&ensp;&ensp;:&emsp;</td>
								<td>{{$penjualan->faktur}}</td>
							</tr>
							<tr>
								<td>Tanggal</td>
								<td>&ensp;&ensp;:&emsp;</td>
								<td>{{$penjualan->tgl}}</td>
							</tr>
							<tr>
								<td>Pelanggan</td>
								<td>&ensp;&ensp;:&emsp;</td>
								<td>{{$penjualan->pelanggan}}</td>
							</tr>
						</table>
					</div>					
			        <table class="table table-bordered">
						<th>No</th>
						<th>Barang</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>

						@foreach($data as $index=>$b)
						<tr>
							<td>{{$index+1}}</td>
							<td>{{$b->nama}}</td>
							<td>{{$b->harga}}</td>
							<td>{{$b->jml}}</td>
							<td>{{$b->total}}</td>
						</tr>
						@endforeach
						<tr>
							<td></td><td>Total</td><td></td><td></td>
							<td>{{$penjualan->tharga}}</td>
						</tr>
						<tr>
							<td></td><td>Bayar</td><td></td><td></td>
							<td>{{$penjualan->tbayar}}</td>
						</tr>
						<tr>
							<td></td><td>Kembalian</td><td></td><td></td>
							<td>{{$penjualan->tkembali}}</td>
						</tr>
					</table>
					<div class="card-header">
						<table>
							<tr>
								<td>Keterangan</td>
								<td>&ensp;:&emsp;</td>
								<td>{{$penjualan->descr}}</td>
							</tr>
						</table>
					</div>
					<div class="card-body">
						<div class="text-right">
							<a href="{{url('penjualan/index')}}"><button class="btn btn-primary"></i>Selesai</button></a>

							<a href="{{url('penjualan/cetak', $penjualan->faktur)}}"><button class="btn btn-success">Cetak</button></a>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection