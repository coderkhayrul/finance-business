<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function basic(){
        return view('admin.manage.basic');
    }

    public function contactinfo(){
        return view('admin.manage.contact_info');
    }

    public function socialmedia(){
        return view('admin.manage.socialmedia');
    }
}
