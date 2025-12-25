<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\Alternatif;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidats';

    protected $fillable = [
        'nama_kandidat',
        'jabatan_id',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class);
    }
}
