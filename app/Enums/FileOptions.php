<?php

namespace App\Enums;

/**
 * Final Class
 * Réccupération des options statiques du projet
 */

final class FileOptions
{
    const PATH_DEFAULT  = 'public/images/defaults';
    const PATH_SETTINGS = 'public/images/settings';
    const PATH_USERS    = 'public/images/users';
    const PATH_PRODUCTS = 'public/images/products';


    const PREFIXES = [
        'logo'              => 'Logo',
        'email_logo'        => 'Email_Logo',
        'favorites_icon'    => 'Favoris_icon'
    ];
}