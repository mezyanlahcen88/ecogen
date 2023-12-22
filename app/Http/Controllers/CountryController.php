<?php
namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = Country::orderBy('created_at', 'desc')->get();
        return view('countries.index', compact('objects'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new Country();
        $country->iso2 = $request->iso2;
        $country->name = $request->name;
        $country->currency = $request->currency;
        $country->currency_name = $request->currency_name;
        $country->currency_symbol = $request->currency_symbol;
        $country->tva = $request->tva;
        $country->statusTVA = 0;
        $country->save();
        storeSidebar();
        Alert()->success(trans('translation.general_general_super'), trans('translation.country_message_store'));
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $object = Country::findOrFail($id);
        $view = view('countries.form_edit', compact('object'))->render();
        return response()->json(['html' => $view]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $country = Country::findOrFail($request->id);
        $country->iso2 = $request->iso2;
        $country->name = $request->name;
        $country->currency = $request->currency;
        $country->currency_name = $request->currency_name;
        $country->currency_symbol = $request->currency_symbol;
        $country->tva = $request->tva;
        $country->save();
        Alert()->success(trans('translation.general_general_super'), trans('translation.country_message_update'));
        return redirect()->route('countries.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = Country::findOrFail($request->id);
        $object->delete();
        storeSidebar();
    }
    public function states($id)
    {
        $parent = Country::findOrFail($id);
        $objects = State::whereCountry_id($id)
            ->select('id', 'name')
            ->get();
        return view('states.index', compact('objects', 'parent'));
    }
    /**
     * Edit Form With Ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editForm($id)
    {
        $object = Country::findOrFail($id);
        $view = view('countries.form', compact('object'));
        return response()->json(['template' => $view]);
    }
    /**
     * Change the status (active/inactive) of a user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Country::findOrFail($id);
        $object->statusTVA = !$object->statusTVA;
        $object->save();
        return response()->json(['code' => 200, 'isactive' => $object->statusTVA]);
    }
    public function getStates($id)
    {
        $states = State::whereCountry_id($id)->pluck('name', 'id');
        return response()->json($states);
    }
    public function getCities($id)
    {
        $cities = City::where('state_id', $id)->pluck('name', 'id');
        return response()->json($cities);
    }
}
