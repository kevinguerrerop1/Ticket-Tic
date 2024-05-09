<?php

namespace App\Http\Controllers;

use App\Models\DetalleTickets;
use App\Models\Tickets;
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
    public function create(Tickets $id)
    {
        $ticket = Tickets::findOrFail($id);
        dd($ticket);
        //return view('DetalleTickets.create', compact('tickets'));
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
     * @param  \App\Models\DetalleTickets  $detalleTickets
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleTickets $detalleTickets)
    {
        //
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

    public function datos($id){
        $ticket = Tickets::findOrFail($id);
        //$user = Auth::id();
        $user = DB::table('users')->where('id','=',$id)->first();
        //dd($user);

        return view ('detalleTickets.index', compact('ticket', 'user'));
        //->with('Mensaje',$funcionario->nombre.' Dado de baja con Exito.')
    }
}
