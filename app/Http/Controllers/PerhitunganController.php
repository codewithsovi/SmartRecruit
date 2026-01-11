<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kriteria;
use App\Models\AturanFuzzy;
use App\Models\Hasil;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function jabatan()
    {
       $jabatans = Jabatan::whereHas('kandidat')->get();
        return view('perhitungan.jabatan', compact('jabatans'));
    }

   public function index($jabatan_id){
    
    $jabatan = Jabatan::findOrFail($jabatan_id);
    $kriterias = Kriteria::whereHas('alternatif')->get();
    $kandidats = $jabatan->kandidat()
        ->whereHas('alternatif', function ($q) { 
            $q->whereNotNull('bobot');
        })
        ->with('alternatif')
        ->get();
    
    // fuzzification
    $derajat = [];
    foreach ($kandidats as $kandidat) {
        foreach ($kriterias as $kriteria) {
            $alternatif = $kandidat->alternatif
                ->where('kriteria_id', $kriteria->id)
                ->first();
                
                // next kriteria if alternatif not found
            if (!$alternatif) continue;
            
            $x = $alternatif->bobot;
            
            foreach ($kriteria->himpunanFuzzies as $himpunan) {
                $derajat[$kandidat->id][$kriteria->id][$himpunan->id] =
                    $this->hitungDerajat($x, $himpunan);
            }
        }
    }
    
    // inferensi 
    $aturanFuzzies = AturanFuzzy::with('details.himpunan')->get();
    $ruleResult = $this->hitungRuleFuzzy(
        $aturanFuzzies,
        $kandidats,
        $derajat
    );
    
    // defuzzification
    $defuzzifikasi = $this->hitungDefuzzifikasi($ruleResult, $kandidats);
    
    // simpan ke database
    foreach ($kandidats as $kandidat) {
        Hasil::updateOrCreate(
            [
                'kandidat_id' => $kandidat->id,
            ],
            [
                'nilai_akhir' => $defuzzifikasi[$kandidat->id]['wa'],
            ]
        );
    }
    
    return view('perhitungan.perhitungan', compact(
        'kriterias', 
        'jabatan', 
        'kandidats', 
        'derajat', 
        'ruleResult', 
        'defuzzifikasi'
    ));
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

        private function hitungRuleFuzzy($aturanFuzzies, $kandidats, $derajat)
    {
        $ruleResult = [];

        foreach ($aturanFuzzies as $aturan) { // untuk setiap aturan

            foreach ($kandidats as $kandidat) { // untuk setiap kandidat

                $nilaiRule = [];

                foreach ($aturan->details as $detail) { // untuk setiap detail aturan

                    $kriteriaId = $detail->kriteria_id;
                    $himpunanId = $detail->himpunan_fuzzy_id;

                    if (isset($derajat[$kandidat->id][$kriteriaId][$himpunanId])) {
                        $nilaiRule[] = $derajat[$kandidat->id][$kriteriaId][$himpunanId];
                    } else {
                        $nilaiRule[] = 0;
                    }
                }

                $alpha = empty($nilaiRule) ? 0 : min($nilaiRule);

                $ruleResult[$aturan->id]['aturan'] = $aturan;
                $ruleResult[$aturan->id]['kandidat'][$kandidat->id] = $alpha;
            }
        }

        return $ruleResult;
    }

    
   private function hitungDefuzzifikasi($ruleResult, $kandidats)
{
    $defuzzifikasi = [];

    foreach ($kandidats as $kandidat) {

        $pembilang = 0;
        $penyebut  = 0;

        $atas = [];
        $bawah = [];

        foreach ($ruleResult as $rule) {

            // hasil minimum
            $alpha = $rule['kandidat'][$kandidat->id] ?? 0;
            // nilai konstanta then
            $z = $rule['aturan']->nilai;

            if ($alpha > 0) {
                $pembilang += $alpha * $z;
                $penyebut  += $alpha;

                $atas[] = '(' . number_format($alpha, 3) . ' × ' . $z . ')';
                $bawah[] = number_format($alpha, 3);
            }
        }

        // menghitung WA
        $wa = $penyebut == 0 ? 0 : $pembilang / $penyebut;

        $defuzzifikasi[$kandidat->id] = [
            'wa' => $wa,
            'atas' => empty($atas) ? '-' : implode(' + ', $atas),
            'bawah' => empty($bawah) ? '-' : implode(' + ', $bawah),
        ];
    }

    return $defuzzifikasi;
}

}   