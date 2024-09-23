<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Cek jika pengguna sudah login
        if (Auth::check()) {
            // Logout pengguna
            Auth::logout();
        }

        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'    => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            // Mendapatkan pengguna yang terotentikasi
            $user = Auth::user();

            // Cek apakah title pengguna adalah admin
            if ($user->tittle == 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                // Logout otomatis jika bukan admin
                Auth::logout();
                return redirect()->back()->with('error-admin', 'Hanya admin yang dapat login.')->withInput();
            }
        }

        return redirect()->back()->with('error', 'Email atau password salah.')->withInput();
    }

    // Logout pengguna
    public function logout()
    {
        Auth::logout();

        return redirect('Admin');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
