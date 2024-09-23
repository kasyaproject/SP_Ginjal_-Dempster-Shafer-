<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin Aplikasi',
            'username' => 'Admin123',
            'email' => 'test@example.com',
            'password' => Hash::make('Admin123'),
            'tittle' => 'admin',
        ]);
        User::factory(10)->create();

        $this->call(InputPenyakit::class);
        $this->call(InputGejala::class);
        $this->call(InputSolusi::class);
        $this->call(GejalaPenyakit::class);
        $this->call(PenyakitSolusi::class);
        $this->call(InputArtikel::class);
    }
}
