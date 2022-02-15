<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    public function create()
    {
        return view('Banner.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'banner_title' => 'required|unique:banners,banner_title',

        ]);
        $banner_id = Banner::insertGetId([
            'banner_title' => $request->banner_title,

        ]);
        if ($request->hasFile('banner_images')) {
            $baner_image_ext = $request->file('banner_images')->getClientOriginalExtension();
            $baner_image_name = $banner_id . '.' . $baner_image_ext;

            Image::make($request->file('banner_images'))->resize(608, 552)->save(base_path('public/uploads/banner_photo/' . $baner_image_name));

            Banner::findOrFail($banner_id)->update([
                'banner_images' => $baner_image_name,
            ]);
        }
        return back()->with('bannerAdd', 'Banner added successfully!');
    }
    // =======banner index or view page===================
    public function index()
    {
        $banner_data = Banner::all();
        return view('Banner.index', compact('banner_data'));
    }
    public function edit($banner_id)
    {
        $all_banner_info = Banner::find($banner_id);
        return view('Banner.edit', compact('all_banner_info'));
    }

    public function update(Request $request, $id)
    {
        // $banner_update = new Banner();
        // $banner_update->banner_title = $request->banner_title;
        // $banner_update->save();
        // return back();

        if ($request->hasFile('banner_images')) {
            if (Banner::find($request->id) != 'banner_image.jpg') {
                unlink(public_path() . '/uploads/banner_photo/' . Banner::find($request->id)->banner_images);
            }
            $banner_new_imagExt = $request->file('banner_images')->getClientOriginalExtension();
            $banner_new_name = $request->id . '.' . $banner_new_imagExt;
            Image::make($request->file('banner_images'))->resize(608, 552)->save(base_path('public/uploads/banner_photo/' . $banner_new_name));
        }
        Banner::find($request->id)->update([
            'banner_images' => $banner_new_name,
            'banner_title' => $request->banner_title,
        ]);
        return back()->with('banner', 'Banner Item Updated Successfully!');
    }
    public function delete($id)
    {
        if (Banner::find($id)->banner_images != 'banner_image.jpg') {
            unlink(public_path() . '/uploads/banner_photo/' . Banner::find($id)->banner_images);
        }
        Banner::find($id)->delete();
        return back()->with('deleteBanner', 'Banner item deleted successfully!');
    }
}
