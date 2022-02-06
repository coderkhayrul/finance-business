<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;



class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::where('ban_status', 1)->get();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        // $this->validate($request, [
        //     'ban_title' => 'required',
        //     'ban_order' => 'required"unique:banners',
        //     'ban_image' => 'required|mimes:png,jpg,jpeg',
        // ]);

        // Logo
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerName = time() . '_' . rand(100000, 10000000) . '.' . $bannerImage->getClientOriginalExtension();
            Image::make($bannerImage)->save('uploads/banner/' . $bannerName);
        } else {
            $bannerName = null;
        }

        $banner = Banner::create([
            'ban_title' => $request->banner_title,
            'ban_subtitle' => $request->banner_subtitle,
            'ban_button' => $request->banner_button,
            'ban_url' => $request->banner_url,
            'ban_order' => $request->banner_order,
            'ban_publish' => 0,
            'ban_creator' => Auth::id(),
            'ban_image' => $bannerName,
            'ban_slug' => Str::slug($request->banner_title, '-'),
            'ban_status' => 1
        ]);

        if ($banner) {
            Session::flash('success', 'Banner Created successfully');
        } else {
            Session::flash('error', 'Banner Created Failed!');
        }
        return back();
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
        $banner = Banner::where('ban_id', $request->delete_data)->delete();
        if ($banner) {
            Session::flash('success', 'Banner Delete Successfully');
        } else {
            Session::flash('error', 'Banner Delete Failed!');
        }
        return redirect()->back();
    }
}
