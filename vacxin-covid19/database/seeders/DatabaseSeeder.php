<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('users')->insert([
            [
               'id_card'=>'123456787',
               'name'=>'Tran Van Duong',
               'date_year'=>'12/08/1993',
               'address'=>'Hanoi',
               'phone'=>'0123456789',
               'allergy_history'=>'Chua co tien su nao',
           ] ,
            [
                'id_card'=>'12345654',
                'name'=>'Nguyen Van Quang',
                'date_year'=>'2/8/2001',
                'address'=>'Hanoi',
                'phone'=>'0234567898',
                'allergy_history'=>'Chua co tien su nao',
            ] ,
            [
                'id_card'=>'216423454',
                'name'=>'Nguyen Van A',
                'date_year'=>'01/01/2001',
                'address'=>'Ha Noi',
                'phone'=>'0978654321',
                'allergy_history'=>'Tung tiep xuc f1',
            ] ,
            [
                'id_card'=>'124579413',
                'name'=>'Ngo Van B',
                'date_year'=>'01/01/1998',
                'address'=>'Ha Nam',
                'phone'=>'032345678',
                'allergy_history'=>'Tung la F0',
            ] ,
            [
                'id_card'=>'13649749',
                'name'=>'Nguyen Van B',
                'date_year'=>'01/01/1996',
                'address'=>'Ho Chi Minh',
                'phone'=>'039123456',
                'allergy_history'=>'Tiep xuc voi F2',
            ] ,
        ]);
    }
}
