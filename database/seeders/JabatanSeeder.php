<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan')->insert([
            ['nama_jabatan' => 'Kepala Sekolah', 'prioritas' => 1],
            ['nama_jabatan' => 'Wakasek Kurikulum', 'prioritas' => 2],
            ['nama_jabatan' => 'Wakasek Kesiswaan', 'prioritas' => 3],
            ['nama_jabatan' => 'Wakasek Humas', 'prioritas' => 4],
            ['nama_jabatan' => 'Wakasek Sarpras', 'prioritas' => 5],
            ['nama_jabatan' => 'Bendahara', 'prioritas' => 6],
            ['nama_jabatan' => 'Guru Sekolah', 'prioritas' => 7],
            ['nama_jabatan' => 'STAFF TU', 'prioritas' => 8],
        ]);
    }
}
