<?php

namespace App\Http\Controllers\API;
use App\Models\Jabatan;
use App\Models\Kandidat;
use App\Models\Hasil;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\ApiResponse;
use Illuminate\Support\Facades\Validator;
    
class HasilController extends Controller
{
    public function jabatan()
    {
        $jabatans = Jabatan::whereHas('kandidat')
            ->withCount('kandidat')
            ->get();

        return ApiResponse::success('Data jabatan', $jabatans, 200);
    }

    public function index($jabatan_id)
{
    try {
        $jabatan = Jabatan::whereHas('kandidat')->findOrFail($jabatan_id);

        // Ambil kandidat pada jabatan tersebut
        $kandidatIds = $jabatan->kandidat()->pluck('id');

        // Ambil hasil dan urutkan berdasarkan nilai akhir tertinggi
        $hasils = Hasil::whereIn('kandidat_id', $kandidatIds)
            ->orderBy('nilai_akhir', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Hasil berhasil ditampilkan',
            'data'    => $hasils
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menampilkan hasil',
            'error'   => $e->getMessage()
        ], 500);
    }
}
}