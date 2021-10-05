<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Redirect;

class PenggunaController extends Controller
{
    public function index()
    {
    	$pengguna = User::all();
    	return view('/pengguna/index', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna/create');
    }

    public function edit($id_pengguna)
    {
        $pengguna = User::find($id_pengguna);

        return view('pengguna/edit')->with('pengguna', $pengguna);
    }

    public function update(Request $request, $id_pengguna)
    {
        $pengguna = User::whereId_pengguna($id_pengguna)->first();
        $pengguna->update([
            'name'=>$request->name,
            'uname'=>$request->uname,
            'password'=>$request->password,
            'status'=>$request->status,
            ]);

        return Redirect::to('pengguna/index');
    }

    public function store(Request $request)
    {   
        $pengguna = new User();
        $pengguna=User::create([
            'name'=>$request->name,
            'uname'=>$request->uname,
            'password'=>$request->password,
            'status'=>$request->status,
        ]);
        $pengguna->save();
        return redirect('pengguna/index')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id_pengguna)
    {
    	User::whereId_pengguna($id_pengguna)->delete();
    	return back()->with('success', 'Data berhasil dihapus');
    }
}
