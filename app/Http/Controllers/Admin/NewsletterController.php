<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsletterController extends Controller
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
        $newsletter = Newsletter::where('ns_status', 1)->orderBy('ns_id', 'DESC')->get();
        return view('admin.newsletter.index', compact('newsletter'));
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
        $delete = Newsletter::where('ns_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Newsletter Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Newsletter Delete Failed!');
            return redirect()->back();
        }
    }
}
