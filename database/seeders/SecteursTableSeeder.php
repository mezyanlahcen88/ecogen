<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SecteursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('secteurs')->delete();

        \DB::table('secteurs')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Toute la ville',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => '2 Mars',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Aïn Borja',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Aïn Chock',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Aïn Diab',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Aïn Sebaâ',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Al Batha',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Al Fida',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Al Madina Aljadida',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Al Qods',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Alsace Lorraine',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Anfa',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Autre secteur',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Beauséjour',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Belvédère',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Ben Ejdia',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Ben M\'sick',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Benmsik',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'Bourgogne',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Bournazil',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'C.I.L',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'Californie',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'Casablanca Finance City',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'Centre Ville',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'Derb Ghallef',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            25 =>
            array (
                'id' => 26,
                'name' => 'Derb Omar',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            26 =>
            array (
                'id' => 27,
                'name' => 'El Manar El Hank',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            27 =>
            array (
                'id' => 28,
                'name' => 'Ferme Bretone',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            28 =>
            array (
                'id' => 29,
                'name' => 'Florida',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            29 =>
            array (
                'id' => 30,
                'name' => 'Fonciere',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            30 =>
            array (
                'id' => 31,
                'name' => 'Gauthier',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            31 =>
            array (
                'id' => 32,
                'name' => 'Habous',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            32 =>
            array (
                'id' => 33,
                'name' => 'Hay Al Amal',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            33 =>
            array (
                'id' => 34,
                'name' => 'Hay Albaraka',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            34 =>
            array (
                'id' => 35,
                'name' => 'Hay Alfalah',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            35 =>
            array (
                'id' => 36,
                'name' => 'Hay Almassira 1',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            36 =>
            array (
                'id' => 37,
                'name' => 'Hay Almassira 2',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            37 =>
            array (
                'id' => 38,
                'name' => 'Hay Almassira 3',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            38 =>
            array (
                'id' => 39,
                'name' => 'Hay Hana',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            39 =>
            array (
                'id' => 40,
                'name' => 'Hay Hassani',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            40 =>
            array (
                'id' => 41,
                'name' => 'Hay Inara',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            41 =>
            array (
                'id' => 42,
                'name' => 'Hay Laymouna',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            42 =>
            array (
                'id' => 43,
                'name' => 'Hay M\'barka',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            43 =>
            array (
                'id' => 44,
                'name' => 'Hay Mansour',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            44 =>
            array (
                'id' => 45,
                'name' => 'Hay Mohammadi',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            45 =>
            array (
                'id' => 46,
                'name' => 'Hay Moulay Rachid',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            46 =>
            array (
                'id' => 47,
                'name' => 'Hay Moulay Rachid 1',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            47 =>
            array (
                'id' => 48,
                'name' => 'Hay Moulay Rachid 2',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            48 =>
            array (
                'id' => 49,
                'name' => 'Hay Moulay Rachid 3',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            49 =>
            array (
                'id' => 50,
                'name' => 'Hay Moulay Rachid 4',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            50 =>
            array (
                'id' => 51,
                'name' => 'Hay Moulay Rachid 5',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            51 =>
            array (
                'id' => 52,
                'name' => 'Hay Moulay Rachid 6',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            52 =>
            array (
                'id' => 53,
                'name' => 'Hay Rajaa',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            53 =>
            array (
                'id' => 54,
                'name' => 'Hay Sadri',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            54 =>
            array (
                'id' => 55,
                'name' => 'Hay Tarik',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            55 =>
            array (
                'id' => 56,
                'name' => 'Hermitage',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            56 =>
            array (
                'id' => 57,
                'name' => 'Hippodrome',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            57 =>
            array (
                'id' => 58,
                'name' => 'Hôrloge',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            58 =>
            array (
                'id' => 59,
                'name' => 'Industriel Nord',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            59 =>
            array (
                'id' => 60,
                'name' => 'La Gare',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            60 =>
            array (
                'id' => 61,
                'name' => 'La Gironde',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            61 =>
            array (
                'id' => 62,
                'name' => 'Laimoune',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            62 =>
            array (
                'id' => 63,
                'name' => 'Les Camps',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            63 =>
            array (
                'id' => 64,
                'name' => 'Les Cretes',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            64 =>
            array (
                'id' => 65,
                'name' => 'Les Princesses',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            65 =>
            array (
                'id' => 66,
                'name' => 'Lissasfa',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            66 =>
            array (
                'id' => 67,
                'name' => 'Longchamps',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            67 =>
            array (
                'id' => 68,
                'name' => 'Lusitania',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            68 =>
            array (
                'id' => 69,
                'name' => 'Maarif',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            69 =>
            array (
                'id' => 70,
                'name' => 'Mers Sultan',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            70 =>
            array (
                'id' => 71,
                'name' => 'Oasis',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            71 =>
            array (
                'id' => 72,
                'name' => 'Oulfa',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            72 =>
            array (
                'id' => 73,
                'name' => 'Palmier',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            73 =>
            array (
                'id' => 74,
                'name' => 'Parc',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            74 =>
            array (
                'id' => 75,
                'name' => 'Polo',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            75 =>
            array (
                'id' => 76,
                'name' => 'Quartier des Hôpitaux',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            76 =>
            array (
                'id' => 77,
                'name' => 'Racine',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            77 =>
            array (
                'id' => 78,
                'name' => 'Riviera',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            78 =>
            array (
                'id' => 79,
                'name' => 'Roches Noires',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            79 =>
            array (
                'id' => 80,
                'name' => 'Route d\'Azemmour',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            80 =>
            array (
                'id' => 81,
                'name' => 'Route d\'El Jadida',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            81 =>
            array (
                'id' => 82,
                'name' => 'Sbata',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            82 =>
            array (
                'id' => 83,
                'name' => 'Sidi Belyout',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            83 =>
            array (
                'id' => 84,
                'name' => 'Sidi Bernoussi',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            84 =>
            array (
                'id' => 85,
                'name' => 'Sidi Maarouf',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            85 =>
            array (
                'id' => 86,
                'name' => 'Sidi Moumen',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            86 =>
            array (
                'id' => 87,
                'name' => 'Sidi Othmane',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            87 =>
            array (
                'id' => 88,
                'name' => 'Sour Jdid',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            88 =>
            array (
                'id' => 89,
                'name' => 'Tantonville',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            89 =>
            array (
                'id' => 90,
                'name' => 'Triangle d\'Or',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            90 =>
            array (
                'id' => 91,
                'name' => 'Val d\'Anfa',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            91 =>
            array (
                'id' => 92,
                'name' => 'Val Fleuri',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            92 =>
            array (
                'id' => 93,
                'name' => 'Zone Industrielle',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            93 =>
            array (
                'id' => 94,
                'name' => 'Zone Industrielle Moulay Rachid',
                'ville_id' => 4,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            94 =>
            array (
                'id' => 95,
                'name' => 'Aakkari',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            95 =>
            array (
                'id' => 96,
                'name' => 'Abi Ragrag',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            96 =>
            array (
                'id' => 97,
                'name' => 'Agdal',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            97 =>
            array (
                'id' => 98,
                'name' => 'Al Irfane',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            98 =>
            array (
                'id' => 99,
                'name' => 'Autre secteur',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            99 =>
            array (
                'id' => 100,
                'name' => 'Aviation',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            100 =>
            array (
                'id' => 101,
                'name' => 'Aviation - Mabella',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            101 =>
            array (
                'id' => 102,
                'name' => 'Diour Jamaa',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            102 =>
            array (
                'id' => 103,
                'name' => 'Douar el Hajja',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            103 =>
            array (
                'id' => 104,
                'name' => 'El Youssoufia',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            104 =>
            array (
                'id' => 105,
                'name' => 'Guich Oudaya',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            105 =>
            array (
                'id' => 106,
                'name' => 'Hassan',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            106 =>
            array (
                'id' => 107,
                'name' => 'Haut Agdal',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            107 =>
            array (
                'id' => 108,
                'name' => 'Hay Al Farah',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            108 =>
            array (
                'id' => 109,
                'name' => 'Hay Arrachad',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            109 =>
            array (
                'id' => 110,
                'name' => 'Hay el Fath',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            110 =>
            array (
                'id' => 111,
                'name' => 'Hay Nahda',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            111 =>
            array (
                'id' => 112,
                'name' => 'Hay Riad',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            112 =>
            array (
                'id' => 113,
                'name' => 'Les Ambassadeurs',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            113 =>
            array (
                'id' => 114,
                'name' => 'Les Orangers',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            114 =>
            array (
                'id' => 115,
                'name' => 'Les Oudayas',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            115 =>
            array (
                'id' => 116,
                'name' => 'Mabella',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            116 =>
            array (
                'id' => 117,
                'name' => 'Massira',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            117 =>
            array (
                'id' => 118,
                'name' => 'Mechouar',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            118 =>
            array (
                'id' => 119,
                'name' => 'Médina de Rabat',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            119 =>
            array (
                'id' => 120,
                'name' => 'Quartier de l\'Océan',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            120 =>
            array (
                'id' => 121,
                'name' => 'Riyad',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            121 =>
            array (
                'id' => 122,
                'name' => 'Riyad Extension',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            122 =>
            array (
                'id' => 123,
                'name' => 'Souissi',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            123 =>
            array (
                'id' => 124,
                'name' => 'Taqaddoum',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            124 =>
            array (
                'id' => 125,
                'name' => 'Yacoub El Mansour',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            125 =>
            array (
                'id' => 126,
                'name' => 'Youssoufia',
                'ville_id' => 242,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            126 =>
            array (
                'id' => 127,
                'name' => 'Toute la ville',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            127 =>
            array (
                'id' => 128,
                'name' => 'Abouab Sala',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            128 =>
            array (
                'id' => 129,
                'name' => 'Al Bassatine',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            129 =>
            array (
                'id' => 130,
                'name' => 'Al Mouahidine',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            130 =>
            array (
                'id' => 131,
                'name' => 'Al Moukataa',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            131 =>
            array (
                'id' => 132,
                'name' => 'Andalouss',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            132 =>
            array (
                'id' => 133,
                'name' => 'Annaim',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            133 =>
            array (
                'id' => 134,
                'name' => 'Bab Al Bahr',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            134 =>
            array (
                'id' => 135,
                'name' => 'Bab Sebta',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            135 =>
            array (
                'id' => 136,
                'name' => 'Bettana',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            136 =>
            array (
                'id' => 137,
                'name' => 'Bled El Gharbi',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            137 =>
            array (
                'id' => 138,
                'name' => 'Cherkaoui - Marzouka',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            138 =>
            array (
                'id' => 139,
                'name' => 'Cité Militaire',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            139 =>
            array (
                'id' => 140,
                'name' => 'Dar El Lhamra',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            140 =>
            array (
                'id' => 141,
                'name' => 'Dyour El ghaba',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            141 =>
            array (
                'id' => 142,
                'name' => 'Dyour Nejjar',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            142 =>
            array (
                'id' => 143,
                'name' => 'El Qaria',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            143 =>
            array (
                'id' => 144,
                'name' => 'Frougui',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            144 =>
            array (
                'id' => 145,
                'name' => 'Ghrablia',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            145 =>
            array (
                'id' => 146,
                'name' => 'Hay Alqods',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            146 =>
            array (
                'id' => 147,
                'name' => 'Hay Cheikh Lamfadel',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            147 =>
            array (
                'id' => 148,
                'name' => 'Hay Chmaou',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            148 =>
            array (
                'id' => 149,
                'name' => 'Hay Inbiat',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            149 =>
            array (
                'id' => 150,
                'name' => 'Hay Karima',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            150 =>
            array (
                'id' => 151,
                'name' => 'Hay Moulay Ismail',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            151 =>
            array (
                'id' => 152,
                'name' => 'Hay Oued Dahab',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            152 =>
            array (
                'id' => 153,
                'name' => 'Hay Rahma',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            153 =>
            array (
                'id' => 154,
                'name' => 'Hay Salam',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            154 =>
            array (
                'id' => 155,
                'name' => 'Horria',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            155 =>
            array (
                'id' => 156,
                'name' => 'Inbiaat',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            156 =>
            array (
                'id' => 157,
                'name' => 'Kharouba',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            157 =>
            array (
                'id' => 158,
                'name' => 'Lakhmis',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            158 =>
            array (
                'id' => 159,
                'name' => 'Lalla Aicha',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            159 =>
            array (
                'id' => 160,
                'name' => 'Lharya',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            160 =>
            array (
                'id' => 161,
                'name' => 'Medina',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            161 =>
            array (
                'id' => 162,
                'name' => 'Mkinssia',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            162 =>
            array (
                'id' => 163,
                'name' => 'Omar',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            163 =>
            array (
                'id' => 164,
                'name' => 'Ouled Moussa',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            164 =>
            array (
                'id' => 165,
                'name' => 'Pépinière',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            165 =>
            array (
                'id' => 166,
                'name' => 'Roustal',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            166 =>
            array (
                'id' => 167,
                'name' => 'Sakani',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            167 =>
            array (
                'id' => 168,
                'name' => 'Sala el Jadida',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            168 =>
            array (
                'id' => 169,
                'name' => 'Sidi Abdellah',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            169 =>
            array (
                'id' => 170,
                'name' => 'Sidi Hajji',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            170 =>
            array (
                'id' => 171,
                'name' => 'Tabriquet',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            171 =>
            array (
                'id' => 172,
                'name' => 'Technopolis',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            172 =>
            array (
                'id' => 173,
                'name' => 'Zone Industrielle Hay Arrahma',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            173 =>
            array (
                'id' => 174,
                'name' => 'Zone Industrielle Saniat Sbihi',
                'ville_id' => 243,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            174 =>
            array (
                'id' => 175,
                'name' => 'Toute la ville',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            175 =>
            array (
                'id' => 176,
                'name' => 'Abbadi',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            176 =>
            array (
                'id' => 177,
                'name' => 'Abbadi Braika',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            177 =>
            array (
                'id' => 178,
                'name' => 'Abi Horaira',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            178 =>
            array (
                'id' => 179,
                'name' => 'Ain Atig',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            179 =>
            array (
                'id' => 180,
                'name' => 'Al Moustakbal',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            180 =>
            array (
                'id' => 181,
                'name' => 'Andalousse',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            181 =>
            array (
                'id' => 182,
                'name' => 'Autre secteur',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            182 =>
            array (
                'id' => 183,
                'name' => 'Centre Ville',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            183 =>
            array (
                'id' => 184,
                'name' => 'Cigali Cigalon',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            184 =>
            array (
                'id' => 185,
                'name' => 'Comatrav',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            185 =>
            array (
                'id' => 186,
                'name' => 'Contrebandier',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            186 =>
            array (
                'id' => 187,
                'name' => 'Derb Askar',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            187 =>
            array (
                'id' => 188,
                'name' => 'Derb Belmekki',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            188 =>
            array (
                'id' => 189,
                'name' => 'Derb Jdid',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            189 =>
            array (
                'id' => 190,
                'name' => 'Derb Sahraoua',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            190 =>
            array (
                'id' => 191,
                'name' => 'Derd Bennaceur',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            191 =>
            array (
                'id' => 192,
                'name' => 'Douar si lamine',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            192 =>
            array (
                'id' => 193,
                'name' => 'Fadlallah',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            193 =>
            array (
                'id' => 194,
                'name' => 'Fadli',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            194 =>
            array (
                'id' => 195,
                'name' => 'Fath el Kheir',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            195 =>
            array (
                'id' => 196,
                'name' => 'Firdaouss',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            196 =>
            array (
                'id' => 197,
                'name' => 'Harhoura',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            197 =>
            array (
                'id' => 198,
                'name' => 'Hirafiyines',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            198 =>
            array (
                'id' => 199,
                'name' => 'Hoda',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            199 =>
            array (
                'id' => 200,
                'name' => 'Ittihad Arabi',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            200 =>
            array (
                'id' => 201,
                'name' => 'Khalota',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            201 =>
            array (
                'id' => 202,
                'name' => 'Lamnassir',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            202 =>
            array (
                'id' => 203,
                'name' => 'Lazrak',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            203 =>
            array (
                'id' => 204,
                'name' => 'Lazrek Nemsia',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            204 =>
            array (
                'id' => 205,
                'name' => 'Madwaz',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            205 =>
            array (
                'id' => 206,
                'name' => 'Maghreb Arabi',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            206 =>
            array (
                'id' => 207,
                'name' => 'Masrou 1',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            207 =>
            array (
                'id' => 208,
                'name' => 'Massira',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            208 =>
            array (
                'id' => 209,
                'name' => 'Massira 1',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            209 =>
            array (
                'id' => 210,
                'name' => 'Massira 2',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            210 =>
            array (
                'id' => 211,
                'name' => 'Massira 3',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            211 =>
            array (
                'id' => 212,
                'name' => 'Messrour 2',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            212 =>
            array (
                'id' => 213,
                'name' => 'Mkitaa',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            213 =>
            array (
                'id' => 214,
                'name' => 'Nahda-1',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            214 =>
            array (
                'id' => 215,
                'name' => 'Nahda-2',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            215 =>
            array (
                'id' => 216,
                'name' => 'Nemsia',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            216 =>
            array (
                'id' => 217,
                'name' => 'Oued Eddahab',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            217 =>
            array (
                'id' => 218,
                'name' => 'Oulad Ogba',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            218 =>
            array (
                'id' => 219,
                'name' => 'Riad Oulad Mtaa',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            219 =>
            array (
                'id' => 220,
                'name' => 'Sable d\'or',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            220 =>
            array (
                'id' => 221,
                'name' => 'Sidi Mohamed Cherif',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            221 =>
            array (
                'id' => 222,
                'name' => 'Skikina',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            222 =>
            array (
                'id' => 223,
                'name' => 'Talaa',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            223 =>
            array (
                'id' => 224,
                'name' => 'Temara Plage',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            224 =>
            array (
                'id' => 225,
                'name' => 'Val d\'or',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            225 =>
            array (
                'id' => 226,
                'name' => 'Wifak',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            226 =>
            array (
                'id' => 227,
                'name' => 'Wufac Erac',
                'ville_id' => 253,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            227 =>
            array (
                'id' => 228,
                'name' => 'Toute la ville',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            228 =>
            array (
                'id' => 229,
                'name' => 'Ain el Hayat',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            229 =>
            array (
                'id' => 230,
                'name' => 'Ain Errouz',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            230 =>
            array (
                'id' => 231,
                'name' => 'Ain Laatris',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            231 =>
            array (
                'id' => 232,
                'name' => 'Al fath',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            232 =>
            array (
                'id' => 233,
                'name' => 'Autre secteur',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            233 =>
            array (
                'id' => 234,
                'name' => 'Belkhir',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            234 =>
            array (
                'id' => 235,
                'name' => 'Imarat',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            235 =>
            array (
                'id' => 236,
                'name' => 'Kasbah',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            236 =>
            array (
                'id' => 237,
                'name' => 'Plage rose marae',
                'ville_id' => 251,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            237 =>
            array (
                'id' => 238,
                'name' => 'Toute la ville',
                'ville_id' => 15,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            238 =>
            array (
                'id' => 239,
                'name' => 'Al Kawtar',
                'ville_id' => 15,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            239 =>
            array (
                'id' => 240,
                'name' => 'Autre secteur',
                'ville_id' => 15,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            240 =>
            array (
                'id' => 241,
                'name' => 'Hamza',
                'ville_id' => 15,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            241 =>
            array (
                'id' => 242,
                'name' => 'Plage Oued Cherrat',
                'ville_id' => 15,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            242 =>
            array (
                'id' => 243,
                'name' => 'Quartier Industriel',
                'ville_id' => 15,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            243 =>
            array (
                'id' => 244,
                'name' => 'Toute la ville',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            244 =>
            array (
                'id' => 245,
                'name' => 'Al Qods',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            245 =>
            array (
                'id' => 246,
                'name' => 'Amal',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            246 =>
            array (
                'id' => 247,
                'name' => 'Autre secteur',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            247 =>
            array (
                'id' => 248,
                'name' => 'Belle Vue',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            248 =>
            array (
                'id' => 249,
                'name' => 'Centre Ville',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            249 =>
            array (
                'id' => 250,
                'name' => 'Corniche',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            250 =>
            array (
                'id' => 251,
                'name' => 'Derb Bouchman',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            251 =>
            array (
                'id' => 252,
                'name' => 'Derb Jamila',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            252 =>
            array (
                'id' => 253,
                'name' => 'Derb Lfath',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            253 =>
            array (
                'id' => 254,
                'name' => 'Derb Marrakech',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            254 =>
            array (
                'id' => 255,
                'name' => 'Derb Meknes',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            255 =>
            array (
                'id' => 256,
                'name' => 'Derb Rbat',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            256 =>
            array (
                'id' => 257,
                'name' => 'Diour Dokala',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            257 =>
            array (
                'id' => 258,
                'name' => 'Diour Lakrai',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            258 =>
            array (
                'id' => 259,
                'name' => 'Diour Nicolas',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            259 =>
            array (
                'id' => 260,
                'name' => 'El Alia',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            260 =>
            array (
                'id' => 261,
                'name' => 'El Bradaa',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            261 =>
            array (
                'id' => 262,
                'name' => 'El Kasbah',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            262 =>
            array (
                'id' => 263,
                'name' => 'Hassania 1',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            263 =>
            array (
                'id' => 264,
                'name' => 'Hassania 2',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            264 =>
            array (
                'id' => 265,
                'name' => 'Hassania 3',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            265 =>
            array (
                'id' => 266,
                'name' => 'Hay Al Amal',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            266 =>
            array (
                'id' => 267,
                'name' => 'Hay Al Falah',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            267 =>
            array (
                'id' => 268,
                'name' => 'Hay Al Horria',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            268 =>
            array (
                'id' => 269,
                'name' => 'Hay Al Wahda',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            269 =>
            array (
                'id' => 270,
                'name' => 'Hay Annasr',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            270 =>
            array (
                'id' => 271,
                'name' => 'Hay Chabab',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            271 =>
            array (
                'id' => 272,
                'name' => 'Hay Essalama',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            272 =>
            array (
                'id' => 273,
                'name' => 'Hay Mesk Lil',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            273 =>
            array (
                'id' => 274,
                'name' => 'Hay saada',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            274 =>
            array (
                'id' => 275,
                'name' => 'Hay Salam',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            275 =>
            array (
                'id' => 276,
                'name' => 'Kasbah',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            276 =>
            array (
                'id' => 277,
                'name' => 'L\'habitat',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            277 =>
            array (
                'id' => 278,
                'name' => 'La Colline',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            278 =>
            array (
                'id' => 279,
                'name' => 'La Siesta',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            279 =>
            array (
                'id' => 280,
                'name' => 'Les Cretes',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            280 =>
            array (
                'id' => 281,
                'name' => 'Mimosas',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            281 =>
            array (
                'id' => 282,
                'name' => 'Monica',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            282 =>
            array (
                'id' => 283,
                'name' => 'Nassim',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            283 =>
            array (
                'id' => 284,
                'name' => 'Partie Est',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            284 =>
            array (
                'id' => 285,
                'name' => 'Port',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            285 =>
            array (
                'id' => 286,
                'name' => 'Quartier du Parc',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            286 =>
            array (
                'id' => 287,
                'name' => 'Quartier Du Soleil',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            287 =>
            array (
                'id' => 288,
                'name' => 'Rachidia',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            288 =>
            array (
                'id' => 289,
                'name' => 'Riad 1',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            289 =>
            array (
                'id' => 290,
                'name' => 'Riad 2',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            290 =>
            array (
                'id' => 291,
                'name' => 'Tenoukchet',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            291 =>
            array (
                'id' => 292,
                'name' => 'Wafa',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            292 =>
            array (
                'id' => 293,
                'name' => 'Yassmine',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            293 =>
            array (
                'id' => 294,
                'name' => 'Zone industrielle',
                'ville_id' => 6,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            294 =>
            array (
                'id' => 295,
                'name' => 'Toute la ville',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            295 =>
            array (
                'id' => 296,
                'name' => 'Ain Sebaa',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            296 =>
            array (
                'id' => 297,
                'name' => 'Al Alama',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            297 =>
            array (
                'id' => 298,
                'name' => 'Al Baladya',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            298 =>
            array (
                'id' => 299,
                'name' => 'Al Maghrib Al Arabi',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            299 =>
            array (
                'id' => 300,
                'name' => 'Assam',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            300 =>
            array (
                'id' => 301,
                'name' => 'Autre secteur',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            301 =>
            array (
                'id' => 302,
                'name' => 'Bab Fès',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            302 =>
            array (
                'id' => 303,
                'name' => 'Bir Anzarane',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            303 =>
            array (
                'id' => 304,
                'name' => 'Bir Rami',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            304 =>
            array (
                'id' => 305,
                'name' => 'Bir Rami Est',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            305 =>
            array (
                'id' => 306,
                'name' => 'Bir Rami Industriel',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            306 =>
            array (
                'id' => 307,
                'name' => 'Bir Rami Ouest',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            307 =>
            array (
                'id' => 308,
                'name' => 'Centre',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            308 =>
            array (
                'id' => 309,
                'name' => 'Corcica',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            309 =>
            array (
                'id' => 310,
                'name' => 'Diour 10000',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            310 =>
            array (
                'id' => 311,
                'name' => 'Diour Sniak',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            311 =>
            array (
                'id' => 312,
                'name' => 'El Assam',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            312 =>
            array (
                'id' => 313,
                'name' => 'El Haddada',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            313 =>
            array (
                'id' => 314,
                'name' => 'El Haouzia',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            314 =>
            array (
                'id' => 315,
                'name' => 'El Ismailia',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            315 =>
            array (
                'id' => 316,
                'name' => 'El Menzah',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            316 =>
            array (
                'id' => 317,
                'name' => 'Fouarate',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            317 =>
            array (
                'id' => 318,
                'name' => 'Inara',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            318 =>
            array (
                'id' => 319,
                'name' => 'Khabazat',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            319 =>
            array (
                'id' => 320,
                'name' => 'La Base',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            320 =>
            array (
                'id' => 321,
                'name' => 'La Cigogne',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            321 =>
            array (
                'id' => 322,
                'name' => 'La Cité',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            322 =>
            array (
                'id' => 323,
                'name' => 'La Ville Haute',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            323 =>
            array (
                'id' => 324,
                'name' => 'Maamora',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            324 =>
            array (
                'id' => 325,
                'name' => 'Mellah',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            325 =>
            array (
                'id' => 326,
                'name' => 'Mimosas',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            326 =>
            array (
                'id' => 327,
                'name' => 'Ouled M\'Barek',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            327 =>
            array (
                'id' => 328,
                'name' => 'Ouled Oujih',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            328 =>
            array (
                'id' => 329,
                'name' => 'PAM',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            329 =>
            array (
                'id' => 330,
                'name' => 'Quartier Al Fath',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            330 =>
            array (
                'id' => 331,
                'name' => 'Quartier Nahda',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            331 =>
            array (
                'id' => 332,
                'name' => 'Seyad',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            332 =>
            array (
                'id' => 333,
                'name' => 'Taïbia',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            333 =>
            array (
                'id' => 334,
                'name' => 'Val Fleury',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            334 =>
            array (
                'id' => 335,
                'name' => 'Village',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            335 =>
            array (
                'id' => 336,
                'name' => 'Port',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            336 =>
            array (
                'id' => 337,
                'name' => 'Quartier du Parc',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            337 =>
            array (
                'id' => 338,
                'name' => 'Quartier Du Soleil',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            338 =>
            array (
                'id' => 339,
                'name' => 'Rachidia',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            339 =>
            array (
                'id' => 340,
                'name' => 'Riad 1',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            340 =>
            array (
                'id' => 341,
                'name' => 'Riad 2',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            341 =>
            array (
                'id' => 342,
                'name' => 'Tenoukchet',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            342 =>
            array (
                'id' => 343,
                'name' => 'Wafa',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            343 =>
            array (
                'id' => 344,
                'name' => 'Yassmine',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            344 =>
            array (
                'id' => 345,
                'name' => 'Zone industrielle',
                'ville_id' => 79,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            345 =>
            array (
                'id' => 346,
                'name' => 'Toute la ville',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            346 =>
            array (
                'id' => 347,
                'name' => 'Ancienne Médina',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            347 =>
            array (
                'id' => 348,
                'name' => 'Autre secteur',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            348 =>
            array (
                'id' => 349,
                'name' => 'Bele Vue',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            349 =>
            array (
                'id' => 350,
                'name' => 'Ben Mohammed',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            350 =>
            array (
                'id' => 351,
                'name' => 'Berrima',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            351 =>
            array (
                'id' => 352,
                'name' => 'Bourj Moulay Omar',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            352 =>
            array (
                'id' => 353,
                'name' => 'Cité Impériale',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            353 =>
            array (
                'id' => 354,
                'name' => 'Dar Kebira',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            354 =>
            array (
                'id' => 355,
                'name' => 'El Bassatine',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            355 =>
            array (
                'id' => 356,
                'name' => 'El Mechouar Stinia',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            356 =>
            array (
                'id' => 357,
                'name' => 'Hamria',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            357 =>
            array (
                'id' => 358,
                'name' => 'Hay Salam',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            358 =>
            array (
                'id' => 359,
                'name' => 'Kasbat',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            359 =>
            array (
                'id' => 360,
                'name' => 'Khedrache',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            360 =>
            array (
                'id' => 361,
                'name' => 'La Hacienda',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            361 =>
            array (
                'id' => 362,
                'name' => 'Marjane 2',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            362 =>
            array (
                'id' => 363,
                'name' => 'Mèdina',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            363 =>
            array (
                'id' => 364,
                'name' => 'Nouveau Mellah',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            364 =>
            array (
                'id' => 365,
                'name' => 'Omar',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            365 =>
            array (
                'id' => 366,
                'name' => 'Riad Toulal',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            366 =>
            array (
                'id' => 367,
                'name' => 'Rouamzine',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            367 =>
            array (
                'id' => 368,
                'name' => 'Sbata',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            368 =>
            array (
                'id' => 369,
                'name' => 'Sidi Amar Hassini',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            369 =>
            array (
                'id' => 370,
                'name' => 'Sidi Bouzekri',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            370 =>
            array (
                'id' => 371,
                'name' => 'Sidi Said',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            371 =>
            array (
                'id' => 372,
                'name' => 'Ville Nouvelle',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            372 =>
            array (
                'id' => 373,
                'name' => 'Wislane',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            373 =>
            array (
                'id' => 374,
                'name' => 'Zerhounia',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            374 =>
            array (
                'id' => 375,
                'name' => 'Zitoune',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            375 =>
            array (
                'id' => 376,
                'name' => 'Mellah',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            376 =>
            array (
                'id' => 377,
                'name' => 'Mimosas',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            377 =>
            array (
                'id' => 378,
                'name' => 'Ouled M\'Barek',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            378 =>
            array (
                'id' => 379,
                'name' => 'Ouled Oujih',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            379 =>
            array (
                'id' => 380,
                'name' => 'PAM',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            380 =>
            array (
                'id' => 381,
                'name' => 'Quartier Al Fath',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            381 =>
            array (
                'id' => 382,
                'name' => 'Quartier Nahda',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            382 =>
            array (
                'id' => 383,
                'name' => 'Seyad',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            383 =>
            array (
                'id' => 384,
                'name' => 'Taïbia',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            384 =>
            array (
                'id' => 385,
                'name' => 'Val Fleury',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            385 =>
            array (
                'id' => 386,
                'name' => 'Village',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            386 =>
            array (
                'id' => 387,
                'name' => 'Port',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            387 =>
            array (
                'id' => 388,
                'name' => 'Quartier du Parc',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            388 =>
            array (
                'id' => 389,
                'name' => 'Quartier Du Soleil',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            389 =>
            array (
                'id' => 390,
                'name' => 'Rachidia',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            390 =>
            array (
                'id' => 391,
                'name' => 'Riad 1',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            391 =>
            array (
                'id' => 392,
                'name' => 'Riad 2',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            392 =>
            array (
                'id' => 393,
                'name' => 'Tenoukchet',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            393 =>
            array (
                'id' => 394,
                'name' => 'Wafa',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            394 =>
            array (
                'id' => 395,
                'name' => 'Yassmine',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            395 =>
            array (
                'id' => 396,
                'name' => 'Zone industrielle',
                'ville_id' => 140,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            396 =>
            array (
                'id' => 397,
                'name' => 'Toute la ville',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            397 =>
            array (
                'id' => 398,
                'name' => 'Aaouinat Hajjaj',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            398 =>
            array (
                'id' => 399,
                'name' => 'Agdal',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            399 =>
            array (
                'id' => 400,
                'name' => 'Ain Amiyer',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            400 =>
            array (
                'id' => 401,
                'name' => 'Ain Haroun',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            401 =>
            array (
                'id' => 402,
                'name' => 'Ain kadous',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            402 =>
            array (
                'id' => 403,
                'name' => 'Ain Noqbi',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            403 =>
            array (
                'id' => 404,
                'name' => 'Al Hadiqa',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            404 =>
            array (
                'id' => 405,
                'name' => 'Ancienne Médina',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            405 =>
            array (
                'id' => 406,
                'name' => 'Autre secteur',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            406 =>
            array (
                'id' => 407,
                'name' => 'Bad Boujloud',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            407 =>
            array (
                'id' => 408,
                'name' => 'Batha',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            408 =>
            array (
                'id' => 409,
                'name' => 'Belkhiat',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            409 =>
            array (
                'id' => 410,
                'name' => 'Ben Debbab',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            410 =>
            array (
                'id' => 411,
                'name' => 'Ben Souda',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            411 =>
            array (
                'id' => 412,
                'name' => 'Ben Zakour',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            412 =>
            array (
                'id' => 413,
                'name' => 'Boutaaa',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            413 =>
            array (
                'id' => 414,
                'name' => 'Centre',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            414 =>
            array (
                'id' => 415,
                'name' => 'Dar Dbibagh',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            415 =>
            array (
                'id' => 416,
                'name' => 'Dar Mehrez',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            416 =>
            array (
                'id' => 417,
                'name' => 'Dher Lkhmiss',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            417 =>
            array (
                'id' => 418,
                'name' => 'Douh',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            418 =>
            array (
                'id' => 419,
                'name' => 'El Keddan',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            419 =>
            array (
                'id' => 420,
                'name' => 'El Mokhfia',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            420 =>
            array (
                'id' => 421,
                'name' => 'Fes Jdid',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            421 =>
            array (
                'id' => 422,
                'name' => 'Fès Médina',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            422 =>
            array (
                'id' => 423,
                'name' => 'Hamria',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            423 =>
            array (
                'id' => 424,
                'name' => 'Hay Agadir',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            424 =>
            array (
                'id' => 425,
                'name' => 'Hay Atlas',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            425 =>
            array (
                'id' => 426,
                'name' => 'Hay Fadela',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            426 =>
            array (
                'id' => 427,
                'name' => 'Hay Hassani',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            427 =>
            array (
                'id' => 428,
                'name' => 'Hay Hassani',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            428 =>
            array (
                'id' => 429,
                'name' => 'Hay Mohammedi',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            429 =>
            array (
                'id' => 430,
                'name' => 'Hay Moulay Abdellah',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            430 =>
            array (
                'id' => 431,
                'name' => 'Hay Ouifak',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            431 =>
            array (
                'id' => 432,
                'name' => 'Hay Palestine',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            432 =>
            array (
                'id' => 433,
                'name' => 'Hay Riad',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            433 =>
            array (
                'id' => 434,
                'name' => 'Hay Saada',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            434 =>
            array (
                'id' => 435,
                'name' => 'Jnan El ward',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            435 =>
            array (
                'id' => 436,
                'name' => 'Jnane Eddar',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            436 =>
            array (
                'id' => 437,
                'name' => 'Laayoun',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            437 =>
            array (
                'id' => 438,
                'name' => 'Les Mérinides',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            438 =>
            array (
                'id' => 439,
                'name' => 'Lyrac',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            439 =>
            array (
                'id' => 440,
                'name' => 'Mechouar',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            440 =>
            array (
                'id' => 441,
                'name' => 'Mellah',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            441 =>
            array (
                'id' => 442,
                'name' => 'Mont fleuri',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            442 =>
            array (
                'id' => 443,
                'name' => 'Mont Fleuri 2',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            443 =>
            array (
                'id' => 444,
                'name' => 'Moulay Abdallah',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            444 =>
            array (
                'id' => 445,
                'name' => 'Mourabitine',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            445 =>
            array (
                'id' => 446,
                'name' => 'Narjis',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            446 =>
            array (
                'id' => 447,
                'name' => 'Oued Bou Fekhane',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            447 =>
            array (
                'id' => 448,
                'name' => 'Oued Fès',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            448 =>
            array (
                'id' => 449,
                'name' => 'Ouled Tayeb',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            449 =>
            array (
                'id' => 450,
                'name' => 'Place Alaouine',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            450 =>
            array (
                'id' => 451,
                'name' => 'Qasbat Ennouar',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            451 =>
            array (
                'id' => 452,
                'name' => 'Quartier Ben Slimane',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            452 =>
            array (
                'id' => 453,
                'name' => 'Rahbet Zbib',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            453 =>
            array (
                'id' => 454,
                'name' => 'Route Ain Chkaf',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            454 =>
            array (
                'id' => 455,
                'name' => 'Route d\'Aeroport',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            455 =>
            array (
                'id' => 456,
                'name' => 'Route d\'Immouzere',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            456 =>
            array (
                'id' => 457,
                'name' => 'Route de Meknes',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            457 =>
            array (
                'id' => 458,
                'name' => 'Route de Sefrou',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            458 =>
            array (
                'id' => 459,
                'name' => 'Saies',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            459 =>
            array (
                'id' => 460,
                'name' => 'Sehb El Ward',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            460 =>
            array (
                'id' => 461,
                'name' => 'Sehrij Gnawa',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            461 =>
            array (
                'id' => 462,
                'name' => 'Sidi Brahim',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            462 =>
            array (
                'id' => 463,
                'name' => 'Talaa',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            463 =>
            array (
                'id' => 464,
                'name' => 'Tghat',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            464 =>
            array (
                'id' => 465,
                'name' => 'Zekak Erroumane',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            465 =>
            array (
                'id' => 466,
                'name' => 'Zone Industrielle Sidi Brahim',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
            466 =>
            array (
                'id' => 467,
                'name' => 'Zouagha',
                'ville_id' => 58,
                'created_at' => '2023-09-13 15:25:42',
                'updated_at' => '2023-09-13 15:25:42',
                'deleted_at' => NULL,
            ),
        ));


    }
}
