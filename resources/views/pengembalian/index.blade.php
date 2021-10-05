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
                <h1>TRANSAKSI PENGEMBALIAN</h1>
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
			<div class="card-body">
				@if(Session::has('success'))
					<div class="alert alert-primary">
						{{Session::get('success')}}
					</div>
				@endif
				<table class="table table-bordered">
					<th>No</th>
					<th>Faktur Penjualan</th>
					<th>Pelanggan</th>
					<th>Tanggal Transaksi</th>
					<th>Tanggal Pengembalian</th>
					<th>Barang</th>
					<th>Jumlah</th>
					<th>Keterangan</th>
					<th>Aksi</th>

					@foreach($retur as $index=>$retur)
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$retur->penjualan_faktur}}</td>
						<td>{{$retur->pelanggan}}</td>
						<td>{{$retur->tgl}}</td>
						<td>{{$retur->tglretur}}</td>
						<td>{{$retur->nama}}</td>
						<td>{{$retur->jml}}</td>
						<td>{{$retur->descretur}}</td>
						<td>
							<a href="{{url('pengembalian/edit', $retur->id_pengembalian)}}"><i class="fa fa-edit"></i></a>

							<a href="{{url('pengembalian/delete', $retur->id_pengembalian)}}" onclick="return confirm('Anda Yakin Menghapus?')"><i class="fa fa-trash" style="color: red"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="returAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">                                  
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Transaksi Pengembalian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                         <form action="{{url('/pengembalian/returAdd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="faktur">Faktur Pembelian</label>
                                <input class="form-control" placeholder="Input Faktur Penjualan" type="text" name="faktur">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Lanjut</button>
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
@endsection