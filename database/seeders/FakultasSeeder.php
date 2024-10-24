<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fakultas')->insert([
            ['nama_fakultas' => 'FT'],
            ['nama_fakultas' => 'FMIPA'],
            ['nama_fakultas' => 'FK'],
            ['nama_fakultas' => 'FEB'],
            ['nama_fakultas' => 'FH'],
        ]);
    }
}
