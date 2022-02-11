<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
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
        $this->validate($request, [
            'partner_title' => 'required',
            'partner_order' => 'required|unique:partners,partner_order'
        ]);

        // Partner Logo
        if ($request->hasFile('partner_logo')) {
            $partnerImage = $request->file('partner_logo');
            $partnerName = time() . '_' . rand(100000, 10000000) . '.' . $partnerImage->getClientOriginalExtension();
            Image::make($partnerImage)->save('uploads/partner/' . $partnerName);
        } else {
            $partnerName = null;
        }

        $partner = Partner::create([
            'partner_title' => $request->partner_title,
            'partner_order' => $request->partner_order,
            'partner_url' => Str::slug($request->partner_title, '-'),
            'partner_creator' => Auth::id(),
            'partner_slug' => Str::slug($request->partner_title, '-'),
            'partner_status' => 1,
            'partner_logo' => $partnerName,
        ]);

        if ($partner) {
            Session::flash('success', 'Partner Created successfully');
        } else {
            Session::flash('error', 'Partner Created Failed!');
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
        $partner = Partner::where('partner_id', $id)->firstOrFail();
        return view('admin.partner.show', compact('partner'));
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
