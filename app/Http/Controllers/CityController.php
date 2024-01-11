<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cities.cities');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $object = new City();
        $object->name = $request->name;
        $object->state_id = $request->state_id;
        $object->country_id = $request->country_id;
        $object->save();
        storeSidebar();
        Alert()->success(trans('translation.general_general_super'), trans('translation.city_message_store'));
        return redirect()->back();
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $object = City::findOrFail($id);
        $parent = State::findOrFail($object->state_id);

        $view =  view('cities.form_edit' ,compact('object','parent'))->render();
        return response()->json(['html' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $object = City::findOrFail($request->city_id);
        $object->name = $request->name;
        $object->save();
        Alert()->success(trans('translation.general_general_super'), trans('translation.city_message_update'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = City::findOrFail($request->id);
        $object->delete();
        storeSidebar();
    }

    public function cities($id){
          $parent = State::findOrFail($id);
          $objects = City::whereState_id($id)
          ->select('id','name')
          ->get();
          return view('cities.index',compact('objects','parent'));
    }
}
