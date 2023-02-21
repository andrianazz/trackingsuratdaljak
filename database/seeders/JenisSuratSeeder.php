<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        JenisSurat::create([
            'jenis_surat' => 'Pembetulan PBB'
        ]);

        JenisSurat::create([
            'jenis_surat' => 'Pengurangan PBB'
        ]);

        JenisSurat::create([
            'jenis_surat' => 'Pembatalan PBB'
        ]);

        JenisSurat::create([
            'jenis_surat' => 'Pengurangan BPHTB PH'
        ]);

        JenisSurat::create([
            'jenis_surat' => 'Lebih Bayar PBB'
        ]);

        JenisSurat::create([
            'jenis_surat' => 'Pembatalan SKPD Pajak Lainnya'
        ]);

        JenisSurat::create([
            'jenis_surat' => 'Keberatan pajak daerah lainnya'
        ]);

        JenisSurat::create([
            'jenis_surat' => 'Restitusi'
        ]);

        JenisSurat::create([
            'jenis_surat' => 'Angsuran'
        ]);
    }
}
