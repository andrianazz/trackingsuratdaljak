<?php

namespace App\Http\Controllers;

use App\Models\SubBidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        dd($request->all());
        if ($request->password == $request->password2) {
            User::create([
                'id_pegawai' => $request->id_pegawai,
                'nama_user' => $request->nama_user,
                'email_user' => $request->email_user,
                'username' => $request->username,
                'password' => $request->password,
                'role' => $request->role,
            ]);

            return redirect()->route('pengguna');
        }

        return redirect()->route('pengguna');
    }
}
