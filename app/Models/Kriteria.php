<?php

namespace App\Models;

use App\Models\Alternatif;
use App\Models\AturanDetail;
use App\Models\HimpunanFuzzy;
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

    public function himpunanFuzzies()
    {
        return $this->hasMany(HimpunanFuzzy::class, 'kriteria_id');
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
