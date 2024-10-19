<?php

namespace App\Http\Controllers;

use App\Models\gejala;
use App\Models\solusi;
use App\Models\penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penyakit = Penyakit::with(['gejala', 'solusi'])->get();
        $kategoriGejala = Gejala::whereNotIn('kategori', ['Usia', 'Jenis Kelamin'])->get();
        $kategoriSolusi = solusi::all();

        return view('user.penyakit', compact('penyakit', 'kategoriGejala', 'kategoriSolusi'));
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
            'nama' => 'required|unique:penyakits',
            'deskripsi' => 'required',
            'gejala' => 'required|array',
            'gejala.*' => 'exists:gejalas,id',
            'solusi' => 'required|array',
            'solusi.*' => 'exists:solusis,id',
        ], [
            'nama.required' => 'Nama penyakit harus diisi.',
            'deskripsi.required' => 'Deskripsi penyakit harus diisi.',
            'gejala.required' => 'Pilih minimal satu kategori penyakit.',
            'solusi.required' => 'Pilih minimal satu solusi penyakit.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan data penyakit baru !!!');
        }

        ///////////////////////// Membuat penyakit baru /////////////////////////////////
        $penyakit = new penyakit();
        $penyakit->nama = $request->input('nama');
        $penyakit->deskripsi = $request->input('deskripsi');
        $penyakit->save();

        // Sinkronkan penyakit yang terkait dengan gejala
        $penyakit->gejala()->sync($request->input('gejala'));
        // Sinkronkan penyakit yang terkait dengan solusi
        $penyakit->solusi()->sync($request->input('solusi'));

        return redirect()->route('Penyakit.index')->with('success', 'Data penyakit baru berhasil disimpan 😊');
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
        $penyakit = Penyakit::where('id', '=', $id)->first();

        if (!$penyakit) {
            return redirect()->back()->with('error', 'Data penyakit tidak ditemukan.');
        }

        // Validasi data dari formulir
        $request->validate([
            'nama' => 'required|unique:penyakits,nama,' . $id . ',id', // Mengecualikan nama yang sedang diperbarui
            'deskripsi' => 'required',
            'gejala' => 'required|array',
            'gejala.*' => 'exists:gejalas,id',
            'solusi' => 'required|array',
            'solusi.*' => 'exists:solusis,id',
        ]);

        // Jika validasi berhasil, lanjutkan dengan menyimpan perubahan data
        $penyakit->nama = $request->input('nama');
        $penyakit->deskripsi = $request->input('deskripsi');
        $penyakit->save();

        // Sinkronkan penyakit yang terkait dengan gejala
        $penyakit->gejala()->sync($request->input('gejala'));
        // Sinkronkan penyakit yang terkait dengan solusi
        $penyakit->solusi()->sync($request->input('solusi'));

        return redirect()->back()->with('success', 'Data penyakit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $penyakit = penyakit::where('id', '=', $id)->first();

        if (!$penyakit) {
            return redirect()->back()->with('error', 'Data penyakit tidak ditemukan !');
        }

        $penyakit->delete();

        // Hapus entri dari tabel pivot berdasarkan ID
        $penyakit->gejala()->detach($id);
        $penyakit->solusi()->detach($id);

        return redirect()->back()->with('success', 'Data penyakit berhasil dihapus.');
    }
}
