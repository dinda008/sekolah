<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $kelas = ['VII A', 'VII B', 'VIII A', 'VIII B', 'IX A', 'IX B'];

        foreach ($kelas as $nama) {
            Kelas::create(['nama_kelas' => $nama]);
        }
    }
}
