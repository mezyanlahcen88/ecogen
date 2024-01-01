<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('settings')->insert([
            'option_name' => 'system_name',
            'option_value' => 'ECOGEN',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'title',
            'option_value' => 'App description',
        ]);
         DB::table('settings')->insert([
            'option_name' => 'address',
            'option_value' => 'Quartier el Wafaa II N° 5254 TEMARA',
        ]);

         DB::table('settings')->insert([
            'option_name' => 'phone',
            'option_value' => '+212 657 04 19 93',
        ]);

         DB::table('settings')->insert([
            'option_name' => 'email',
            'option_value' => 'Ecogen@gmail.com',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'picture',
            'option_value' => 'setting_picture.jpg',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'favorites_icon',
            'option_value' => 'favorites_icon.jpg',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'logo',
            'option_value' => 'logo.jpg',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'copyrigth',
            'option_value' => 'copyrigth',
        ]);


    }
}
