<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\penyakit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InputPenyakit extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['nama' => 'Penyakit Ginjal Kronis', 'deskripsi' => 'Penyakit Ginjal Kronis (PGK) adalah kondisi di mana ginjal mengalami penurunan fungsi secara bertahap selama beberapa bulan atau tahun. PGK sering kali tidak menimbulkan gejala pada tahap awal dan dapat berkembang hingga stadium lanjut tanpa disadari. Faktor risiko utama termasuk diabetes, hipertensi, dan riwayat keluarga dengan penyakit ginjal.'],
            ['nama' => 'Batu Ginjal', 'deskripsi' => 'Batu ginjal adalah endapan mineral keras yang terbentuk di dalam ginjal dan dapat menyebabkan rasa sakit yang hebat jika bergerak melalui saluran kemih. Batu ginjal terbentuk ketika zat-zat dalam urin seperti kalsium, oksalat, dan asam urat menjadi terlalu pekat dan mengkristal.'],
        ];

        foreach ($data as $value) {
            penyakit::insert([
                'nama' => $value['nama'],
                'deskripsi' => $value['deskripsi'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
