<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Dto\ProductDto;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;
use App\Forms\ProductForm;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-show|product-delete', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-show', ['only' => ['show']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-restore', ['only' => ['restore']]);
        $this->middleware('permission:product-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:product-forse-delete', ['only' => ['forseDelete']]);
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
        $tableRows = (new Product())->getRowsTable();
        $objects = Product::get();
        return view('products.index', compact('tableRows', 'objects'));
    }

    public function getProductsJson()
    {
        $products = Product::with('category')->with('scategory');
        return Datatables($products)

        // ->filterColumn('user.name' , function($query , $keyword){
        //     if(is_numeric($keyword)){
        //         $query->whereRelation('user','id', $keyword);
        //     }else{
        //         $query->whereRelation('user','name','LIKE',"%{$keyword}%");
        //     }
        // })
        ->filterColumn('archive' , function($query , $keyword){
            $query->where('archive', $keyword);
        })
        ->addIndexColumn()
        ->addColumn('archive' , function(Product $product){
            return '<span class="badge ' . (!$product->archive ? 'bg-danger' : 'bg-success') . ' text-uppercase">' . ($product->archive ? 'Archive' : 'Inarchive') . '</span>
             ';
        })
        ->addColumn('actions', function (Product $object) {
            return view('products.actions', compact('object'));
        })
        ->rawColumns(['archive','actions'])
        ->editColumn('created_at','{{\Carbon\Carbon::parse($created_at)->format("d/m/Y")}}')
        ->editColumn('picture',function (Product $object) {
            return view('products.image', compact('object'));
         })
        ->setRowAttr(['align'=>'center'])
        ->make(true);
    }

    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Product::onlyTrashed()->get();
        $tableRows = (new Product())->getRowsTableTrashed();
        return view('products.trashedIndex', compact('tableRows', 'objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Product();
        $categories = Category::where('parent_id',null)->pluck('name','id');
        $scategories = Category::where('parent_id','!=',null)->pluck('name','id');
        $brands = Brand::pluck('name','id');
        $warehouses = Warehouse::pluck('name','id');
        $units = $this->staticOptions::UNITS;
        $stock_methods = $this->staticOptions::STOCK_METHODS;
        return view('products.create', compact('categories','scategories','brands','units','warehouses','stock_methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreProductRequest $request)
    public function store(Request $request)
    {
        // $validated = $request->validated();
        // dd($request->all());
        $object = new Product();
        $object->id = Str::uuid();
        $object->product_code = $request->product_code;
        $object->name_fr = $request->name_fr;
        $object->name_ar = $request->name_ar;
        $object->category_id = $request->category_id;
        $object->scategory_id = $request->scategory_id;
        $object->buy_price = $request->buy_price;
        $object->price_unit = $request->price_unit;
        $object->price_gros = $request->price_gros;
        $object->price_reseller = $request->price_reseller;
        $object->latest_price = $request->latest_price;
        $object->remise = $request->remise;
        $object->tva = $request->tva;
        $object->min_stock = $request->min_stock;
        $object->unite = $request->unite;
        $object->warehouse_id = $request->warehouse_id;
        $object->bar_code = $request->bar_code;
        // $object->stockable = $request->stockable;
        $object->created_by = Auth::id();
        $object->stock_methode = 'CMUP';
        // $object->archive = 0;
        $object->brand_id = $request->brand_id;
        $object->created_at = $request->created_at;
        $object->updated_at = \Carbon\Carbon::now();
        if($request->hasFile('picture')){
            dealWithPicture($request,$object,'picture', $request->name_fr,'products','store');
        }
        $object->save();
        if (strpos($request->product_code, getPrefix('Produit')) !== false) {
            incProduitNumerotation();
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = Product::findOrfail($id);
        $categories = Category::where('parent_id',null)->pluck('name','id');
        $scategories = Category::where('parent_id','!=',null)->pluck('name','id');
        $brands = Brand::pluck('name','id');
        $warehouses = Warehouse::pluck('name','id');
        $units = $this->staticOptions::UNITS;
        $stock_methods = $this->staticOptions::STOCK_METHODS;
        return view('products.edit', compact('object','categories','scategories','brands','units','warehouses','stock_methods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,string $id)
    {
        // $validated = $request->validated();
        // dd($request->all());
        $object = Product::findOrFail($id);
        $object->product_code = $request->product_code;
        $object->name_fr = $request->name_fr;
        $object->name_ar = $request->name_ar;
        $object->category_id = $request->category_id;
        $object->scategory_id = $request->scategory_id;
        $object->buy_price = $request->buy_price;
        $object->price_unit = $request->price_unit;
        $object->price_gros = $request->price_gros;
        $object->price_reseller = $request->price_reseller;
        $object->latest_price = $request->latest_price;
        $object->remise = $request->remise;
        $object->tva = $request->tva;
        $object->min_stock = $request->min_stock;
        $object->unite = $request->unite;
        $object->warehouse_id = $request->warehouse_id;
        $object->bar_code = $request->bar_code;
        // $object->stockable = $request->stockable;
        // $object->stock_methode = $request->stock_methode;
        // $object->archive = $request->archive;
        $object->brand_id = $request->brand_id;
        $object->created_at = $request->created_at;
        $object->updated_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        if($request->hasFile('picture')){
            dealWithPicture($request,$object,'picture', $request->name_fr,'products','update');
        }
        $object->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = Product::findOrFail($request->id)->delete();
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
        $object = Product::withTrashed()
            ->findOrFail($id)
            ->restore();
        // storeSidebar();
        return redirect()->route('products.index');
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
        $object = Product::withTrashed()->findOrFail($id);
        // deletePicture($object,'products','picture');
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
        $object = Product::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.product_message_activated') : trans('translation.product_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
    public function getLastPrice(Request $request){
        $id = $request->id;
        $product = Product::findOrFail($id);
        return response()->json($product);

    }
    public function getProduct(Request $request){
        $id = $request->id;
        $product = Product::findOrFail($id);
        return response()->json($product);

    }

}
