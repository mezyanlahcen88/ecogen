<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarDocument;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $setting = Setting::first();
        $car_documents = CarDocument::get();
        return view('dashboard',compact('setting','car_documents'));
    }
}
