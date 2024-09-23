<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\artikel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InputArtikel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'judul' => 'Penyakit Ginjal Kronis (PGK)',
                'author' => 1,
                'id_penyakit' => 1,
                'isi' => 'Fungsi utama ginjal adalah menyaring limbah atau zat sisa metabolisme tubuh dan kelebihan cairan dari darah untuk dibuang melalui urine. Setiap hari, kedua ginjal menyaring sekitar 120–150 liter darah dan menghasilkan sekitar 1–2 liter urine.
            Di dalam ginjal, terdapat unit penyaring bernama nefron yang terdiri dari glomerulus dan tubulus. Glomerulus menyaring cairan dan limbah untuk dikeluarkan, tetapi mencegah sel darah dan protein darah keluar dari tubuh. Selanjutnya, mineral yang dibutuhkan tubuh akan diserap di tubulus agar tidak terbuang bersama urine.
            Gagal ginjal kronis atau penyakit ginjal kronis menyebabkan cairan, elektrolit, dan limbah menumpuk di dalam tubuh dan menimbulkan gangguan. Gejala bisa lebih terasa ketika fungsi ginjal memburuk. Pada tahap lanjut, gagal ginjal kronis dapat berakibat fatal, terutama jika tidak ditangani, misalnya dengan cuci darah atau yang dikenal juga sebagai hemodialisis.
            Data penelitian menunjukkan bahwa kebanyakan gagal ginjal kronis di Indonesia terjadi akibat hipertensi dan diabetes (nefropati diabetik) yang tidak terkontrol.
            Gagal ginjal kronis disebabkan oleh kerusakan jaringan ginjal yang dipicu oleh penyakit jangka panjang. Beberapa penyakit yang bisa menjadi penyebab gagal ginjal adalah diabetes, tekanan darah tinggi, dan penyakit asam urat.
            Gejala pada penderita gagal ginjal kronis stadium 1–3 biasanya tidak begitu terlihat. Umumnya, gejala gagal ginjal kronis baru terasa ketika sudah mencapai stadium 4 dan 5. Pada kondisi ini, gangguan metabolisme tubuh sudah berat karena ginjal tidak dapat menyaring racun.'
            ],
            [
                'judul' => 'Batu Ginjal',
                'author' => 1,
                'id_penyakit' => 2,
                'isi' => 'Batu ginjal adalah massa keras yang terbentuk dari kristal dalam ginjal. Batu ginjal bisa terbentuk dari kalsium, asam urat, atau senyawa lainnya. Jika batu ginjal tidak segera diatasi, bisa menyebabkan penyumbatan di saluran kemih dan memicu rasa nyeri hebat.
                Batu ginjal terbentuk ketika urine mengandung terlalu banyak zat pembentuk kristal, seperti kalsium dan asam urat, dibandingkan dengan cairan yang tersedia untuk melarutkannya. Jika ukurannya cukup kecil, batu ginjal dapat keluar bersama urine tanpa menyebabkan gejala. Namun, jika ukurannya besar, bisa menyumbat saluran kemih dan menyebabkan nyeri yang luar biasa, terutama di bagian punggung bawah dan samping.
                Gejala umum yang dialami penderita batu ginjal meliputi nyeri hebat di punggung atau perut bawah, darah dalam urine, mual, dan muntah. Faktor risiko utama meliputi dehidrasi, pola makan tinggi garam, dan riwayat keluarga dengan batu ginjal.
                Penanganan batu ginjal meliputi minum cairan dalam jumlah besar untuk membantu batu keluar secara alami, penggunaan obat untuk meredakan nyeri, hingga prosedur medis seperti litotripsi gelombang kejut untuk memecah batu ginjal yang besar.'
            ],
            [
                'judul' => 'Pengendalian Gula Darah pada Penyakit Ginjal Kronis',
                'author' => 1,
                'id_penyakit' => 1,
                'isi' => 'Pengendalian gula darah sangat penting bagi penderita penyakit ginjal kronis, terutama bagi mereka yang memiliki diabetes. Diabetes yang tidak terkontrol dapat mempercepat kerusakan ginjal karena kadar gula darah tinggi merusak pembuluh darah kecil di ginjal. 
                Untuk mengurangi risiko kerusakan ginjal lebih lanjut, penderita diabetes perlu melakukan pemeriksaan gula darah secara teratur dan mengikuti panduan diet yang tepat. Diet rendah gula, pemilihan karbohidrat kompleks, serta asupan protein yang terkontrol sangat disarankan.
                Selain itu, penggunaan obat-obatan untuk mengontrol gula darah harus diawasi secara ketat oleh dokter guna menghindari komplikasi lebih lanjut pada ginjal.'
            ],
            [
                'judul' => 'Diet Rendah Garam untuk Mencegah Batu Ginjal',
                'author' => 1,
                'id_penyakit' => 2,
                'isi' => 'Mengonsumsi garam secara berlebihan dapat meningkatkan kadar kalsium dalam urine, yang dapat mempercepat pembentukan batu ginjal. Oleh karena itu, diet rendah garam sangat dianjurkan bagi mereka yang memiliki risiko batu ginjal.
                Diet rendah garam membantu mencegah penumpukan kalsium oksalat dan kalsium fosfat dalam ginjal yang bisa membentuk batu. Selain mengurangi konsumsi garam, asupan air yang cukup juga penting untuk membantu mencegah terbentuknya batu ginjal.
                Disarankan untuk membatasi asupan makanan yang tinggi garam seperti makanan olahan, fast food, dan makanan ringan yang asin. Ganti dengan makanan alami yang kaya nutrisi, seperti sayuran, buah-buahan, dan biji-bijian.'
            ],
            [
                'judul' => 'Pentingnya Dialisis dalam Pengobatan Penyakit Ginjal Kronis',
                'author' => 1,
                'id_penyakit' => 1,
                'isi' => 'Dialisis adalah prosedur medis yang dilakukan untuk menyaring darah ketika ginjal tidak lagi mampu menjalankan fungsinya. Prosedur ini sangat penting bagi pasien dengan penyakit ginjal kronis stadium lanjut, di mana ginjal sudah tidak dapat menyaring limbah dan cairan dengan baik.
                Ada dua jenis utama dialisis: hemodialisis dan dialisis peritoneal. Hemodialisis dilakukan dengan menggunakan mesin untuk memurnikan darah, sedangkan dialisis peritoneal menggunakan lapisan perut untuk menyaring darah di dalam tubuh.
                Dialisis tidak hanya membantu memperpanjang hidup pasien, tetapi juga meningkatkan kualitas hidup dengan mengurangi gejala seperti kelelahan ekstrem dan pembengkakan. Meskipun dialisis bukanlah pengobatan yang menyembuhkan, prosedur ini sangat penting dalam mengelola kondisi ginjal kronis.'
            ],
            [
                'judul' => 'Risiko Batu Ginjal pada Penderita Dehidrasi',
                'author' => 1,
                'id_penyakit' => 2,
                'isi' => 'Dehidrasi adalah salah satu faktor risiko terbesar untuk terbentuknya batu ginjal. Ketika tubuh tidak mendapatkan cukup cairan, urine menjadi lebih pekat, yang menyebabkan zat-zat pembentuk batu seperti kalsium, oksalat, dan asam urat mengkristal dan membentuk batu ginjal.
                Orang yang sering mengalami dehidrasi, terutama di lingkungan yang panas atau saat melakukan aktivitas fisik yang berat tanpa minum cukup cairan, memiliki risiko lebih tinggi terkena batu ginjal. Untuk mencegah pembentukan batu ginjal, sangat penting untuk minum air putih yang cukup, minimal 2-3 liter sehari.
                Selain minum cukup cairan, mengonsumsi buah yang kaya akan air dan elektrolit seperti semangka dan mentimun juga bisa membantu mencegah dehidrasi dan mengurangi risiko batu ginjal.'
            ],
        ];

        foreach ($data as $value) {
            artikel::insert([
                'judul' => $value['judul'],
                'isi' => $value['isi'],
                'author' => $value['author'],
                'id_penyakit' => $value['id_penyakit'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
