<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyakit extends Model
{
    use HasFactory;

    public function gejala()
    {
        return $this->belongsToMany(gejala::class, 'gejala_penyakits');
    }

    public function solusi()
    {
        return $this->belongsToMany(solusi::class, 'penyakit_solusis');
    }

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
}
