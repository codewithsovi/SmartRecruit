<?php

namespace App\Models;

use App\Models\Kandidat;
use App\Models\Alternatif;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';

    protected $fillable = [
        'nama_jabatan',
    ];

    public function kandidat()
    {
        return $this->hasMany(Kandidat::class);
    }

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class);
    }
}
