<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pasien = User::where('tittle', 'pasien')->orderBy('name', 'asc')->get();

        return view('user.pasien', compact('pasien'));
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
        // dd($request->all());
        $title = "pasien";

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan data pengguna baru !!!');
        }

        $pasien = new user();
        $pasien->name = $request->nama;
        $pasien->username = $request->username;
        $pasien->email = $request->email;
        $pasien->password = bcrypt($request->password);
        $pasien->tittle = $title;
        $pasien->save();

        return redirect()->route('Pasien.index')->with('success', 'Data pengguna baru berhasil disimpan 😊');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $pasien = user::where('id', '=', $id)->first();

        // Jika data gejala tidak ditemukan
        if (!$pasien) {
            return redirect()->back()->with('error', 'Data pasien tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:pasiens,username,' . $id . ',id',
            'email' => 'required|email|unique:pasiens,email,' . $id . ',id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan data pasien baru !!!');
        }

        $pasien->name = $request->nama;
        $pasien->username = $request->username;
        $pasien->email = $request->email;
        $pasien->save();

        return redirect()->route('Pasien.index')->with('success', 'Data pengguna baru berhasil disimpan 😊');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pasien = User::where('id', '=', $id)->first();

        if (!$pasien) {
            return redirect()->back()->with('error', 'Data pengguna tidak ditemukan !');
        }

        $pasien->delete();

        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus.');
    }
}
