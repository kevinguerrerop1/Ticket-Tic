<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->id;
        $userLoguead=User::find($user);

        $rol=$userLoguead->roles->first();

        if($rol->name=="Admin"){
            return redirect('/dashboard');
        }elseif($rol->name=="Soporte"){
            return redirect('/tickets');
        }
        //dd($userLoguead);
        //return redirect('/dashboard');
    }
}
