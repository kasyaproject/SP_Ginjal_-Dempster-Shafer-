<?php

namespace App\Http\Controllers;

use App\Models\gejala;
use App\Models\gejala_penyakit;
use App\Models\penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil gejala berdasarkan kategori dengan relasi penyakit
        $usia = Gejala::where('kategori', 'usia')->with('penyakit')->get();
        $kelamin = Gejala::where('kategori', 'Jenis Kelamin')->with('penyakit')->get();
        $gejalaKlinis = Gejala::where('kategori', 'Gejala Klinis')->with('penyakit')->get();
        $riwayatMedis = Gejala::where('kategori', 'Riwayat Medis')->with('penyakit')->get();

        // Mengambil relasi antara Gejala-Penyakit
        $gejalas_penyakit = Gejala::with('penyakit')->get();

        // Untuk modal Tambah (Pilihan Kategori Gejala)
        $kategori = gejala::distinct()->pluck('kategori');
        // Untuk modal Tambah (Pilihan Kategori Penyakit)
        $kategoriPenyakit = penyakit::all();

        // Untuk modal Edit & Hapus
        $data = gejala::with('penyakit')->get();

        return view('user.gejala', compact('data', 'kategoriPenyakit', 'usia', 'gejalaKlinis', 'kelamin', 'riwayatMedis', 'kategori', 'gejalas_penyakit'));
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
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:gejalas',
            'kategori' => 'required',
            'min' => 'required',
            'max' => 'required',
            'bobot' => 'required|numeric|between:0,1',
            'penyakit' => 'required|array',
            'penyakit.*' => 'exists:penyakits,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan data gejala baru !!!');
        }

        ///////////////////////// Membuat gejala baru /////////////////////////////////
        $gejala = new gejala();
        $gejala->nama = $request->input('nama');
        $gejala->kategori = $request->input('kategori');
        $gejala->min = $request->input('min');
        $gejala->max = $request->input('max');
        $gejala->bobot = $request->input('bobot');
        $gejala->save();

        // Sinkronkan penyakit yang terkait dengan gejala
        $gejala->penyakit()->sync($request->input('penyakit'));

        return redirect()->route('Gejala.index')->with('success', 'Data gejala baru berhasil disimpan 😊');
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
        $gejala = Gejala::where('id', '=', $id)->first();

        // Jika data gejala tidak ditemukan
        if (!$gejala) {
            return redirect()->back()->with('error', 'Data gejala tidak ditemukan.');
        }

        // Validasi data dari formulir
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:gejalas,nama,' . $id . ',id', // Menyertakan nama kolom kunci primer
            'bobot' => 'required|numeric|between:0,1',
            'penyakit' => 'required|array',
            'penyakit.*' => 'exists:penyakits,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan perbaruan data gejala !!!');
        }

        // Mengambil nilai input dengan nilai default jika tidak ada
        $min = $request->input('min') ?? 0;
        $max = $request->input('max') ?? 0;
        $bobot = $request->input('bobot') ?? 0.0;

        // Simpan perubahan data
        $gejala->nama = $request->input('nama');
        $gejala->min = $min;
        $gejala->max = $max;
        $gejala->bobot = $bobot;
        $gejala->save();

        // Sinkronkan penyakit yang terkait dengan gejala
        $gejala->penyakit()->sync($request->input('penyakit'));

        return redirect()->back()->with('success', 'Data Gejala berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $gejalaPenyakit = gejala::where('id', '=', $id)->first();

        if (!$gejalaPenyakit) {
            return redirect()->back()->with('error', 'Data gejala tidak ditemukan !');
        }

        // Menghapus Gejala dari table
        $gejalaPenyakit->delete();

        // Menghapus relasi Gejala - Penyakit
        $gejalaPenyakit->penyakit()->detach($id);

        return redirect()->route('Gejala.index')->with('success', 'Data gejala berhasil dihapus.');
    }
}
