<?php

namespace App\Http\Controllers;

use App\Models\SubBidang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Sub Bidang';
        $data = SubBidang::all();
        return view("sub-bidang.index", compact(['data', 'title']));
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
        //
        SubBidang::create($request->all());
        return redirect()->route('sub-bidang');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubBidang $subBidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubBidang $subBidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubBidang $subBidang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = SubBidang::find($id);
        $data->delete();

        return redirect()->route('sub-bidang');
    }
}
