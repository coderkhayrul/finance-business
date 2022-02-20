<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
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
        $gallery_categories = GalleryCategory::where('galcate_status', 1)->orderBy('galcate_id', 'DESC')->get();
        return view('admin.gallery.category.index', compact('gallery_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.category.create');
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
            'galcate_name' => 'required',
        ]);

        $creator = Auth::user()->id;
        $slug = 'GC' . uniqid();
        $insert = GalleryCategory::insertGetId([
            'galcate_name' => $request['galcate_name'],
            'galcate_remarks' => $request['galcate_remarks'],
            'galcate_order' => $request['galcate_order'],
            'galcate_url' => $request['galcate_url'],
            'galcate_creator' => $creator,
            'galcate_slug' => $slug,
            'galcate_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($insert) {
            Session::flash('success', 'Gallery Category Create Successfully');
        } else {
            Session::flash('error', 'Gallery Category Create Failed!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $gallery_category = GalleryCategory::where('galcate_slug', $slug)->firstOrFail();
        return view('admin.gallery.category.show', compact('gallery_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $gallery_category = GalleryCategory::where('galcate_slug', $slug)->firstOrFail();
        return view('admin.gallery.category.edit', compact('gallery_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'galcate_name' => 'required',
        ]);
        $id = $request->galcate_id;
        $editor = Auth::user()->id;

        $update = GalleryCategory::where('galcate_id', $id)->update([
            'galcate_name' => $request['galcate_name'],
            'galcate_remarks' => $request['galcate_remarks'],
            'galcate_order' => $request['galcate_order'],
            'galcate_url' => $request['galcate_url'],
            'galcate_editor' => $editor,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($update) {
            Session::flash('success', 'Gallery Category Update Successfully');
        } else {
            Session::flash('error', 'Gallery Category Update Failed!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = GalleryCategory::where('galcate_id', $request->delete_data)->delete();
        if ($delete) {
            Session::flash('success', 'Gallery Category Delete Successfully');
        } else {
            Session::flash('error', 'Gallery Category Delete Failed!');
        }
        return redirect()->back();
    }
}
