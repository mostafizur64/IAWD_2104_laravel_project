<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Product;
use Str;
use Carbon\Carbon;
use Image;
use App\Models\SubCategory;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $all_category = category::all();
        $all_subcategory = SubCategory::all();
        return view('product.create', compact('all_category', 'all_subcategory'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'old_price' => 'required|numeric',
            'product_image' => 'image',
        ]);
        //  str_replace(' ', '-', $request->product_name);

        $product_slug = Str::slug(Str::lower($request->product_name));
        $product_sku = Str::lower($product_Sku = Str::substr($request->product_name, 0, 3) . '-' . Str::random());

        // return $request->all();
        $product_id = Product::insertGetId([
            'product_name' => Str::lower($request->product_name),
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'product_slug' => $product_slug,
            'product_sku' => $product_sku,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'product_weight' => $request->product_weight,
            'product_deimention' => $request->product_deimention,
            'product_other_info' => $request->product_other_info,


            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('product_image')) {
            $new_image_ext = $request->file('product_image')->getClientOriginalExtension();
            $image_name = $product_id . '.' . $new_image_ext;
            Image::make($request->file('product_image'))->resize(270, 310)->save(base_path('public/uploads/product_photo/' . $image_name));
            //image upload start
            Product::find($product_id)->update([
                'product_image' => $image_name,
            ]);
        }
        return back();
        // return $request->file('product_image');
    }
    public function index()
    {
        $all_products = Product::latest()->get();
        return view('product.index', compact('all_products'));
    }
    public function delete($id)
    {

        // echo Product::find($id)->product_image;
        if (Product::find($id)->product_image != "product_default_image.jpg") {
            unlink(public_path() . "/uploads/product_photo/" . Product::find($id)->product_image);
        }
        Product::find($id)->delete();
        return back();
    }
    public function edit($id)
    {
        $all_proInfo = Product::findOrFail($id);
        return view('product.edit', compact('all_proInfo'));
    }
    public function update(Request $request, $id)
    {
        if ($request->hasFile('product_image')) {
            if (Product::find($request->id) != "product_default_image.jpg") {
                unlink(public_path() . "/uploads/product_photo/" . Product::find($request->id)->product_image);
            }
            $new_image_ext = $request->file('product_image')->getClientOriginalExtension();
            $new_image_name = $request->id . '.' . $new_image_ext;
            Image::make($request->file('product_image'))->resize(270, 310)->save(base_path('public/uploads/product_photo/' . $new_image_name));
        }
        Product::find($request->id)->update([
            // 'product_image' => $new_image_name,
            'product_name' => $request->product_name,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,

        ]);
        // $product_insert = Product::find($request->id);
        // $product_insert->product_name = $request->product_name;
        // $product_insert->save();

        return back()->with('productUpdate', 'your product update successfully!');
    }
    // =================AJAX WORK ARE HERE==================
    public function GetsubcategoryID(Request $request)
    {
        $subcategory =  SubCategory::where('category_id', $request->Cat_id)->get();
        $outputs =  '<option value="">choese Sub category </option>';

        foreach ($subcategory as $subcatories) {
            echo   $output = '<option value="' . $subcatories->id . '">' . $subcatories->subcategory_name . ' </option>';
        }
    }
}
