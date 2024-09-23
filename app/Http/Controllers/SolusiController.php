<?php

namespace App\Http\Controllers;

use App\Models\solusi;
use App\Models\penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SolusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $solusi = solusi::with('penyakit')->get();
        $kategoriPenyakit = penyakit::all();

        return view('user.solusi', compact('solusi', 'kategoriPenyakit'));
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

        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:solusis',
            'deskripsi' => 'required',
            'penyakit' => 'required|array',
            'penyakit.*' => 'exists:penyakits,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan data solusi penyakit baru !!!');
        }

        ///////////////////////// Membuat penyakit baru /////////////////////////////////
        $solusi = new solusi();
        $solusi->nama = $request->input('nama');
        $solusi->deskripsi = $request->input('deskripsi');
        $solusi->save();

        // Sinkronkan penyakit yang terkait dengan solusi
        $solusi->penyakit()->sync($request->input('penyakit'));

        return redirect()->route('Solusi.index')->with('success', 'Data solusi penyakit baru berhasil disimpan 😊');
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
        $solusi = solusi::where('id', '=', $id)->first();

        if (!$solusi) {
            return redirect()->back()->with('error', 'Data solusi penyakit tidak ditemukan.');
        }

        // Validasi data dari formulir
        $request->validate([
            'nama' => 'required|unique:solusis,nama,' . $id . ',id', // Mengecualikan nama yang sedang diperbarui
            'deskripsi' => 'required',
            'penyakit' => 'required|array',
            'penyakit.*' => 'exists:penyakits,id',
        ]);

        // Jika validasi berhasil, lanjutkan dengan menyimpan perubahan data
        $solusi->nama = $request->input('nama');
        $solusi->deskripsi = $request->input('deskripsi');
        $solusi->save();

        // Sinkronkan penyakit yang terkait dengan gejala
        $solusi->penyakit()->sync($request->input('penyakit'));

        return redirect()->back()->with('success', 'Data solusi penyakit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $solusi = solusi::where('id', '=', $id)->first();

        if (!$solusi) {
            return redirect()->back()->with('error', 'Data solusi penyakit tidak ditemukan !');
        }

        // Menghapus data solusi dari table
        $solusi->delete();

        // Menghapus relasi Gejala - Penyakit
        $solusi->penyakit()->detach($id);

        return redirect()->back()->with('success', 'Data solusi penyakit berhasil dihapus.');
    }
}
