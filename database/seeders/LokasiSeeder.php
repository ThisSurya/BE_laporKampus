<?php

namespace Database\Seeders;

use App\Models\LokasiModels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LokasiModels::create(
            ['nama_lokasi' => 'UDINUS GEDUNG H.2.3']
        );
        LokasiModels::create(
            ['nama_lokasi' => 'UDINUS GEDUNG H.2.5']
        );
    }
}
