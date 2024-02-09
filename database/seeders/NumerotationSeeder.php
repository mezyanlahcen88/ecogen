<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Numerotation;

class NumerotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Numerotation::create([
            'id' => 'fb7a7118-7b76-4cad-ba47-af7536686998',
            'doc_type' => 'Produit',
            'prefix' => 'PR-',
            'increment_num' => 2,
            'comments' => '<p>Produit</p>',
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
         ]);
         Numerotation::create([
            'id' => 'fb7a7118-7b76-4cad-ba47-af7536686300',
            'doc_type' => 'Founisseur',
            'prefix' => 'FR-',
            'increment_num' => 0,
            'comments' => '<p>Founisseur</p>',
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
         ]);
         Numerotation::create([
            'id' => 'fb7a7118-7b76-4cad-ba47-af7536686200',
            'doc_type' => 'Devis',
            'prefix' => 'DV-',
            'increment_num' => 0,
            'comments' => '<p>Devis</p>',
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
         ]);
         Numerotation::create([
            'id' => 'b706edbc-e91e-4e71-adf0-225f8428e38a',
            'doc_type' => 'Client',
            'prefix' => 'CL-',
            'increment_num' => 0,
            'comments' => '<p>Client</p>',
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
         ]);
         Numerotation::create([
            'id' => 'b706edbc-e91e-4e71-adf0-225f8428e67a',
            'doc_type' => 'Command',
            'prefix' => 'CMD-',
            'increment_num' => 0,
            'comments' => '<p>Command numerotation</p>',
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
         ]);
         Numerotation::create([
            'id' => 'b706edbc-e91e-4e71-adf0-225f8428e95f',
            'doc_type' => 'Reglement',
            'prefix' => 'REG-',
            'increment_num' => 0,
            'comments' => '<p>Reglement numerotation</p>',
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
         ]);
        //  Numerotation::create();

    }
}
