<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('client_status', 1)->orderBy('client_id', 'DESC')->get();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
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
            'client_title' => 'required',
            'client_image' => 'required',
        ], [
            'client_title.required' => 'Please enter title',
            'client_image.required' => 'Please Upload Image'
        ]);

        // Insert Client
        $creator = Auth::user()->id;
        $slug = 'C' . uniqid();
        $insert = Client::insertGetId([
            'client_title' => $request['client_title'],
            'client_url' => $request['client_url'],
            'client_order' => $request['client_order'],
            'client_remarks' => $request['client_remarks'],
            'client_feature' => 0,
            'client_publish' => 1,
            'client_creator' => $creator,
            'client_slug' => $slug,
            'client_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);


        // Client Image Store
        if ($request->hasFile('client_image')) {
            $image = $request->file('client_image');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/client/' . $imageName);

            Client::where('client_id', $insert)->update([
                'client_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert) {
            Session::flash('success', 'Client Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Client Created Failed!');
            return redirect()->back();
        }
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
