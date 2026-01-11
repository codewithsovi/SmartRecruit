<?php

namespace App\Http\Controllers\API;

use App\Http\Helpers\ApiResponse;
use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    public function index()
    {
        try {
            $jabatans = Jabatan::latest()->paginate(10);
            return ApiResponse::success('Jabatans retrieved successfully', $jabatans, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to retrieve jabatans', $e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validation failed', $validator->errors(), 422);
        }

        try {

            $jabatan = Jabatan::create([
                'nama_jabatan' => $request->nama_jabatan,
            ]);

            return ApiResponse::success('Jabatan created successfully', $jabatan, 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to create jabatan', $e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validation failed', $validator->errors(), 422);
        }

        try {
            $jabatan = Jabatan::findOrFail($id);
            $jabatan->update([
                'nama_jabatan' => $request->nama_jabatan,
            ]);

            return ApiResponse::success('Jabatan updated successfully', $jabatan, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to update jabatan', $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $jabatan = Jabatan::findOrFail($id);
            $jabatan->delete();

            return ApiResponse::success('Jabatan deleted successfully', null, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to delete jabatan', $e->getMessage(), 500);
        }
    }
}
