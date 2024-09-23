<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\solusi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InputSolusi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['nama' => 'Perubahan Pola Makan', 'deskripsi' => 'Diet rendah garam dan protein untuk ginjal kronis; serta mengurangi makanan tinggi oksalat untuk mencegah pembentukan batu ginjal.'],
            ['nama' => 'Minum Banyak Cairan', 'deskripsi' => 'Peningkatan asupan cairan penting untuk kedua kondisi: membantu mengeluarkan batu ginjal dan menjaga fungsi ginjal kronis.'],
            ['nama' => 'Pengendalian Tekanan Darah', 'deskripsi' => 'Mengurangi tekanan darah tinggi penting untuk mencegah kerusakan ginjal kronis, dan juga mengurangi risiko pembentukan batu ginjal.'],

            ['nama' => 'Pengendalian Gula Darah', 'deskripsi' => 'Penting untuk penderita diabetes, menjaga gula darah stabil dapat mencegah kerusakan ginjal lebih lanjut.'],
            ['nama' => 'Dialisis', 'deskripsi' => 'Ketika ginjal tidak lagi mampu berfungsi dengan baik, dialisis dilakukan untuk menyaring darah.'],

            ['nama' => 'Litotripsi Gelombang Kejut', 'deskripsi' => 'Prosedur non-invasif yang memecah batu ginjal besar menjadi potongan kecil agar lebih mudah dikeluarkan.'],
            ['nama' => 'Penggunaan Obat Penghilang Nyeri', 'deskripsi' => 'Obat seperti ibuprofen digunakan untuk mengurangi rasa sakit saat batu ginjal keluar.'],
        ];

        foreach ($data as $value) {
            solusi::insert([
                'nama' => $value['nama'],
                'deskripsi' => $value['deskripsi'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
