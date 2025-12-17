<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AturanFuzzy extends Model
{
    protected $table = 'aturan_fuzzies';

    protected $fillable = [
        'nama_aturan',
        'nilai',
        // Add other fillable fields as necessary
    ];

    public function detail()
    {
        return $this->hasMany(AturanDetail::class, 'aturan_id');
    }
}
