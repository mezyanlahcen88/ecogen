<?php

namespace App\Repositories;
use Dotenv\Dotenv;
use App\Models\Payment;
use App\Models\PaypalStrip;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use App\Models\PaymentSetting;
use App\Services\SettingService;
use Illuminate\Support\Facades\Env;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use App\InterfaceRepositories\InterfacePaymentSettingRepository;

class PaymentSettingRepository implements InterfacePaymentSettingRepository{


    private SettingService $settingService;
    public $staticOptions;

    protected $payments;

    public function __construct(StaticOptions $staticOptions,SettingService $settingService)
    {
        $this->settingService = $settingService;
        $this->staticOptions = $staticOptions;
    }

      public function editPaymentSetting(): ?PaymentSetting
    {
        $paymentSettings = PaymentSetting::firstOrFail();
        return $paymentSettings;
    }

    public function updatePaypalSetting($request,$id): void
    {
        $paymentSettings = $request->only(['paypal_client_id', 'paypal_secret','paypalIsActive','mode']);
        // $this->settingService->updatePaymentSettingsToJson($paymentSettings);
        $this->settingService->updatePaypalSettingsToDatabase($request,$id);

      }

    public function updateStripeSetting($request,$id): void
    {
        $paymentSettings = $request->only([ 'stripe_key', 'stripe_secret','stripeIsActive']);
        $envFilePath = base_path('.env');
        // $this->settingService->updatePaymentSettingsToJson($paymentSettings);
        $this->settingService->updateStripeSettingsToDatabase($request,$id);
    }

    // create Payment setting
    public function CreatePaymentSetting(){
    }


    // store Payment setting
    public function StorePaymentSetting($request){


    }



    // get Payment setting
    public function GetPaymentSetting($id){

    }





    // delete Payment setting
    public function DeletePaymentSetting($request,$id){
        $object = Payment::findOrFail($request->id)->delete();
    }




    // delete multiple Payment setting
    public function delete_all($request){


    }


}
