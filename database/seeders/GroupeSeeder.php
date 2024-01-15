<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groupes')->insert([
            ['name' => 'Utilisateur', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Role', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'System Language', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Paramètres', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Tableau de bord', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Voiture', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
