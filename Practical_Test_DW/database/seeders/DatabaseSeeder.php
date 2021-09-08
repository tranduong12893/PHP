<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('warehouse')->insert([
            [
                'id_name'=>'SOFA1234',
                'name'=>'Ghế Sofa dài đen',
                'price'=>'12000000',
                'image'=>'sofa-vang-sofa-toan-quoc-ma-80.jpg',
            ],
            [
                'id_name'=>'GHE1234',
                'name'=>'Ghế da',
                'price'=>'5120000',
                'image'=>'ghedabo.png',
            ],
            [
                'id_name'=>'TABLE2345',
                'name'=>'Bàn làm việc',
                'price'=>'2300000',
                'image'=>'ban-lam-viec-AT140HL3D.jpg',
            ],
    ]);
    }
}
