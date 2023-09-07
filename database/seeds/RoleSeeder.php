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
            'name' => 'admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'manager'
        ]);
        DB::table('roles')->insert([
            'name' => 'helper'
        ]);
        DB::table('roles')->insert([
            'name' => 'developer'
        ]);
        DB::table('roles')->insert([
            'name' => 'brand'
        ]);
        DB::table('roles')->insert([
            'name' => 'brand_company'
        ]);
        DB::table('roles')->insert([
            'name' => 'influencer'
        ]);
        DB::table('roles')->insert([
            'name' => 'influencer_company'
        ]);
        DB::table('roles')->insert([
            'name' => 'guest'
        ]);
    }
}
