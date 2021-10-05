<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;
use Redirect;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok = Pemasok::all();
        return view('/pemasok/index', compact('pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemasok = new Pemasok();
        $pemasok=Pemasok::create([
            'nama_pemasok'=>$request->nama_pemasok,
            'telp'=>$request->telp,
            'alamat'=>$request->alamat,
            'descr'=>$request->descr,
        ]);
        $pemasok->save();
        return redirect('pemasok/index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pemasok)
    {
        $pemasok = Pemasok::find($id_pemasok);

        return view('pemasok/edit')->with('pemasok', $pemasok);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pemasok)
    {
        $pemasok = Pemasok::whereId_pemasok($id_pemasok)->first();
        $pemasok->update([
            'nama_pemasok'=>$request->nama_pemasok,
            'telp'=>$request->telp,
            'alamat'=>$request->alamat,
            'descr'=>$request->descr,
        ]);

        return redirect('pemasok/index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pemasok)
    {
        Pemasok::whereId_pemasok($id_pemasok)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
