<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RoleController extends Controller
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
        $roles = Role::where('role_status',1)->orderBy('id', 'DESC')->get();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request['role_name'], '-');
        $insert = Role::insertGetId([
            'role_name' => $request['role_name'],
            'role_slug' => $slug,
            'role_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        if ($insert) {
            Session::flash('success', 'Role Create Successfully!');
            return redirect()->back();
        }else {
            Session::flash('error', 'Role Create Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role, $slug)
    {
        $role = Role::where('role_status', 1)->where('role_slug', $slug)->firstOrFail();
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $slug)
    {
        $id = $request->id;
        $slug = Str::slug($request['role_slug'], '-');
        $update = Role::where('id', $id)->update([
            'role_name' => $request['role_name'],
            'role_slug' => $slug,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
        Session::flash('success', 'Role updated successfully');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        Session::flash('success', 'Role deleted successfully');
        return redirect()->route('role.index');
    }
}
