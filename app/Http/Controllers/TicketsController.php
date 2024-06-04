<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$data=Tickets::select('id','created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $months=[];
        $monthCount=[];
        foreach($data as $month=>$values){
            $months[]=$month;
            $monthCount[]=count($values);
        }*/


        /*$datos['tickets'] = DB::table('tickets')
            ->select('tickets.id','titulo','descripcion','ESTADO','prioridad','tickets.created_at','userid','name')
            ->leftjoin('users', 'users.id','=', 'tickets.userid')
            ->get();
        */
        //dd($datos);
        //$datos['tickets'] = Tickets::all();
        //return view('Tickets.index', $datos);
        //return view('Tickets.charts',['data'=>$data,'months'=>$months,'monthCount'=>$monthCount]);
        return view('admin.index');
    }

    public function viewactivos(){
        $tickets = Tickets::where('ESTADO','Abierto')->get();
        return view('Tickets.activos', compact('tickets'));
    }

    public function viewasignados(){
        $tickets = Tickets::where('ESTADO','Asignado')->get();
        return view('Tickets.asignados', compact('tickets'));
    }

    public function viewxusu(){
        $tickets = DB::table('tickets')
            ->select('tickets.id','titulo','descripcion','ESTADO','prioridad','tickets.created_at','userid','name')
            ->leftjoin('users', 'users.id','=', 'tickets.userid')
            ->where('userid',Auth::id())
            ->get();
        return view('Tickets.ticketsxusu', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Tickets();
        $ticket->TITULO = $request->TITULO;
        $ticket->PRIORIDAD = $request->PRIORIDAD;
        $ticket->DESCRIPCION = $request->DESCRIPCION;
        $ticket->ESTADO = "Abierto";
        $ticket->save();
        return redirect('tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show(Tickets $tickets)
    {
        //$tickets = Tickets::findOrFail($id);
        //return view('Tickets.show');
        //return view('Tickets.show',['tickets'=> $tickets]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickets $tickets)
    {
        return view('Tickets.edit', compact('tickets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tickets $tickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickets $tickets)
    {
        //
    }

    public function asignar($id){
        $ticket = Tickets::findOrFail($id);
        $user = Auth::id();
        $ticket->userid = $user;
        $ticket->ESTADO = "Asignado";
        $ticket->save();
        return redirect('tickets');
        //->with('Mensaje',$funcionario->nombre.' Dado de baja con Exito.')
    }

    public function cerrar($id){
        $ticket = Tickets::findOrFail($id);
        $ticket->ESTADO = "Cerrado";
        $ticket->save();
        return redirect('tickets');
    }
}
