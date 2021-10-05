<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('tema/template');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $status = Auth::user()->status;
    //     if($status == "Admin"){
    //         return redirect()->to('Admin');
    //     } else if($status == "User"){
    //         return redirect()->to('User');
    //     } else if($status == "Pemilik"){
    //         return redirect()->to('Pemilik');
    //     }else{
    //         return redirect()->to('logout');
    //     }
    // }
}
