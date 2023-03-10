<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Jenis Surat';
        $data = JenisSurat::all();
        return view("jenis-surat.index", compact(['data', 'title']));
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
        JenisSurat::create($request->all());
        return redirect()->route('jenis-surat');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisSurat $jenisSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisSurat $jenisSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisSurat $jenisSurat)
    {
        JenisSurat::where('id', $request->id)
            ->update(['jenis_surat' => $request->jenis_surat]);
        return redirect()->route('jenis-surat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = JenisSurat::find($id);
        $data->delete();

        return redirect()->route('jenis-surat');
    }
}
