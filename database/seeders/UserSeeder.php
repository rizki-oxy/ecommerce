<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        'nama_lengkap' => 'Aku User',
        'username' => 'akuuser',
        'nomor_peserta' => null,
        'tanggal_lahir' => '1970-09-30',
        'alamat' => 'Jl. Kenangan, Jakarta Selatan',
        'lulusan_bpvp' => null,
        'email' => 'user@gmail.com',
        'password' => Hash::make('user'),
        'role_id' => 3,
        'foto_profil' => null,
        ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'Si Alumni',
            'username' => 'alumni',
            'nomor_peserta' => null,
            'tanggal_lahir' => '1970-09-30',
            'alamat' => 'Jl. Mangga, Jakarta Selatan',
            'lulusan_bpvp' => null,
            'email' => 'alumni@gmail.com',
            'password' => Hash::make('alumni'),
            'role_id' => 2,
            'foto_profil' => null,
            ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'Mba Admin',
            'username' => 'mbaadmin',
            'nomor_peserta' => null,
            'tanggal_lahir' => '1970-09-30',
            'alamat' => 'Jl. Anggrek, Jakarta Selatan',
            'lulusan_bpvp' => null,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
            'foto_profil' => null,
            ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'Oci',
            'username' => 'oci',
            'nomor_peserta' => 1221,
            'tanggal_lahir' => '1970-09-30',
            'alamat' => 'Jl. Anggrek, Jakarta Selatan',
            'lulusan_bpvp' => "Jakarta",
            'email' => 'oci@gmail.com',
            'password' => Hash::make('oci'),
            'role_id' => 2,
            'foto_profil' => null,
            ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'Momo',
            'username' => 'momo',
            'nomor_peserta' => 9090,
            'tanggal_lahir' => '1970-09-30',
            'alamat' => 'Jl. Anggrek, Jakarta Selatan',
            'lulusan_bpvp' => "Jakarta",
            'email' => 'momo@gmail.com',
            'password' => Hash::make('momo'),
            'role_id' => 2,
            'foto_profil' => null,
            ]);
    }
}
