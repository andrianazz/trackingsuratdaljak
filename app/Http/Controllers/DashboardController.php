<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $title = "Dashboard";
        $data = Surat::orderBy('tgl_masuk', 'desc')->get();
        return view('dashboard.index', compact(['title', 'data']));
    }

    public function show(Request $request)
    {
        $title = "Dashboard";
        $data = Surat::where('indeks_surat', 'LIKE', '%' . $request->search . '%')->orWhere('nama_pemohon', 'LIKE', '%' . $request->search . '%')->get();
        return view('dashboard.show', compact(['title', 'data']));
    }
}
