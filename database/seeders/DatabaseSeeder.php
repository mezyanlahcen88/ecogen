<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profession;
use Illuminate\Database\Seeder;
use App\Models\SettingTranslate;
use Database\Seeders\SettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguagesTableSeeder::class,
            GroupeSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            LanguageTranslateSeeder::class,
            SettingsSeeder::class,
            RegionSeeder::class,
            VilleSeeder::class,
            SecteurSeeder::class,
            ProfessionSeeder::class,
            CategorySeeder::class,
            ProfessionSeeder::class,
            ProfessionSeeder::class,
        ]);

    }
}
