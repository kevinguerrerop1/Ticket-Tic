<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tickets'] = Tickets::all();
        return view('Tickets.index', $datos);
    }

    public function viewactivos(){
        //$tickets = Tickets::where('ESTADO','=','Asignado');
        //return view('Tickets.activos', compact('tickets'));
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
        return view('Tickets.show',['tickets'=> $tickets]);
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
