@extends('Admin.layout.dashboard')
@section('content')

<div class="app-content-header">
    <form action="{{route('users.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4>Crear Nuevo Usuario</h4>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="name" name="name" id="name" aria-label="name" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="name" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="name" aria-describedby="basic-addon1">
        </div>
        <label for="exampleFormControlInput1" class="form-label">Seleccione Rol</label>
            <select class="form-select" aria-label="Default select example" id="rol" name="rol">
            @foreach ($roles as $r)
                <option value="{{ $r}}">{{ $r }}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" class="btn btn-success" value="Crear">
    </form>
</div>

@endsection
