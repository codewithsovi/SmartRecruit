<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Jabatan;
use App\Models\Kriteria;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    public function jabatan()
    {
        $jabatans = Jabatan::whereHas('kandidat')->get();
        return view('PenilaianAlternatif.jabatan', compact('jabatans'));
    }

    public function index($jabatan_id)
    {
        $jabatan = Jabatan::findOrFail($jabatan_id);
        $kriterias = Kriteria::whereHas('aturanDetail')->get();
        $kandidats = Kandidat::with(['alternatif'])->where('jabatan_id', $jabatan_id)->get();
        $alternatif = Alternatif::whereIn('kandidat_id', $kandidats->pluck('id'))->get();

        return view('PenilaianAlternatif.alternatif', compact('kandidats', 'kriterias', 'jabatan', 'jabatan_id', 'alternatif'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kandidat_id' => 'required|exists:kandidats,id',
            'kriteria_id' => 'required|array',
            'bobot'       => 'required|array',
        ]);

        foreach ($request->kriteria_id as $index => $kriteria_id) {
            Alternatif::create([
                'kandidat_id' => $request->kandidat_id,
                'kriteria_id' => $kriteria_id,
                'bobot'       => $request->bobot[$index],
            ]);
        }

        return redirect()->back()->with('success', 'Penilaian kandidat berhasil disimpan');
    }

public function update(Request $request, $kandidat_id)
{
    $request->validate([
        'kriteria_id' => 'required|array',
        'bobot'       => 'required|array',
    ]);

    if (count($request->kriteria_id) !== count($request->bobot)) {
        return back()->withErrors('Data bobot tidak valid');
    }

    DB::transaction(function () use ($request, $kandidat_id) {

        Alternatif::where('kandidat_id', $kandidat_id)->delete();

        foreach ($request->kriteria_id as $index => $kriteria_id) {
            Alternatif::create([
                'kandidat_id' => $kandidat_id,
                'kriteria_id' => $kriteria_id,
                'bobot'       => $request->bobot[$index],
            ]);
        }

    });

    return redirect()->back()->with('success', 'Penilaian berhasil diperbarui');
}



   
public function destroy($kandidat_id)
{
    DB::transaction(function () use ($kandidat_id) {
        Alternatif::where('kandidat_id', $kandidat_id)->delete();
    });

    return redirect()->back()->with('success', 'Penilaian kandidat berhasil dihapus');
}
}
