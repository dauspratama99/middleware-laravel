<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Detail_Pembelian;

class Detail_PembelianController extends Controller
{
    public function destroy($id_detail)
    {
        $data = Detail_Pembelian::find($id_detail);
        $barang_id = $data->barang_id;
        $jml = $data->jml;
        $barang = Barang::whereId($barang_id)->first();
        $stok = $barang->stok;
        $stokmin = $stok - $jml;
            $barang->update([
                'stok' => $stokmin,
            ]);
        Detail_Pembelian::whereId_detail($id_detail)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

}
