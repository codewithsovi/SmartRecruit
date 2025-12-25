<?php

namespace App\Models;

use App\Models\AturanDetail;
use Illuminate\Database\Eloquent\Model;

class AturanFuzzy extends Model
{
    protected $table = 'aturan_fuzzies';

    protected $fillable = [
        'nama_aturan',
        'nilai',
        // Add other fillable fields as necessary
    ];

    public function details()
    {
        return $this->hasMany(AturanDetail::class, 'himpunan_fuzzy_id');
    }
}
