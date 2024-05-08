@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Detalles</h1>
        <br>
        <div class="card">
            <div class="card-header">
                <h3>Patente: {{$tickets->id}}</h3>
                <h3>Marca: {{$tickets->titulo}}</h3>
                <h3>Modelo: {{$tickets->estado}}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>

                        </tr>
                    </tfoot>
                    <tbody>

                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->id}}</td>
                                    <td>{{$ticket->titulo}}</td>
                                    <td>{{$ticket->estado}}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
