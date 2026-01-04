<?php

namespace App\Http\Controllers;

use App\Models\AturanFuzzy;
use App\Models\Kriteria;
use App\Models\HimpunanFuzzy;
use App\Models\AturanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AturanFuzzyController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::with('himpunanFuzzies')
            ->has('himpunanFuzzies')
            ->get();
            $aturans = AturanFuzzy::with('details.kriteria', 'details.himpunan')->get();

        // $aturans = AturanFuzzy::all();

        $jumlahKriteria = Kriteria::count();
        $jumlahAturan = pow(3, $jumlahKriteria);

        return view('aturanFuzzy.aturan', compact('aturans', 'kriterias', 'jumlahKriteria', 'jumlahAturan'));
    }

   
    public function generate()
    {
            $kriterias = Kriteria::all();
            $himpunan = HimpunanFuzzy::all(); // rendah, sedang, tinggi

            // mapping konstanta Sugeno
            $map = [
                'rendah' => 0,
                'sedang' => 1,
                'tinggi' => 2

            ];
            // hapus aturan lama 
            DB::table('aturan_details')->delete();
            DB::table('aturan_fuzzies')->delete();

            // ngitung banyak kombinasi (aturan)
            $kombinasi = [];

            foreach ($kriterias as $kriteria) {

                $himpunanPerKriteria = HimpunanFuzzy::where('kriteria_id', $kriteria->id)->get();

                if (count($kombinasi) === 0) {
                    foreach ($himpunanPerKriteria as $h) {
                        $kombinasi[] = [
                            $kriteria->id => $h->id
                        ];
                    }
                    continue;
                }

                $temp = [];
                foreach ($kombinasi as $komb) {
                    foreach ($himpunanPerKriteria as $h) {
                        $temp[] = $komb + [
                            $kriteria->id => $h->id
                        ];
                    }
                }

                $kombinasi = $temp;
            }

            // menenukan nilai then untuk setiap aturan (normalisasi)
            foreach ($kombinasi as $index => $aturan) {

                $total = 0;

                foreach ($aturan as $himpunan_id) {
                    $nama = HimpunanFuzzy::find($himpunan_id)->nama_himpunan;
                    $total += $map[$nama];
                }

                $nilaiThen = ($total / (count($kriterias) * 2)) * 100;

                // simpan aturan
                $rule = AturanFuzzy::create([
                    'nama_aturan' => 'R' . ($index + 1),
                    'nilai' => $nilaiThen
                ]);

                // simpan detail aturan
                foreach ($aturan as $kriteria_id => $himpunan_id) {
                    AturanDetail::create([
                        'aturan_fuzzy_id' => $rule->id,
                        'kriteria_id' => $kriteria_id,
                        'himpunan_fuzzy_id' => $himpunan_id
                    ]);
                }
            }

            return back()->with('success', 'Aturan fuzzy berhasil digenerate otomatis');
    }  
}
