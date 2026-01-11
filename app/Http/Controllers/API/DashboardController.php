<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Jabatan;
use App\Models\Kandidat;
use App\Http\Helpers\ApiResponse; 

class DashboardController extends Controller
{
    public function stats()
    {
        try {
            $data = [
                'total_kriteria' => Kriteria::count(),
                'total_jabatan'  => Jabatan::count(),
                'total_kandidat' => Kandidat::count(),
            ];

            // Jika Anda menggunakan helper ApiResponse yang sudah ada:
            return ApiResponse::success('Data statistik berhasil diambil', $data, 200);

            /*
            Jika tidak punya helper, gunakan ini:
            return response()->json([
                'success' => true,
                'message' => 'Data statistik berhasil diambil',
                'data' => $data
            ], 200);
            */

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data: ' . $e->getMessage()
            ], 500);
        }
    }
}
