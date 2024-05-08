<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $datos['users']=User::all();
        return view('Usuarios.index',$datos);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        return view('user.store');
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
