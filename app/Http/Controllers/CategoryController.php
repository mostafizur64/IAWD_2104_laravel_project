<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use \Illuminate\Support\Facades\DB;
use Str;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = DB::table('categories')
        //     ->join('users', 'categories.added_by', '=', 'users.id')
        //     ->get();
        //return category::find(1)->relatationToCategory;
        $category = category::all();
        return view('category.index', compact('category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        return view('category.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',

        ]);
        $category_name = Str::lower($request->category_name);
        if (category::where('category_name', '=', $category_name)->doesntExist()) {
            category::insert([
                'category_name' => $category_name,
                'created_at' => Carbon::now(),
                'added_by' => Auth::user()->id,
            ]);
        } else {

            return back()->with('InstErr', 'Already Existed !!!');
        }
        return back()->with('instdone', 'Inserted Successfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $data = category::findOrFail($id);
        return view('category.editcategory', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatacategory = category::find($id);
        $updatacategory->category_name = $request->category_name;
        $updatacategory->save();
        return back()->with('categoryInst', 'Your Category has been added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function trashed()
    {
        $all_trashed = category::onlyTrashed()->get();
        return view('category.trashed', compact('all_trashed'));
    }
    public function restore($id)
    {
        category::withTrashed()->find($id)->restore();
        return back();
    }
    public function delete($id)
    {
        $da = category::where('id', $id);
        $da->forceDelete();
        return back();
    }
}
