<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\SubCategory;
use Faker\Extension\CompanyExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Str;
use Carbon\Carbon;

class SubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $all_category = category::latest()->get();
        return view('subcategory.create', compact('all_category'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name',
            'category_id' => 'required',

        ]);
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => Str::lower($request->subcategory_name),
            'created_at' => Carbon::now(),

        ]);
        return back()->with('insetdone', 'subcategoy added by database Successfully');
    }
    public function index()
    {
        $all_subcategory = DB::table('sub_categories')->join('categories', 'sub_categories.category_id', '=', 'categories.id')->get();
        // $all_subcategory = SubCategory::latest()->join(' categories', 'sub_categories.category_id', '=', 'categories.id')
        //     ->get();
        return view('subcategory.index', compact('all_subcategory'));
    }
    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $all_category = category::all();
        return view('subcategory.edit', compact('subcategory', 'all_category'));
    }
    public function update(Request $request, $id)
    {
        $updatesubcategory = SubCategory::findOrFail($id);
        $updatesubcategory->category_id = $request->category_id;
        $updatesubcategory->subcategory_name = $request->subcategory_name;
        $updatesubcategory->save();
        return back();
    }
    public function delete($id)
    {
        $deletesubcate = SubCategory::findOrFail($id);
        $deletesubcate->delete();
        return redirect()->back();
    }
    public function trashed()
    {
        $all_trashed = SubCategory::onlyTrashed()->get();
        return view('subcategory.trashed', compact('all_trashed'));
    }
    public function restore($id)
    {
        $restoresubacategory = SubCategory::withTrashed()->find($id)->restore();
        return back();
    }
    public function forcedelete($id)
    {
        SubCategory::where('id', $id)->forcedelete();
        return back();
    }
}
