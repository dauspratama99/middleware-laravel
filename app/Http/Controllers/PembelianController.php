<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\Barang;
use App\Models\Detail_Pembelian;
use Redirect;

class PembelianController extends Controller
{
    public function pemasokAdd(Request $request)
    {
        $pemasok = new Pemasok();
        $pemasok=Pemasok::create([
            'nama_pemasok'=>$request->nama_pemasok,
            'telp'=>$request->telp,
            'alamat'=>$request->alamat,
            'descr'=>$request->descr,
        ]);
        $pemasok->save();
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function detailAdd(Request $request)
    {
        $jml = $request->jml;
        $hrg = $request->harga;
        $ttl = $jml*$hrg;
        $barang_id = $request->barang_id;
        $detail_pembelian = new Detail_Pembelian();
        $detail_pembelian=Detail_Pembelian::create([
            'pembelian_faktur'=>$request->pembelian_faktur,
            'barang_id'=>$request->barang_id,
            'jml'=>$request->jml,
            'harga'=>$request->harga,
            'total'=>$ttl,
        ]);
        $detail_pembelian->save();
        $barang = Barang::whereId($barang_id)->first();
        $stok = $barang->stok;
        $stokplus = $stok + $jml;
            $barang->update([
                'stok' => $stokplus,
            ]);
        return back()->with('success', 'Data berhasil disimpan!');
    }

    public function store(Request $request)
    {
        $pembelian = Pembelian::create([
            'id_pembelian' => $request->id_pembelian,
            'faktur' => $request->faktur,
            'tgl' => $request->tgl,
            'pemasok_id' => $request->pemasok_id,
            'harga' => $request->harga,
        ]);
        
        return redirect('pembelian/index')->with('success', 'Data berhasil disimpan!');
    }

    public function index()
    {
        $pembelian = Pembelian::all();
        $data = DB::table('pembelians')
                    ->join('pemasoks', 'pembelians.pemasok_id', '=', 'pemasoks.id_pemasok')
                    ->get();
        return view('/pembelian/index', compact('data'));
    }

    public function create()
    {   
        $pemasok = DB::table('pemasoks')->get();
        return view('pembelian.create', compact('pemasok'));
    }

    public function rinci($id_pembelian)
    {
    	$pembelian = Pembelian::find($id_pembelian);
        $data = DB::table('pembelians')
                ->join('pemasoks', 'pembelians.pemasok_id', '=', 'pemasoks.id_pemasok')
                ->join('detail_pembelians', 'pembelians.faktur', '=', 'detail_pembelians.pembelian_faktur')
                ->join('barangs', 'barangs.id', '=', 'detail_pembelians.barang_id')
                ->whereId_pembelian($id_pembelian)
                ->get();
        $barang = Barang::all();
        return view('pembelian/rinci', compact('data', 'pembelian', 'barang'));
    }

    public function edit($id_pembelian)
    {
        $pembelian = Pembelian::find($id_pembelian);
        $pemasok = DB::table('pemasoks')->get();
        return view('pembelian/edit', compact('pembelian', 'pemasok'));
    }
    
    public function update(Request $request, $id_pembelian)
    {
        $pembelian = Pembelian::whereId_pembelian($id_pembelian)->first();
        $pembelian->update([
            'id_pembelian' => $request->id_pembelian,
            'faktur' => $request->faktur,
            'tgl' => $request->tgl,
            'pemasok_id' => $request->pemasok_id,
            'harga' => $request->harga,
        ]);
        return redirect('pembelian/index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id_pembelian)
    {
        Pembelian::whereId_pembelian($id_pembelian)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
