<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\JenisSurat;
use App\Models\SubBidang;
use App\Models\Surat;
use App\Models\VerifikasiSurat;
use DateTime;
use DateTimeZone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:adminbidang'])->only('index', 'disposisiSelesai', 'store');
        $this->middleware(['role:kabid'])->only('suratSelesaiKabid', 'suratSelesaiKabidUpdate', 'disposisiSurat', 'suratSelesaiKabidUpdate');
        $this->middleware(['role:subbidang'])->only('disposisiSuratSubbid', 'suratSelesaiSubbid', 'suratSelesaiSubbidUpdate', 'suratSelesaiSubbidUpdate');
    }

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

        $data = Surat::with('verifikasiSurat')->where('status_surat', 6)->orderBy('tgl_selesai', 'DESC')->get();
        // $data = Surat::where('status_surat', 6)->orderBy('tgl_selesai', 'DESC')->get();

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
        $role = substr(Auth::user()->role, 9);

        $data = Surat::where('status_surat', 2)
            ->where('sub_bidang_id', $role)
            ->get();
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
        $role = substr(Auth::user()->role, 9);

        $data = Surat::where('status_surat', '>=', 3)
            ->where('sub_bidang_id', $role)
            ->orderBy('tgl_masuk', 'DESC')->get();
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

        $request->validate([
            'nomor_surat' => 'required',
            'nama_wp' => 'required',
            'npwpd' => 'required',
            'hasil_surat' => 'required',
            'tgl_selesai_surat' => 'required',
        ]);

        VerifikasiSurat::create([
            'nomor_surat' => $request->nomor_surat,
            'nama_wp' => $request->nama_wp,
            'npwpd' => $request->npwpd,
            'tgl_selesai_surat' => $tgl_selesai,
            'hasil_surat' => $request->hasil_surat,
            'surat_id' => $id,
        ]);

        return redirect()->route('surat-selesai-subbid');
    }

    public function suratSelesaiKabid()
    {
        $title = "Surat Selesai Kabid";
        $data = Surat::with('verifikasiSurat')->where('status_surat', '>=', 4)->where('status_surat', '<=', 6)->orderBy('tgl_masuk', 'DESC')->get();
        // $data = Surat::where('status_surat', '>=', 4)->where('status_surat', '<=', 6)->orderBy('tgl_masuk', 'DESC')->get();

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
        Surat::where('id', $request->id)
            ->update([
                'indeks_surat' => $request->indeks_surat,
                'tgl_masuk' => $request->tgl_masuk,
                'bidang_id' => $request->bidang_id,
                'jenis_surat_id' => $request->jenis_surat_id,
                'sub_bidang_id' => $request->sub_bidang_id,
                'nama_pemohon' => $request->nama_pemohon,
            ]);
        return redirect()->route('input-surat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Surat::find($id);
        $data->delete();

        return redirect()->route('input-surat');
    }
}
