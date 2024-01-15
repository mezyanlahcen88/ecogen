<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercice;

class ExerciceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exercice::create([
            'id' => 'fb7a7118-7b76-4cad-ba47-af7536686998',
            'exercice' => '2023',
            'etat' => 'OUVERT',
            'obs' => '<p>2023</p>',
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
        ]);

    }
}
