<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::where('tittle', 'admin')->get();

        return view('user.pengguna', compact('user'));
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
        $tittle = "admin";

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'tittle' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan data pengguna baru !!!');
        }

        $pengguna = new User();
        $pengguna->name = $request->name;
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt($request->password);
        $pengguna->tittle = $tittle;
        $pengguna->save();

        return redirect()->route('Pengguna.index')->with('success', 'Data pengguna baru berhasil disimpan 😊');
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

        $pengguna = User::where('id', '=', $id)->first();

        // Jika data gejala tidak ditemukan
        if (!$pengguna) {
            return redirect()->back()->with('error', 'Data pengguna tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id . ',id',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            'password' => 'nullable|min:6',
        ]);

        $validator->sometimes('confirm_password', 'same:password', function ($input) {
            return !empty($input->password);
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan data pengguna baru !!!');
        }

        $pengguna->name = $request->name;
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt($request->password);
        $pengguna->save();

        return redirect()->route('Pengguna.index')->with('success', 'Data pengguna baru berhasil disimpan 😊');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pengguna = User::where('id', '=', $id)->first();

        if (!$pengguna) {
            return redirect()->back()->with('error', 'Data pengguna tidak ditemukan !');
        }

        $pengguna->delete();

        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus.');
    }
}
