<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('user.profil');
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $profil = User::where('id', '=', $id)->first();

        if (!$profil) {
            // Handle the case where the user is not found
            abort(404, 'User not found');
        }

        return view('user.profil', compact('profil'));
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
        $pengguna = User::where('id', '=', $id)->first();

        // Jika data gejala tidak ditemukan
        if (!$pengguna) {
            return redirect()->back()->with('error', 'Data pengguna tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id . ',id',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data pengguna !!!');
        }

        $pengguna->name = $request->name;
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->save();

        return redirect()->back()->with('success', 'Data pengguna baru berhasil disimpan 😊');
    }

    public function changePass(Request $request, string $id)
    {
        // dd($request->all());
        $pengguna = User::where('id', '=', $id)->first();

        // Jika data gejala tidak ditemukan
        if (!$pengguna) {
            return redirect()->back()->with('error', 'Data pengguna tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'password' => 'nullable|min:6',
        ]);

        $validator->sometimes('confirmPass', 'same:password', function ($input) {
            return !empty($input->password);
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data pengguna !!!');
        }

        $pengguna->password = bcrypt($request->password);
        $pengguna->save();

        return redirect()->back()->with('success', 'Data pengguna baru berhasil disimpan 😊');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
