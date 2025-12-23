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
        try {
        $request->validate([
            'nama_himpunan' => 'required|in:rendah,sedang,tinggi',
            'kurva' => 'required|in:naik,turun,segitiga,trapesium',
            'a' => 'required|numeric',
            'b' => 'required|numeric',
            'c' => 'nullable|numeric',
            'd' => 'nullable|numeric',
            'kriteria_id' => 'required|exists:kriterias,id',
        ]);

        HimpunanFuzzy::create($request->all());

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    }
        return redirect()->back()->with('success', 'Himpunan Fuzzy created successfully.');
    }


    public function update(Request $request, HimpunanFuzzy $himpunanFuzzy)
    {
        try {
            $request->validate([
                'nama_himpunan' => 'required|in:rendah,sedang,tinggi',
                'kurva' => 'required|in:naik,turun,segitiga,trapesium',
                'a' => 'required|numeric',
                'b' => 'required|numeric',
                'c' => 'nullable|numeric',
                'd' => 'nullable|numeric',
                'kriteria_id' => 'required|exists:kriterias,id',
            ]);

            $himpunanFuzzy->update($request->all());

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput(); 
        }
        return redirect()->back()->with('success', 'Himpunan Fuzzy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HimpunanFuzzy $himpunanFuzzy)
    {
        try {
            $himpunanFuzzy->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Himpunan Fuzzy: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Himpunan Fuzzy deleted successfully.'); 
    }
}
