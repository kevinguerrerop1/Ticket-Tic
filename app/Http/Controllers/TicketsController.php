<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\DetalleTickets;

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

        $datos['tickets'] = DB::table('tickets')
            ->select('tickets.id','titulo','descripcion','ESTADO','prioridad','tickets.created_at','userid','name')
            ->leftjoin('users', 'users.id','=', 'tickets.userid')
            ->get();

        //dd($datos);
        //$datos['tickets'] = Tickets::all();
        return view('Tickets.index', $datos);

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

    public function reabrir($id){
        $ticket = Tickets::findOrFail($id);
        $ticket->ESTADO = "Abierto";
        $ticket->save();
        return redirect('tickets');
    }

    public function viewticketadmin(){
        $datos['tickets'] = DB::table('tickets')
            ->select('tickets.id','titulo','descripcion','ESTADO','prioridad','tickets.created_at','userid','name')
            ->leftjoin('users', 'users.id','=', 'tickets.userid')
            ->get();

        //dd($datos);
        //$datos['tickets'] = Tickets::all();
        return view('Admin.tickets.index', $datos);
    }

    public function detasigadmin(Tickets $id){
        $users = User::all();
        $tickets = Tickets::get()->where('id', $id->id);
        return view ('Admin.tickets.asignar', compact('tickets', 'users'));
    }

    public function asigtckadmin(Request $request, $id){
        $ticket=request()->except('_token','_method');
        Tickets::where('id', $id)->update($ticket);
        return redirect('tickets');

        $ticket->userid = $user;
        $ticket->ESTADO = "Asignado";
        $ticket->save();
        return redirect('tickets');

/*
        $ticket = new Tickets();
        $ticket->ID_TICKET=$request->ID_TICKET;
        $ticket->userid=$request->userid;
        $ticket->ESTADO = "Asignado";
        $ticket->update();
        return redirect('tickets');*/
    }
}
