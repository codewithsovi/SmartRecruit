<?php

namespace App\Models;

use App\Models\Kandidat;
use App\Models\Kriteria;
use App\Models\Hasil;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatifs';

    protected $fillable = [
        'bobot',
        'kandidat_id',
        'kriteria_id',
        // Add other fillable fields as necessary
    ];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function hasil()
    {
        return $this->hasOne(Hasil::class);
    }
}
