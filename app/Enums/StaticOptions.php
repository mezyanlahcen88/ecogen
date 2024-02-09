<?php

namespace App\Enums;

/**
 * Final Class
 * Réccupération des options statiques du projet
 */

final class StaticOptions
{

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
        'Bon d\'achat'=>'Bon d\'achat',
        'Carte bancaire'=>'Carte bancaire',
        'Avoir'=>'Avoir',
        'Garantie'=>'Garantie',
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

    const STOCK_METHODS = [
        'CMUP'=>'CMUP',
        'FIFO'=>'FIFO',
        'LIFO'=>'LIFO',
    ];

    const DEVIS_STATUS = [
        'En attente'=>'En attente',
        'Validé'=>'Validé',
        'Rejeté'=>'Rejeté',
    ];

    const COMMAND_STATUS = [
        'En attente'=>'En attente',
        'Validé'=>'Validé',
    ];

    const CAR_DOCUMENTS = [
        'CARTE GRISE'=>'CARTE GRISE',
        'ASSURANCE'=>'ASSURANCE',
        'TAXE'=>'TAXE',
        'LA VISTE'=>'LA VISTE',
        'CARNET DE CIRCULATION'=>'CARNET DE CIRCULATION',
        'CARNET DE METROLOGIQUE'=>'CARNET DE METROLOGIQUE',
        'ATTESTATION ASSURANCE'=>'ATTESTATION ASSURANCE',
    ];

    const TRANCHES = [
        '1ER TRANCHE'=>'1ER TRANCHE',
        '2EME TRANCHE'=>'2EME TRANCHE',
        '3EME TRANCHE'=>'3EME TRANCHE',
        '4EME TRANCHE'=>'4EME TRANCHE',
    ];

    const ETATS = [
        'OUVERT' => "OUVERT",
        'FERME' => "FERME",
    ];
}
