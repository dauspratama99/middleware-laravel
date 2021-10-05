<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data_user = User::ChekLoginUser($username, $password);
        if($data_user != FALSE)
        {
            Session::put('username', $data_user->username);
            Session::put('nama', $data_user->nama);
            Session::put('level', $data_user->level);
            Session::put('id_user', $data_user->id_user);

            return redirect('dashboard')->with("success", "Selamat Datang");

        } else {
            return back()->with("eror","Username atau Password Salah !");
        }

    }

    public function dashboard()
    {
        return view('tema.template');
    }

    public function logout(Request $r)
    {
    	$r->session()->forget('username');
        $r->session()->forget('level');
        $r->session()->forget('id_user');
        $r->session()->flush();
    	return redirect("/")->with('pesan', 'Success Logout.');
    }
}
