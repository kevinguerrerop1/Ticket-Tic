<?php

namespace App\Http\Controllers;

use App\Models\DetalleTickets;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleTicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tickets $id)
    {
        $ticket = Tickets::findOrFail($id);
        return view ('detalleTickets.index', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dticket = new DetalleTickets();
        $dticket->ID_TICKET = $request->ID_TICKET;
        $dticket->TICKETCOMENTARIO = $request->TICKETCOMENTARIO;
        //dd($dticket);
        $dticket->save();
        return redirect('tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleTickets  $detalleTickets
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleTickets $detalleTickets)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleTickets  $detalleTickets
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleTickets $detalleTickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleTickets  $detalleTickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleTickets $detalleTickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleTickets  $detalleTickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleTickets $detalleTickets)
    {
        //
    }

    public function datos(Tickets $id){
        $users = User::get()->where('id', $id->userid);
        $tickets = Tickets::get()->where('id', $id->id);
        $dticket= DetalleTickets::get()->where('id_ticket', $id->id);

        //dd($tickets, $users, $dticket);
        return view ('detalleTickets.index', compact('tickets', 'users', 'dticket'));




        //$ticket = Tickets::all()->where('id', $id)->first();
        //dd($ticket);
        //$user = Auth::id();
        //$users = User::all();
        //dd($users);

        //return view ('detalleTickets.index', compact('ticket', 'users'));
        //->with('Mensaje',$funcionario->nombre.' Dado de baja con Exito.')
    }
}
