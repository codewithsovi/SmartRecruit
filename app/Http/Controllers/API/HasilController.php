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

            // Ambil kandidat yang terdaftar di jabatan ini
            $kandidatIds = $jabatan->kandidat()->pluck('id');

            // Ambil hasil berdasarkan kandidat, URUTKAN berdasarkan nilai_akhir DESC
            $hasils = Hasil::whereIn('kandidat_id', $kandidatIds)
                ->orderBy('nilai_akhir', 'desc')
                ->get();

            return ApiResponse::success('Hasils retrieved successfully', $hasils, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to retrieve hasils', $e->getMessage(), 500);
        }
    }
}
