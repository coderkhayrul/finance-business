<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('website.index');
    }
    public function about()
    {
        return view('website.aboutus');
    }
    public function service()
    {
        return view('website.services');
    }
    public function contactus()
    {
        return view('website.contact');
    }
}
