<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $object = new State();
        $object->name = $request->name;
        $object->country_id = $request->country_id;
        $object->save();
        storeSidebar();
        Alert()->success('Super', 'state  à été crée avec succée');
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $object = State::findOrFail($id);
        $parent = Country::findOrFail($object->country_id);
        $view =  view('states.form_edit', compact('object', 'parent'))->render();
        return response()->json(['html' => $view]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $object = State::findOrFail($request->state_id);
        $object->name = $request->name;
        $object->save();
        Alert()->success(trans('translation.general_general_super'), trans('translation.state_message_update'));

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = State::findOrFail($request->id);
        $object->delete();
        storeSidebar();

    }
}
