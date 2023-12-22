<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\{name};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secteurs')->insert([
            ['name' => 'Secteur 1','ville_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Secteur 2','ville_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Secteur 3','ville_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        ]);
    }
}
