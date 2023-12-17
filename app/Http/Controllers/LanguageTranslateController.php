<?php

namespace App\Http\Controllers;

use App\Models\LanguageTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LanguageTranslateController extends Controller
{

    public function index()
    {
        $objects = LanguageTranslate::orderBy('id','asc')->paginate(30);
        return view('languagetransations.index',compact('objects'));
    }


    public function create()
    {
        return view('languagetransations.translation');
    }


    public function translate(Request $request){
        $id = $request->id;
        $toTranslate = LanguageTranslate::findOrFail($id);
        $toTranslate->translation = $request->value;
        $toTranslate->save();
        storeTranslaionToLang();
        return response()->json([
            'code'=>200,
            'label'=>$toTranslate->label,
        ]);
    }

    public function filterByLabel(Request $request,$id){

       $keyword = $request->keyword;
    //    $objects = LanguageTranslate::where('label','like',"%$keyword%")
    //    ->orWhere('translation','like',"%$keyword%")
    //    ->where('langauge_id',$id)
    //    ->paginate(30);
    $objects = LanguageTranslate::where(function ($query) use ($keyword) {
        $query->where('label', 'like', "%$keyword%");
        $query->orWhere('translation', 'like', "%$keyword%");
    })
    ->where('language_id', $id)
    ->paginate(30);
       return view('languagetransations.index',compact('objects'));
    }


}
