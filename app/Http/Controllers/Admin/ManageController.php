<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasicRequest;
use App\Models\Basic;
use App\Models\ContactInformation;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class ManageController extends Controller
{
    public function basic()
    {
        $basic = Basic::where('id', 1)->where('basic_status', 1)->firstOrFail();
        return view('admin.manage.basic', compact('basic'));
    }

    public function basic_update(BasicRequest $request)
    {
        // Get First Basic Information
        $basic = Basic::where('id', 1)->firstOrFail();

        // Logo
        if ($request->hasFile('basic_logo')) {
            $logo = $request->file('basic_logo');
            $logoName = time() . '_' . rand(100000, 10000000) . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->save('uploads/basic/' . $logoName);
        } else {
            $logoName = $basic->basic_logo;
        }

        // Footer Logo
        if ($request->hasFile('basic_flogo')) {
            $footerlogo = $request->file('basic_flogo');
            $footerName = time() . '_' . rand(100000, 10000000) . '.' . $footerlogo->getClientOriginalExtension();
            Image::make($footerlogo)->save('uploads/basic/' . $footerName);
        } else {
            $footerName = $basic->basic_flogo;
        }

        // Favicon Logo
        if ($request->hasFile('basic_favicon')) {
            $favicon = $request->file('basic_favicon');
            $faviconName = time() . '_' . rand(100000, 10000000) . '.' . $favicon->getClientOriginalExtension();
            Image::make($favicon)->save('uploads/basic/' . $faviconName);
        } else {
            $faviconName = $basic->basic_favicon;
        }

        $update = Basic::where('id', 1)->where('basic_status', 1)->update([
            'basic_company' => $request->basic_company,
            'basic_title' => $request->basic_title,
            'basic_logo' => $logoName,
            'basic_flogo' => $footerName,
            'basic_favicon' => $faviconName,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        if ($update) {
            Session::flash('success', 'Basic Information Update successfully');
        } else {
            Session::flash('error', 'Basic Information Update Failed!');
        }
        return back();
    }

    public function contactinfo()
    {
        $contactinfo = ContactInformation::where('id', 1)->where('cont_status', 1)->firstOrFail();
        return view('admin.manage.contact_info', compact('contactinfo'));
    }

    public function contactinfo_update(Request $request)
    {
        $update = ContactInformation::where('id', 1)->where('cont_status', 1)->update([
            'cont_phone1' => $request->cont_phone1,
            'cont_phone2' => $request->cont_phone2,
            'cont_phone3' => $request->cont_phone3,
            'cont_phone4' => $request->cont_phone4,
            'cont_email1' => $request->cont_email1,
            'cont_email2' => $request->cont_email2,
            'cont_email3' => $request->cont_email3,
            'cont_email4' => $request->cont_email4,
            'cont_add1' => $request->cont_add1,
            'cont_add2' => $request->cont_add2,
            'cont_add3' => $request->cont_add3,
            'cont_add4' => $request->cont_add4,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        if ($update) {
            Session::flash('success', 'Contact Information Updated successfully');
        } else {
            Session::flash('error', 'Contact Information Update Failed!');
        }
        return back();
    }

    public function socialmedia()
    {
        $socialmedia = SocialMedia::where('id', 1)->where('sm_status', 1)->firstOrFail();
        return view('admin.manage.socialmedia', compact('socialmedia'));
    }

    public function socialmedia_update(Request $request)
    {
        $update = SocialMedia::where('id', 1)->where('sm_status', 1)->update([
            'sm_facebook' => $request->sm_facebook,
            'sm_twitter' => $request->sm_twitter,
            'sm_linkedin' => $request->sm_linkedin,
            'sm_dribbble' => $request->sm_dribbble,
            'sm_youtube' => $request->sm_youtube,
            'sm_slack' => $request->sm_slack,
            'sm_instagram' => $request->sm_instagram,
            'sm_behance' => $request->sm_behance,
            'sm_google' => $request->sm_google,
            'sm_raddit' => $request->sm_raddit,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($update) {
            Session::flash('success', 'Social Media Updated successfully');
        } else {
            Session::flash('error', 'Contact Information Update Failed!');
        }
        return back();
    }
}
