<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\JenisSurat;
use App\Models\SubBidang;
use App\Models\Surat;
use DateTime;
use DateTimeZone;
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
        $title = "Input Surat";
        $data = Surat::orderBy('tgl_masuk', 'DESC')->get();
        $bidang = Bidang::all();
        $subBidang = SubBidang::all();
        $jenisSurat = JenisSurat::all();

        return view('input-surat.index', compact(['title', 'data', 'bidang', 'subBidang', 'jenisSurat']));
    }

    public function disposisiSelesai()
    {
        $title = "Disposisi Selesai";
        $data = Surat::where('status_surat', 5)->orderBy('tgl_selesai', 'DESC')->get();
        return view('disposisi-selesai.index', compact(['title', 'data']));
    }

    public function disposisiSurat()
    {
        $title = "Disposisi Surat";
        $data = Surat::where('status_surat', 1)->get();
        return view('disposisi-surat.index', compact(['title', 'data']));
    }

    public function disposisiSuratUpdate(Request $request, $id)
    {
        Surat::where('id', $id)->update([
            'status_surat' => 2,
            'catatan' => $request->catatan,
        ]);
        return redirect()->route('disposisi-surat');
    }

    public function disposisiSuratSubbid()
    {
        $title = "Disposisi Surat Kasubid";
        $data = Surat::where('status_surat', 2)->get();
        return view('disposisi-surat-subbid.index', compact(['title', 'data']));
    }

    public function disposisiSuratSubbidUpdate(Request $request, $id)
    {
        Surat::where('id', $id)->update([
            'status_surat' => 3,
        ]);
        return redirect()->route('disposisi-surat-subbid');
    }

    public function suratSelesaiSubbid()
    {
        $title = "Surat Selesai Subbid";
        $data = Surat::where('status_surat', '>=', 3)->where('status_surat', '<=', 4)->orderBy('tgl_masuk', 'DESC')->get();
        return view('surat-selesai-subbid.index', compact(['title', 'data']));
    }

    public function suratSelesaiSubbidUpdate(Request $request, $id)
    {
        $tgl_selesai = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $tgl_selesai = date_format($tgl_selesai, 'Y-m-d H:i:00');

        Surat::where('id', $id)->update([
            'status_surat' => 4,
            'tgl_selesai' => $tgl_selesai,
        ]);
        return redirect()->route('surat-selesai-subbid');
    }

    public function suratSelesaiKabid()
    {
        $title = "Surat Selesai Kabid";
        $data = Surat::where('status_surat', '>=', 4)->where('status_surat', '<=', 6)->orderBy('tgl_masuk', 'DESC')->get();
        return view('surat-selesai.index', compact(['title', 'data']));
    }

    public function suratSelesaiKabidUpdate(Request $request, $id)
    {
        Surat::where('id', $id)->update([
            'status_surat' => 6,

        ]);
        return redirect()->route('surat-selesai-kabid');
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

        $tgl_masuk = new DateTime($request->tgl_masuk, new DateTimeZone('Asia/Jakarta'));
        $tgl_masuk = date_format($tgl_masuk, "Y-m-d H:i:00");
        Surat::create(
            [
                'indeks_surat' => $request->indeks_surat,
                'tgl_masuk' => $tgl_masuk,
                'bidang_id' => $request->bidang_id,
                'nama_pemohon' => $request->nama_pemohon,
                'jenis_surat_id' => $request->jenis_surat_id,
                'sub_bidang_id' => $request->sub_bidang_id,
                'status_surat' => 1,
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
