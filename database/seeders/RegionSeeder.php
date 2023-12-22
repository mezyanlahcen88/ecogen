<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\{name};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            ['name' => 'Tanger-Tétouan-Al Hoceïma', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'l\'Oriental', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Fès-Meknès', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Rabat-Salé-Kénitra', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Béni Mellal-Khénifra', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Casablanca-Settat', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Marrakech-Safi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Drâa-Tafilalet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Souss-Massa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Guelmim-Oued Noun', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Laâyoune-Sakia El Hamra', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Dakhla-Oued Ed Dahab', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
