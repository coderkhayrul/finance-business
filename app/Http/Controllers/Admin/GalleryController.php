<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallery::where('gallery_status', 1)->orderBy('gallery_id', 'DESC')->get();
        return view('admin.gallery.index', compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery_category = GalleryCategory::all();
        $categories = GalleryCategory::where('galcate_status', 1)->get();
        return view('admin.gallery.create', compact('gallery_category', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gallery_title' => 'required|string',
            'gallery_category_id' => 'required|numeric',
            'gallery_image' => 'required',
        ]);

        $gallery_creator = Auth()->user()->id;
        $slug = "G" . uniqid();
        $insert = Gallery::insertGetId([
            'gallery_title' => $request->gallery_title,
            'gallery_remarks' => $request->gallery_remarks,
            'gallery_order' => $request->gallery_order,
            'gallery_category_id' => $request->gallery_category_id,
            'gallery_publish' => 0,
            'gallery_creator' => $gallery_creator,
            'gallery_slug' => $slug,
            'gallery_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        // Gallery Image Upload
        if ($request->hasFile('gallery_image')) {
            $image = $request->file('gallery_image');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/gallery/' . $imageName);

            Gallery::where('gallery_id', $insert)->update([
                'gallery_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert) {
            Session::flash('success', 'Galley Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Galley Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Gallery::where('gallery_id', $request->delete_data)->delete();
        if ($delete) {
            Session::flash('success', 'Galley Deleted successfully');
        } else {
            Session::flash('error', 'Galley Delete Failed!');
        }
        return redirect()->back();
    }
}
