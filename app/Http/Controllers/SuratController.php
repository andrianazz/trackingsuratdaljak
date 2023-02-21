<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\JenisSurat;
use App\Models\SubBidang;
use App\Models\Surat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Input Surat";
        $data = Surat::all();
        $bidang = Bidang::all();
        $subBidang = SubBidang::all();
        $jenisSurat = JenisSurat::all();

        return view('input-surat.index', compact(['title', 'data', 'bidang', 'subBidang', 'jenisSurat']));
    }

    public function disposisiSelesai()
    {
        $title = "Disposisi Selesai";
        $data = Surat::where('status_surat', 5)->get();
        return view('disposisi-selesai.index', compact(['title', 'data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Surat::create(
            [
                'indeks_surat' => $request->indeks_surat,
                'tgl_masuk' => $request->tgl_masuk,
                'bidang_id' => $request->bidang_id,
                'nama_pemohon' => $request->nama_pemohon,
                'jenis_surat_id' => $request->jenis_surat_id,
                'sub_bidang_id' => $request->sub_bidang_id,
                'status_surat' => 0,
                'catatan' => '',
            ]
        );
        return redirect()->route('input-surat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        //
    }
}
