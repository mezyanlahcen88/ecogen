<?php

namespace App\InterfaceRepositories;

use App\Models\PaymentSetting;
use Illuminate\Http\RedirectResponse;


Interface InterfacePaymentSettingRepository{

    // get All Payment Setting
    public function editPaymentSetting(): ?PaymentSetting;

    // create Payment Setting
    public function CreatePaymentSetting();

    // store Payment Setting
    public function StorePaymentSetting($request);

    // get Payment Setting
    public function GetPaymentSetting($id);

    // update Paypal Setting
    public function updatePaypalSetting($request,$id): void;

    // update Stripe Setting
    public function updateStripeSetting($request,$id): void;


    // delete Payment Setting
 public function DeletePaymentSetting($request,$id);


    // delete multiple Payment Setting
    public function delete_all($request);

}


