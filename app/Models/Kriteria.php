<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriterias';

    protected $fillable = [
        'nama_kriteria',
        'min',
        'max',
        // Add other fillable fields as necessary
    ];

    public function himpunanFuzzy()
    {
        return $this->hasMany(HimpunanFuzzy::class);
    }

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class);
    }

    public function aturanDetail()
    {
        return $this->hasMany(AturanDetail::class);
    }
}
