@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <a href="{{ route('servicios.create') }}"class="btn btn-success">Crear nuevo servicio</a>
<table class="table table-striped table-hover" id="myTable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombres</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha Creación</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombres</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha Creación</th>
            <th scope="col">Acciones</th>
        </tr>
    </tfoot>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{\Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i')}}</td>

            <td>
                <a href="{{ route('servicios.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                <a href="{{ route('servicios.destroy', $user->id) }}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  </div>
@endsection
