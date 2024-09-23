<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $artikel = artikel::where('author', '=', $id)->paginate(10); // Menggunakan paginate dengan 10 artikel per halaman
        $penyakit = penyakit::all();

        return view('user.artikel', compact('artikel', 'penyakit'));
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
            'judul' => 'required|unique:artikels',
            'isi' => 'required',
            'author' => 'required',
            'id_penyakit' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan artikel penyakit baru !!!');
        }

        $artikel = new artikel();
        $artikel->judul = $request->input('judul');
        $artikel->isi = $request->input('isi');
        $artikel->author = $request->input('author');
        $artikel->id_penyakit = $request->input('id_penyakit');
        $artikel->save();

        return redirect()->back()->with('success', 'Artikel penyakit baru berhasil disimpan 😊');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Ambil artikel berdasarkan id
        $read = Artikel::findOrFail($id);
        $idPenyakit = Artikel::find($id)->id_penyakit;

        // Pisahkan teks menjadi array paragraf
        $paragraphs = preg_split('/\r\n|\r|\n/', $read->isi);

        // Ambil paragraf pertama
        $firstParagraph = $paragraphs[0] ?? '';

        // Ambil paragraf kedua dan seterusnya
        $nextParagraphs = array_slice($paragraphs, 1);

        // Ambil 4 data artikel secara acak dengan id_penyakit yang sama
        $artikel = Artikel::where('id_penyakit', $idPenyakit)
            ->where('id', '!=', $id) // Menghindari artikel yang sedang dilihat
            ->inRandomOrder()
            ->limit(4)
            ->get();

        // Cek jika jumlah artikel kurang dari 4
        if ($artikel->count() < 4) {
            // Hitung sisa yang perlu diambil
            $remainingCount = 4 - $artikel->count();

            // Ambil artikel lainnya dengan id_penyakit berbeda secara acak
            $additionalArtikel = Artikel::where('id_penyakit', '!=', $idPenyakit)
                ->inRandomOrder()
                ->limit($remainingCount)
                ->get();

            // Gabungkan kedua koleksi artikel
            $artikel = $artikel->concat($additionalArtikel);
        }

        return view('guest.artikel', [
            'read' => $read,
            'artikel' => $artikel,
            'firstParagraph' => $firstParagraph,
            'nextParagraphs' => $nextParagraphs
        ]);
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
        $artikel = artikel::where('id', '=', $id)->first();

        // Jika data gejala tidak ditemukan
        if (!$artikel) {
            return redirect()->back()->with('error', 'Artikel tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|unique:artikels,judul,' . $id . ',id', // Menyertakan nama kolom kunci primer
            'isi' => 'required',
            'id_penyakit' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menyimpan artikel penyakit baru !!!');
        }

        $artikel->judul = $request->input('judul');
        $artikel->isi = $request->input('isi');
        $artikel->id_penyakit = $request->input('id_penyakit');
        $artikel->save();

        return redirect()->back()->with('success', 'Artikel penyakit baru berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $artikel = artikel::where('id', '=', $id)->first();

        // Jika data gejala tidak ditemukan
        if (!$artikel) {
            return redirect()->back()->with('error', 'Artikel tidak ditemukan.');
        }

        $artikel->delete();

        return redirect()->back()->with('success', 'Artikel penyakit berhasil dihapus');
    }
}
