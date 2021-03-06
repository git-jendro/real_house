<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin1',
            'email' => 'admin1@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('123123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Customer1',
            'email' => 'customer1@gmail.com',
            'role_id' => 4,
            'password' => Hash::make('123123'),
         ]);
        DB::table('users')->insert([
            'name' => 'PM1',
            'email' => 'pm1@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('123123'),
         ]);
        DB::table('users')->insert([
            'name' => 'Marketing1',
            'email' => 'marketing1@gmail.com',
            'role_id' => 3,
            'password' => Hash::make('123123'),
         ]);
        DB::table('users')->insert([
            'name' => 'Marketing2',
            'email' => 'marketing2@gmail.com',
            'role_id' => 3,
            'password' => Hash::make('123123'),
         ]);
        DB::table('users')->insert([
            'name' => 'Marketing3',
            'email' => 'marketing3@gmail.com',
            'role_id' => 3,
            'password' => Hash::make('123123'),
         ]);
        DB::table('users')->insert([
            'name' => 'Marketing4',
            'email' => 'marketing4@gmail.com',
            'role_id' => 3,
            'password' => Hash::make('123123'),
         ]);
        DB::table('users')->insert([
            'name' => 'Marketing5',
            'email' => 'marketing5@gmail.com',
            'role_id' => 3,
            'password' => Hash::make('123123'),
         ]);
    }
}
