<?php

namespace App\Enums;

use App\Models\Email;
use App\Models\Country;
use App\Models\Category;
use App\Models\Language;
use App\Models\Supplier;
use App\Models\CategoryTranslate;
use App\Models\CompanyGroupe;
use App\Models\MainSupply;
use Spatie\Permission\Models\Role;
use App\Models\MainSupplyTranslate;
use App\Models\ManufacturerTranslate;
use App\Models\PaymentTermsTranslate;
use App\Models\PaymentMethodsTranslate;

/**
 * The UsedOptions class represents a set of options used in many controllers.
 *
 * This class provides a way to define and manage options that are utilized win many controllers,
 */

final class DynamicOptions
{

/**
 * Get the roles from the Role model.
 *
 * @return \Illuminate\Database\Eloquent\Collection The collection of roles.
 */
    public static function getRoles()
    {
        return Role::get();    }


/**
 * Get the Currencies.
 *
 * @return \Illuminate\Database\Eloquent\Collection The collection of Currencies.
 */

    public static function getCurrencies()
    {
        $pcs = Country::select('currency')
            ->distinct('currency')
            ->get();
        return  $pcs;
    }

/**
 * Get the  languages.
 *
 * @return \Illuminate\Database\Eloquent\Collection The collection of languages.
 */

 public static function getLanguages()
 {
    $languages = Language::active()
    ->get();
    return $languages;
 }






   /**
 * Get the  CompanyGroupes.
 *
 * @return \Illuminate\Database\Eloquent\Collection The collection of Company Groupes.
 */

//  public static function getCompanyGroupes()
//  {
//     $CompanyGroupes = CompanyGroupe::select('id','groupe_name')->get();
//     return $CompanyGroupes;
//  }



}
