<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }



    public function edit(Request $request){
    	$settings = Setting::all();
    	return view('settings.edit', compact('settings'));
    }

    public function update(Request $request){
    	 $validatedData = $request->validate([
        	'system_name' => 'required',
        	'title' => 'required',
        	'address' => 'required',
        	'phone' => 'required',
        	'email' => 'required|email',
            'picture' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5048|dimensions:max_width=300,max_height=100',

    	]);

           $allValues = $request->except('_token','_method');
           foreach($allValues as $key => $value){
	    	Setting::update_option($key, $value);
           }

        if($request->hasFile('picture')){
            $file= $request->file('picture');
            $extension=$file->getClientOriginalExtension();
            $newImageName=time()."-".".".$extension;
            $file->storeAs('public/images/settings',$newImageName );
            Setting::update_option('picture', $newImageName);
        }
        storeSetting();

        Alert()->success(trans('translation.general_general_super'), trans('translation.user_message_update'));
    	return to_route('settings.edit','update-system-settings');
    }




}
