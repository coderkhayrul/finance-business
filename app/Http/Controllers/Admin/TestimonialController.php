<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class TestimonialController extends Controller
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
        $testimonials = Testimonial::where('tm_status', 1)->orderBy('tm_id', 'DESC')->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'tm_name' => 'required',
                'tm_image' => 'required',
            ],
            [
                'tm_name.required' => 'Please Enter Testimonial Name',
                'tm_image.required' => 'Please Upload Image'
            ]
        );

        $creator = Auth::user()->id;
        $slug = "TM" . uniqid();
        $insert = Testimonial::insertGetId([
            'tm_name' => $request['tm_name'],
            'tm_designation' => $request['tm_designation'],
            'tm_company' => $request['tm_company'],
            'tm_feedback' => $request['tm_feedback'],
            'tm_order' => $request['tm_order'],
            'tm_feature' => 0,
            'tm_creator' => $creator,
            'tm_slug' => $slug,
            'tm_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        // Testimonial Image Upload
        if ($request->hasFile('tm_image')) {
            $image = $request->file('tm_image');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/testimonial/' . $imageName);

            Testimonial::where('tm_id', $insert)->update([
                'tm_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert) {
            Session::flash('success', 'Testimonial Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Testimonial Created Failed!');
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
        $data = Testimonial::where('tm_status', 1)->where('tm_slug', $slug)->firstOrFail();
        return view('admin.testimonial.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Testimonial::where('tm_status', 1)->where('tm_slug', $slug)->firstOrFail();
        return view('admin.testimonial.edit', compact('data'));
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
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $id = $request->get('delete_data');
        $delete = Testimonial::where('tm_id', $id)->where('tm_slug', $slug)->delete();
        if ($delete) {
            Session::flash('success', 'Testimonial Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Testimonial Delete Failed!');
            return redirect()->back();
        }
    }
}
