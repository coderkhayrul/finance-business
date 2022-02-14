<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;



class BannerController extends Controller
{
    public function __construct()
    {
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
        // return $request->all();
        $this->validate($request, [
            'ban_title' => 'required|unique:banners',
            'ban_image' => 'required'
        ]);

        $slug = 'B' . uniqid();
        $creator = Auth::user()->id;

        $insert = Banner::insertGetId([
            'ban_title' => $request['ban_title'],
            'ban_subtitle' => $request['ban_subtitle'],
            'ban_button' => $request['ban_button'],
            'ban_url' => $request['ban_url'],
            'ban_order' => $request['ban_order'],
            'ban_publish' => 0,
            'ban_creator' => $creator,
            'ban_slug' => $slug,
            'ban_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        // Banner Image Upload
        if ($request->hasFile('ban_image')) {
            $image = $request->file('ban_image');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/banner/' . $imageName);

            Banner::where('ban_id', $insert)->update([
                'ban_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert) {
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
    public function show($slug)
    {
        $banner = Banner::where('ban_status', 1)->where('ban_slug', $slug)->firstOrFail();
        return view('admin.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $banner = Banner::where('ban_status', 1)->where('ban_slug', $slug)->firstOrFail();
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $this->validate($request, [
            'ban_title' => 'required',
        ], [
            'ban_title.required' => 'Please enter banner title!',
        ]);
        $id = $request->ban_id;
        $editor = Auth::user()->id;
        $update = Banner::where('ban_status', 1)->where('ban_id', $id)->where('ban_slug', $slug)->update([
            'ban_title' => $request['ban_title'],
            'ban_subtitle' => $request['ban_subtitle'],
            'ban_button' => $request['ban_button'],
            'ban_url' => $request['ban_url'],
            'ban_order' => $request['ban_order'],
            'ban_editor' => $editor,
            'ban_status' => 1,
        ]);
        if ($request->hasFile('ban_image')) {
            $image = $request->file('ban_image');
            $imageName = $id . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/banner/' . $imageName);

            Banner::where('ban_id', $id)->update([
                'banner_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update) {
            Session::flash('success', 'Banner Update successfully');
        } else {
            Session::flash('error', 'Banner Update Failed!');
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
        $banner = Banner::where('ban_status', 1)->where('ban_id', $request->delete_data)->delete();
        if ($banner) {
            Session::flash('success', 'Banner Delete Successfully');
        } else {
            Session::flash('error', 'Banner Delete Failed!');
        }
        return redirect()->back();
    }
}
