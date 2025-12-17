<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('jabatan.jabatan', compact('jabatans'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_jabatan' => 'required|string|max:255',
            ]);

            Jabatan::create([
                'nama_jabatan' => $request->nama_jabatan,
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.jabatan.index')
                ->with('error', 'Terjadi kesalahan saat menambahkan jabatan: ' . $e->getMessage());
        }

        return redirect()->route('admin.jabatan.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        try {

            $request->validate([
                'nama_jabatan' => 'required|string|max:255',
            ]);

            $jabatan->update([
                'nama_jabatan' => $request->nama_jabatan,
            ]);

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.jabatan.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui jabatan: ' . $e->getMessage());
        }

        return redirect()->route('admin.jabatan.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('admin.jabatan.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
