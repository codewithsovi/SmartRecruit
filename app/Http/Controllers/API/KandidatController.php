<?php

namespace App\Http\Controllers\API;

use App\Http\Helpers\ApiResponse;
use App\Models\Kandidat;
use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KandidatController extends Controller
{
    public function jabatan()
    {
        // Mengambil semua jabatan dan menghitung jumlah kandidatnya
        $jabatans = Jabatan::withCount('kandidat')->get();

        return ApiResponse::success('Data jabatan', $jabatans, 200);
    }

    public function index($jabatan_id)
    {
        try {
            $kandidats = Kandidat::with('jabatan') // Tambahkan ini
                ->where('jabatan_id', $jabatan_id)
                ->orderBy('id', 'desc')
                ->paginate(10);
            return ApiResponse::success('Kandidats retrieved successfully', $kandidats, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed', $e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kandidat' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validation failed', $validator->errors(), 422);
        }

        try {

            $kandidat = Kandidat::create([
                'nama_kandidat' => $request->nama_kandidat,
                'jabatan_id' => $request->jabatan_id,
            ]);

            return ApiResponse::success('Kandidat created successfully', $kandidat, 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to create kandidat', $e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_kandidat' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validation failed', $validator->errors(), 422);
        }

        try {
            $kandidat = Kandidat::findOrFail($id);
            $kandidat->update([
                'nama_kandidat' => $request->nama_kandidat,
                'jabatan_id' => $request->jabatan_id,
            ]);

            return ApiResponse::success('Kandidat updated successfully', $kandidat, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to update kandidat', $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $kandidat = Kandidat::findOrFail($id);
            $kandidat->delete();

            return ApiResponse::success('Kandidat deleted successfully', null, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to delete kandidat', $e->getMessage(), 500);
        }
    }
}
