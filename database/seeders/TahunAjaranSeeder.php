<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TahunAjaranSeeder extends Seeder
{
   public function run()
{
    $currentYear = date('Y');
    $currentMonth = date('m');

    // Kalau bulan < 7 (Juli), berarti tahun ajaran masih tahun sebelumnya
    if ($currentMonth < 7) {
        $startYear = $currentYear - 1;
    } else {
        $startYear = $currentYear;
    }

    for ($i = 0; $i < 10; $i++) {
        $tahunMulai = $startYear + $i;
        $tahunSelesai = $tahunMulai + 1;

        $namaTahun = $tahunMulai . '/' . $tahunSelesai;

        DB::table('tahun_ajaran')->updateOrInsert(
            ['nama_tahun' => $namaTahun],
            ['created_at' => now(), 'updated_at' => now()]
        );
    }
}

}
