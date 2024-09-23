<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\gejala_penyakit;
use App\Models\penyakit_solusi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenyakitSolusi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['solusi_id' => '1', 'penyakit_id' => '1'],
            ['solusi_id' => '2', 'penyakit_id' => '1'],
            ['solusi_id' => '3', 'penyakit_id' => '1'],

            ['solusi_id' => '4', 'penyakit_id' => '2'],
            ['solusi_id' => '5', 'penyakit_id' => '2'],

            ['solusi_id' => '6', 'penyakit_id' => '1'],
            ['solusi_id' => '6', 'penyakit_id' => '2'],
            ['solusi_id' => '7', 'penyakit_id' => '1'],
            ['solusi_id' => '7', 'penyakit_id' => '2'],
        ];
        foreach ($data as $value) {
            penyakit_solusi::insert([
                'penyakit_id' => $value['penyakit_id'],
                'solusi_id' => $value['solusi_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
