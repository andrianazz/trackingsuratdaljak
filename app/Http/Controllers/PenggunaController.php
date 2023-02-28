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

        // if ($request->password == $request->password2) {
        $this->validate($request, [
            'id_pegawai' => 'unique:users',
            'username' => 'unique:users|required|min:3|max:50',
            'email' => 'email|unique:users|required',
            'password' => 'required|confirmed|min:6',
        ]);
            User::create([
                'id_pegawai' => $request->id_pegawai,
                'nama_user' => $request->nama_user,
                'email_user' => $request->email_user,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            return redirect()->route('pengguna');
        // }
        //
        // return redirect()->route('pengguna')->with('failed', 'Password tidak sama');
    }

    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (isset($request->password)) {
            User::where('id', $request->id)
                ->update([
                    'id_pegawai' => $request->id_pegawai,
                    'nama_user' => $request->nama_user,
                    'email_user' => $request->email_user,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                ]);
        }else{
            User::where('id', $request->id)
                ->update([
                    'id_pegawai' => $request->id_pegawai,
                    'nama_user' => $request->nama_user,
                    'email_user' => $request->email_user,
                    'username' => $request->username,
                    'role' => $request->role,
                ]);
        }
        return redirect()->route('pengguna');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->route('pengguna');
    }
}
