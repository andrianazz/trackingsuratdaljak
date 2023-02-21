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
}
