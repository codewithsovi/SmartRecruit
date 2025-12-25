<?php

namespace App\Models;

use App\Models\Alternatif;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasils';
    protected $fillable = [
        'kandidat_id',
        'kriteria_id',
        'nilai_akhir',
        // Add other fillable fields as necessary
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
