<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = [
            [
                'nama_toko' => 'Halo Store',
                'alamat_kota' => 'Padang',
                'alamat_lengkap' => 'Jl. Dr. Muh. Hatta, Pauh, Padang',
                'no_wa' => '6282183854660',
                'user_id' => 2
            ],
            [
                'nama_toko' => 'Haii Store',
                'alamat_kota' => 'Pekanbaru',
                'alamat_lengkap' => 'Jl. Sudirman, Kota Pekanbaru',
                'no_wa' => '6282183854660',
                'user_id' => 4,
            ],
            [
                'nama_toko' => 'Sukses Store',
                'alamat_kota' => 'Medan',
                'alamat_lengkap' => 'Jl. Proklamator, Kota Medan',
                'no_wa' => '6282183854660',
                'user_id' => 5
            ]
        ];

        foreach ($stores as $store){
            Store::create($store);
        }
    }
}
