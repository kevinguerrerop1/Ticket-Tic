@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <a href="{{ route('tickets.create') }}"class="btn btn-success">Generar Ticket</a>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Fecha Creación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Fecha Creación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </tfoot>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->titulo }}</td>
                        <td>{{ $ticket->descripcion }}</td>
                        <td>{{ $ticket->estado }}</td>
                        <td>{{ $ticket->prioridad }}</td>
                        <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y H:i') }}</td>
                        <td><a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary">Asignar</a>
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info" >Info</a></td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection
