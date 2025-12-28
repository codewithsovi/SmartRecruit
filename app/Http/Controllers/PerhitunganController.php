<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kriteria;
use App\Models\AturanFuzzy;
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

            // fuzzification
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

            // inrefernsi (rule evaluation)

        $aturanFuzzies = AturanFuzzy::with('details.himpunan')->get();

        $ruleResult = $this->hitungRuleFuzzy(
            $aturanFuzzies,
            $kandidats,
            $derajat
        );

        // defuzzification
        $ruleResult = $this->hitungRuleFuzzy($aturanFuzzies, $kandidats, $derajat);
        $defuzzifikasi = $this->hitungDefuzzifikasi($ruleResult, $kandidats);

            uasort($defuzzifikasi, function ($a, $b) {
                return $b['wa'] <=> $a['wa'];
            });

            $kandidatsSorted = collect($defuzzifikasi)->map(function ($val, $kandidatId) use ($kandidats) {
                return $kandidats->firstWhere('id', $kandidatId);
            });

        return view('perhitungan.perhitungan', [
            'kriterias'      => $kriterias,
            'jabatan'        => $jabatan,
            'kandidats'      => $kandidatsSorted,
            'derajat'        => $derajat,
            'ruleResult'     => $ruleResult,
            'defuzzifikasi'  => $defuzzifikasi
]);
        // return view('perhitungan.perhitungan', compact('kriterias', 'jabatan',    'kandidats'      => $kandidatsSorted, 'derajat', 'ruleResult', 'defuzzifikasi'));
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

        foreach ($aturanFuzzies as $aturan) {

            foreach ($kandidats as $kandidat) {

                $nilaiRule = [];

                foreach ($aturan->details as $detail) {

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

            $alpha = $rule['kandidat'][$kandidat->id] ?? 0;
            $z = $rule['aturan']->nilai;

            if ($alpha > 0) {
                $pembilang += $alpha * $z;
                $penyebut  += $alpha;

                $atas[]  = "({$alpha} × {$z})";
                $bawah[] = $alpha;
            }
        }

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