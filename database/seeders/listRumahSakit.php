<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class listRumahSakit extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                "name" => "RS UMUM DAERAH  DR. ZAINOEL ABIDIN",
                "address" => "JL. TGK DAUD BEUREUEH, NO. 108 B. ACEH",
                "region" => "KOTA BANDA ACEH, ACEH",
                "phone" => "(0651) 34565",
                "province" => "Aceh"
            ],
            [
                "name" => "RS UMUM DAERAH CUT MEUTIA KAB. ACEH UTARA",
                "address" => "JL. BANDA ACEH-MEDAN KM.6 BUKET RATA LHOKSEUMAWE",
                "region" => "KOTA LHOKSEUMAWE, ACEH",
                "phone" => "(0645) 46334",
                "province" => "Aceh"
            ],
            // Tambahkan data lainnya di sini...
            [
                "name" => "RS UMUM DAERAH TAMAN HUSADA",
                "address" => "JL. LETJEN S. PARMAN NO.1, BELIMBING, BONTANG BARAT",
                "region" => "BONTANG, KALIMANTAN TIMUR",
                "phone" => null,
                "province" => "Kalimantan Timur"
            ]
        ];

        // Menyisipkan data ke tabel rumah_sakit
        DB::table('rumahsakits')->insert($data);
    }
}
