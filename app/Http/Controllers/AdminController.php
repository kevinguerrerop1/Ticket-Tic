<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Total de Tickets
        $total = Tickets::all()->count();


        //Tickets por estado
        $abiertos= Tickets::where('ESTADO','Abierto')->count();
        $enproceso= Tickets::where('ESTADO','En proceso')->count();
        $cerrados= Tickets::where('ESTADO','Cerrado')->count();




        //Grafico total tickets
        $data=Tickets::select('id','created_at')
            ->orderby('created_at', 'asc')
            ->get()
            ->groupBy(function($data){
                return Carbon::parse($data->created_at)->format('M');
        });

        $months=[];
        $monthCount=[];
        foreach($data as $month=>$values){
            $months[]=$month;
            $monthCount[]=count($values);
        }


        //Grafico tickets por usuario
        $tickets = DB::table('tickets')
            ->select('tickets.id','titulo','descripcion','ESTADO','prioridad','tickets.created_at','userid','name')
            ->leftjoin('users', 'users.id','=', 'tickets.userid')
            ->get()
            ->groupby(function($tickets){
                return $tickets->name;
        });

        $funs=[];
        $tktCount=[];
        foreach($tickets as $fun=>$values){
            $funs[]=$fun;
            $tktCount[]=count($values);
        }

        return view('Admin.index',['data'=>$data,'months'=>$months,'monthCount'=>$monthCount,'$tickets'=>$tickets,'funs'=>$funs,'tktCount'=>$tktCount,'total'=>$total,'cerrado'=>$cerrados] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
