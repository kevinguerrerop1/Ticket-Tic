<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use DB;

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
        $datos['tickets'] = DB::table('tickets')
            ->select('tickets.id','titulo','descripcion','ESTADO','prioridad','tickets.created_at','userid','name')
            ->leftjoin('users', 'users.id','=', 'tickets.userid')
            ->get();
        return view('Tickets.index', $datos);
    }
}
