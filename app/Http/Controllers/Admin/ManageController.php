<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasicRequest;
use App\Models\Basic;
use App\Models\ContactInformation;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
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

        Basic::where('id', 1)->where('basic_status', 1)->update([
            'basic_company' => $request->basic_company,
            'basic_title' => $request->basic_title,
            'basic_logo' => $logoName,
            'basic_flogo' => $footerName,
            'basic_favicon' => $faviconName,
        ]);
        return back();
    }

    public function contactinfo()
    {
        $contactinfo = ContactInformation::where('id', 1)->where('cont_status', 1)->firstOrFail();
        return view('admin.manage.contact_info', compact('contactinfo'));
    }

    public function socialmedia()
    {
        $socialmedia = SocialMedia::where('id', 1)->where('sm_status', 1)->firstOrFail();
        return view('admin.manage.socialmedia', compact('socialmedia'));
    }
}
