<?php

use Illuminate\Database\Seeder;

class ContribuyentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => str_random(40),
            'dui' => random_int(0,99999999).'-'.random_int(0,1),
            'nit' => random_int(0,9999).'-'.random_int(0,999999).'-'.random_int(0,999).'-'.random_int(0,1),
            'nacimiento' => date('Y-m-d'),
            'dui' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
