<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\gejala;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InputGejala extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['nama' => 'Usia Anak', 'kategori' => 'Usia', 'min' => '0',  'max' => '19',  'bobot' => '0.1'],
            ['nama' => 'Usia Dewasa', 'kategori' => 'Usia', 'min' => '20',  'max' => '30',  'bobot' => '0.3'],
            ['nama' => 'Usia Paruh Baya', 'kategori' => 'Usia', 'min' => '31',  'max' => '59',  'bobot' => '0.4'],
            ['nama' => 'Usia Lansia', 'kategori' => 'Usia', 'min' => '60',  'max' => '120',  'bobot' => '0.5'],

            ['nama' => 'Laki - laki', 'kategori' => 'Jenis Kelamin', 'min' => '0',  'max' => '0',  'bobot' => '0.3'],
            ['nama' => 'Perempuan', 'kategori' => 'Jenis Kelamin', 'min' => '0',  'max' => '0',  'bobot' => '0.2'],

            ['nama' => 'Nyeri Punggung Bawah', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.6'],
            ['nama' => 'Pembengkakan pada tungkai', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.6'],
            ['nama' => 'Frekuensi buang air kecil meningkat', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.7'],
            ['nama' => 'Urine berbusa', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.5'],
            ['nama' => 'Tekanan darah tinggi', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.7'],
            ['nama' => 'Kelelahan yang ekstrem', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.6'],
            ['nama' => 'Penurunan nafsu makan', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.4'],
            ['nama' => 'Mual dan muntah', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.6'],
            ['nama' => 'Kram otot', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.4'],
            ['nama' => 'Kulit kering dan gatal', 'kategori' => 'Gejala Klinis', 'min' => '0', 'max' => '0', 'bobot' => '0.4'],

            ['nama' => 'Diabetes', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.7'],
            ['nama' => 'Riwayat keluarga dengan penyakit ginjal', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.6'],
            ['nama' => 'Hipertensi', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.6'],
            ['nama' => 'Obesitas', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.5'],
            ['nama' => 'Riwayat batu ginjal', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.7'],
            ['nama' => 'Infeksi saluran kemih berulang', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.6'],
            ['nama' => 'Penggunaan obat anti-inflamasi nonsteroid (NSAID)', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.6'],
            ['nama' => 'Gangguan autoimun', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.6'],
            ['nama' => 'Riwayat transplantasi ginjal', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.8'],
            ['nama' => 'Riwayat gagal ginjal akut', 'kategori' => 'Riwayat Medis', 'min' => '0', 'max' => '0', 'bobot' => '0.7']
        ];

        DB::table('gejalas')->insert($data);

        // foreach ($data as $value) {
        //     gejala::insert([
        //         'nama' => $value['nama'],
        //         'kategori' => $value['kategori'],
        //         'min' => $value['min'],
        //         'max' => $value['max'],
        //         'bobot' => $value['bobot'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }
    }
}
