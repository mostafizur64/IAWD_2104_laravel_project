<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Str;
use Carbon\Carbon;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function addform()
    {
        $all_role = Role::latest()->get();

        return view('role.add', compact('all_role'));
    }
    function storerole(Request $req)
    {
        $req->validate([
            'role' => 'required',
        ]);
        $role = Str::upper($req->role);
        if (Role::where('role', '=', $role)->doesntExist()) {
            Role::insert([
                'role' => $role,
                'created_at' => Carbon::now(),
            ]);
        } else {

            return back()->with('InstErr', 'Already Existed !!!');
        }
        return back()->with('instdone', 'Inserted Successfully !!!');
    }
}
