<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\gejala_penyakit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GejalaPenyakit extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['gejala_id' => '1', 'penyakit_id' => '1'],
            ['gejala_id' => '2', 'penyakit_id' => '1'],
            ['gejala_id' => '3', 'penyakit_id' => '1'],
            ['gejala_id' => '4', 'penyakit_id' => '1'],
            ['gejala_id' => '5', 'penyakit_id' => '1'],
            ['gejala_id' => '6', 'penyakit_id' => '1'],
            ['gejala_id' => '7', 'penyakit_id' => '1'],
            ['gejala_id' => '7', 'penyakit_id' => '2'],
            ['gejala_id' => '8', 'penyakit_id' => '1'],
            ['gejala_id' => '8', 'penyakit_id' => '2'],
            ['gejala_id' => '9', 'penyakit_id' => '1'],
            ['gejala_id' => '9', 'penyakit_id' => '2'],
            ['gejala_id' => '10', 'penyakit_id' => '1'],
            ['gejala_id' => '10', 'penyakit_id' => '2'],
            ['gejala_id' => '11', 'penyakit_id' => '1'],
            ['gejala_id' => '12', 'penyakit_id' => '1'],
            ['gejala_id' => '13', 'penyakit_id' => '1'],
            ['gejala_id' => '14', 'penyakit_id' => '2'],
            ['gejala_id' => '15', 'penyakit_id' => '2'],
            ['gejala_id' => '16', 'penyakit_id' => '1'],
            ['gejala_id' => '16', 'penyakit_id' => '2'],
            ['gejala_id' => '17', 'penyakit_id' => '2'],
            ['gejala_id' => '18', 'penyakit_id' => '1'],
            ['gejala_id' => '18', 'penyakit_id' => '2'],
            ['gejala_id' => '19', 'penyakit_id' => '1'],
            ['gejala_id' => '20', 'penyakit_id' => '1'],
            ['gejala_id' => '21', 'penyakit_id' => '2'],
            ['gejala_id' => '22', 'penyakit_id' => '2'],
            ['gejala_id' => '23', 'penyakit_id' => '1'],
            ['gejala_id' => '23', 'penyakit_id' => '2'],
            ['gejala_id' => '24', 'penyakit_id' => '2'],
            ['gejala_id' => '25', 'penyakit_id' => '2'],
            ['gejala_id' => '26', 'penyakit_id' => '1'],
        ];
        foreach ($data as $value) {
            gejala_penyakit::insert([
                'penyakit_id' => $value['penyakit_id'],
                'gejala_id' => $value['gejala_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
