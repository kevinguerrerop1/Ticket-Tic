@extends('Admin.layout.dashboard')
@section('content')
<div class="app-content-header">
            <a href="{{ route('tickets.create') }}"class="btn btn-success">Generar Ticket</a>
            <table class="table table-striped" id="example">
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

                    </tbody>
            </table>
        </div>
@endsection
