<?php

namespace App\Models;

use App\Models\AturanFuzzy;
use App\Models\Kriteria;
use App\Models\HimpunanFuzzy;
use Illuminate\Database\Eloquent\Model;

class AturanDetail extends Model
{
    protected $table = 'aturan_details';
    protected $guarded = [];

    public function aturan()
    {
        return $this->belongsTo(AturanFuzzy::class, 'aturan_fuzzy_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    // 🔥 INI KUNCI UTAMA
    public function himpunanFuzzy()
    {
        return $this->belongsTo(HimpunanFuzzy::class, 'himpunan_fuzzy_id');
    }
}

