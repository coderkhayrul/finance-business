<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery_categories = GalleryCategory::all();
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
            'galcate_order' => 'required|unique:gallery_categories,galcate_order'
        ]);

        $gallery_category = GalleryCategory::create([
            'galcate_name' => $request->galcate_name,
            'galcate_remarks' => $request->galcate_remarks,
            'galcate_order' => $request->galcate_order,
            'galcate_creator' => Auth::id(),
            'galcate_url' => Str::slug(Str::random(20), '-'),
            'galcate_slug' => Str::slug(Str::random(20), '-'),
            'galcate_status' => 1,
        ]);

        if ($gallery_category) {
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
    public function destroy($id)
    {
        //
    }
}
