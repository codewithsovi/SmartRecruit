<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HimpunanFuzzy extends Model
{
    protected $table = 'himpunan_fuzzies';

    protected $fillable = [
        'nama_himpunan',
        'kurva',
        'a',
        'b',
        'c',
        'd',
        'kriteria_id',
        // Add other fillable fields as necessary
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function aturanDetail()
    {
        return $this->hasMany(AturanDetail::class);
    }
}
