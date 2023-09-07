<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_types')->insert([
            'name' => 'instagram'
        ]);
        DB::table('social_types')->insert([
            'name' => 'facebook'
        ]);
        DB::table('social_types')->insert([
            'name' => 'linkedin'
        ]);
        DB::table('social_types')->insert([
            'name' => 'tiktok'
        ]);
        DB::table('social_types')->insert([
            'name' => 'youtube'
        ]);
        DB::table('social_types')->insert([
            'name' => 'whatsapp'
        ]);
        DB::table('social_types')->insert([
            'name' => 'wechat'
        ]);
        DB::table('social_types')->insert([
            'name' => 'twitter'
        ]);
        DB::table('social_types')->insert([
            'name' => 'google'
        ]);
        DB::table('social_types')->insert([
            'name' => 'qq'
        ]);
    }
}
