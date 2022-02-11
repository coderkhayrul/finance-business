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
    public function __construct(){
        return $this->middleware('auth');
    }
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
        $this->validate($request, [
            'ban_order' => ['required|unique:banners']
        ]);

        // Banner Image
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
        $banner = Banner::where('ban_id', $id)->firstOrFail();
        return view('admin.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::where('ban_id', $id)->firstOrFail();
        return view('admin.banner.edit', compact('banner'));
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
<<<<<<< HEAD
        $banner = Banner::where('ban_id', $id)->firstOrFail();

        // Banner Image
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerName = time() . '_' . rand(100000, 10000000) . '.' . $bannerImage->getClientOriginalExtension();
            Image::make($bannerImage)->save('uploads/banner/' . $bannerName);
        } else {
            $bannerName = $banner->ban_image;
        }

        $banner = Banner::where('ban_id', $id)->update([
            'ban_title' => $request->ban_title,
            'ban_subtitle' => $request->ban_subtitle,
            'ban_button' => $request->ban_button,
            'ban_url' => $request->ban_url,
            'ban_order' => $request->ban_order,
            'ban_editor' => Auth::user()->id,
            'ban_image' => $bannerName,
            'ban_slug' => Str::slug($request->ban_title, '-'),
            'ban_status' => 1,
        ]);

        if ($banner) {
            Session::flash('success', 'Banner Update successfully');
        } else {
            Session::flash('error', 'Banner Update Failed!');
        }
        return redirect()->back();
=======
        return "Now Working";
>>>>>>> f06ee9d86f98d2c6706a47010ae8dfd33d939c78
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
