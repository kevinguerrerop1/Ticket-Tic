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
                    <th scope="col">P. Asignada</th>
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
                    <th scope="col">P. Asignada</th>
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
                        <td>{{ $ticket->userid }}</td>
                        <td>{{ $ticket->prioridad }}</td>
                        <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y H:i') }}</td>
                        <td><a onclick="return confirm('Se desea asignar a este Ticket?')" href="{{url('/tickets/'.$ticket->id.'/asignar')}}" class="btn btn-primary">Asignar</a>
                            <a class="btn btn-info"  href="{{url('/detalles/'.$ticket->id.'/datos')}}">Detalle</a></td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection
