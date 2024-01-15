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
            SecteursTableSeeder::class,
            ProfessionSeeder::class,
            NumerotationSeeder::class,
            ExerciceSeeder::class,
            WarehouseSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
        ]);

        $this->call(SecteursTableSeeder::class);
    }
}
