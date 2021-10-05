<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;
use Redirect;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = Satuan::all();
        return view('/satuan/index', compact('satuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $satuan = new Satuan();
        $satuan=Satuan::create([
            'nama_satuan'=>$request->nama_satuan,
        ]);
        $satuan->save();
        return redirect('satuan/index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_satuan)
    {
        $satuan = Satuan::find($id_satuan);

        return view('satuan/edit')->with('satuan', $satuan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_satuan)
    {
        $satuan = Satuan::whereId_satuan($id_satuan)->first();
        $satuan->update([
            'nama_satuan'=>$request->nama_satuan,
            ]);

        return redirect('satuan/index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_satuan)
    {
        Satuan::whereId_satuan($id_satuan)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
