<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teammember = TeamMember::where('team_status',1)->orderBy('team_id', 'DESC')->get();
        return view('admin.teammember.index', compact('teammember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teammember.create');
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
            'team_name' => 'required',
            'team_image' => 'required',
            ],        
            [
                'team_name.required' => 'Please Enter You Name',
                'team_image.required' => 'Image Must Me Upload',
            ]
        );

        $slug = "TM" . uniqid();
        $creator = Auth::user()->id;
        
        $insert = TeamMember::insertGetId([
            'team_name' => $request['team_name'],
            'team_designation' => $request['team_designation'],
            'team_facebook' => $request['team_facebook'],
            'team_twitter' => $request['team_twitter'],
            'team_linkedin' => $request['team_linkedin'],
            'team_instragram' => $request['team_instragram'],
            'team_remarks' => $request['team_remarks'],
            'team_order' => $request['team_order'],
            'team_order' => $request['team_order'],
            'team_creator' => $creator,
            'team_slug' => $slug,
            'team_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        // Team Member Upload Image 
        if ($request->hasFile('team_image')) {
            $image = $request->file('team_image');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/teammember/' . $imageName);

            TeamMember::where('team_id', $insert)->update([
                'team_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        if ($insert) {
            Session::flash('success', 'Team Member Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Team Member Created Failed!');
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
