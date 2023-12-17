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

    const ADDRESS_TYPE = [
        'SHIPPING_ADDRESS' => "SHIPPING_ADDRESS",
        'DELIVERY_ADDRESS' => "DELIVERY_ADDRESS"
    ];



    const MAILSERVICES = [
      'mailjet'=>'Mailjet',
      'php_mailer'=>'Php Mailer',
      'swift_mailer'=>'Swift Mailer',
    ];
    const MAILPROTOCOLS = [
        'smtp'=>'SMTP',
        'mail'=>'MAIL',
    ];
    const ENCRYPTIONS = [
        'tls'=>'TLS',
        'ssl'=>'SSL',
    ];

    const CUSTOMER_COMPANY = 'CUSTOMER_COMPANY';
    const CUSTOMER_PARTICULAR = 'CUSTOMER_PARTICULAR';

    const PICKUP_ADDRESS = 'PICKUP_ADDRESS';
    const DELIVERY_ADDRESS = 'DELIVERY_ADDRESS';

    const CUSTOMER_TYPE = [
        'company'=>'Company',
        'particular'=>'Particular',
        'guest'=>'Guest',
    ];
    const TYPES =[
        'company'=>'Company',
        'particular'=>'Particular',
    ];
}
