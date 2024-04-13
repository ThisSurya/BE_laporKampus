<?php

namespace Database\Seeders;

use App\Models\TagModels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TagModels::create(
            [
                'nama_tag' => 'Kerusakan kursi',
                'deskripsi' => 'Kerusakan pada bagian kursi sehingga menganggu kegiatan belajar'
            ]
        );

        TagModels::create(
            [
                'nama_tag' => 'Kerusakan proyektor',
                'deskripsi' => 'Mungkin menganggu saat kegiatan presentasi kelas'
            ]
        );

    }
}
