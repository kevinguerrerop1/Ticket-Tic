@extends('includes.NavBar')
@section('content')

<div class="container">
    <form action="{{route('tickets.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4>Generar Nuevo Ticket</h4>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Titulo" name="TITULO" id="TITULO" aria-label="TITULO" aria-describedby="basic-addon1">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prioridad</label>
            <select class="form-select" aria-label="Default select example" id="PRIORIDAD" name="PRIORIDAD">
                <option selected value="Baja" color="red">Baja</option>
                <option value="Media">Media</option>
                <option value="Alta">Alta</option>
              </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
            <textarea class="form-control" id="DESCRIPCION" name="DESCRIPCION" rows="3"></textarea>
          </div>
        <input type="submit" class="btn btn-success" value="Crear">
    </form>
</div>



@endsection
