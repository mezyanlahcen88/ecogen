<?php

namespace App\Services;

use App\Models\Setting;
use App\Enums\FileOptions;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;
use App\Models\SettingTranslate;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Service des settings
 */
class SettingService
{

    private FileService $fileService;

    public function __construct(FileService $fileService){
        $this->fileService = $fileService;
    }


    /**
     * Mise a jour des settings
     *
     * @param Request $request
     * @return boolean
     */
    public function updateSettings(Request $request, Setting $setting){

    }


function updatePersonnel(Request $request ,$id) {
            $settingTranslate = SettingTranslate::where('setting_id', $id)->first();
            $settingTranslate->app_name = $request->app_name;
            $settingTranslate->site_title = $request->site_title;
            $settingTranslate->homepage_title = $request->homepage_title;
            $settingTranslate->site_description = $request->site_description;
            $settingTranslate->keywords = $request->keywords;
            $settingTranslate->copyright = $request->copyright;
            $settingTranslate->about_footer = $request->about_footer;
            $settingTranslate->save();

            $setting = Setting::findOrFail($id);

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time() . '-' . 'logo' . '.' . $extension;
                $file->storeAs('public/images/settings', $newImageName);
                if ($setting->logo) {
                    Storage::delete('public/images/settings/' . $setting->logo);
                }
                $setting->logo = $newImageName;
            }

            if ($request->hasFile('email_logo')) {
                $file = $request->file('email_logo');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time() . '-' . 'email_logo' . '.' . $extension;
                $file->storeAs('public/images/settings', $newImageName);
                if ($setting->email_logo) {
                    Storage::delete('public/images/settings/' . $setting->email_logo);
                }
                $setting->email_logo = $newImageName;
            }

            if ($request->hasFile('favorites_icon')) {
                $file = $request->file('favorites_icon');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time() . '-' . 'favorites_icon' . '.' . $extension;
                $file->storeAs('public/images/settings', $newImageName);
                if ($setting->favorites_icon) {
                    Storage::delete('public/images/settings/' . $setting->favorites_icon);
                }
                $setting->favorites_icon = $newImageName;
            }

            if ($request->hasFile('signature')) {
                $file = $request->file('signature');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time() . '-' . 'signature' . '.' . $extension;
                $file->storeAs('public/images/settings', $newImageName);
                if ($setting->signature) {
                    Storage::delete('public/images/settings/' . $setting->signature);
                }
                $setting->signature = $newImageName;
            }
            $setting->save();

}
    function updateContact(Request $request ,$id){

        $settingTranslate = SettingTranslate::where('setting_id', $id)->first();
        $settingTranslate->contact_text = $request->contact_text;
        $settingTranslate->contact_address = $request->contact_address;
        $settingTranslate->save();
        $setting = Setting::first();
        $setting->contact_email = $request->contact_email;
        $setting->contact_phone = $request->contact_phone;
        $setting->save();
    }
    function updateSocialNetwork(Request $request) {
        $setting = Setting::first();
        $setting->facebook_url = $request->facebook_url;
        $setting->twitter_url = $request->twitter_url;
        $setting->instagram_url = $request->instagram_url;
        $setting->pinterest_url = $request->pinterest_url;
        $setting->linkedin_url = $request->linkedin_url;
        $setting->vk_url = $request->vk_url;
        $setting->whatsapp_url = $request->whatsapp_url;
        $setting->telegram_url = $request->telegram_url;
        $setting->youtube_url = $request->youtube_url;
        $setting->save();
    }
    function updateSender(Request $request) {
        $setting = Setting::first();
        $setting->sender_name = $request->sender_name;
        $setting->sender_email = $request->sender_email;
        $setting->save();
    }
    function updateEmailSetting(Request $request) {
        $setting = Setting::first();
            $setting->mail_service = $request->mail_service;
            $setting->api_key = $request->api_key;
            $setting->secret_key = $request->secret_key;
            $setting->mailjet_email_address = $request->mailjet_email_address;
            $setting->mail_protocol_php_mailer = $request->mail_protocol_php_mailer;
            $setting->encryption_php_mailer = $request->encryption_php_mailer;
            $setting->mail_host_php_mailer = $request->mail_host_php_mailer;
            $setting->mail_port_php_mailer = $request->mail_port_php_mailer;
            $setting->mail_username_php_mailer = $request->mail_username_php_mailer;
            $setting->mail_password_php_mailer = $request->mail_password_php_mailer;
            $setting->mail_protocol_swift_mailer = $request->mail_protocol_swift_mailer;
            $setting->encryption_swift_mailer = $request->encryption_swift_mailer;
            $setting->mail_host_swift_mailer = $request->mail_host_swift_mailer;
            $setting->mail_port_swift_mailer = $request->mail_port_swift_mailer;
            $setting->mail_username_swift_mailer = $request->mail_username_swift_mailer;
            $setting->mail_password_swift_mailer = $request->mail_password_swift_mailer;
            $setting->sender_name = $request->sender_name;
            $setting->sender_email = $request->sender_email;
            $setting->quote_sender_name = $request->quote_sender_name;
            $setting->quote_sender_email = $request->quote_sender_email;
            $setting->purchase_sender_name = $request->purchase_sender_name;
            $setting->purchase_sender_email = $request->purchase_sender_email;
            $setting->sourcing_sender_name = $request->sourcing_sender_name;
            $setting->sourcing_sender_email = $request->sourcing_sender_email;
            $setting->save();
            storeSetting();
    }


    //  function getPaymentSettingsFromJson()
    // {
    //     $file = base_path('paymentSetting.json');
    //     $contents = file_get_contents($file);
    //     return json_decode($contents, true);
    // }

    function getPaymentSettingsFromDataBase()
    {
        $paymentSettings = PaymentSetting::firstOrFail();
        return view('settings.edit', compact('paymentSettings'));

    }


    //  function updatePaymentSettingsToJson($paymentSettings)
    // {
    //     $file = base_path('paymentSetting.json');
    //     $contents = json_encode($paymentSettings, JSON_PRETTY_PRINT);
    //     file_put_contents($file, $contents);
    // }

     function updatePaypalSettingsToDatabase(Request $request,$id)
    {
        $paymentSettings = $request->only(['paypal_client_id', 'paypal_secret']);
        $paymentSettings['paypalIsActive'] = $request->has('paypalIsActive') ? 1 : 0;
        $paymentSettings['mode'] = $request->input('mode');
        $paymentSetting = PaymentSetting::firstOrFail();
        $paymentSetting->update($paymentSettings);
    }


     function updateStripeSettingsToDatabase(Request $request,$id)
    {


        $paymentSettings = $request->only(['stripe_key', 'stripe_secret']);
        $paymentSettings['stripeIsActive'] = $request->has('stripeIsActive') ? 1 : 0;
        $paymentSetting = PaymentSetting::firstOrFail();
        // dd($paymentSetting);
        $paymentSetting->update($paymentSettings);
    }



}
