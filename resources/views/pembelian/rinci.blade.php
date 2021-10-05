@extends('tema.template')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>DETAIL TRANSAKSI PEMBELIAN</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div>
    </div>
	<div class="card">
		<div class="card-header">
			<table>
				<div class="form-group">
                <label for="faktur">Faktur Pembelian</label>
                <input value='{{$pembelian->faktur}}' class="form-control" disabled="" type="text" name="faktur">
            </div>
            <div class="form-group">
                <label for="tgl">Tanggal Transaksi</label>
                <input value='{{$pembelian->tgl}}' class="form-control" disabled="" type="date" name="tgl">
            </div>
            <div class="form-group">
                <label for="harga">Total Transaksi</label>
                <input value='{{$pembelian->harga}}' class="form-control" disabled="" type="text" name="harga">
            </div>
			</table>
		</div>
		<div class="card-body">
			@if(Session::has('success'))
				<div class="alert alert-primary">
					{{Session::get('success')}}
				</div>
			@endif			
			<div>
				<div class="">
                    <button class="btn btn-sm btn-primary mb-1" data-toggle="modal" data-target="#detailAdd"><i class="fa fa-plus-circle"></i>  Detail Barang</button>
                </div>
			</div>
			<table class="table table-bordered">
					<th>No</th>
					<th>Faktur Pembelian</th>
					<th>Barang</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Total</th>
					<th>Aksi</th>

					@foreach($data as $index=>$b)
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$b->faktur}}</td>
						<td>{{$b->nama}}</td>
						<td>{{$b->jml}}</td>
						<td>{{$b->harga}}</td>							
						<td>{{$b->total}}</td>
						<td>
							<a href="{{url('detail_pembelian/delete', $b->id_detail)}}" onclick="return confirm('Anda Yakin Menghapus?')"><i class="fa fa-trash" style="color: red"></i></a>						
						</td>
					</tr>
					@endforeach
					<tr>
						<td></td>
						<td>
							Total
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							@php
							$satu = 0;
							@endphp							
							@foreach($data as $index=>$b)	
								@php							
								$satu += $b->total;
								@endphp
							@endforeach
							{{$satu}}
						</td>
					</tr>
				</table>
		</div>
		<div class="card-footer">
			<div class="text-right">
                <a href="{{ url('pembelian/index') }}" class="btn btn-sm btn-success mb-1">Selesai</a>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="detailAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">                                  
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Detail Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form action="{{url('/pembelian/detailAdd')}}" method="post" enctype="multipart/form-data">
                            @csrf                            
							<div class="form-group">
				                <label for="pembelian_faktur">Faktur Pembelian</label>
				                <input value="{{$pembelian->faktur}}" class="form-control" type="text" name="pembelian_faktur">
			            	</div>
                            <div class="form-group">
                                <label for="barang_id">Barang</label>
                                <select class="form-control" id="barang_id" name="barang_id">
                                    <option value="">Select Barang</option>
                                    @foreach($barang as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }} - Rp. {{$k->hargabeli}}</option> 
                                    @endforeach
                                </select>
                            </div>                            
                            <div class="form-group">
                                <label for="harga">Harga Barang</label>
                                <input class="form-control" placeholder="Input Harga Barang" type="number" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="jml">Jumlah</label>
                                <input class="form-control" placeholder="Input Jumlah Barang" type="number" name="jml">
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
    </div>
</div>
</div>
</section>

@endsection