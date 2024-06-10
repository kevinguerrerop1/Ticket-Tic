<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index(){
        $role=Role::all();
        return view('admin.roles.index',compact('role'));
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function store(Request $request){
        $rol= new Role();
        $rol->name=$request->name;
        $rol->save();

        return redirect('roles');
    }
}
