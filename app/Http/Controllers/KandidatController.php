<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($jabatan_id)
    {
        $jabatan = Jabatan::findOrFail($jabatan_id);
        $kandidats = Kandidat::where('jabatan_id', $jabatan_id)->get();
        return view('kandidat.kandidat', compact('kandidats', 'jabatan', 'jabatan_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_kandidat' => 'required|string|max:255',
                'jabatan_id' => 'required|exists:jabatans,id',
            ]);

            Kandidat::create([
                'nama_kandidat' => $request->nama_kandidat,
                'jabatan_id' => $request->jabatan_id,
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menambahkan kandidat.']);
        }
        return redirect()
            ->route('admin.kandidat.index.byJabatan', ['jabatan_id' => $request->jabatan_id])
            ->with('success', 'Kandidat berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kandidat $kandidat)
    {
        try {
            $request->validate([
                'nama_kandidat' => 'required|string|max:255',
                'jabatan_id' => 'required|exists:jabatans,id',
            ]);

            $kandidat->update([
                'nama_kandidat' => $request->nama_kandidat,
                'jabatan_id' => $request->jabatan_id,
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat memperbarui kandidat.']);
        }
        return redirect()
            ->route('admin.kandidat.index.byJabatan', ['jabatan_id' => $request->jabatan_id])
            ->with('success', 'Kandidat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kandidat $kandidat)
    {
        try {
            $jabatan_id = $kandidat->jabatan_id;
            $kandidat->delete();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menghapus kandidat.']);
        }
        return redirect()
            ->route('admin.kandidat.index.byJabatan', ['jabatan_id' => $jabatan_id])
            ->with('success', 'Kandidat berhasil dihapus.');
    }
}
