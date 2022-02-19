<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('service_status', 1)->orderBy('service_id', 'DESC')->get();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'service_title' => 'required',
            'service_image' => 'required',
        ],[
            'service_title.required' => 'Please Enter Title',
            'service_image.required' => 'Please Upload Image'
        ]);

        $creator = Auth::user()->id;
        $slug = 'S' . uniqid();
        $insert = Service::insertGetId([
            'service_title' => $request['service_title'],
            'service_icon' => $request['service_icon'],
            'service_order' => $request['service_order'],
            'service_subtitle' => $request['service_subtitle'],
            'service_details' => $request['service_details'],
            'service_url' => Str::slug($request['service_title'], '-'),
            'service_feature' => 0,
            'service_publish' => 1,
            'service_creator' => $creator,
            'service_slug' => $slug,
            'service_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        // Service Image Upload
        if ($request->hasFile('service_image')) {
            $image = $request->file('service_image');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/service/' . $imageName);

            Service::where('service_id', $insert)->update([
                'service_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        
        if ($insert) {
            Session::flash('success', 'Service Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Service Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = Service::where('service_status', 1)->where('service_slug', $slug)->firstOrFail();
        return view('admin.service.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Service::where('service_status', 1)->where('service_slug', $slug)->firstOrFail();
        return view('admin.service.edit', compact('data'));
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
            'service_title' => 'required'
        ]);

        $update = Service::where('service_status', 1)
        ->where('service_slug', $slug)
        ->update([
            'service_title' => $request['service_title'],
            'service_icon' => $request['service_icon'],
            'service_order' => $request['service_order'],
            'service_subtitle' => $request['service_subtitle'],
            'service_details' => $request['service_details'],
            'service_editor' => $request['service_editor'],
            'service_url' => Str::slug($request['service_title'], '-'),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        // Service Image Upload
        if ($request->hasFile('service_image')) {
            $image = $request->file('service_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/service/' . $imageName);

            Service::where('service_slug', $slug)->update([
                'service_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update) {
            Session::flash('success', 'Service Upda Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Service Updated Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $id = $request['delete_data'];
        $delete = Service::where('service_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Service Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Service Delete Failed!');
            return redirect()->back();
        }
    }
}
