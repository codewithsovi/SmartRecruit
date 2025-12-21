<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\HimpunanFuzzy;

class HimpunanFuzzyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kriteria_id)
    {
        $kriteria = Kriteria::findOrFail($kriteria_id);
        $himpunans = HimpunanFuzzy::where('kriteria_id', $kriteria_id)->get();
        return view('himpunan.himpunan', compact('himpunans', 'kriteria_id', 'kriteria'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(HimpunanFuzzy $himpunanFuzzy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HimpunanFuzzy $himpunanFuzzy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HimpunanFuzzy $himpunanFuzzy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HimpunanFuzzy $himpunanFuzzy)
    {
        //
    }
}
