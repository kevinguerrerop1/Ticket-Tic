@extends('admin.layout.dashboard')
@section('content')
<div class="app-content-header">
    <a href="{{ route('users.create') }}"class="btn btn-success">Crear nuevo Usuario</a>
    <table class="table table-striped" id="example">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombres</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Fecha Creación</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombres</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
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
            <td>
                @if (!empty($user->getRoleNames()))
                    @foreach ($user->getRoleNames()  as $rolename)
                        <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                    @endforeach
                @endif
            </td>
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
