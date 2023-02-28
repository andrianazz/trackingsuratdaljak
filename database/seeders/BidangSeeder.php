<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Bidang::create([
            'nama_bidang' => 'Sekretariat'
        ]);

        Bidang::create([
            'nama_bidang' => 'PD1'
        ]);

        Bidang::create([
            'nama_bidang' => 'PD2'
        ]);

        Bidang::create([
            'nama_bidang' => 'P3D'
        ]);
    }
}
