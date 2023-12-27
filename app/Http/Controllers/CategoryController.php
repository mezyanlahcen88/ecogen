<?php

namespace App\Http\Controllers;

use App\Dto\CategoryDto;
use App\Models\Category;
use App\Forms\CategoryForm;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StoreCategoryRequest;


class CategoryController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-show|category-delete', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-show', ['only' => ['show']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('permission:category-restore', ['only' => ['restore']]);
        $this->middleware('permission:category-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:category-forse-delete', ['only' => ['forseDelete']]);
        $this->staticOptions = $staticOptions;
        $this->crudService = $crudService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tableRows =(new Category())->getRowsTable();
        $objects = Category::with('category')->get();
        return view('categories.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Category::onlyTrashed()->get();
        $tableRows =(new Category())->getRowsTableTrashed();
        return view('categories.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Category();
        $categories = Category::where('parent_id',null)->pluck('name','id');
        $menus = $this->staticOptions::MENU;
        return view('categories.create',compact('categories','menus'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $object = new Category();
        $object->id = Str::uuid();
        $object->name = $request->name;
        $object->parent_id = $request->parent_id;
        $object->stockable = $request->stockable ? 1 : 0;
        $object->menu = $request->menu;
        // $object->active = $request->active;
        if($request->hasFile('picture')){
            dealWithPicture($request,$object,'picture', $request->name,'categories','store');
        }
        $object->save();

        return redirect()->route('categories.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = category::findOrfail($id);
        $categories = Category::pluck('name','id');
        $menus = $this->staticOptions::MENU;
        return view('categories.edit',compact('object','categories','menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request,string $id)
    {
        $validated = $request->validated();
        $object = Category::findOrFail($id);
        $object->name = $request->name;
        $object->parent_id = $request->parent_id;
        $object->menu = $request->menu;
        $object->stockable = $request->stockable ? 1 : 0;

        if($request->hasFile('picture')){
            dealWithPicture($request,$object,'picture', $request->name,'categories','update');
        }
        $object->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Category::findOrFail($request->id)->delete();

    }

            /**
     * Restore a soft-deleted user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Category::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('categories.index');
    }

    /**
     * Force delete a record permanently.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the record to force delete.
     * @return void
     */
    public function forceDelete(Request $request, $id)
    {

        $object = Category::withTrashed()->findOrFail($id);
        // deletePicture($object,'categories','picture');
        $object->forceDelete();
        // storeSidebar();
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
        $object = Category::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.category_message_active') : trans('translation.category_message_inactive');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }

    public function getSubCategories($id){
        $scategories = Category::where('parent_id', $id)->pluck('name', 'id');
        return response()->json($scategories);
    }
}
