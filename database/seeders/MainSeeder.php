<?php

namespace Database\Seeders;

use App\Models\Main;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mains = [
            [
                'nama_barang' => 'Baju',
                'harga' => 80000,
                'diskon' => 0,
                'promo' => 'Buy 1 Get 1',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
                'category_id' => 1,
                'store_id' =>1,
                'foto' => 'assets/img/course-1.jpg'
            ],
            [
                'nama_barang' => 'Laundry',
                'harga' => 80000,
                'diskon' => 0,
                'promo' => 'Buy 1 Get 1',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
                'category_id' => 2,
                'store_id' =>2,
                'foto' => 'assets/img/course-1.jpg'
            ],
            [
                'nama_barang' => 'Sepatu',
                'harga' => 80000,
                'diskon' => 0,
                'promo' => 'Buy 1 Get 1',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
                'category_id' => 1,
                'store_id' =>3,
                'foto' => 'assets/img/course-1.jpg'
            ],

        ];

        foreach ($mains as $main){
            Main::create($main);
        }
    }
}
