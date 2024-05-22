@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{route('detalles.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-4" >
            <label for="">Nro Ticket:</label>
            @foreach ($tickets as $ticket)
                <h3>{{ $ticket->id }}</h3>
                <input type="text" name="ID_TICKET" id="ID_TICKET" placeholder="nombre" class="form-control" value="{{$ticket->id}}" style="display:none;">
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
            @foreach ($users as $user)
            <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" value="{{$ticket->estado}} a {{ $user->id }} {{ $user->name }}">
            @endforeach
        </div>
        <div class="mt-4">
            <label for="">Prioridad</label>
            <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" value="{{$ticket->prioridad}}">
        </div>
        <div class="mt-4">
            @foreach ($dticket as $dt)
                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                <label for="exampleFormControlTextarea1" class="form-label">Fecha: {{ \Carbon\Carbon::parse($dt->created_at)->format('d-m-Y H:i') }}</label>
                <textarea class="form-control" id="" name="" rows="3" disabled readonly>{{ $dt->ticketcomentario }}</textarea>
            @endforeach
        </div>
        <div class="mt-4">
            <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
            <textarea class="form-control" id="TICKETCOMENTARIO" name="TICKETCOMENTARIO" rows="3"></textarea>
        </div>
        <div class="mt-4">
            <input type="submit" class="btn btn-success" value="Responder Ticket">
        </div>
    </form>
    <div class="mt-4">
        <a onclick="return confirm('Se desea Cerrar este Ticket?')" href="{{url('/tickets/'.$ticket->id.'/cerrar')}}" class="btn btn-danger">Cerrar</a>
    </div>
</div>


@endsection
