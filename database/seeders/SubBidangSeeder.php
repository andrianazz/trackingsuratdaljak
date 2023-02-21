<?php

namespace Database\Seeders;

use App\Models\SubBidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SubBidang::create([
            'nama_sub_bidang' => "Sub Bidang Pengawasan",
        ]);

        SubBidang::create([
            'nama_sub_bidang' => "Sub Bidang Penyuluhan",
        ]);

        SubBidang::create([
            'nama_sub_bidang' => "Sub Bidang Penagihan",
        ]);
    }
}
