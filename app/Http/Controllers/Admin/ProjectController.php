<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('project_status', 1)->orderBy('project_id', 'DESC')->get();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = ProjectCategory::where('procate_status', 1)->orderBy('procate_id', 'DESC')->get();
        return view('admin.project.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Insert Project Validation
        $this->validate($request, [
            'project_title' => 'required',
            'procate_id' => 'required',
            'project_image' => 'required|mimes:png,jpg,jpeg',
        ], [
            'project_title.required' => 'enter your project title',
            'procate_id.required' => 'select your project category',
            'project_image.required' => 'upload you image'
        ]);

        // Project Insert With Get Id
        $slug = 'P' . uniqid();
        $creator = Auth::user()->id;

        $insert = Project::insertGetId([
            'project_title' => $request['project_title'],
            'procate_id' => $request['procate_id'],
            'project_url' => $request['project_url'],
            'project_order' => $request['project_order'],
            'project_remarks' => $request['project_remarks'],
            'project_creator' => $creator,
            'project_publish' => 1,
            'project_slug' => $slug,
            'project_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        // Project Image Upload
        if ($request->hasFile('project_image')) {
            $image = $request->file('project_image');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('uploads/project/' . $imageName);

            Project::where('project_id', $insert)->update([
                'project_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert) {
            Session::flash('success', 'Project Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Project Created Failed!');
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
        $data = Project::where('project_status', 1)->where('project_slug', $slug)->firstOrFail();
        return view('admin.project.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
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
