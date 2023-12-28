<?php

namespace App\Enums;

/**
 * Final Class
 * Réccupération des options statiques du projet
 */

final class StaticOptions
{

    const GENDER = [
        'mr' => "Mr",
        'mde' => "Mde",
        'mlle' => "Mlle",
    ];


    const PERMIS_TYPES =[
        'category_A'=>'Category A',
        'category_B'=>'Category B',
        'category_C'=>'Category C',
        'category_D'=>'Category D',
        'category_E'=>'Category E',
    ];

    const EXERCICE_ETATS =[
        'OUVERT'=>'OUVERT',
        'FERME'=>'FERME',

    ];

    const MENU =[
        'glovo'=>'GLOVO',
        'jumia'=>'JUMIA',
        'sur place'=>'SUR PLACE',
    ];

    const PARENT_TYPES =[
        'Client'=>'Client',
        'Fournisseur'=>'Fournisseur',
    ];

    const GARANTIES_TYPES =[
        'Espece'=>'Espece',
        'Cheque'=>'Cheque',
        'Virsement'=>'Virsement',
    ];

    const CLIENT_TYPES =[
        'Fidel'=>'Fidel',
        'Serieux'=>'Serieux',
        'Garantie'=>'Garantie',
    ];
    const UNITS =[
        'KG'=>'KG',
        'PIECE'=>'PIECE',
    ];

    const STOCK_METHODS =[
        'CMUP'=>'CMUP',
        'FIFO'=>'FIFO',
        'LIFO'=>'LIFO',
    ];

    const DEVIS_STATUS =[
        'En attente'=>'En attente',
        'Validé'=>'Validé',
        'Rejeté'=>'Rejeté',
    ];

}
