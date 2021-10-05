<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pemilik.home', compact('user'));
    }
}
