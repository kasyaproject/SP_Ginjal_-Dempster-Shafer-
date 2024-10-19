<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exampleModel extends Model
{
    use HasFactory;

    // INI HANYA CONTOH
    // misal 1 user memiliki 1 contact dengan table (users, contact)
    // jadi disini kita bisa akses contact dari table user

    // Pada model Asal
    public function asal1()
    {
        return $this->hasOne(penyakit::class); // disini menggunakan table penyakit karena belum ada table contact
    }

    // Pada model Target
    public function target1()
    {
        return $this->belongsTo(user::class);
    }


    // misal 1 user memiliki banyak contact
    // jadi disini kita bisa akses contact dari table user

    // Pada model Asal
    public function asal2()
    {
        return $this->hasMany(penyakit::class); // disini menggunakan table penyakit karena belum ada table contact
    }

    // Pada model Target
    public function target2()
    {
        return $this->belongsTo(user::class);
    }
}
