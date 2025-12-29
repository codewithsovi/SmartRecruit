<?php

namespace App\Models;

use App\Models\Kandidat;
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

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }
}
