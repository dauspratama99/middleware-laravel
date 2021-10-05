<!DOCTYPE html>
<html>
<head>
	<title>Faktur Penjualan</title>
</head>
<body>
<center>
	<div>
		<span style="font-style: bold; font-size: 32px;"><b>TOKO MANDEH KANDUANG</b></span><br/>
		<span style="font-size: 14px">Jalan Sandang Pangan Pasar Raya Fase V Petak 41, Kelurahan Kp. Jao, Kecamatan Padang Barat<br/>Kota Padang, Sumatera Barat (25112)<br/>0812 6649 0707</span>
		<hr>
	</div>	
</center>
	<span><br/></span>
	<table style='width:550px; font-size:14px; border-collapse: collapse;' border = '0'>
		<tr>
			<td><b>No Faktur</b></td>
			<td><b>:</b></td>
			<td>{{$penjualan->faktur}}</td>
		</tr>
		<tr>
			<td><b>Tanggal</b></td>
			<td><b>:</b></td>
			<td>{{$penjualan->tgl}}</td>
		</tr>
		<tr>
			<td><b>Pelanggan</b></td>
			<td><b>:</b></td>
			<td>{{$penjualan->pelanggan}}</td>
		</tr>
	</table>
	<div>
		<span><br/></span>
		<table align="center" style='border-collapse: collapse; width: 100%;' border="1">
			<tr>
				<th>No</th>
				<th>Barang</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Total</th>
			</tr>
			
			@foreach($data as $index=>$b)
			<tr>
				<td align="center">{{$index+1}}</td>
				<td>{{$b->nama}}</td>
				<td align="right">{{$b->harga}}</td>
				<td align="center">{{$b->jml}}</td>
				<td align="right">{{$b->total}}</td>
			</tr>
			@endforeach
			<tr>
				<td></td><td>Total</td><td></td><td></td>
				<td align="right">{{$penjualan->tharga}}</td>
			</tr>
			<tr>
				<td></td><td>Bayar</td><td></td><td></td>
				<td align="right">{{$penjualan->tbayar}}</td>
			</tr>
			<tr>
				<td></td><td>Kembalian</td><td></td><td></td>
				<td align="right">{{$penjualan->tkembali}}</td>
			</tr>
		</table>
		<div>
			<table style='width: 100%;'>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Keterangan : {{$penjualan->descr}}</td>
					<td align="right">Padang, {{$penjualan->tgl}}</td>
				</tr>
			</table>
		</div>		
	</div>
	<div align="right">
		<span style="align-items:right" align="right">
			<br/><br/><br/><br/>
			..............................
		</span>
	</div>
	
</body>
</html>