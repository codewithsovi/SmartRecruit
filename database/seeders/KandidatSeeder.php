<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kandidats')->insert([
            [
                'nama_kandidat' => 'Sovi',
                'jabatan_id' => 1,
            ],
            [
                'nama_kandidat' => 'Alfi',
                'jabatan_id' => 1,
            ],
            [
                'nama_kandidat' => 'Nafilah',
                'jabatan_id' => 1,
            ],
        ]);
    }
}
