<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Detail_Penjualan;
use Illuminate\Support\Facades\DB;
use Redirect;

class PengembalianController extends Controller
{
    public function index()
    {
        $retur = DB::table('pengembalians')
    				->join('barangs', 'pengembalians.barang_id', '=', 'barangs.id')
                    ->join('pelanggans', 'pengembalians.pelanggan_id', '=', 'pelanggans.id_pelanggan')
                    ->join('penjualans', 'penjualans.faktur', '=', 'pengembalians.penjualan_faktur')
                    ->get();
        $data = Pengembalian::all();
        return view('/pengembalian/index', compact('retur', 'data'));
    }

    public function returAdd($faktur)
    {
        $retur = Penjualan::whereFaktur($faktur)
        		->join('detail_penjualans', 'detail_penjualans.penjualan_faktur', '=', 'penjualans.faktur')
                ->join('pelanggans', 'penjualans.pelanggan_id', '=', 'pelanggans.id_pelanggan')
        		->first();
        $barang = DB::table('detail_penjualans')->whereFaktur($faktur)
                    ->join('penjualans', 'penjualans.faktur', '=', 'detail_penjualans.penjualan_faktur')
                    ->join('barangs', 'barangs.id', '=', 'detail_penjualans.barang_id')
                    ->get();
        return view('/pengembalian/returAdd', compact('retur', 'barang'));
    }

	public function store(Request $request)
    {
        $barang_id = $request->barang_id;
        $jml = $request->jml;
        $barang = Barang::whereId($barang_id)->first();
        $stok = $barang->stok;
        $pengembalian = new Pengembalian();
        $pengembalian=Pengembalian::create([
            'id_pengembalian'=>$request->id_pengembalian,
            'penjualan_faktur'=>$request->penjualan_faktur,
            'pelanggan_id'=>$request->pelanggan_id,
            'penjualan_tgl'=>$request->penjualan_tgl,
            'tglretur'=>$request->tglretur,
            'barang_id'=>$request->barang_id,
            'jml'=>$request->jml,
            'descretur'=>$request->descretur,
        ]);
        $pengembalian->save();
        $totalstok = $stok - $jml;
        $barang->update([
            'stok' => $totalstok,
        ]);
        return redirect('pengembalian/index')->with('success', 'Data berhasil ditambahkan!');
    }

	public function edit($id_pengembalian)
    {
        $retur = Pengembalian::whereId_pengembalian($id_pengembalian)->first();
        $faktur = $retur->penjualan_faktur;
        $plg = Pengembalian::whereId_pengembalian($id_pengembalian)
        			->join('pelanggans', 'pelanggans.id_pelanggan', '=', 'pengembalians.pelanggan_id')->first();
        $barang = DB::table('detail_penjualans')->whereFaktur($faktur)
                    ->join('penjualans', 'penjualans.faktur', '=', 'detail_penjualans.penjualan_faktur')
                    ->join('barangs', 'barangs.id', '=', 'detail_penjualans.barang_id')
                    ->get();
        return view('/pengembalian/edit', compact('retur', 'barang', 'plg'));
    }

	public function update(Request $request, $id_pengembalian)
    {
        $data = Pengembalian::whereId_pengembalian($id_pengembalian)->first();
        $jmlbfr = $data->jml;
        $jmlaftr = $request->jml;
        $barang_id = $data->barang_id;
        if($jmlbfr < $jmlaftr){
            $sls = $jmlaftr - $jmlbfr;
            $barang = Barang::whereId($barang_id)->first();
            $stok = $barang->stok;
            $ttl = $stok - $sls;
            $barang->update([
                'stok' => $ttl,
            ]);
        }elseif($jmlbfr > $jmlaftr){
            $sls = $jmlbfr - $jmlaftr;
            $barang = Barang::whereId($barang_id)->first();
            $stok = $barang->stok;
            $ttl = $stok + $sls;
            $barang->update([
                'stok' => $ttl,
            ]);
        }
        $pengembalian = Pengembalian::whereId_pengembalian($id_pengembalian)->first();
        $pengembalian->update([
            'id_pengembalian'=>$request->id_pengembalian,
            'penjualan_faktur'=>$request->penjualan_faktur,
            'pelanggan_id'=>$request->pelanggan_id,
            'penjualan_tgl'=>$request->penjualan_tgl,
            'tglretur'=>$request->tglretur,
            'barang_id'=>$request->barang_id,
            'jml'=>$request->jml,
            'descretur'=>$request->descretur,
        ]);
        return redirect('pengembalian/index')->with('success', 'Data berhasil diubah!');
    }

	public function destroy($id_pengembalian)
    {        
    	$data = Pengembalian::whereId_pengembalian($id_pengembalian)->first();
    	$barang_id = $data->barang_id;
    	$barang = Barang::whereId($barang_id)->first();
    	$stokbrg = $barang->stok;
    	$stokmin = $data->jml;
    	$ttl = $stokbrg + $stokmin;
    	$barang->update([
            'stok' => $ttl,
        ]);
        Pengembalian::whereId_pengembalian($id_pengembalian)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
