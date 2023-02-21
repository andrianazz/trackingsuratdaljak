<?php

namespace App\Http\Controllers;

use App\Models\SubBidang;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    //
    public function index()
    {
        $title = "Pengguna";
        $data = User::all();
        $subbid = SubBidang::all();
        return view("pengguna.index", compact(['subbid', 'data']));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('pengguna');
    }
}
