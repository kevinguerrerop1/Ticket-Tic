@extends('Admin.layout.dashboard')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <form action="{{('asigtckadmin')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="mt-4" >
                    <label for="">Nro Ticket:</label>
                    @foreach ($tickets as $ticket)
                        <h3>{{ $ticket->id }}</h3>
                        <input type="text" name="ID" id="ID" placeholder="nombre" class="form-control" value="{{$ticket->id}}" style="display:none;">
                    @endforeach
                </div>

                <div class="card mt-3" style="width: auto;">
                    <div class="card-header">
                        {{$ticket->titulo}}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        <p>{{$ticket->descripcion}}</p>
                        </blockquote>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="exampleFormControlInput1" class="form-label">Seleccione Funcionario</label>
                    <select class="form-select" aria-label="Default select example" id="userid" name="userid">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <label for="">Prioridad</label>
                    <input type="text" placeholder="nombre" class="form-control" value="{{$ticket->prioridad}}" readonly>
                </div>
                <div class="mt-4">
                    <input type="submit" class="btn btn-success" value="Responder Ticket">
                </div>
            </form>
        </div>
    </div>
@endsection
