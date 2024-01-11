<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Language;
use App\Models\Supplier;
use App\Models\EmailType;
use App\Models\MainSupply;
use App\Enums\StaticOptions;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\CompanyGroupe;
use App\Models\CategoryTranslate;
use App\Models\MainSupplyTranslate;
use App\Models\ManufacturerTranslate;
use App\Models\PaymentTermsTranslate;
use App\Models\PaymentMethodsTranslate;

class ReloadController extends Controller
{
    public $staticOptions;
    public function __construct(StaticOptions $staticOptions)
    {
        $this->staticOptions = $staticOptions;
    }
    public function getMainSupplies()
    {
        $mainSupplies = MainSupplyTranslate::where('language_id',1)->pluck('title','main_supply_id');
        return response()->json($mainSupplies);
    }

    public function getCountries()
    {
        $countries = Country::pluck('name','id');
        return response()->json($countries);
    }

    public function getManufacturers()
    {
        $manufacturers = ManufacturerTranslate::where('language_id',1)->pluck('title','manufacturer_id');
        return response()->json($manufacturers);
    }
    public function getCurrencies()
    {
        $currencies = Country::select('currency')->distinct('currency')->pluck('currency');

        return response()->json($currencies);
    }

    public function getPaymentMethods()
    {
        $paymentMethods = PaymentMethodsTranslate::where('language_id',1)->pluck('libelle','payment_method_id');
        return response()->json($paymentMethods);
    }
    public function getPaymentTerms()
    {
        $paymentTerms = PaymentTermsTranslate::where('language_id',1)->pluck('libelle','payment_term_id');
        return response()->json($paymentTerms);
    }

    public function getEmailTypes()
    {
        $emailType = EmailType::active()->pluck('libelle','id');
        return response()->json($emailType);
    }

    public function getcompanyGroupes()
    {
        $companyGr = CompanyGroupe::pluck('groupe_name','id');
        return response()->json($companyGr);
    }
    public function getLanguages()
    {
        $languages = Language::active()
        ->pluck('name','id');
        return response()->json($languages);
    }

    public function getSuppliers()
    {
        $suppliers = Supplier::pluck('company_name','id');
        return response()->json($suppliers);
    }
    public function getCategories()
    {
        $categories = CategoryTranslate::where('language_id',1)->pluck('title','category_id');
        return response()->json($categories);
    }

    public function getConditions()
    {
    $conditions = $this->staticOptions::CONDITIONS;
    return response()->json($conditions);


    }
}
