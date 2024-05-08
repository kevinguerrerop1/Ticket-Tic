@extends('includes.NavBar')
@section('content')
<div class="container mt-4">
    <a href="{{ route('servicios.create') }}"class="btn btn-success">Crear nuevo servicio</a>
<table class="table table-striped table-hover" id="myTable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Servicio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Servicio</th>
            <th scope="col">Acciones</th>
        </tr>
    </tfoot>
        <tbody>
          @foreach($servicios as $servicio)
          <tr>
            <td>{{$servicio->id}}</td>
            <td>{{$servicio->nomserv}}</td>
            <td>
                <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-primary">Editar</a>
                <a href="{{ route('servicios.destroy', $servicio->id) }}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  </div>

  @endsection
