<?php

namespace App\Http\Controllers;

use App\Models\gejala;
use App\Models\solusi;
use App\Models\artikel;
use App\Models\penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Halaman Home
        $artikel = artikel::paginate(4);
        $countArtikel = artikel::count();

        return view('guest.home', compact('artikel', 'countArtikel'));
    }

    public function form()
    {
        // Halaman Form Diagnosa
        $usia = gejala::where('kategori', 'Usia')->get();
        $minValue = $usia->min('min');
        $maxValue = $usia->max('max');

        $kelamin = gejala::where('kategori', 'Jenis Kelamin')->get();
        $gejala = gejala::where('kategori', 'Gejala Klinis')->get();
        $riwayat = gejala::where('kategori', 'Riwayat medis')->get();

        $artikel = Artikel::inRandomOrder()
            ->limit(4)
            ->get();

        return view('guest.form', compact('usia', 'minValue', 'maxValue', 'kelamin', 'gejala', 'riwayat', 'artikel'));
    }

    public function artikel($id)
    {
        // Halaman Form Diagnosa
        return view('guest.artikel');
    }

    public function result(Request $request)
    {
        // dd($request->all());
        $tglDiagnosa = Carbon::now()->format('d - M - Y');
        // Halaman Hasil Diagnosa   
        $validator = Validator::make($request->all(), [
            'usia'    => 'required|numeric',
            'kelamin' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ////////////////////////////////////////  MENGAMBIL DATA DARI INPUT  /////////////////////////////////////////////////////////////////////////
        // MENYIAPKAN ARRAY UNTUK MENAMPUNG SEMUA DATA INPUT DENGAN PENYAKIT YANG SAMA
        $penyakits = Penyakit::all();

        // Inisialisasi array penyakit
        $penyakitArray = [];

        foreach ($penyakits as $item) {
            $penyakitArray[$item->nama] = [
                'usia' => null,
                'kelamin' => null,
                'gejala' => [],
                'riwayat' => []
            ];
        }

        // Cari gejala yang sesuai dengan kategori 'Usia' dan input berada di dalam rentang min dan max
        $inputUsia = $request->input('usia');

        $usia = gejala::where('kategori', 'Usia')
            ->where('min', '<=', $inputUsia)
            ->where('max', '>=', $inputUsia)
            ->first(); // Mengambil hasil pertama, jika hanya butuh satu hasil

        if ($usia) {
            // Dapatkan Detail gejala berdasarkan Usia
            $usiaId = $usia->id;
            $usiaNama = $usia->nama;
            $usiaBobot = $usia->bobot;
        } else {
            $usiaNama = '';
            $usiaBobot = 0;
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Cari gejala yang sesuai dengan kategori 'Kelamin' dan input 'Kelamin'
        $inputKelamin = $request->input('kelamin');

        $kelamin = gejala::where('kategori', 'Jenis Kelamin')
            ->where('nama', $inputKelamin) // Mencocokkan nama secara tepat
            ->first(); // Mengambil hasil pertama

        if ($kelamin) {
            $kelaminId = $kelamin->id;
            $kelaminNama = $kelamin->nama;
            $kelaminBobot = $kelamin->bobot;
        } else {
            $kelaminNama = '';
            $kelaminBobot = 0;
        }


        // Masukkan data usia dan kelamin ke dalam setiap entri penyakit
        foreach ($penyakitArray as $namaPenyakit => &$dataPenyakit) {
            // Menambahkan data usia
            $dataPenyakit['usia'] = [
                'id' => $usiaId ?? null,
                'nama' => $usiaNama ?? '',
                'bobot' => $usiaBobot ?? 0
            ];

            // Menambahkan data kelamin
            $dataPenyakit['kelamin'] = [
                'id' => $kelaminId ?? null,
                'nama' => $kelaminNama ?? '',
                'bobot' => $kelaminBobot ?? 0
            ];
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Ambil input gejala dari request
        $inputGejala = $request->input('gejala');
        $listGejala = [];

        // Cari gejala yang sesuai dengan kategori 'Gejala Klinis' dan input 'gejala' yang berbentuk array
        if (is_array($inputGejala)) {
            foreach ($inputGejala as $inputGejalaId) {
                $gejala = Gejala::where('kategori', 'Gejala Klinis')
                    ->where('id', $inputGejalaId)
                    ->first();

                if ($gejala) {
                    // Cari penyakit yang terkait dengan gejala ini
                    // Asumsi bahwa ada relasi many-to-many antara gejala dan penyakit
                    $penyakitTerkait = $gejala->penyakit;

                    foreach ($penyakitTerkait as $penyakit) {
                        $penyakitArray[$penyakit->nama]['gejala'][] = [
                            'nama' => $gejala->nama,
                            'bobot' => $gejala->bobot
                        ];

                        // Tambahkan nama gejala ke listGejala jika belum ada
                        if (!in_array($gejala->nama, $listGejala)) {
                            $listGejala[] = $gejala->nama;
                        }
                    }
                }
            }
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $inputRiwayat = $request->input('riwayat');
        $listRiwayat = [];

        // Cari riwayat yang sesuai dengan kategori 'Riwayat Medis' dan input 'riwayat' yang berbentuk array
        if (is_array($inputRiwayat)) {
            foreach ($inputRiwayat as $inputRiwayatId) {
                $riwayat = Gejala::where('kategori', 'Riwayat medis')
                    ->where('id', $inputRiwayatId)
                    ->first();

                if ($riwayat) {
                    // Cari penyakit yang terkait dengan riwayat ini
                    $penyakitTerkait = $riwayat->penyakit; // Pastikan relasi ini benar

                    foreach ($penyakitTerkait as $penyakit) {
                        $penyakitArray[$penyakit->nama]['riwayat'][] = [
                            'nama' => $riwayat->nama,
                            'bobot' => $riwayat->bobot
                        ];

                        // Tambahkan nama gejala ke listGejala jika belum ada
                        if (!in_array($riwayat->nama, $listRiwayat)) {
                            $listRiwayat[] = $riwayat->nama;
                        }
                    }
                }
            }
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // MENYIAPKAN ARRAY UNTUK MENAMPUNG SEMUA DATA BOBOT DENGAN PENYAKIT YANG SAMA

        // Menyiapkan array untuk menampung data gejala dan bobot
        $allGelajas = [];
        $allBobots = [];

        // Menyiapkan array susai nama penyakit dengan isi kosong(null)
        foreach ($penyakits as $item) {
            $allBobots[$item->nama] = [
                'bobot' => null,
            ];
        }

        // Loop untuk mengumpulkan semua bobot dari setiap penyakit
        foreach ($penyakitArray as $penyakitNama => $penyakit) {
            // Memastikan penyakit ada dalam array $allBobots
            if (isset($allBobots[$penyakitNama])) {
                // Periksa dan tambahkan bobot usia jika ada
                if (isset($penyakit['usia']) && is_array($penyakit['usia'])) {
                    $allBobots[$penyakitNama]['bobot'][] = $penyakit['usia']['bobot'];
                    $allGelajas[$penyakitNama]['nama'][] = $penyakit['usia']['nama'];
                }

                // Periksa dan tambahkan bobot kelamin jika ada
                if (isset($penyakit['kelamin']) && is_array($penyakit['kelamin'])) {
                    $allBobots[$penyakitNama]['bobot'][] = $penyakit['kelamin']['bobot'];
                    $allGelajas[$penyakitNama]['nama'][] = $penyakit['kelamin']['nama'];
                }

                // Periksa dan tambahkan bobot gejala jika ada
                if (isset($penyakit['gejala']) && is_array($penyakit['gejala'])) {
                    foreach ($penyakit['gejala'] as $gejala) {
                        $allBobots[$penyakitNama]['bobot'][] = $gejala['bobot'];
                        $allGelajas[$penyakitNama]['nama'][] = $gejala['nama'];
                    }
                }

                // Periksa dan tambahkan bobot riwayat jika ada
                if (isset($penyakit['riwayat']) && is_array($penyakit['riwayat'])) {
                    foreach ($penyakit['riwayat'] as $riwayat) {
                        $allBobots[$penyakitNama]['bobot'][] = $riwayat['bobot'];
                        $allGelajas[$penyakitNama]['nama'][] = $riwayat['nama'];
                    }
                }
            }
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // MENGHITUNG BOBOT PENYAKIT DENGAN METODE Dempster-Shafer
        $results = [];

        // Loop untuk setiap penyakit
        foreach ($allBobots as $penyakit => $data) {
            sort($data['bobot']);
            $bobot_values = $data['bobot'];
            $m_combined = array_shift($bobot_values); // Ambil bobot pertama

            // Loop untuk menggabungkan bobot
            foreach ($bobot_values as $m_value) {
                $m1 = $m_combined; // Nilai sebelumnya
                $m2 = $m_value; // Nilai baru

                $m_combined = $this->combineEvidence($m1, $m2);

                // Simpan langkah-langkah perhitungan
                $detailResults[$penyakit]['steps'][] = ['m1' => $m1, 'm2' => $m2, 'result' => $m_combined];
            }

            // Simpan hasil akhir untuk penyakit ini
            $formattedValue = $m_combined * 100; // Ubah menjadi persentase
            $results[$penyakit] = $this->formatNumber($formattedValue);
        }

        // Urutkan hasil dari yang terbesar
        arsort($results);

        // Ambil penyakit dengan bobot terbesar
        $penyakitTerbesar = array_key_first($results);
        $bobotTerbesar = reset($results);

        // Tentukan kondisi berdasarkan nilai bobot terbesar
        $kondisi = '';
        if ($bobotTerbesar >= 65.0) {
            $kondisi = 'BURUK';
        } elseif ($bobotTerbesar >= 40.0) {
            $kondisi = 'HATI-HATI';
        } elseif ($bobotTerbesar < 40.0) {
            $kondisi = 'SEHAT';
        }

        // Buat array baru untuk menyimpan penyakit dengan bobot di atas 40
        $penyakitDiAtas40 = array_filter($results, function ($bobot) {
            return $bobot >= 40;
        });

        // Ambil ID penyakit dari nama penyakit yang ada di array $penyakitDiAtas30
        $namaPenyakitDiAtas40 = array_keys($penyakitDiAtas40);

        // Ambil ID penyakit berdasarkan nama
        $penyakitIds = DB::table('penyakits')->whereIn('nama', $namaPenyakitDiAtas40)->pluck('id');

        // Ambil nama dan deskripsi penyakit berdasarkan ID
        $penyakitDetails = DB::table('penyakits')
            ->get(['nama', 'deskripsi']); // Ambil kolom 'nama' dan 'deskripsi'

        // Format hasil sebagai array dengan nama penyakit sebagai kunci
        $penyakitArray = [];
        foreach ($penyakitDetails as $penyakit) {
            $penyakitArray[] = [
                'nama' => $penyakit->nama,
                'deskripsi' => $penyakit->deskripsi
            ];
        }

        // Ambil data solusi berdasarkan ID penyakit melalui tabel pivot
        $solusiIds = DB::table('penyakit_solusis')
            ->whereIn('penyakit_id', $penyakitIds)
            ->pluck('solusi_id');

        // Ambil data solusi berdasarkan ID solusi
        $solusi = solusi::whereIn('id', $solusiIds)->get();
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        dd($request->all(), [
            'bobotTerbesar' => $bobotTerbesar,
            'kondisi' => $kondisi,
            'results' => $results,
            'detailResults' => $detailResults,
            'penyakitArray' => $penyakitArray,
            'allGelajas' => $allGelajas,
            'allBobots' => $allBobots,
            'solusi' => $solusi,
        ]);

        $artikel = Artikel::inRandomOrder()
            ->limit(4)
            ->get();

        return view('guest.result', compact('kondisi', 'inputUsia', 'inputKelamin', 'tglDiagnosa', 'results', 'solusi', 'listGejala', 'listRiwayat', 'penyakitArray', 'artikel'));
    }

    // Fungsi untuk membulatkan angka jika lebih dari 3 digit desimal
    function formatNumber($number)
    {
        $numberStr = (string) $number;
        $decimalPlaces = strpos($numberStr, '.') !== false ? strlen(substr($numberStr, strpos($numberStr, '.') + 1)) : 0;

        if ($decimalPlaces > 3) {
            return number_format(round($number, 3), 3);
        }

        return number_format($number, 2); // Menjaga 2 digit desimal untuk angka yang sudah dalam format yang diinginkan
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // RUMUS METODE Dempster-Shafer
    private function combineEvidence($m1, $m2)
    {
        // Menghitung bagian atas (numerator)
        $numerator = $m1 * $m2;

        // Menghitung bagian bawah (denominator)
        $denominator = 1 - ($m1 * (1 - $m2) + $m2 * (1 - $m1));

        // Jika denominator adalah 0 (untuk menghindari pembagian dengan nol)
        if ($denominator == 0) {
            return 0;
        }

        // Hasil kombinasi mass function
        return $numerator / $denominator;
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
