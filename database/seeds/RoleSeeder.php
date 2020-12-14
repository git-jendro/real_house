<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
         'nama' => 'Admin',
        ]);
        DB::table('roles')->insert([
        'nama' => 'Project Manager',
        ]);
        DB::table('roles')->insert([
         'nama' => 'Marketing',
        ]);
        DB::table('roles')->insert([
         'nama' => 'Customer',
        ]);
        DB::table('roles')->insert([
         'nama' => 'Reseller',
        ]);
    }
}
