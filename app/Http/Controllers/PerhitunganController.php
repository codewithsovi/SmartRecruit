<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{

    public function jabatan()
    {
       $jabatans = Jabatan::whereHas('kandidat')->get();
        return view('perhitungan.jabatan', compact('jabatans'));
    }


    public function index($jabatan_id)
    {
        $jabatan = Jabatan::findOrFail($jabatan_id);
        $kriterias = Kriteria::whereHas('alternatif')->get();
        $kandidats = $jabatan->kandidat()
            ->whereHas('alternatif', function ($q) { $q->whereNotNull('bobot');})
            ->with('alternatif')
            ->get();

        $derajat = [];

            foreach ($kandidats as $kandidat) {
                foreach ($kriterias as $kriteria) {

                    // ambil bobot kandidat untuk kriteria ini
                    $alternatif = $kandidat->alternatif
                        ->where('kriteria_id', $kriteria->id)
                        ->first();

                    if (!$alternatif) continue;

                    $x = $alternatif->bobot;

                    foreach ($kriteria->himpunanFuzzies as $himpunan) {
                        $derajat[$kandidat->id][$kriteria->id][$himpunan->id] =
                            $this->hitungDerajat($x, $himpunan);
                    }
                }
            }

        return view('perhitungan.perhitungan', compact('kriterias', 'jabatan', 'kandidats', 'derajat'));
    }


    private function hitungDerajat($x, $himpunan)
    {
        $a = $himpunan->a;
        $b = $himpunan->b;
        $c = $himpunan->c;
        $d = $himpunan->d;

        switch ($himpunan->kurva) {

            case 'naik':
                if ($x <= $a) return 0;
                if ($x >= $b) return 1;
                return ($x - $a) / ($b - $a);

            case 'turun':
                if ($x <= $a) return 1;
                if ($x >= $b) return 0;
                return ($b - $x) / ($b - $a);

            case 'segitiga':
                if ($x <= $a || $x >= $c) return 0;
                if ($x == $b) return 1;
                if ($x < $b) return ($x - $a) / ($b - $a);
                return ($c - $x) / ($c - $b);

            case 'trapesium':
                if ($x <= $a || $x >= $d) return 0;
                if ($x >= $b && $x <= $c) return 1;
                if ($x < $b) return ($x - $a) / ($b - $a);
                return ($d - $x) / ($d - $c);

            default:
                return 0;
        }
    }
}