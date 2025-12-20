<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.kriteria', compact('kriterias'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_kriteria' => 'required|string|max:255',
                'min' => 'required|numeric|min:0|max:100',
                'max' => 'required|numeric|min:0|max:100',
            ]);

            Kriteria::create([
                'nama_kriteria' => $request->nama_kriteria,
                'min' => $request->min,
                'max' => $request->max,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        try {
            $request->validate([
                'nama_kriteria' => 'required|string|max:255',
                'min' => 'required|numeric|min:0|max:100',
                'max' => 'required|numeric|min:0|max:100',
            ]);

            $kriteria->update([
                'nama_kriteria' => $request->nama_kriteria,
                'min' => $request->min,
                'max' => $request->max,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
