<?php

namespace App\Http\Controllers\API;

use App\Models\Jabatan;
use App\Models\Kriteria;
use App\Models\AturanFuzzy;
use App\Models\Hasil;
use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function hitung($jabatan_id)
    {
        try {
            $jabatan = Jabatan::findOrFail($jabatan_id);
            $kriterias = Kriteria::with('himpunanFuzzies')->get();
            $kandidats = $jabatan->kandidat()
                ->whereHas('alternatif')
                ->with('alternatif')
                ->get();

            if ($kandidats->isEmpty()) {
                return ApiResponse::error('Tidak ada kandidat dengan penilaian di jabatan ini', null, 400);
            }

            // 1. Fuzzification
            $derajat = [];
            foreach ($kandidats as $kandidat) {
                foreach ($kriterias as $kriteria) {
                    $alternatif = $kandidat->alternatif->where('kriteria_id', $kriteria->id)->first();
                    if (!$alternatif) continue;

                    $x = $alternatif->bobot;
                    foreach ($kriteria->himpunanFuzzies as $himpunan) {
                        $derajat[$kandidat->id][$kriteria->id][$himpunan->id] = $this->hitungDerajat($x, $himpunan);
                    }
                }
            }

            // 2. Inferensi
            $aturanFuzzies = AturanFuzzy::with('details')->get();
            $ruleResult = [];
            foreach ($aturanFuzzies as $aturan) {
                foreach ($kandidats as $kandidat) {
                    $nilaiRule = [];
                    foreach ($aturan->details as $detail) {
                        $kId = $detail->kriteria_id;
                        $hId = $detail->himpunan_fuzzy_id;
                        $nilaiRule[] = $derajat[$kandidat->id][$kId][$hId] ?? 0;
                    }
                    $alpha = empty($nilaiRule) ? 0 : min($nilaiRule);
                    $ruleResult[$aturan->id]['nilai'] = $aturan->nilai;
                    $ruleResult[$aturan->id]['kandidat'][$kandidat->id] = $alpha;
                }
            }

            // 3. Defuzzifikasi & Simpan
            foreach ($kandidats as $kandidat) {
                $pembilang = 0; $penyebut = 0;
                foreach ($ruleResult as $rule) {
                    $alpha = $rule['kandidat'][$kandidat->id] ?? 0;
                    $z = $rule['nilai'];
                    if ($alpha > 0) {
                        $pembilang += ($alpha * $z);
                        $penyebut += $alpha;
                    }
                }
                $wa = $penyebut == 0 ? 0 : $pembilang / $penyebut;

                Hasil::updateOrCreate(
                    ['kandidat_id' => $kandidat->id],
                    ['nilai_akhir' => $wa]
                );
            }

            return ApiResponse::success('Perhitungan fuzzy berhasil disinkronkan', null, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Gagal menghitung: ' . $e->getMessage(), null, 500);
        }
    }

    private function hitungDerajat($x, $himpunan) {
        $a = $himpunan->a; $b = $himpunan->b; $c = $himpunan->c; $d = $himpunan->d;
        switch ($himpunan->kurva) {
            case 'naik': return ($x <= $a) ? 0 : (($x >= $b) ? 1 : ($x - $a) / ($b - $a));
            case 'turun': return ($x <= $a) ? 1 : (($x >= $b) ? 0 : ($b - $x) / ($b - $a));
            case 'segitiga':
                if ($x <= $a || $x >= $c) return 0;
                return ($x <= $b) ? ($x - $a) / ($b - $a) : ($c - $x) / ($c - $b);
            case 'trapesium':
                if ($x <= $a || $x >= $d) return 0;
                if ($x >= $b && $x <= $c) return 1;
                return ($x < $b) ? ($x - $a) / ($b - $a) : ($d - $x) / ($d - $c);
            default: return 0;
        }
    }
}
