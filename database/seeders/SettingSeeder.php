<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'key' => 'site_name',
            'value' => 'Example Blog'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_description',
            'value' => "Let's write something great!"
        ]);
        DB::table('settings')->insert([
            'key' => 'menu_1',
            'value' => null
        ]);
        DB::table('settings')->insert([
            'key' => 'menu_2',
            'value' => null
        ]);
        DB::table('settings')->insert([
            'key' => 'menu_3',
            'value' => null
        ]);
        DB::table('settings')->insert([
            'key' => 'menu_4',
            'value' => null
        ]);
    }
}
