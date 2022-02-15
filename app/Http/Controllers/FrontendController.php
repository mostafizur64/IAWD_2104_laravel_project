<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Banner;
use App\Models\category;

class FrontendController extends Controller
{
    public function index()
    {
        $all_product = Product::all();
        $banner_data = Banner::all();
        $category_item = category::all();
        return view('welcome', compact('all_product', 'banner_data', 'category_item'));
    }
}
