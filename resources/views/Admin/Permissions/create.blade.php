@extends('Admin.layout.dashboard')

@section('content')

<div class="app-content-header">

    <form action="{{route('perm.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4>Crear Permiso</h4>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="name" name="name" id="name" aria-label="name" aria-describedby="basic-addon1">
        </div>

        <input type="submit" class="btn btn-success" value="Crear">
    </form>
</div>

@endsection
