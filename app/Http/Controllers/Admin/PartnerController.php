<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class PartnerController extends Controller
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

        $partners = Partner::where('partner_status', 1)->orderBy('partner_id', 'DESC')->get();
        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
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
                'partner_title' => 'required',
                'partner_logo' => 'required'
            ],
            [
                'partner_title.required' => 'Please enter partner title!',
                'partner_logo.required' => 'Please upload partner logo!',
            ]
        );

        $creator = Auth::user()->id;
        $slug = 'P' . uniqid();
        $insert = Partner::insertGetId([
            'partner_title' => $request['partner_title'],
            'partner_url' => $request['partner_url'],
            'partner_order' => $request['partner_order'],
            'partner_creator' => $creator,
            'partner_slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        // Partner Logo Store
        if ($request->hasFile('partner_logo')) {
            $image = $request->file('partner_logo');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/partner/' . $imageName);

            Partner::where('partner_id', $insert)->update([
                'partner_logo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert) {
            Session::flash('success', 'Partner Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Partner Created Failed!');
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
        // $partner = Partner::where('partner_id', $id)->firstOrFail();
        $partner = Partner::where('partner_status', 1)->where('partner_slug', $slug)->firstOrFail();
        return view('admin.partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $partner = Partner::where('partner_status', 1)->where('partner_slug', $slug)->firstOrFail();
        return view('admin.partner.edit', compact('partner'));
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
            'partner_title' => 'required',
        ], [
            'partner_title.required' => 'Please enter partner title!',
        ]);

        $id = $request['partner_id'];
        // $slug=$request['partner_slug'];
        $editor = Auth::user()->id;
        $update = Partner::where('partner_status', 1)->where('partner_id', $id)->update([
            'partner_title' => $request['partner_title'],
            'partner_url' => $request['partner_url'],
            'partner_order' => $request['partner_order'],
            'partner_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);


        // PARTNER IMAGE UPDATE
        if ($request->hasFile('partner_logo')) {
            $image = $request->file('partner_logo');
            $imageName = $id . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/partners/' . $imageName);

            Partner::where('partner_id', $id)->update([
                'partner_logo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update) {
            Session::flash('success', 'Successfully update partner information.');
            return back();
        } else {
            Session::flash('error', 'please try again.');
            return back();
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
        $id = $request->delete_data;

        $del = Partner::where('partner_status', 1)->where('partner_id', $id)->delete();

        if ($del) {
            Session::flash('success', 'Partner Delete successfully');
            return redirect()->route('partner.index');
        } else {
            Session::flash('error', 'Partner Delete Failed!');
            return redirect()->route('partner.index');
        }
    }
}
