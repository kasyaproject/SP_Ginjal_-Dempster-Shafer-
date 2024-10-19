<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class exampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // INI HANYA CONTOH TIDAK PERLU DI RUN KARENA TIDAK ADA TABLE DI DATABASE NYA
        $jumlah = 5;

        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= $jumlah; $i++) {
            DB::table('examples')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'score' => $faker->numberBetween(0, 100),
            ]);
        }
    }
}
