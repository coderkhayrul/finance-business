<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class TeamMemberController extends Controller
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
        $teammember = TeamMember::where('team_status', 1)->orderBy('team_id', 'DESC')->get();
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
        // Tema Member Data Validation
        $this->validate(
            $request,
            [
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

        // Store Data On Team-Member
        $insert = TeamMember::insertGetId([
            'team_name' => $request['team_name'],
            'team_designation' => $request['team_designation'],
            'team_facebook' => $request['team_facebook'],
            'team_twitter' => $request['team_twitter'],
            'team_linkedin' => $request['team_linkedin'],
            'team_instragram' => $request['team_instragram'],
            'team_remarks' => $request['team_remarks'],
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
        // Notification
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
        $data = TeamMember::where('team_status', 1)->where('team_slug', $slug)->firstOrFail();
        return view('admin.teammember.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = TeamMember::where('team_status', 1)->where('team_slug', $slug)->firstOrFail();
        return view('admin.teammember.edit', compact('data'));
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
            'team_name' => 'required',
        ], [
            'team_name.required' => 'enter you name'
        ]);
        // Update TeamMember
        $editor = Auth::user()->id;
        $id = $request->team_id;
        $update = TeamMember::where('team_status', 1)->where('team_id', $id)->where('team_slug', $slug)->update([
            'team_name' => $request['team_name'],
            'team_designation' => $request['team_designation'],
            'team_facebook' => $request['team_facebook'],
            'team_twitter' => $request['team_twitter'],
            'team_linkedin' => $request['team_linkedin'],
            'team_instragram' => $request['team_instragram'],
            'team_remarks' => $request['team_remarks'],
            'team_order' => $request['team_order'],
            'team_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        // Team Member Upload Image
        if ($request->hasFile('team_image')) {
            $image = $request->file('team_image');
            $imageName = $id . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/teammember/' . $imageName);

            TeamMember::where('team_id', $id)->update([
                'team_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        // Notification
        if ($update) {
            Session::flash('success', 'Team Member Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Team Member Updated Failed!');
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
        $delete = TeamMember::where('team_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Team Member Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Team Member Delete Failed!');
            return redirect()->back();
        }
    }
}
