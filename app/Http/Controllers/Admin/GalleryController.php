<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
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
        $gallerys = Gallery::all();
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
            'gallery_title' => 'required',
            'gallery_order' => 'required',
            'gallery_category_id' => 'required',
        ]);

        // Gallery Image
        if ($request->hasFile('gallery_image')) {
            $galleryImage = $request->file('gallery_image');
            $galleryName = time() . '_' . rand(100000, 10000000) . '.' . $galleryImage->getClientOriginalExtension();
            Image::make($galleryImage)->save('uploads/gallery/' . $galleryName);
        } else {
            $galleryName = null;
        }

        $galley_store = Gallery::create([
            'gallery_title' => $request->gallery_title,
            'gallery_remarks' => $request->gallery_remarks,
            'gallery_order' => $request->gallery_order,
            'gallery_category_id' => $request->gallery_category_id,

            'gallery_publish' => 1,
            'gallery_creator' => Auth::id(),
            'gallery_slug' => Str::slug(Str::random(20), '-'),
            'gallery_image' => $galleryName,
            'gallery_status' => 1,
        ]);
        if ($galley_store) {
            Session::flash('success', 'Galley Created successfully');
        } else {
            Session::flash('error', 'Galley Created Failed!');
        }
        return redirect()->back();
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
