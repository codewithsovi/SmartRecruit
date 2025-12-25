<?php

namespace App\Models;

use App\Models\AturanFuzzy;
use App\Models\Kriteria;
use App\Models\HimpunanFuzzy;
use Illuminate\Database\Eloquent\Model;

class AturanDetail extends Model
{
    protected $table = 'aturan_details';

    protected $fillable = [
        'aturan_id',
        'kriteria_id',
        'himpunan_id',
        // Add other fillable fields as necessary
    ];

    public function aturan()
    {
        return $Relasi = $this->belongsTo(AturanFuzzy::class, 'aturan_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function himpunanFuzzy()
    {
        return $this->belongsTo(HimpunanFuzzy::class);
    }
}
