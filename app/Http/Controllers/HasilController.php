<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;
use App\Models\Hasil;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function jabatan()
    {
       $jabatans = Jabatan::whereHas('kandidat')->get();
        return view('hasilAkhir.jabatan', compact('jabatans'));
    }

    public function index()
    {
        $jabatan = Jabatan::whereHas('kandidat')->first();

        // Ambil kandidat yang terdaftar di jabatan ini
        $kandidatIds = $jabatan->kandidat()->pluck('id');

        // Ambil hasil berdasarkan kandidat-kandidat tersebut, URUTKAN berdasarkan nilai_akhir DESC
        $hasils = Hasil::whereIn('kandidat_id', $kandidatIds)
            ->orderBy('nilai_akhir', 'desc')
            ->get();

        return view('hasilAkhir.hasil', compact('jabatan', 'hasils'));
    }       
}
