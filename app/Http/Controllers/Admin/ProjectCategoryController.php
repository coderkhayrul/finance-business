<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
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
        $datas = ProjectCategory::where('procate_status', 1)->orderBy('procate_order', 'DESC')->get();
        return view('admin.project.category.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.category.create');
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
                'procate_name' => 'required|unique:project_categories',
            ],
            [
                'procate_name.required' => 'Enter Category Name'
            ]
        );

        // Insert Project Category
        $url = Str::slug($request['procate_name'], '-');
        $slug = 'PC' . uniqid();
        $creator = Auth::user()->id;
        $insert = ProjectCategory::insertGetId([
            'procate_name' => $request['procate_name'],
            'procate_url' => $url,
            'procate_order' => $request['procate_order'],
            'procate_remarks' => $request['procate_remarks'],
            'procate_publish' => 1,
            'procate_creator' => $creator,
            'procate_slug' => $slug,
            'procate_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Category Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Category Created Failed!');
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
        $data = ProjectCategory::where('procate_status', 1)->where('procate_slug', $slug)->firstOrFail();
        return view('admin.project.category.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $data = ProjectCategory::where('procate_status', 1)->where('procate_slug', $slug)->firstOrFail();
        return view('admin.project.category.edit', compact('data'));
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
        $id = $request['procate_id'];

        $this->validate(
            $request,
            [
                'procate_name' => 'required|unique:project_categories,procate_slug,' . $slug . ',procate_name'
            ],
            [
                'procate_name.required' => 'Enter Category Name'
            ]
        );

        // Insert Project Category
        $url = Str::slug($request['procate_name'], '-');
        $editor = Auth::user()->id;
        $update = ProjectCategory::where('procate_status', 1)
            ->where('procate_slug', $slug)
            ->where('procate_id', $id)
            ->update([
                'procate_name' => $request['procate_name'],
                'procate_url' => $url,
                'procate_order' => $request['procate_order'],
                'procate_remarks' => $request['procate_remarks'],
                'procate_editor' => $editor,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        if ($update) {
            Session::flash('success', 'Category Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Category Updated Failed!');
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
        $delete = ProjectCategory::where('procate_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Category Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Category Delete Failed!');
            return redirect()->back();
        }
    }
}
