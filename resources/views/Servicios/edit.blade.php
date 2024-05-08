@extends('includes.NavBar')
@section('content')


<div class="container">
    <form action="{{url('/servicios/'.$servicios->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <h4>Editar servicio</h4>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Servicio" name="NOMSERV" id="NOMSERV" aria-label="Servicio" aria-describedby="basic-addon1" value="{{$servicios->nomserv}}">
        </div>
        <input type="submit" class="btn btn-success" value="Editar">
    </form>
</div>
@endsection
