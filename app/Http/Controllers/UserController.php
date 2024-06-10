<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {

        $datos['users']=User::all();
        return view('Admin.users.index',$datos);
    }

    public function create()
    {
        $roles=Role::pluck('name','name')->all();
        return view('Admin.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        //dd($user);
        $user->save();

        $user->syncRoles($request->rol);


        return redirect('/Admin/users');
    }

    public function edit()
    {
        return view('user.edit');
    }

    public function update()
    {
        return view('user.update');
    }

    public function show()
    {
        return view('user.show');
    }

}
