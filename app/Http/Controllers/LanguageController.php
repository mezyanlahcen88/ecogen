<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreLanguageRequest;
use App\Models\Language;
use App\Models\LanguageTranslate;
use Database\Seeders\LanguageTranslateSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
class LanguageController extends Controller
{
    function __construct() {
        $this->middleware('permission:user-list|user-create|user-edit|user-show|user-delete', ['only'=> ['index']]);
        $this->middleware('permission:user-create', ['only'=> ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only'=> ['edit', 'update']]);
        $this->middleware('permission:user-show', ['only'=> ['show']]);
        $this->middleware('permission:user-delete', ['only'=> ['destroy']]);
        $this->middleware('auth');
    }

    
    public function index()
    {
        $objects = Language::orderBy('status', 'desc')
            ->orderBy('isDefault', 'desc')
            ->where('visible',1)
            ->get();
        return view('languages.index', compact('objects'));
    }
    public function manageLanguage()
    {
        $objects = Language::orderBy('status', 'desc')
            ->orderBy('isDefault', 'desc')
            ->take(3)->get();
        return view('languages.manage', compact('objects'));
    }
    public function create()
    {
       return view('languages.create');
    }
    public function store(StoreLanguageRequest $request)
    {
        $validated = $request->validated();
        $lang = new Language();
        $lang->name = $request->name;
        $lang->locale = $request->locale;
        $lang->direction = $request->direction;
        $lang->flag_path = $request->locale . '.png';
        $lang->save();
        storeSidebar();
        $seed = new LanguageTranslateSeeder();
        $seed->run($lang->id);
        Alert()->success('Super', 'Language à été crée avec succée');
        return redirect()->route('systemLanguages.index');
    }
    public function edit($id)
    {
       $object = Language::findOrFail($id);
       return view('languages.edit',compact('object'));
    }

    public function update(StoreLanguageRequest $request,$id)
    {
        $validated = $request->validated();
        $lang = Language::findOrFail($id);
        $lang->name = $request->name;
        $lang->locale = $request->locale;
        $lang->direction = $request->direction;
        $lang->flag_path = $request->locale . '.png';
        $lang->save();
        Alert()->success('Super', 'Language à été modifiée avec succée');
        return redirect()->route('systemLanguages.index');
    }

    public function destroy($id)
    {
        $object = Language::findOrFail($id)->delete();
        storeSidebar();
        alert()->success('Super', 'Language à été suprimée avec succée');
        return redirect()->route('languages.index');
    }


    public function translations($id){
        $count = LanguageTranslate::where('language_id',$id)->first();
        if(!$count){
          alert()->error('Error', 'you should to activate this language');
        return redirect()->back();
        }else{
              $objects = LanguageTranslate::where('language_id',$id)->get();
            //   return $objects;
        return view('languagetransations.index',compact('objects'));
        }
    }

    public function filterByKeyWord(Request $request,$id){
        $keyword = $request->keyword;
        $objects =  LanguageTranslate::where('language_id',$id)
        ->where(function ($query) use($keyword) {
            $query->where('label','like',"%".$keyword."%")
                  ->orWhere('translation','like',"%".$keyword."%");
        })->paginate(30)->withQueryString();
        return view('languagetransations.index',compact('objects','id'));
     }
    public function changeDefault(Request $request)
    {
        $oldDefault = Language::where('isDefault', 1)->first();
        $oldDefault->isDefault = 0;
        $oldDefault->save();
        $id = $request->id;
        $object = Language::findOrFail($id);
        $object->isDefault = 1;
        $object->save();
        //  add code to check if this language is active first
        return response()->json(['code' => 200, 'lang' => $object->name]);
    }
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Language::findOrFail($id);
        $object->status = !$object->status;
        $object->save();
        storeSidebar();
        $seed = new LanguageTranslateSeeder();
        $seed->run($id);
        return response()->json(['code' => 200, 'status' => $object->status, 'lang' => $object->name]);
    }
    public function setLocale($locale){
        App::setLocale($locale);
        Session::put('locale', $locale);
        return redirect()->back();
    }
    public function switchLang($lang)
    {
        // if (array_key_exists($lang, getLanguagesKeys())) {
            App::setLocale($lang);
            Session::put('applocale', $lang);
        // }
        return Redirect::back();
    }
}
