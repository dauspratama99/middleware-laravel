<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Satuan;
use App\Models\Kategori;
use App\Models\Pemasok;
use App\Models\Barang;



class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $data = DB::table('barangs')
                    ->join('kategoris', 'barangs.kategori_id', '=', 'kategoris.id_kategori')
                    ->join('satuans', 'barangs.satuan_id', '=', 'satuans.id_satuan')
                    ->join('pemasoks', 'barangs.pemasok_id', '=', 'pemasoks.id_pemasok')
                    ->get();
        return view('/barang/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kategori = DB::table('kategoris')->get();
        $satuan = DB::table('satuans')->get();
        $pemasok = DB::table('pemasoks')->get();
        return view('barang.create', compact('kategori','satuan','pemasok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('foto') == NULL){
            $barang = Barang::create([
                'id' => $request->id,
                'nama' => $request->nama,
                'merek' => $request->merek,
                'hargajual' => $request->hargajual,
                'hargabeli' => $request->hargabeli,
                'stok' => $request->stok,
                'stokmin' => $request->stokmin,
                'pemasok_id' => $request->pemasok_id,
                'kategori_id' => $request->kategori_id,
                'satuan_id' => $request->satuan_id,
                'foto' => "No Image",
            ]);
        }else{
            $foto = $request->foto;
            $namaFoto = time().rand(100, 99).".".$foto->getClientOriginalName();
            $request->foto->move(public_path('foto/foto_barang'), $namaFoto);
            $barang = Barang::create([
                'id' => $request->id,
                'nama' => $request->nama,
                'merek' => $request->merek,
                'hargajual' => $request->hargajual,
                'hargabeli' => $request->hargabeli,
                'stok' => $request->stok,
                'stokmin' => $request->stokmin,
                'pemasok_id' => $request->pemasok_id,
                'kategori_id' => $request->kategori_id,
                'satuan_id' => $request->satuan_id,
                'foto' => $namaFoto,
            ]);
        }
        $barang->save();
        return redirect('barang/index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        $kategori = DB::table('kategoris')->get();
        $satuan = DB::table('satuans')->get();
        $pemasok = DB::table('pemasoks')->get();
        return view('barang.read', compact('barang','kategori','satuan','pemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        $kategori = DB::table('kategoris')->get();
        $satuan = DB::table('satuans')->get();
        $pemasok = DB::table('pemasoks')->get();
        $data = DB::table('barangs')->whereId($id)
                ->join('pemasoks', 'barangs.pemasok_id', '=', 'pemasoks.id_pemasok')
                ->join('kategoris', 'kategoris.id_kategori', '=', 'barangs.kategori_id')
                ->join('satuans', 'barangs.satuan_id', '=', 'satuans.id_satuan')
                ->get();
        return view('barang.edit', compact('data', 'barang', 'kategori', 'satuan', 'pemasok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('foto') == NULL){
            $barang = Barang::whereId($id)->first();
            $barang->update([
                'id' => $request->id,
                'nama' => $request->nama,
                'merek' => $request->merek,
                'hargajual' => $request->hargajual,
                'hargabeli' => $request->hargabeli,
                'stok' => $request->stok,
                'stokmin' => $request->stokmin,
                'pemasok_id' => $request->pemasok_id,
                'kategori_id' => $request->kategori_id,
                'satuan_id' => $request->satuan_id,
                'foto' => $request->foto,
            ]);
        }else{
            $barang = Barang::whereId($id)->first();
            File::delete('foto/foto_barang/' . $barang->foto);
            $foto = $request->foto;
            $namaFoto = time().rand(100, 99).".".$foto->getClientOriginalName();
            $request->foto->move(public_path('foto/foto_barang'), $namaFoto);
            $barang = Barang::whereId($id)->first();
            $barang->update([
                'id' => $request->id,
                'nama' => $request->nama,
                'merek' => $request->merek,
                'hargajual' => $request->hargajual,
                'hargabeli' => $request->hargabeli,
                'stok' => $request->stok,
                'stokmin' => $request->stokmin,
                'pemasok_id' => $request->pemasok_id,
                'kategori_id' => $request->kategori_id,
                'satuan_id' => $request->satuan_id,
                'foto' => $namaFoto,
            ]);
        }        

        return redirect('barang/index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::whereId($id)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
