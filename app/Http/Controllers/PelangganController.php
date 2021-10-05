<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;
use Redirect;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('/pelanggan/index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelanggan = Pelanggan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'pelanggan' => $request->pelanggan,
            'jenkel' => $request->jenkel,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);
         return redirect('pelanggan/index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pelanggan)
    {
        $pelanggan = Pelanggan::find($id_pelanggan);

        return view('pelanggan\edit')->with('pelanggan', $pelanggan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelanggan)
    {
        $pelanggan = Pelanggan::whereId_pelanggan($id_pelanggan)->first();
        $pelanggan->update([
            'id_pelanggan' => $request->id_pelanggan,
            'pelanggan' => $request->pelanggan,
            'jenkel' => $request->jenkel,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);
        return redirect('pelanggan/index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelanggan)
    {
        Pelanggan::whereId_pelanggan($id_pelanggan)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
