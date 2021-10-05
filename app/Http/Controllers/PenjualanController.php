<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Detail_Penjualan;
use Redirect;
use PDF;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();
        $data = DB::table('penjualans')
                    ->join('pelanggans', 'penjualans.pelanggan_id', '=', 'pelanggans.id_pelanggan')
                    ->get();
        return view('/penjualan/index', compact('data'));
    }

    public function create()
    {   
        $pelanggan = DB::table('pelanggans')->get();
        return view('penjualan.create', compact('pelanggan'));
    }

    public function faktur($faktur)
    {   
        $penjualan = DB::table('penjualans')
                    ->join('pelanggans', 'pelanggans.id_pelanggan', '=', 'penjualans.pelanggan_id')
                    ->whereFaktur($faktur)
                    ->first();                    
        $data = DB::table('penjualans')
                    ->join('detail_penjualans', 'penjualans.faktur', '=', 'detail_penjualans.penjualan_faktur')
                    ->join('barangs', 'barangs.id', '=', 'detail_penjualans.barang_id')
                    ->whereFaktur($faktur)
                    ->get();
        $barang = Barang::all();
        return view('penjualan/faktur', compact('penjualan', 'data', 'barang'));
    }

    public function cetak($faktur)
    {
        $penjualan = DB::table('penjualans')
                    ->join('pelanggans', 'pelanggans.id_pelanggan', '=', 'penjualans.pelanggan_id')
                    ->whereFaktur($faktur)
                    ->first();
        $faktur=$penjualan->faktur;              
        $data = DB::table('penjualans')
                    ->join('detail_penjualans', 'penjualans.faktur', '=', 'detail_penjualans.penjualan_faktur')
                    ->join('barangs', 'barangs.id', '=', 'detail_penjualans.barang_id')
                    ->whereFaktur($faktur)
                    ->get();
        $barang = Barang::all();        
        $pdf = PDF::loadview('penjualan.cetakFaktur',compact('data', 'penjualan', 'barang'))
        ->setPaper('a4');;
        return $pdf->stream($faktur);
    }

    public function uang(Request $request)
    {   
        $total = $request->tharga;
        $bayar = $request->tbayar;
        $kembalian = $bayar - $total;
        $faktur = $request->faktur;
        $penjualan = Penjualan::whereFaktur($faktur)->first();
        $penjualan->update([
            'tharga' => $total,
            'tbayar' => $bayar,
            'tkembali' => $kembalian,
            'status' =>$request->status,
            'descr' =>$request->descr,
        ]);
        return back()->with('success', 'Data berhasil disimpan!');
    }

    public function store(Request $request)
    {
        $penjualan = new Penjualan();
        $nol = 0;
        $strip = "-";
        $penjualan=Penjualan::create([
            'faktur'=>$request->faktur,
            'tgl'=>$request->tgl,
            'pelanggan_id'=>$request->pelanggan_id,
            'status'=>$strip,
            'tharga'=>$nol,
            'tbayar'=>$nol,
            'tkembali'=>$nol,
            'descr'=>$strip,
        ]);
        $penjualan->save();
        return redirect('penjualan/index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function pelangganAdd(Request $request)
    {
        $pelanggan = new Pelanggan();
        $pelanggan = Pelanggan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'pelanggan' => $request->pelanggan,
            'jenkel' => $request->jenkel,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);
        return redirect('penjualan/create')->with('success', 'Data berhasil ditambahkan!');
    }

    public function rinci($faktur)
    {
        $penjualan = DB::table('penjualans')
                    ->join('pelanggans', 'pelanggans.id_pelanggan', '=', 'penjualans.pelanggan_id')
                    ->whereFaktur($faktur)
                    ->first();
                    
        $data = DB::table('penjualans')
                    ->join('detail_penjualans', 'penjualans.faktur', '=', 'detail_penjualans.penjualan_faktur')
                    ->join('barangs', 'barangs.id', '=', 'detail_penjualans.barang_id')
                    ->whereFaktur($faktur)
                    ->get();
        $barang = Barang::all();
        return view('penjualan/rinci', compact('data', 'penjualan', 'barang'));
    }

    public function detailAdd(Request $request)
    {
        $jml = $request->jml;
        $hrg = $request->harga;
        $ttl = $jml*$hrg;
        $barang_id = $request->barang_id;
        $detail_penjualan = new Detail_Penjualan();
        $detail_penjualan=Detail_Penjualan::create([
            'penjualan_faktur'=>$request->penjualan_faktur,
            'barang_id'=>$request->barang_id,
            'jml'=>$request->jml,
            'harga'=>$request->harga,
            'total'=>$ttl,
        ]);
        $detail_penjualan->save();
        $barang = Barang::whereId($barang_id)->first();
        $stok = $barang->stok;
        $stokmin = $stok - $jml;
        $barang->update([
            'stok' => $stokmin,
        ]);
        return back()->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($faktur)
    {
        Penjualan::whereFaktur($faktur)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
