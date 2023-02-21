<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'id_pegawai' => '001',
            'nama_user' => 'Andrian Wahyu',
            'email_user' => 'andrianwahyu41@gmail.com',
            'username' => 'andrianazz',
            'password' => Hash::make('admin'),
            'last_login' => null,
            'ip_address' => null,
            'status_user' => 'aktif',
            'foto' => null,
            'role' => 'master'
        ]);
    }
}
