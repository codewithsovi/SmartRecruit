<?php

namespace App\Http\Controllers;

use App\Models\AturanFuzzy;
use App\Models\Kriteria;
use App\Models\HimpunanFuzzy;
use App\Models\AturanDetail;
use Illuminate\Http\Request;

class AturanFuzzyController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::with('himpunanFuzzies')
            ->has('himpunanFuzzies')
            ->get();
        $aturans = AturanFuzzy::all();
        return view('aturanFuzzy.aturan', compact('aturans', 'kriterias'));
    }

   public function store(Request $request)
{
    // 1. simpan aturan utama
    $aturan = AturanFuzzy::create([
        'nama_aturan' => 'R' . (AturanFuzzy::count() + 1),
        'nilai' => $request->nilai
    ]);

    // 2. simpan detail aturan
    foreach ($request->himpunan as $kriteria_id => $himpunan_id) {
        AturanDetail::create([
            'aturan_fuzzy_id' => $aturan->id,
            'kriteria_id' => $kriteria_id,
            'himpunan_fuzzy_id' => $himpunan_id
        ]);
    }

    return redirect()->back()->with('success', 'Aturan fuzzy berhasil ditambahkan');
}

    public function update(Request $request, AturanFuzzy $aturanFuzzy)
    {
        // Update nilai aturan fuzzy
        $aturanFuzzy->update([
            'nama_aturan' => 'R' . (AturanFuzzy::count() + 1),
            'nilai' => $request->nilai
        ]);

        // Update detail aturan fuzzy
        foreach ($request->himpunan as $kriteria_id => $himpunan_id) {
            $detail = AturanDetail::where('aturan_fuzzy_id', $aturanFuzzy->id)
                ->where('kriteria_id', $kriteria_id)
                ->first();

            if ($detail) {
                $detail->update([
                    'himpunan_fuzzy_id' => $himpunan_id
                ]);
            }
        }

        return redirect()->back()->with('success', 'Aturan fuzzy berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AturanFuzzy $aturanFuzzy)
    {
        $aturanFuzzy->delete();
        return redirect()->back()->with('success', 'Aturan fuzzy berhasil dihapus');
    }
}
