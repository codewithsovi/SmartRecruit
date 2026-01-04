<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriterias')->insert([
            [
                'nama_kriteria' => 'Tes Tulis',
                'min' => 0,
                'max' => 100,
            ],
            [
                'nama_kriteria' => 'Tes Wawancara',
                'min' => 0,
                'max' => 100,
            ],
            [
                'nama_kriteria' => 'Tes Kesehatan',
                'min' => 0,
                'max' => 80,
            ],
            [
                'nama_kriteria' => 'Tes Keterampilan',
                'min' => 0,
                'max' => 100,
            ],
        ]);
    }
}
