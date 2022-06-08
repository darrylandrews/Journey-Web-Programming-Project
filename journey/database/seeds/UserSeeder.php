<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Darryl', 'email' => 'darryl@binus.ac.id', 'phone' => '1122334455', 'role' => 'Admin', 'password' => bcrypt('12345')], 
            ['name' => 'Andrews', 'email' => 'andrews@gmail.com', 'phone' => '6677889900', 'role' => 'User', 'password' => bcrypt('67890')],
            ['name' => 'Richie Rich', 'email' => 'iamrich@gmail.com', 'phone' => '99999999999', 'role' => 'User', 'password' => bcrypt('99999')]
        ]);
    }
}
