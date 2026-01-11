<?php

namespace App\Http\Controllers\API;

use App\Models\Alternatif;
use App\Models\Jabatan;
use App\Models\Kriteria;
use App\Models\Kandidat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\ApiResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    public function jabatan()
    {
        $jabatans = Jabatan::whereHas('kandidat')
            ->withCount('kandidat')
            ->get();

        return ApiResponse::success('Data jabatan', $jabatans, 200);
    }

    public function kriteria()
    {
        $kriterias = \App\Models\Kriteria::all();
        return ApiResponse::success('Data kriteria', $kriterias, 200);
    }

    public function index($jabatan_id)
    {
        try {
            $jabatan = Jabatan::findOrFail($jabatan_id);
            $kriterias = Kriteria::whereHas('aturanDetail')->get();
            $kandidats = Kandidat::with(['alternatif'])->where('jabatan_id', $jabatan_id)->get();
            $alternatif = Alternatif::whereIn('kandidat_id', $kandidats->pluck('id'))->get();

            return ApiResponse::success('Alternatifs retrieved successfully', $alternatif, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to retrieve alternatifs', $e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kandidat_id'   => 'required|exists:kandidats,id',
            'kriteria_id'   => 'required|array',
            'kriteria_id.*' => 'exists:kriterias,id',
            'bobot'         => 'required|array',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                'Validation failed',
                $validator->errors(),
                422
            );
        }

        if (count($request->kriteria_id) !== count($request->bobot)) {
            return ApiResponse::error(
                'Jumlah kriteria dan bobot tidak sesuai',
                null,
                422
            );
        }

        try {
            $data = [];

            foreach ($request->kriteria_id as $index => $kriteria_id) {
                $data[] = Alternatif::create([
                    'kandidat_id' => $request->kandidat_id,
                    'kriteria_id' => $kriteria_id,
                    'bobot'       => $request->bobot[$index],
                ]);
            }

            return ApiResponse::success(
                'Alternatif berhasil disimpan',
                $data,
                201
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                'Failed to create alternatif',
                $e->getMessage(),
                500
            );
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kandidat_id'   => 'required|exists:kandidats,id',
            'kriteria_id'   => 'required|array',
            'kriteria_id.*' => 'exists:kriterias,id',
            'bobot'         => 'required|array',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validation failed', $validator->errors(), 422);
        }

        if (count($request->kriteria_id) !== count($request->bobot)) {
            return ApiResponse::error('Jumlah kriteria dan bobot tidak sesuai', null, 422);
        }

        try {
            DB::transaction(function () use ($request, $id) {

                Kandidat::findOrFail($id);
                Alternatif::where('kandidat_id', $id)->delete();

                // simpan alternatif baru
                foreach ($request->kriteria_id as $index => $kriteria_id) {
                    Alternatif::create([
                        'kandidat_id' => $id,
                        'kriteria_id' => $kriteria_id,
                        'bobot'       => $request->bobot[$index],
                    ]);
                }
            });

            return ApiResponse::success(
                'Penilaian kandidat berhasil diperbarui',
                null,
                200
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                'Failed to update penilaian kandidat',
                $e->getMessage(),
                500
            );
        }
    }

    public function destroy($kandidat_id)
    {
        try {
            DB::transaction(function () use ($kandidat_id) {

                Alternatif::where('kandidat_id', $kandidat_id)->delete();
            });


            return ApiResponse::success('alternatif deleted successfully', null, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to delete alternatif', $e->getMessage(), 500);
        }
    }
}
