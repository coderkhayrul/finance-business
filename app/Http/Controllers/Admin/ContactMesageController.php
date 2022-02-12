<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactMesageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactmessages = ContactMessage::all();
        return view('admin.contactmessage.index', compact('contactmessages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactmessage = ContactMessage::where('cm_id', $id)->firstOrFail();
        return view('admin.contactmessage.show', compact('contactmessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
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
