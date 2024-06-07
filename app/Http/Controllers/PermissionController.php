<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permission=Permission::all();
        return view('admin.permissions.index',compact('permission'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {

        $permission= new Permission();
        $permission->name=$request->name;
        $permission->save();

        return redirect('permissions');
    }
}
