<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Detail_Penjualan;
use Illuminate\Http\Request;

class Detail_PenjualanController extends Controller
{
    public function destroy($id_detail)
    {
        $data = Detail_Penjualan::find($id_detail);
        $barang_id = $data->barang_id;
        $jml = $data->jml;
        $barang = Barang::whereId($barang_id)->first();
        $stok = $barang->stok;
        $stokplus = $stok + $jml;
            $barang->update([
                'stok' => $stokplus,
            ]);
        Detail_Penjualan::whereId_detail($id_detail)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
