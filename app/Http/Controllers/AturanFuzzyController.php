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
    $kriterias = Kriteria::with('himpunanFuzzies')->get();  
    $aturans = AturanFuzzy::with('details.kriteria', 'details.himpunanFuzzy')->get();

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


    /**
     * Display the specified resource.
     */
    public function show(AturanFuzzy $aturanFuzzy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AturanFuzzy $aturanFuzzy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AturanFuzzy $aturanFuzzy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AturanFuzzy $aturanFuzzy)
    {
        //
    }
}
