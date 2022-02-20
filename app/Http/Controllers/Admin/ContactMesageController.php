<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactMesageController extends Controller
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
        $contactmessages = ContactMessage::where('cm_status', 1)->orderBy('cm_id', 'DESC')->get();
        return view('admin.contactmessage.index', compact('contactmessages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $contactmessage = ContactMessage::where('cm_slug', $slug)->firstOrFail();
        return view('admin.contactmessage.show', compact('contactmessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$slug)
    {
        $contactmessage = ContactMessage::where('cm_id', $request->delete_data)->delete();
        if ($contactmessage) {
            Session::flash('success', 'Contact Message has been deleted');
        } else {
            Session::flash('error', 'Contact Message Delete Failed');
        }
        return redirect()->back();
    }
}
