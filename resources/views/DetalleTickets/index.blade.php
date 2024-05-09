@extends('layouts.app')
@section('content')


<div class="container">



    {{isset($user->name)?$user->name:'No Asignado'}}

    <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" value="{{$ticket->id}}">
    <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" value="{{$ticket->titulo}}">
    <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" value="{{$ticket->descripcion}}">
    <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" value="{{$ticket->estado}}">
    <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" value="{{$ticket->prioridad}}">


</div>


@endsection
