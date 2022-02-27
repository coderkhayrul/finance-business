<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
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
        $pages = Page::where('page_status', 1)->OrderBy('page_id', 'desc')->get();
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
            'page_title' => 'required'
        ], [
            'page_title.required' => 'Enter You Page  Name'
        ]);

        // Page Create
        $creator = Auth::user()->id;
        $slug = 'PG' . uniqid();
        $insert = Page::insertGetId([
            'page_title' => $request['page_title'],
            'page_url' => $request['page_url'],
            'page_remarks' => $request['page_remarks'],
            'page_order' => $request['page_order'],
            'page_publish' => 1,
            'page_creator' => $creator,
            'page_slug' => $slug,
            'page_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Page Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Page Created Failed!');
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
        $data = Page::where('page_status', 1)->where('page_slug', $slug)->firstOrFail();
        return view('admin.page.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Page::where('page_status', 1)->where('page_slug', $slug)->firstOrFail();
        return view('admin.page.edit', compact('data'));
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
        $id = $request['page_id'];
        $editor = Auth::user()->id;
        $update = Page::where('page_status', 1)->where('page_id', $id)->update([
            'page_title' => $request['page_title'],
            'page_url' => $request['page_url'],
            'page_order' => $request['page_order'],
            'page_remarks' => $request['page_remarks'],
            'page_edtor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Page Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Page Updated Failed!');
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
        $delete = Page::where('page_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Page Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Page Delete Failed!');
            return redirect()->back();
        }
    }
}
